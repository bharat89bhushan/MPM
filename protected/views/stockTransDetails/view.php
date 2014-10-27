<?php
/* @var $this StockTransDetailsController */
/* @var $model StockTransDetails */

$this->breadcrumbs=array(
	'Stock Trans Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StockTransDetails', 'url'=>array('index')),
	array('label'=>'Create StockTransDetails', 'url'=>array('create')),
	array('label'=>'Update StockTransDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StockTransDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StockTransDetails', 'url'=>array('admin')),
);
?>

<h1>View StockTransDetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'item_id',
		'qty',
		'trans_type',
		'date',
		'created_by',
		'value',
	),
)); ?>
