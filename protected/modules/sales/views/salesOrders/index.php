<?php
/* @var $this SalesOrdersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sales Orders',
);

$this->menu=array(
	array('label'=>'Create SalesOrders', 'url'=>array('create')),
	array('label'=>'Manage SalesOrders', 'url'=>array('admin')),
);
?>

<h1>Sales Orders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
