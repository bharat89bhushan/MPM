<?php
/* @var $this GodownStocksController */
/* @var $model GodownStocks */

$this->breadcrumbs=array(
	'Godown Stocks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GodownStocks', 'url'=>array('index')),
	array('label'=>'Manage GodownStocks', 'url'=>array('admin')),
);
?>

<h1>Create GodownStocks</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>