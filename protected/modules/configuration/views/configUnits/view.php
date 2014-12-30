<?php
/* @var $this ConfigUnitsController */
/* @var $model ConfigUnits */

$this->breadcrumbs=array(
	'Config Units'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ConfigUnits', 'url'=>array('index')),
	array('label'=>'Create ConfigUnits', 'url'=>array('create')),
	array('label'=>'Update ConfigUnits', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConfigUnits', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConfigUnits', 'url'=>array('admin')),
);
?>

<h1>View ConfigUnits #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'sign',
	),
)); ?>
