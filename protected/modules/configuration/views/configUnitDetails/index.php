<?php
/* @var $this ConfigUnitDetailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Config Unit Details',
);

$this->menu=array(
	array('label'=>'Create ConfigUnitDetails', 'url'=>array('create')),
	array('label'=>'Manage ConfigUnitDetails', 'url'=>array('admin')),
);
?>

<h1>Config Unit Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
