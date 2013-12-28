<h1>Videolar</h1>

<div class="table-toolbar">
    <div class="btn-group">
        <button data-href="<?= Yii::app()->baseUrl . "/" . Yii::app()->controller->id . "/create" ?>" id="new"
                class="btn green">
            Yeni video
            <i class="icon-plus"></i>
        </button>
    </div>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'video-grid',
    'dataProvider' => $model->search(),
    'itemsCssClass' => 'table table-striped table-bordered table-hover dataTable',
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'thumb',
            'type' => 'raw',
            'filter' => false,
            'htmlOptions' => array('style' => 'width:256px'),
            'value' => function ($data) {
                    return "<img src='http://img.youtube.com/vi/$data->videoID/mqdefault.jpg' />";
                },
        ),
        'title_az',
        array(
            'class' => 'CButtonColumn',
            'template' => '{view} {delete}',
            'htmlOptions' => array('width' => '30px'),
            'buttons' => array(
                'update' => array(
                    'label' => '',
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
                    'imageUrl' => '',
                    'options' => array('class' => 'icon-remove-sign'),
                ),
            ),
        ),
    ),
)); ?>
