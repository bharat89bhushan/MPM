<?php
/* @var $this StockTransDetailsController */
/* @var $model StockTransDetails */

$this->breadcrumbs=array(
	'Stock Trans Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StockTransDetails', 'url'=>array('index')),
	array('label'=>'Manage StockTransDetails', 'url'=>array('admin')),
);
?>

<h1>Create StockTransDetails</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>