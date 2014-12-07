<?php
/* @var $this ItemPropertiesController */
/* @var $model ItemProperties */

$this->breadcrumbs=array(
	'Item Properties'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ItemProperties', 'url'=>array('index')),
	array('label'=>'Create ItemProperties', 'url'=>array('create')),
	array('label'=>'Update ItemProperties', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ItemProperties', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ItemProperties', 'url'=>array('admin')),
);
?>

<h1>View ItemProperties #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'item_id',
		'prop_val_id',
	),
)); ?>
