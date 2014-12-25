<?php
/* @var $this ProductionPlanDetailsController */
/* @var $model ProductionPlanDetails */

$this->breadcrumbs=array(
	'Production Plan Details'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List ProductionPlanDetails', 'url'=>array('index')),
	array('label'=>'Manage ProductionPlanDetails', 'url'=>array('admin')),
);*/
?>

<h1>Create ProductionPlanDetails</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>