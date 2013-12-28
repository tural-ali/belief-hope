<?php
/* @var $this DictionaryController */
/* @var $model Dictionary */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'dictionary-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>


    <?php echo $form->errorSummary($model); ?>


    <?php echo $form->labelEx($model, 'az'); ?>
    <?php echo $form->textField($model, 'az', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'az'); ?>



    <?php echo $form->labelEx($model, 'en'); ?>
    <?php echo $form->textField($model, 'en', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'en'); ?>


    <?php echo $form->labelEx($model, 'ru'); ?>
    <?php echo $form->textField($model, 'ru', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'ru'); ?>


    <div class="buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? yii::t('form', 'Create') : yii::t('form', 'Save'), array('class' => 'btn green')); ?>
    </div>

    <?php

    $baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerScriptFile($baseUrl . '/assets/ckeditor/ckeditor.js', CClientScript::POS_HEAD);
    $this->endWidget();
    ?>

</div><!-- form -->
