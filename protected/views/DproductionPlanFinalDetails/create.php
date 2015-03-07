<?php
/* @var $this ProductionPlanFinalDetailsController */
/* @var $model ProductionPlanFinalDetails */

$this->breadcrumbs=array(
	'Production Plan Final Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductionPlanFinalDetails', 'url'=>array('index')),
	array('label'=>'Manage ProductionPlanFinalDetails', 'url'=>array('admin')),
);
?>

<h1>Create ProductionPlanFinalDetails</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>