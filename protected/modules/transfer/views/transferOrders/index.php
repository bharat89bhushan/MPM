<?php
/* @var $this TransferOrdersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Transfer Orders',
);

$this->menu=array(
	array('label'=>'Create TransferOrders', 'url'=>array('create')),
	array('label'=>'Manage TransferOrders', 'url'=>array('admin')),
);
?>

<h1>Transfer Orders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
