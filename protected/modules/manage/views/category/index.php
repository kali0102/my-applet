<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs = array(
    '分类' => array('index'),
    '管理',
);

$this->menu = array(
    array('label' => 'List Category', 'url' => array('index')),
    array('label' => 'Create Category', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>分类管理</h1>

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
    'id' => 'category-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        [
            'name' => 'name',
            'filter' => CHtml::listData(Category::model()->findAll(), 'name', 'name'),
            'value' => '$data->name'
        ],
        [
            'name' => 'alias',
            'filter' => false,
            'value' => '$data->alias'
        ],
        [
            'header' => '文章数量',
            'filter' => false,
            'value' => '$data->archiveCount'
        ],
        [
            'name' => 'sort',
            'filter' => false,
            'value' => '$data->sort'
        ],
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
