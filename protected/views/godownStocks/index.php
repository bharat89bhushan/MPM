<?php
/* @var $this GodownStocksController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Godown Stocks',
);

$this->menu=array(
	array('label'=>'Create GodownStocks', 'url'=>array('create')),
	array('label'=>'Manage GodownStocks', 'url'=>array('admin')),
);
?>

<h1>Godown Stocks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
