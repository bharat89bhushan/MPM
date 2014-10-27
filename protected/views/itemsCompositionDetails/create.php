<?php
/* @var $this ItemsCompositionDetailsController */
/* @var $model ItemsCompositionDetails */

$this->breadcrumbs=array(
	'Items Composition Details'=>array('index'),
	'Create',
);
/*

$this->menu=array(
	array('label'=>'List ItemsCompositionDetails', 'url'=>array('index')),
	array('label'=>'Manage ItemsCompositionDetails', 'url'=>array('admin')),
);
*/
?>

<h1>Create ItemsCompositionDetails</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
