<?php
/* @var $this PurchaseOrderDetailsController */
/* @var $model PurchaseOrderDetails */

$this->breadcrumbs=array(
	'Purchase Order Details'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List PurchaseOrderDetails', 'url'=>array('index')),
	array('label'=>'Manage PurchaseOrderDetails', 'url'=>array('admin')),
);*/
?>

<h1>Create PurchaseOrderDetails</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>