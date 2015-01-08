<?php
/* @var $this ConfigPropTypeValuesController */
/* @var $model ConfigPropTypeValues */

$this->breadcrumbs=array(
	'Config Prop Type Values'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConfigPropTypeValues', 'url'=>array('index')),
	array('label'=>'Manage ConfigPropTypeValues', 'url'=>array('admin')),
);
?>

<h1>Create ConfigPropTypeValues</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>