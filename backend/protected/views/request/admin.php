<h1>Müraciətlər</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'request-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'itemsCssClass' => 'table table-striped table-bordered table-hover dataTable',
    'columns' => array(
        'id',
        'fullname',
        array(
            "name" => 'reqDate',
            'value' => 'Yii::app()->dateFormatter->format("d.M.y",strtotime($data->reqDate))'
        ),
        'phone',
        'email',
        'notes',
        array(
            'class' => 'CButtonColumn',
            'template' => '{view}    {delete}',
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
