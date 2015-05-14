<?php
/* @var $this ConfigPartyTypesController */
/* @var $model ConfigPartyTypes */

$this->breadcrumbs=array(
	'Config Party Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ConfigPartyTypes', 'url'=>array('index')),
	array('label'=>'Create ConfigPartyTypes', 'url'=>array('create')),
	array('label'=>'Update ConfigPartyTypes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConfigPartyTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConfigPartyTypes', 'url'=>array('admin')),
);
?>

<h1>View ConfigPartyTypes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
