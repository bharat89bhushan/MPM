<?php
/* @var $this PlanItemStockRelationsController */
/* @var $model PlanItemStockRelations */

$this->breadcrumbs=array(
	'Plan Item Stock Relations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PlanItemStockRelations', 'url'=>array('index')),
	array('label'=>'Manage PlanItemStockRelations', 'url'=>array('admin')),
);
?>

<h1>Create PlanItemStockRelations</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>