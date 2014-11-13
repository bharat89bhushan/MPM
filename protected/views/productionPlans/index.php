<?php
/* @var $this ProductionPlansController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Production Plans',
);

$this->menu=array(
	array('label'=>'Create ProductionPlans', 'url'=>array('create')),
	array('label'=>'Manage ProductionPlans', 'url'=>array('admin')),
);
?>

<h1>Production Plans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
