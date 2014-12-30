<?php
/* @var $this ConfigItemTypesController */
/* @var $model ConfigItemTypes */

$this->breadcrumbs=array(
	'Config Item Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ConfigItemTypes', 'url'=>array('index')),
	array('label'=>'Create ConfigItemTypes', 'url'=>array('create')),
	array('label'=>'Update ConfigItemTypes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConfigItemTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConfigItemTypes', 'url'=>array('admin')),
);
?>

<h1>View ConfigItemTypes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'desc',
	),
)); ?>
