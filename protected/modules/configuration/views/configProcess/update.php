<?php
/* @var $this ConfigProcessController */
/* @var $model ConfigProcess */

$this->breadcrumbs=array(
	'Config Processes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
/*
$this->menu=array(
	array('label'=>'List ConfigProcess', 'url'=>array('index')),
	array('label'=>'Create ConfigProcess', 'url'=>array('create')),
	array('label'=>'View ConfigProcess', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ConfigProcess', 'url'=>array('admin')),
);*/
?>

<h1>Update ConfigProcess <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>