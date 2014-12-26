<?php
/* @var $this PartiesController */
/* @var $model Parties */

$this->breadcrumbs=array(
	'Parties'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Parties', 'url'=>array('index')),
	array('label'=>'Manage Parties', 'url'=>array('admin')),
);
?>

<h1>Create Parties</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>