<?php
/* @var $this ConfigPropTypeValuesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Config Prop Type Values',
);

$this->menu=array(
	array('label'=>'Create ConfigPropTypeValues', 'url'=>array('create')),
	array('label'=>'Manage ConfigPropTypeValues', 'url'=>array('admin')),
);
?>

<h1>Config Prop Type Values</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
