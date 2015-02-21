<?php
/* @var $this GodownStocksController */
/* @var $model GodownStocks */

$this->breadcrumbs=array(
	'Godown Stocks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
/*
$this->menu=array(
	array('label'=>'List GodownStocks', 'url'=>array('index')),
	array('label'=>'Create GodownStocks', 'url'=>array('create')),
	array('label'=>'View GodownStocks', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GodownStocks', 'url'=>array('admin')),
);
*/
?>

<h1>Update GodownStocks <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>