<?php
/* @var $this ConfigPropTypesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Config Prop Types',
);

$this->menu=array(
	array('label'=>'Create ConfigPropTypes', 'url'=>array('create')),
	array('label'=>'Manage ConfigPropTypes', 'url'=>array('admin')),
);
?>

<h1>Config Prop Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
