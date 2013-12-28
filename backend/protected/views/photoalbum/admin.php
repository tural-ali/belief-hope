<h1>Foto-albomlar</h1>

<div class="table-toolbar">
    <div class="btn-group">
        <button data-href="<?= Yii::app()->baseUrl . "/" . Yii::app()->controller->id . "/create" ?>" id="new"
                class="btn green">
            Yeni foto-albom
            <i class="icon-plus"></i>
        </button>
    </div>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'photoalbum-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'itemsCssClass' => 'table table-striped table-bordered table-hover dataTable',
    'columns' => array(
        'name_az',
        'name_en',
        'name_ru',
        array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}',
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
