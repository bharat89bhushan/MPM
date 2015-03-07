<?php
/* @var $this ArticleGroupsController */
/* @var $model ArticleGroups */

$this->breadcrumbs=array(
	'Article Groups'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
/*
$this->menu=array(
	array('label'=>'List ArticleGroups', 'url'=>array('index')),
	array('label'=>'Create ArticleGroups', 'url'=>array('create')),
	array('label'=>'View ArticleGroups', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ArticleGroups', 'url'=>array('admin')),
);
*/
?>

<h1>Update ArticleGroups <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>