<?php
/* @var $this SalesOrdersController */
/* @var $model SalesOrders */

$this->breadcrumbs=array(
	'Sales Orders'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SalesOrders', 'url'=>array('index')),
	array('label'=>'Create SalesOrders', 'url'=>array('create')),
	array('label'=>'View SalesOrders', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SalesOrders', 'url'=>array('admin')),
);
?>

<h1>Update SalesOrders <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>