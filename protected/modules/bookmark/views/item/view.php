<?php

/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs = array(
    '书签' => ['/bm'],
    $model->name,
);

?>

<h1><?php echo $model->name; ?></h1>
<?php if (!empty($sites)): ?>
    <ul>
        <?php foreach ($sites as $site): ?>
            <li><a href="<?= $site->link ?>" target="_blank"><?= $site->name ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
