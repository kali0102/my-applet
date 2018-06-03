<?php
/* @var $this Site2Controller */

$this->pageTitle = Yii::app()->name;
?>

<h1>欢迎来到 <i>我的 WEB 小应用</i></h1>

<ul>
    <li>访问：<?= CHtml::link('我的博客', ['/blog']) ?></li>
    <li>访问：<?= CHtml::link('我的书签', ['/bm']) ?></li>
</ul>