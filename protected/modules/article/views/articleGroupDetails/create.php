<?php
/* @var $this ArticleGroupDetailsController */
/* @var $model ArticleGroupDetails */

$this->breadcrumbs=array(
	'Article Group Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ArticleGroupDetails', 'url'=>array('index')),
	array('label'=>'Manage ArticleGroupDetails', 'url'=>array('admin')),
);
?>

<h1>Create ArticleGroupDetails</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>