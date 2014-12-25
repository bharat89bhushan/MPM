<?php
/* @var $this ProductionPlanDetailsController */
/* @var $model ProductionPlanDetails */

$this->breadcrumbs=array(
	'Production Plan Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
/*
$this->menu=array(
	array('label'=>'List ProductionPlanDetails', 'url'=>array('index')),
	array('label'=>'Create ProductionPlanDetails', 'url'=>array('create')),
	array('label'=>'View ProductionPlanDetails', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProductionPlanDetails', 'url'=>array('admin')),
);*/
?>

<h1>Update ProductionPlanDetails <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_uform', array('model'=>$model)); ?>