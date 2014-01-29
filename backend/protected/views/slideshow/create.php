<?php
/* @var $this SlideshowController */
/* @var $model Slideshow */

$this->breadcrumbs=array(
	'Slideshows'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Slideshow', 'url'=>array('index')),
	array('label'=>'Manage Slideshow', 'url'=>array('admin')),
);
?>

<h1>Create Slideshow</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>