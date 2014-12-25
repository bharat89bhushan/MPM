<?php
/* @var $this ConfigProcessController */
/* @var $model ConfigProcess */

$this->breadcrumbs=array(
	'Config Processes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConfigProcess', 'url'=>array('index')),
	array('label'=>'Manage ConfigProcess', 'url'=>array('admin')),
);
?>

<h1>Create ConfigProcess</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>