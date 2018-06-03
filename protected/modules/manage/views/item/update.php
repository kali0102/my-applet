<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs = array(
    '书签' => array('index'),
    $model->name => array('view', 'id' => $model->id),
    '编辑',
);

$this->menu = array(
    array('label' => '书签管理', 'url' => array('index')),
    array('label' => '书签新增', 'url' => array('create')),
);
?>

    <h1>书签编辑 <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>