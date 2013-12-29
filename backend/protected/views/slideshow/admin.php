<h1>Slaydşoular</h1>

<div class="table-toolbar">
    <div class="btn-group">
        <button data-href="<?= Yii::app()->baseUrl . "/" . Yii::app()->controller->id . "/create" ?>" id="new"
                class="btn green">
            Yeni slayd
            <i class="icon-plus"></i>
        </button>
    </div>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'slideshow-grid',
    'dataProvider' => $model->search(),
    'itemsCssClass' => 'table table-striped table-bordered table-hover dataTable',
    'filter' => $model,
    'columns' => array(
        'title_az',
        'sort',
        array(
            'class' => 'CButtonColumn',
            'template' => '{update}    {delete}',
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
