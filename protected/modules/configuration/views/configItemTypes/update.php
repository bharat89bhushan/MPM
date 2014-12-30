<?php
/* @var $this ConfigItemTypesController */
/* @var $model ConfigItemTypes */

$this->breadcrumbs=array(
	'Config Item Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ConfigItemTypes', 'url'=>array('index')),
	array('label'=>'Create ConfigItemTypes', 'url'=>array('create')),
	array('label'=>'View ConfigItemTypes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ConfigItemTypes', 'url'=>array('admin')),
);
?>

<h1>Update ConfigItemTypes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>