<?php
/* @var $this TransferOrdersController */
/* @var $model TransferOrders */

$this->breadcrumbs=array(
	'Transfer Orders'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
/*
$this->menu=array(
	array('label'=>'List TransferOrders', 'url'=>array('index')),
	array('label'=>'Create TransferOrders', 'url'=>array('create')),
	array('label'=>'View TransferOrders', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TransferOrders', 'url'=>array('admin')),
);*/
?>

<h1>Update IssueOrder <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>