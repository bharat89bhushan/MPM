<?php
/* @var $this ProductionPlanFinalDetailsController */
/* @var $model ProductionPlanFinalDetails */

$this->breadcrumbs=array(
	'Production Plan Final Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductionPlanFinalDetails', 'url'=>array('index')),
	array('label'=>'Create ProductionPlanFinalDetails', 'url'=>array('create')),
	array('label'=>'View ProductionPlanFinalDetails', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProductionPlanFinalDetails', 'url'=>array('admin')),
);
?>

<h1>Update ProductionPlanFinalDetails <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>