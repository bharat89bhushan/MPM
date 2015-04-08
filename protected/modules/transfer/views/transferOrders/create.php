<?php
/* @var $this TransferOrdersController */
/* @var $model TransferOrders */

$this->breadcrumbs=array(
	'Transfer Orders'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List TransferOrders', 'url'=>array('index')),
	array('label'=>'Manage TransferOrders', 'url'=>array('admin')),
);*/
?>

<h1>Create IssueOrder</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>