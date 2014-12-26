<?php
/* @var $this PartiesController */
/* @var $model Parties */

$this->breadcrumbs=array(
	'Parties'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Parties', 'url'=>array('index')),
	array('label'=>'Create Parties', 'url'=>array('create')),
	array('label'=>'Update Parties', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Parties', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Parties', 'url'=>array('admin')),
);
?>

<h1>View Parties #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		'name',
	),
)); ?>
