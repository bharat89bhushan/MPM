<?php
/* @var $this PurchaseOrderDetailsController */
/* @var $model PurchaseOrderDetails */

$this->breadcrumbs=array(
	'Purchase Order Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PurchaseOrderDetails', 'url'=>array('index')),
	array('label'=>'Create PurchaseOrderDetails', 'url'=>array('create')),
	array('label'=>'Update PurchaseOrderDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PurchaseOrderDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PurchaseOrderDetails', 'url'=>array('admin')),
);
?>

<h1>View PurchaseOrderDetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'purchase_order_id',
		'item_id',
		'qty',
	),
)); ?>
