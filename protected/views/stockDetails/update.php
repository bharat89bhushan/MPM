<?php
/* @var $this StockDetailsController */
/* @var $model StockDetails */

$this->breadcrumbs=array(
	'Stock Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
/*
$this->menu=array(
	array('label'=>'List StockDetails', 'url'=>array('index')),
	array('label'=>'Create StockDetails', 'url'=>array('create')),
	array('label'=>'View StockDetails', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StockDetails', 'url'=>array('admin')),
);*/
?>

<h1>Update <?php echo $model->Rel_stock_details_item_id->code; ?> Stock</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>