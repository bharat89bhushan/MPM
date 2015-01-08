<?php
/* @var $this SalesOrderDetailsController */
/* @var $model SalesOrderDetails */

$this->breadcrumbs=array(
	'Sales Order Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SalesOrderDetails', 'url'=>array('index')),
	array('label'=>'Create SalesOrderDetails', 'url'=>array('create')),
	array('label'=>'View SalesOrderDetails', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SalesOrderDetails', 'url'=>array('admin')),
);
?>

<h1>Update SalesOrderDetails <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>