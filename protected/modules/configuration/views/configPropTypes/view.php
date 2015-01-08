<?php
/* @var $this ConfigPropTypesController */
/* @var $model ConfigPropTypes */

$this->breadcrumbs=array(
	'Config Prop Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ConfigPropTypes', 'url'=>array('index')),
	array('label'=>'Create ConfigPropTypes', 'url'=>array('create')),
	array('label'=>'Update ConfigPropTypes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConfigPropTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConfigPropTypes', 'url'=>array('admin')),
);
?>

<h1>View ConfigPropTypes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'desc',
	),
)); ?>
