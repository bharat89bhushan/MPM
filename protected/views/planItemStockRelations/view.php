<?php
/* @var $this PlanItemStockRelationsController */
/* @var $model PlanItemStockRelations */

$this->breadcrumbs=array(
	'Plan Item Stock Relations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PlanItemStockRelations', 'url'=>array('index')),
	array('label'=>'Create PlanItemStockRelations', 'url'=>array('create')),
	array('label'=>'Update PlanItemStockRelations', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PlanItemStockRelations', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PlanItemStockRelations', 'url'=>array('admin')),
);
?>

<h1>View PlanItemStockRelations #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'plan_id',
		'item_id',
		'value',
	),
)); ?>
