<?php
/* @var $this SiteController */
/* @var $model Site */

$this->breadcrumbs = array(
    '网站' => array('index'),
    $model->name => array('view', 'id' => $model->id),
    '编辑',
);

$this->menu = array(
    array('label' => '网站列表', 'url' => array('index')),
    array('label' => '添加网站', 'url' => array('create')),
    array('label' => '详情查看', 'url' => array('view', 'id' => $model->id)),
    array('label' => '网站管理', 'url' => array('admin')),
);
?>

    <h1>Update Site <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>