<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs = array(
    '书签' => array('index'),
    '管理',
);

$this->menu = array(
    array('label' => '书签新增', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#item-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>书签管理</h1>

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
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'item-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(

        [
            'name' => 'name',
            'filter' => CHtml::listData(Item::model()->findAll(), 'name', 'name'),
            'value' => '$data->name'
        ],
        [
            'header' => '网站数量',
            'value' => '$data->siteCount'
        ],
        [
            'name' => 'sort',
            'filter' => false,
            'value' => '$data->sort'
        ],
        array(
            'class' => 'CButtonColumn',
            //'template' => '{update} {delete}'
        ),
    ),
)); ?>
