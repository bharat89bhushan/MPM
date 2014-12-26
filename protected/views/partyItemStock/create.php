<?php
/* @var $this PartyItemStockController */
/* @var $model PartyItemStock */

$this->breadcrumbs=array(
	'Party Item Stocks'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List PartyItemStock', 'url'=>array('index')),
	array('label'=>'Manage PartyItemStock', 'url'=>array('admin')),
);*/
?>

<h1>Create PartyItemStock</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>