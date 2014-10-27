<?php
/* @var $this ItemsCompositionDetailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Items Composition Details',
);

$this->menu=array(
	array('label'=>'Create ItemsCompositionDetails', 'url'=>array('create')),
	array('label'=>'Manage ItemsCompositionDetails', 'url'=>array('admin')),
);
?>

<h1>Items Composition Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
