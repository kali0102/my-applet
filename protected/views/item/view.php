<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs = array(
    '项目' => array('index'),
    $model->name,
);

//$this->menu=array(
//	array('label'=>'List Item', 'url'=>array('index')),
//	array('label'=>'Create Item', 'url'=>array('create')),
//	array('label'=>'Update Item', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete Item', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage Item', 'url'=>array('admin')),
//);
?>

<h1><?php echo $model->name; ?></h1>


<?php if (!empty($sites)): ?>
    <ul>
        <?php foreach ($sites as $site): ?>
            <li><a href="<?= $site->link ?>" target="_blank"><?= $site->name ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>


<?php

//$this->widget('zii.widgets.CDetailView', array(
//	'data'=>$model,
//	'attributes'=>array(
//		'id',
//		'name',
//		'thumb',
//		'sort',
//	),
//));

?>
