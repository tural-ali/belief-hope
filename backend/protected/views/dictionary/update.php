<?php
/* @var $this DictionaryController */
/* @var $model Dictionary */

$this->breadcrumbs = array(
    'Dictionaries' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List Dictionary', 'url' => array('index')),
    array('label' => 'Create Dictionary', 'url' => array('create')),
    array('label' => 'View Dictionary', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage Dictionary', 'url' => array('admin')),
);
?>

    <h1>Redaktə et</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
