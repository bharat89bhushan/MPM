<?php
/* @var $this PartyItemStockController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Party Item Stocks',
);

$this->menu=array(
	array('label'=>'Create PartyItemStock', 'url'=>array('create')),
	array('label'=>'Manage PartyItemStock', 'url'=>array('admin')),
);
?>

<h1>Party Item Stocks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
