<h1>Müraciət #<?php echo $model->id; ?></h1>
<center><h4>Ümumi Məlumatlar</h4></center>
<table class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th style="width: 200px">Anket xanası</th>
        <th>Ziyarətçinin cavabı</th>
    </tr>
    </thead>
    <tbody>

    <tr>
        <td><?php echo CHtml::encode($model->getAttributeLabel('fullname')); ?>:</td>
        <td>
            <?php echo CHtml::encode($model->fullname); ?>
        </td>
    </tr>

    <tr>
        <td><?php echo CHtml::encode($model->getAttributeLabel('reqDate')); ?>:</td>
        <td>
            <?php echo CHtml::encode(Yii::app()->dateFormatter->format("d.M.y", strtotime($model->reqDate))); ?>
        </td>
    </tr>



    <tr>
        <td><?php echo CHtml::encode($model->getAttributeLabel('phone')); ?>:</td>
        <td>
            <?php echo CHtml::encode($model->phone); ?>
        </td>
    </tr>

    <tr>
        <td><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>:</td>
        <td>
            <?php echo CHtml::encode($model->email); ?>
        </td>
    </tr>



    <tr>
        <td>
            <?php echo CHtml::encode($model->getAttributeLabel('notes')); ?>:
        </td>
        <td>
            <?php
            echo CHtml::encode($model->notes);
            ?>

        </td>
    </tr>


    </tbody>

</table>