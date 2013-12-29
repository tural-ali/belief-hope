<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'slideshow-form',
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
        'enableAjaxValidation' => false,
    )); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->labelEx($model, 'sort'); ?>
    <?php echo $form->textField($model, 'sort'); ?>
    <?php echo $form->error($model, 'sort'); ?>
    <!--BEGIN TABS-->
    <div class="tabbable tabbable-custom tabs-left">
        <!-- Only required for left/right tabs -->
        <ul class="nav nav-tabs tabs-left">
            <li class="active"><a href="#tab1" data-toggle="tab">Az</a></li>
            <li class=""><a href="#tab2" data-toggle="tab">En</a></li>
            <li class=""><a href="#tab3" data-toggle="tab">Ru</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <?php echo $form->labelEx($model, 'title_az'); ?>
                <?php echo $form->textField($model, 'title_az', array('size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'title_az'); ?>

                <?php echo $form->labelEx($model, 'text_az'); ?>
                <?php echo $form->textArea($model, 'text_az', array('rows' => 6, 'cols' => 50)); ?>
                <?php echo $form->error($model, 'text_az'); ?>
                <div id="chars_az">150</div>
                <?php echo $form->labelEx($model, 'url_az'); ?>
                <?php echo $form->textField($model, 'url_az', array('size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'url_az'); ?>
            </div>
            <div style="min-height: 124px;" class="tab-pane" id="tab2">
                <?php echo $form->labelEx($model, 'title_en'); ?>
                <?php echo $form->textField($model, 'title_en', array('maxlength' => 150, 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'title_en'); ?>

                <?php echo $form->labelEx($model, 'text_en'); ?>
                <?php echo $form->textArea($model, 'text_en', array('maxlength' => 150, 'rows' => 6, 'cols' => 50)); ?>
                <?php echo $form->error($model, 'text_en'); ?>
                <div id="chars_en">150</div>
                <?php echo $form->labelEx($model, 'url_en'); ?>
                <?php echo $form->textField($model, 'url_en', array('size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'url_en'); ?>
            </div>
            <div style="min-height: 124px;" class="tab-pane" id="tab3">
                <?php echo $form->labelEx($model, 'title_ru'); ?>
                <?php echo $form->textField($model, 'title_ru', array('size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'title_ru'); ?>

                <?php echo $form->labelEx($model, 'text_ru'); ?>
                <?php echo $form->textArea($model, 'text_ru', array('maxlength' => 150, 'rows' => 6, 'cols' => 50)); ?>
                <?php echo $form->error($model, 'text_ru'); ?>
                <div id="chars_ru">150</div>
                <?php echo $form->labelEx($model, 'url_ru'); ?>
                <?php echo $form->textField($model, 'url_ru', array('size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'url_ru'); ?>
            </div>
        </div>
    </div>
    <!--END TABS-->

    <?php echo $form->labelEx($model, 'image'); ?>
    <?php echo $form->fileField($model, 'image'); ?>
    <?php echo $form->error($model, 'image'); ?>


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