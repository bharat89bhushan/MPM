<?php
/* @var $this SalesOrderDetailsController */
/* @var $model SalesOrderDetails */

$this->breadcrumbs=array(
	'Sales Order Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SalesOrderDetails', 'url'=>array('index')),
	array('label'=>'Manage SalesOrderDetails', 'url'=>array('admin')),
);
?>

<h1>Create SalesOrderDetails</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>