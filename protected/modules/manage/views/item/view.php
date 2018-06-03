<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs = array(
    '书签' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => '书签管理', 'url' => array('index')),
    array('label' => '书签添加', 'url' => array('create')),
    array('label' => '书签编辑', 'url' => array('update', 'id' => $model->id)),
    array('label' => '书签删除', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<h1>详情 显示 #<?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'name',
        'thumb',
        'sort',
    ),
)); ?>
