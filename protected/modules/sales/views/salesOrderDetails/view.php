<?php
/* @var $this SalesOrderDetailsController */
/* @var $model SalesOrderDetails */

$this->breadcrumbs=array(
	'Sales Order Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SalesOrderDetails', 'url'=>array('index')),
	array('label'=>'Create SalesOrderDetails', 'url'=>array('create')),
	array('label'=>'Update SalesOrderDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SalesOrderDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SalesOrderDetails', 'url'=>array('admin')),
);
?>

<h1>View SalesOrderDetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'order_id',
		'godown_id',
		'qty',
	),
)); ?>
