<?php
/* @var $this StockDetailsController */
/* @var $model StockDetails */

$this->breadcrumbs=array(
	'Stock Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StockDetails', 'url'=>array('index')),
	array('label'=>'Create StockDetails', 'url'=>array('create')),
	array('label'=>'Update StockDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StockDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StockDetails', 'url'=>array('admin')),
);
?>

<h1>View StockDetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'item_id',
		'value',
	),
)); ?>
