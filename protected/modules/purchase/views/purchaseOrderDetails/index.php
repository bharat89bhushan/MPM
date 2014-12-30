<?php
/* @var $this PurchaseOrderDetailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Purchase Order Details',
);

$this->menu=array(
	array('label'=>'Create PurchaseOrderDetails', 'url'=>array('create')),
	array('label'=>'Manage PurchaseOrderDetails', 'url'=>array('admin')),
);
?>

<h1>Purchase Order Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
