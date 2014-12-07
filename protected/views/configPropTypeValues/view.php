<?php
/* @var $this ConfigPropTypeValuesController */
/* @var $model ConfigPropTypeValues */

$this->breadcrumbs=array(
	'Config Prop Type Values'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ConfigPropTypeValues', 'url'=>array('index')),
	array('label'=>'Create ConfigPropTypeValues', 'url'=>array('create')),
	array('label'=>'Update ConfigPropTypeValues', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConfigPropTypeValues', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConfigPropTypeValues', 'url'=>array('admin')),
);
?>

<h1>View ConfigPropTypeValues #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'prop_type_id',
		'name',
		'desc',
	),
)); ?>
