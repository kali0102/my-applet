<?php
/* @var $this ArchiveController */
/* @var $model Archive */

$this->breadcrumbs = array(
    '文章' => array('index'),
    '新增',
);

$this->menu = array(
    array('label' => 'List Archive', 'url' => array('index')),
    array('label' => 'Manage Archive', 'url' => array('admin')),
);
?>

    <h1>文章新增</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>