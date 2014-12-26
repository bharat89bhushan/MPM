<?php
/* @var $this PartyItemStockController */
/* @var $model PartyItemStock */

$this->breadcrumbs=array(
	'Party Item Stocks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
/*
$this->menu=array(
	array('label'=>'List PartyItemStock', 'url'=>array('index')),
	array('label'=>'Create PartyItemStock', 'url'=>array('create')),
	array('label'=>'View PartyItemStock', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PartyItemStock', 'url'=>array('admin')),
);*/
?>

<h1>Update PartyItemStock <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_uform', array('model'=>$model)); ?>