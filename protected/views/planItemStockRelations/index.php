<?php
/* @var $this PlanItemStockRelationsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Plan Item Stock Relations',
);

$this->menu=array(
	array('label'=>'Create PlanItemStockRelations', 'url'=>array('create')),
	array('label'=>'Manage PlanItemStockRelations', 'url'=>array('admin')),
);
?>

<h1>Plan Item Stock Relations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
