<?php
/* @var $this SiteController */
/* @var $model Site */
/* @var $form CActiveForm */

$items = CHtml::listData(Item::model()->findAll(), 'id', 'name');
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'site-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <p class="note">字段带 <span class="required">*</span> 为必填项</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'item_id'); ?>
        <?php echo $form->dropDownList($model, 'item_id', $items); ?>
        <?php echo $form->error($model, 'item_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textArea($model, 'name', array('rows' => 2, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'logo'); ?>
        <?php echo $form->textField($model, 'logo'); ?>
        <?php echo $form->error($model, 'logo'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'link'); ?>
        <?php echo $form->textArea($model, 'link', array('rows' => 3, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'link'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'sort'); ?>
        <?php echo $form->textField($model, 'sort'); ?>
        <?php echo $form->error($model, 'sort'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->