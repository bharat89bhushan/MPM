<?php
/* @var $this GodownStocksController */
/* @var $model GodownStocks */

$this->breadcrumbs=array(
	'Godown Stocks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GodownStocks', 'url'=>array('index')),
	array('label'=>'Create GodownStocks', 'url'=>array('create')),
	array('label'=>'Update GodownStocks', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GodownStocks', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GodownStocks', 'url'=>array('admin')),
);
?>

<h1>View GodownStocks #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'article_id',
		'quality_id',
		'qty',
		'unit_id',
	),
)); ?>
