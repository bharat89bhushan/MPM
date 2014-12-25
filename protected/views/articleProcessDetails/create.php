<?php
/* @var $this ArticleProcessDetailsController */
/* @var $model ArticleProcessDetails */

$this->breadcrumbs=array(
	'Article Process Details'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List ArticleProcessDetails', 'url'=>array('index')),
	array('label'=>'Manage ArticleProcessDetails', 'url'=>array('admin')),
);*/
?>

<h1>Create ArticleProcessDetails</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>