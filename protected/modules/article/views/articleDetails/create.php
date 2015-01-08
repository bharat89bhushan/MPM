<?php
/* @var $this ArticleDetailsController */
/* @var $model ArticleDetails */

$this->breadcrumbs=array(
	'Article Details'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List ArticleDetails', 'url'=>array('index')),
	array('label'=>'Manage ArticleDetails', 'url'=>array('admin')),
);*/
?>

<h1>Create ArticleDetails</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>