<?php
/* @var $this StockTransDetailsController */
/* @var $model StockTransDetails */

$this->breadcrumbs=array(
	'Stock Trans Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StockTransDetails', 'url'=>array('index')),
	array('label'=>'Create StockTransDetails', 'url'=>array('create')),
	array('label'=>'View StockTransDetails', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StockTransDetails', 'url'=>array('admin')),
);
?>

<h1>Update StockTransDetails <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>