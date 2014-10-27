<?php
/* @var $this StockDetailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Stock Details',
);

$this->menu=array(
	array('label'=>'Create StockDetails', 'url'=>array('create')),
	array('label'=>'Manage StockDetails', 'url'=>array('admin')),
);
?>

<h1>Stock Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
