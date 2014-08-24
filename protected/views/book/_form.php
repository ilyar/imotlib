<?php
/* @var $this BookController */
/* @var $model Book */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget(
        'CActiveForm',
        array(
            'id' => 'book-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        )
    ); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'authors'); ?>
        <?php echo $form->dropDownList(
            $model,
            'authors',
            CHtml::listData(Author::model()->findAll(), 'id', 'name'),
            array('multiple' => 'multiple', 'size' => '10')
        ) ?>
        <?php echo $form->error($model, 'authors'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'customers'); ?>
        <?php echo $form->dropDownList(
            $model,
            'customers',
            CHtml::listData(Customer::model()->findAll(), 'id', 'name'),
            array('multiple' => 'multiple', 'size' => '10', 'empty' => 'empty')
        ) ?>
        <?php echo $form->error($model, 'customers'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->