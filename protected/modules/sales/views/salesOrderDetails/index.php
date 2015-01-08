<?php
/* @var $this SalesOrderDetailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sales Order Details',
);

$this->menu=array(
	array('label'=>'Create SalesOrderDetails', 'url'=>array('create')),
	array('label'=>'Manage SalesOrderDetails', 'url'=>array('admin')),
);
?>

<h1>Sales Order Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
