<?php
/* @var $this ProductionPlansController */
/* @var $model ProductionPlans */

$this->breadcrumbs=array(
	'Production Plans'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List ProductionPlans', 'url'=>array('index')),
	array('label'=>'Manage ProductionPlans', 'url'=>array('admin')),
);
\*/
?>

<h1>Create ProductionPlans</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>