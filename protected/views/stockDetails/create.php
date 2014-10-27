<?php
/* @var $this StockDetailsController */
/* @var $model StockDetails */

$this->breadcrumbs=array(
	'Stock Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StockDetails', 'url'=>array('index')),
	array('label'=>'Manage StockDetails', 'url'=>array('admin')),
);
?>

<h1>Create StockDetails</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>