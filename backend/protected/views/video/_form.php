<?php
/* @var $this VideoController */
/* @var $model Video */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'video-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->labelEx($model, 'title_en'); ?>
    <?php echo $form->textField($model, 'title_en', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'title_en'); ?>

    <?php echo $form->labelEx($model, 'title_az'); ?>
    <?php echo $form->textField($model, 'title_az', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'title_az'); ?>

    <?php echo $form->labelEx($model, 'title_ru'); ?>
    <?php echo $form->textField($model, 'title_ru', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'title_ru'); ?>

    <?php echo $form->labelEx($model, 'url'); ?>
    <?php echo $form->textField($model, 'url', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'url'); ?>

    <div class="buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? yii::t('form', 'Create') : yii::t('form', 'Save'), array('class' => 'btn green')); ?>
    </div>
    <?php
    $baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerScriptFile($baseUrl . '/assets/ckeditor/ckeditor.js');
    $this->endWidget();
    ?>
</div><!-- form -->