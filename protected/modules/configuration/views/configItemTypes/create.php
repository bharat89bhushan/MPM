<?php
/* @var $this ConfigItemTypesController */
/* @var $model ConfigItemTypes */

$this->breadcrumbs=array(
	'Config Item Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConfigItemTypes', 'url'=>array('index')),
	array('label'=>'Manage ConfigItemTypes', 'url'=>array('admin')),
);
?>

<h1>Create ConfigItemTypes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>