<?php
/* @var $this ConfigPropTypeValuesController */
/* @var $model ConfigPropTypeValues */

$this->breadcrumbs=array(
	'Config Prop Type Values'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
/*
$this->menu=array(
	array('label'=>'List ConfigPropTypeValues', 'url'=>array('index')),
	array('label'=>'Create ConfigPropTypeValues', 'url'=>array('create')),
	array('label'=>'View ConfigPropTypeValues', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ConfigPropTypeValues', 'url'=>array('admin')),
);
*/
?>

<h1>Update ConfigPropTypeValues <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>