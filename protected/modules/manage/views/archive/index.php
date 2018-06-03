<?php
/* @var $this ArchiveController */
/* @var $model Archive */

$this->breadcrumbs = array(
    '文章' => array('index'),
    '管理',
);

$this->menu = array(
    array('label' => 'List Archive', 'url' => array('index')),
    array('label' => 'Create Archive', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#archive-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>文章管理</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>,
    <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search', array(
        'model' => $model,
    )); ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'archive-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        [
            'name' => 'category_id',
            'filter' => CHtml::listData(Category::model()->findAll(), 'name', 'name'),
            'value' => '$data->category->name'
        ],
        'title',
        [
            'name' => 'status',
            'value' => 'Archive::showStatus($data->status)'
        ],
        [
            'name' => 'tags',
            'filter' => false,
            'value' => '$data->tags'
        ],
        [
            'header' => '创建时间',
            'value' => 'date("Y/m/d H:i", $data->updated_at)'
        ],
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
