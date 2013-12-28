<?php
/* @var $this PhotoController */
/* @var $model Photo */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'photo-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <?php echo $form->errorSummary($model); ?>


    <img width="600" src="<?= $model->url ?>"/>
    <br/>


    <?php echo $form->labelEx($model, 'desc_az'); ?>
    <?php echo $form->textField($model, 'desc_az', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'desc_az'); ?>

    <?php echo $form->labelEx($model, 'desc_en'); ?>
    <?php echo $form->textField($model, 'desc_en', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'desc_en'); ?>

    <?php echo $form->labelEx($model, 'desc_ru'); ?>
    <?php echo $form->textField($model, 'desc_ru', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'desc_ru'); ?>

    <?php echo $form->labelEx($model, 'main'); ?>
    <?php echo $form->checkBox($model, 'main', array('value' => 1, 'uncheckValue' => 0)); ?>
    <?php echo $form->error($model, 'main'); ?>


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