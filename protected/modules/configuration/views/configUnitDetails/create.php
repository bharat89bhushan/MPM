<?php
/* @var $this ConfigUnitDetailsController */
/* @var $model ConfigUnitDetails */

$this->breadcrumbs=array(
	'Config Unit Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConfigUnitDetails', 'url'=>array('index')),
	array('label'=>'Manage ConfigUnitDetails', 'url'=>array('admin')),
);
?>

<h1>Create ConfigUnitDetails</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>