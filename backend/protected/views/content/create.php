<h1>Səhifə yarat</h1>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'content-form',
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
        'enableAjaxValidation' => false,
    )); ?>


    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->labelEx($model, 'catID'); ?>
    <select id="Content_catID" name="Content[catID]" tabindex="0">
        <option value="">Birini seçin</option>
        <?= $cats ?>
    </select>
    <?php echo $form->error($model, 'catID'); ?>
    <!--BEGIN TABS-->
    <div class="tabbable tabbable-custom tabs-left">
        <!-- Only required for left/right tabs -->
        <ul class="nav nav-tabs tabs-left">
            <li class="active"><a href="#tab1" data-toggle="tab">Az</a></li>
            <li class=""><a href="#tab2" data-toggle="tab">En</a></li>
            <li class=""><a href="#tab3" data-toggle="tab">Ru</a></li>
            <li class=""><a href="#tab6" data-toggle="tab">Əsas Şəkil</a></li>
            <li class=""><a href="#tab4" data-toggle="tab">Foto-albom</a></li>

        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <?php echo $form->labelEx($model, 'title_az'); ?>
                <?php echo $form->textField($model, 'title_az', array('size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'title_az'); ?>

                <?php echo $form->labelEx($model, 'content_az'); ?>
                <?php echo $form->textArea($model, 'content_az', array('rows' => 6, 'cols' => 50)); ?>
                <?php echo $form->error($model, 'content_az'); ?>


            </div>
            <div style="min-height: 124px;" class="tab-pane" id="tab2">


                <?php echo $form->labelEx($model, 'title_en'); ?>
                <?php echo $form->textField($model, 'title_en', array('size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'title_en'); ?>

                <?php echo $form->labelEx($model, 'content_en'); ?>
                <?php echo $form->textArea($model, 'content_en', array('rows' => 6, 'cols' => 50)); ?>
                <?php echo $form->error($model, 'content_en'); ?>


            </div>
            <div style="min-height: 124px;" class="tab-pane" id="tab3">
                <?php echo $form->labelEx($model, 'title_ru'); ?>
                <?php echo $form->textField($model, 'title_ru', array('size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'title_ru'); ?>

                <?php echo $form->labelEx($model, 'content_ru'); ?>
                <?php echo $form->textArea($model, 'content_ru', array('rows' => 6, 'cols' => 50)); ?>
                <?php echo $form->error($model, 'content_ru'); ?>


            </div>
            <div style="min-height: 124px;" class="tab-pane" id="tab4">
                <?php echo $form->labelEx($model, 'albumID');
                $cList = CHtml::listData(Photoalbum::model()->findAll(array('order' => 'name_az ASC')), 'id', 'name_az');
                $options = array(
                    'tabindex' => '0',
                    'empty' => 'Birini seçin',
                );
                echo $form->dropDownList($model, 'albumID', $cList, $options);
                echo $form->error($model, 'albumID');
                ?>
                <br/>


                <button data-href="/backend/photoalbum/create" class="btn green create">
                    Yeni foto-albom
                    <i class="icon-plus"></i>
                </button>


            </div>

            <div style="min-height: 124px;" class="tab-pane" id="tab6">

                <?php echo $form->labelEx($model, 'image'); ?>
                <?php echo $form->fileField($model, 'image'); ?>
                <?php echo $form->error($model, 'image'); ?>


            </div>
        </div>
    </div>
    <!--END TABS-->


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