<?php
/* @var $this ConfigUnitsController */
/* @var $model ConfigUnits */

$this->breadcrumbs=array(
	'Config Units'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConfigUnits', 'url'=>array('index')),
	array('label'=>'Manage ConfigUnits', 'url'=>array('admin')),
);
?>

<h1>Create ConfigUnits</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>