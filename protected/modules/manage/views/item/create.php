<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs = array(
    '书签' => array('index'),
    '新增',
);

$this->menu = array(
    array('label' => '书签管理', 'url' => ['index']),
);
?>

    <h1>书签新增</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>



