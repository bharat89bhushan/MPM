<?php
/* @var $this ConfigUnitsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Config Units',
);

$this->menu=array(
	array('label'=>'Create ConfigUnits', 'url'=>array('create')),
	array('label'=>'Manage ConfigUnits', 'url'=>array('admin')),
);
?>

<h1>Config Units</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
