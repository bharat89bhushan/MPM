<?php
/* @var $this ArticleGroupsController */
/* @var $model ArticleGroups */

$this->breadcrumbs=array(
	'Article Groups'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List ArticleGroups', 'url'=>array('index')),
	array('label'=>'Manage ArticleGroups', 'url'=>array('admin')),
);
*/
?>

<h1>Create ArticleGroups</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>