<?php
/* @var $this ConfigUnitsController */
/* @var $model ConfigUnits */

$this->breadcrumbs=array(
	'Config Units'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ConfigUnits', 'url'=>array('index')),
	array('label'=>'Create ConfigUnits', 'url'=>array('create')),
	array('label'=>'View ConfigUnits', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ConfigUnits', 'url'=>array('admin')),
);
?>

<h1>Update ConfigUnits <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>