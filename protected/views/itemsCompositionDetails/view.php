<?php
/* @var $this ItemsCompositionDetailsController */
/* @var $model ItemsCompositionDetails */

$this->breadcrumbs=array(
	'Items Composition Details'=>array('index'),
	$model->icd_id,
);

$this->menu=array(
	array('label'=>'List ItemsCompositionDetails', 'url'=>array('index')),
	array('label'=>'Create ItemsCompositionDetails', 'url'=>array('create')),
	array('label'=>'Update ItemsCompositionDetails', 'url'=>array('update', 'id'=>$model->icd_id)),
	array('label'=>'Delete ItemsCompositionDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->icd_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ItemsCompositionDetails', 'url'=>array('admin')),
);
?>

<h1>View ItemsCompositionDetails #<?php echo $model->icd_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'icd_id',
		'comp_id',
		'Item_id',
		'value',
	),
)); ?>
