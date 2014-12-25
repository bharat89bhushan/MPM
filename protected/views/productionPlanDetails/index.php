<?php
/* @var $this ProductionPlanDetailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Production Plan Details',
);

$this->menu=array(
	array('label'=>'Create ProductionPlanDetails', 'url'=>array('create')),
	array('label'=>'Manage ProductionPlanDetails', 'url'=>array('admin')),
);
?>

<h1>Production Plan Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
