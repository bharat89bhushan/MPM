<?php
/* @var $this ItemPropertiesController */
/* @var $model ItemProperties */

$this->breadcrumbs=array(
	'Item Properties'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ItemProperties', 'url'=>array('index')),
	array('label'=>'Manage ItemProperties', 'url'=>array('admin')),
);
?>

<h1>Create ItemProperties</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>