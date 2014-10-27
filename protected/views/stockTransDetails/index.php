<?php
/* @var $this StockTransDetailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Stock Trans Details',
);

$this->menu=array(
	array('label'=>'Create StockTransDetails', 'url'=>array('create')),
	array('label'=>'Manage StockTransDetails', 'url'=>array('admin')),
);
?>

<h1>Stock Trans Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
