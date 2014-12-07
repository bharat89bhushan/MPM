<?php
/* @var $this ItemPropertiesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Item Properties',
);

$this->menu=array(
	array('label'=>'Create ItemProperties', 'url'=>array('create')),
	array('label'=>'Manage ItemProperties', 'url'=>array('admin')),
);
?>

<h1>Item Properties</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
