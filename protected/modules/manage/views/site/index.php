<?php
/* @var $this SiteController */
/* @var $model Site */

$this->breadcrumbs = array(
    '网站' => array('index'),
    '管理',
);

$this->menu = array(
    array('label' => '网站新增', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#site-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>网站管理</h1>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search', array(
        'model' => $model,
    )); ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'site-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        [
            'name' => 'item_id',
            'filter' => Item::getDropListData(),
            'value' => '$data->item->name'
        ],
        [
            'type' => 'raw',
            'name' => 'name',
            'value' => '$data->getUrl()'
        ],
        [
            'name' => 'sort',
            'filter' => false,
            'value' => '$data->sort'
        ],
        array(
            'class' => 'CButtonColumn',
            'template' => '{update}{delete}'
        ),
    ),
)); ?>
