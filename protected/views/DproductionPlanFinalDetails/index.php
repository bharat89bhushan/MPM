<?php
/* @var $this ProductionPlanFinalDetailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Production Plan Final Details',
);

$this->menu=array(
	array('label'=>'Create ProductionPlanFinalDetails', 'url'=>array('create')),
	array('label'=>'Manage ProductionPlanFinalDetails', 'url'=>array('admin')),
);
?>

<h1>Production Plan Final Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
