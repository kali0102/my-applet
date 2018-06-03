<?php
/* @var $this SiteController */
/* @var $model Site */

$this->breadcrumbs = array(
    'Sites' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => '网站列表', 'url' => array('index')),
    array('label' => '添加网站', 'url' => array('create')),
    array('label' => '更新', 'url' => array('update', 'id' => $model->id)),
    array('label' => '删除', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => '管理网站', 'url' => array('admin')),
);
?>

<h1>View Site #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'name',
        'logo',
        'link',
        'sort',
    ),
)); ?>
