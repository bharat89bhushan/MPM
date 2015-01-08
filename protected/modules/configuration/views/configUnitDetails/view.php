<?php
/* @var $this ConfigUnitDetailsController */
/* @var $model ConfigUnitDetails */

$this->breadcrumbs=array(
	'Config Unit Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ConfigUnitDetails', 'url'=>array('index')),
	array('label'=>'Create ConfigUnitDetails', 'url'=>array('create')),
	array('label'=>'Update ConfigUnitDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConfigUnitDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConfigUnitDetails', 'url'=>array('admin')),
);
?>

<h1>View ConfigUnitDetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'unit_id',
		'sub_unit_id',
		'qty',
	),
)); ?>
