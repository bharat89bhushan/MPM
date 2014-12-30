<?php
/* @var $this ConfigProcessController */
/* @var $model ConfigProcess */

$this->breadcrumbs=array(
	'Config Processes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ConfigProcess', 'url'=>array('index')),
	array('label'=>'Create ConfigProcess', 'url'=>array('create')),
	array('label'=>'Update ConfigProcess', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConfigProcess', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConfigProcess', 'url'=>array('admin')),
);
?>

<h1>View ConfigProcess #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'descp',
		'date',
	),
)); ?>
