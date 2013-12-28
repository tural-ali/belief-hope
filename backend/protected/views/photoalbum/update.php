<h1><?php echo $model->name_az; ?></h1>

<?php
if (intval($model->id) > 0)
    $this->renderPartial('_updform', array('model' => $model));

$rootDir = dirname(__FILE__) . '/../../../..';
$photoModel = Photo::model();
$photoModel->setAttribute("albumID", $model->id);
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'photo-grid',
    'dataProvider' => $photoModel->search(),
    'itemsCssClass' => 'table table-striped table-bordered table-hover',
    'filter' => $photoModel,
    'columns' => array(
        array(
            "name" => "photo",
            'type' => 'html',
            'filter' => false,
            'htmlOptions' => array('style' => 'width:128px'),
            'value' => 'CHtml::image(Yii::app()->assetManager->publish("' . $rootDir . '$data->url"),"",array(    "width" => "128px"  ));',
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}',
            'htmlOptions' => array('width' => '30px'),
            'buttons' => array(
                'update' => array(
                    'label' => '',
                    'url' => function ($data) {
                            return "/backend/photo/update/$data->id";
                        },
                    'imageUrl' => '',
                    'options' => array('class' => 'icon-pencil'),
                ),
                'view' => array(
                    'label' => '',
                    'imageUrl' => '',
                    'options' => array('class' => 'icon-search'),
                ),
                'delete' => array(
                    'label' => '',
                    'url' => function ($data) {
                            return "/backend/photo/delete/$data->id?ajax=photo-grid";
                        },
                    'imageUrl' => '',
                    'options' => array('class' => 'icon-remove-sign'),
                ),
            ),
        ),
    ),
)); ?>

