<?php
/* @var $this SalesOrdersController */
/* @var $model SalesOrders */

$this->breadcrumbs=array(
	'Sales Orders'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SalesOrders', 'url'=>array('index')),
	array('label'=>'Manage SalesOrders', 'url'=>array('admin')),
);
?>

<h1>Create SalesOrders</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>