<?php
/* @var $this ArticleProcessDetailsController */
/* @var $model ArticleProcessDetails */

$this->breadcrumbs=array(
	'Article Process Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
/*
$this->menu=array(
	array('label'=>'List ArticleProcessDetails', 'url'=>array('index')),
	array('label'=>'Create ArticleProcessDetails', 'url'=>array('create')),
	array('label'=>'View ArticleProcessDetails', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ArticleProcessDetails', 'url'=>array('admin')),
);*/
?>

<h1>Update ArticleProcessDetails <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>