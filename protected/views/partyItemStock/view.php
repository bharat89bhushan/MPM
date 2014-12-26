<?php
/* @var $this PartyItemStockController */
/* @var $model PartyItemStock */

$this->breadcrumbs=array(
	'Party Item Stocks'=>array('index'),
	$model->id,
);
/*
$this->menu=array(
	array('label'=>'List PartyItemStock', 'url'=>array('index')),
	array('label'=>'Create PartyItemStock', 'url'=>array('create')),
	array('label'=>'Update PartyItemStock', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PartyItemStock', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PartyItemStock', 'url'=>array('admin')),
);*/
?>

<h1>View PartyItemStock #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'item_id',
		'party_id',
		'qty',
	),
)); ?>
