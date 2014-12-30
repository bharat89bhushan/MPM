<?php
/* @var $this ProductionPlanFinalDetailsController */
/* @var $model ProductionPlanFinalDetails */

$this->breadcrumbs=array(
	'Production Plan Final Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProductionPlanFinalDetails', 'url'=>array('index')),
	array('label'=>'Create ProductionPlanFinalDetails', 'url'=>array('create')),
	array('label'=>'Update ProductionPlanFinalDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProductionPlanFinalDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductionPlanFinalDetails', 'url'=>array('admin')),
);
?>

<h1>View ProductionPlanFinalDetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'plan_id',
		'quality_id',
		'qty',
		'date',
	),
)); ?>
