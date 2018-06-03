<?php
/* @var $this SiteController */
/* @var $model Site */

$this->breadcrumbs = array(
    '网站' => array('index'),
    '新增',
);

$this->menu = array(
    array('label' => '网站管理', 'url' => array('index')),
);
?>

    <h1>网站新增</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>