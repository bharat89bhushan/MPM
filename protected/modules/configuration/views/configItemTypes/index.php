<?php
/* @var $this ConfigItemTypesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Config Item Types',
);

$this->menu=array(
	array('label'=>'Create ConfigItemTypes', 'url'=>array('create')),
	array('label'=>'Manage ConfigItemTypes', 'url'=>array('admin')),
);
?>

<h1>Config Item Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
