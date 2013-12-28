<?php
/* @var $this PhotoalbumController */
/* @var $model Photoalbum */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'photoalbum-form',
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
        'enableAjaxValidation' => false,
    )); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->labelEx($model, 'name_az'); ?>
    <?php echo $form->textField($model, 'name_az', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'name_az'); ?>

    <?php echo $form->labelEx($model, 'name_en'); ?>
    <?php echo $form->textField($model, 'name_en', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'name_en'); ?>

    <?php echo $form->labelEx($model, 'name_ru'); ?>
    <?php echo $form->textField($model, 'name_ru', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'name_ru'); ?>

    <?php echo $form->labelEx($model, 'shownInGallery'); ?>
    <?php echo $form->checkBox($model, 'shownInGallery', array('value' => 1, 'uncheckValue' => 0)); ?>
    <?php echo $form->error($model, 'shownInGallery'); ?>

    <br/>
    <input type="hidden" name="upload" value="">
    <input type="file" multiple name="images[]">

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