<h1>Contact Us</h1>


<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'contact-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array(
            'class' => 'form-horizontal',
        ),


    )); ?>


    <?php echo $form->errorSummary($model); ?>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'fullname', array("class" => "col-sm-2 control-label")); ?>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'fullname', array("class" => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'name'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'email', array("class" => "col-sm-2 control-label")); ?>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'email', array("class" => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'email'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'phone', array("class" => "col-sm-2 control-label")); ?>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'phone', array("class" => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'phone'); ?>

    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'notes', array("class" => "col-sm-2 control-label")); ?>
        <div class="col-sm-10">
            <?php echo $form->textArea($model, 'notes', array('rows' => 6, 'cols' => 50, "class" => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'notes'); ?>
    </div>

    <div class="buttons">
        <?php echo CHtml::submitButton(Yii::t("common", "send"), array('class' => 'btn btn-default')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

