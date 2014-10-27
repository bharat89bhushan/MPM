<?php
/* @var $this StockDetailsController */
/* @var $model StockDetails */

$this->breadcrumbs=array(
	'Stock Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StockDetails', 'url'=>array('index')),
	array('label'=>'Create StockDetails', 'url'=>array('create')),
	array('label'=>'View StockDetails', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StockDetails', 'url'=>array('admin')),
);
?>

<h1>Update StockDetails <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>