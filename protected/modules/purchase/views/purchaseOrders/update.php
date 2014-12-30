<?php
/* @var $this PurchaseOrdersController */
/* @var $model PurchaseOrders */

$this->breadcrumbs=array(
	'Purchase Orders'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
/*
$this->menu=array(
	array('label'=>'List PurchaseOrders', 'url'=>array('index')),
	array('label'=>'Create PurchaseOrders', 'url'=>array('create')),
	array('label'=>'View PurchaseOrders', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PurchaseOrders', 'url'=>array('admin')),
);*/
?>

<h1>Update PurchaseOrders <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>