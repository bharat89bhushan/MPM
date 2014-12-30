<?php
/* @var $this PurchaseOrderDetailsController */
/* @var $model PurchaseOrderDetails */

$this->breadcrumbs=array(
	'Purchase Order Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PurchaseOrderDetails', 'url'=>array('index')),
	array('label'=>'Create PurchaseOrderDetails', 'url'=>array('create')),
	array('label'=>'View PurchaseOrderDetails', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PurchaseOrderDetails', 'url'=>array('admin')),
);
?>

<h1>Update PurchaseOrderDetails <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>