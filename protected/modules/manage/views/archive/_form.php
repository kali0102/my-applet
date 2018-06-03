<?php
/* @var $this ArchiveController */
/* @var $model Archive */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'archive-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <p class="note">字段带 <span class="required">*</span> 为必填</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'category_id'); ?>
        <?php echo $form->dropDownList($model, 'category_id', Category::getDropListData()); ?>
        <?php echo $form->error($model, 'category_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textArea($model, 'title', array('rows' => 2, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'content'); ?>
        <?php echo $form->textArea($model, 'content', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'content'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->dropDownList($model, 'status', [
            Archive::STATUS_DRAFT => '草稿',
            Archive::STATUS_PUBLISHED => '发布'
        ]); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tags'); ?>
        <?php echo $form->textArea($model, 'tags', array('rows' => 3, 'cols' => 30)); ?>
        <?php echo $form->error($model, 'tags'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->