<?php
/* @var $this ConfigPropTypesController */
/* @var $model ConfigPropTypes */

$this->breadcrumbs=array(
	'Config Prop Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
/*
$this->menu=array(
	array('label'=>'List ConfigPropTypes', 'url'=>array('index')),
	array('label'=>'Create ConfigPropTypes', 'url'=>array('create')),
	array('label'=>'View ConfigPropTypes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ConfigPropTypes', 'url'=>array('admin')),
);
*/
?>

<h1>Update ConfigPropTypes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>