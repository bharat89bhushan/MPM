<?php
/* @var $this PurchaseOrdersController */
/* @var $model PurchaseOrders */

$this->breadcrumbs=array(
	'Purchase Orders'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List PurchaseOrders', 'url'=>array('index')),
	array('label'=>'Manage PurchaseOrders', 'url'=>array('admin')),
);*/
?>

<h1>Create PurchaseOrders</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>