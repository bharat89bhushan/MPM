<?php
/* @var $this ProductionPlansController */
/* @var $model ProductionPlans */

$this->breadcrumbs=array(
	'Production Plans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
/*
$this->menu=array(
	array('label'=>'List ProductionPlans', 'url'=>array('index')),
	array('label'=>'Create ProductionPlans', 'url'=>array('create')),
	array('label'=>'View ProductionPlans', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProductionPlans', 'url'=>array('admin')),
);*/
?>

<h1>Update ProductionPlans <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>