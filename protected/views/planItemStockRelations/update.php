<?php
/* @var $this PlanItemStockRelationsController */
/* @var $model PlanItemStockRelations */

$this->breadcrumbs=array(
	'Plan Item Stock Relations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PlanItemStockRelations', 'url'=>array('index')),
	array('label'=>'Create PlanItemStockRelations', 'url'=>array('create')),
	array('label'=>'View PlanItemStockRelations', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PlanItemStockRelations', 'url'=>array('admin')),
);
?>

<h1>Update PlanItemStockRelations <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>