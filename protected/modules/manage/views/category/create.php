<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs = array(
    '分类' => array('index'),
    '新增',
);

$this->menu = array(
    array('label' => 'List Category', 'url' => array('index')),
    array('label' => 'Manage Category', 'url' => array('admin')),
);
?>

    <h1>分类新增</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>