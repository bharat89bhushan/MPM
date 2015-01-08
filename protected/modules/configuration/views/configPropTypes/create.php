<?php
/* @var $this ConfigPropTypesController */
/* @var $model ConfigPropTypes */

$this->breadcrumbs=array(
	'Config Prop Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConfigPropTypes', 'url'=>array('index')),
	array('label'=>'Manage ConfigPropTypes', 'url'=>array('admin')),
);
?>

<h1>Create ConfigPropTypes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>