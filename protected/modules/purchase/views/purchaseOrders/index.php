<?php
/* @var $this PurchaseOrdersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Purchase Orders',
);

$this->menu=array(
	array('label'=>'Create PurchaseOrders', 'url'=>array('create')),
	array('label'=>'Manage PurchaseOrders', 'url'=>array('admin')),
);
?>

<h1>Purchase Orders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
