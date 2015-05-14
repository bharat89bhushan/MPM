<?php
/* @var $this ConfigPartyTypesController */
/* @var $model ConfigPartyTypes */

$this->breadcrumbs=array(
	'Config Party Types'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List ConfigPartyTypes', 'url'=>array('index')),
	array('label'=>'Manage ConfigPartyTypes', 'url'=>array('admin')),
);*/
?>

<h1>Create ConfigPartyTypes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>