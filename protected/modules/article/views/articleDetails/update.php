<?php
/* @var $this ArticleDetailsController */
/* @var $model ArticleDetails */

$this->breadcrumbs=array(
	'Article Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
/*
$this->menu=array(
	array('label'=>'List ArticleDetails', 'url'=>array('index')),
	array('label'=>'Create ArticleDetails', 'url'=>array('create')),
	array('label'=>'View ArticleDetails', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ArticleDetails', 'url'=>array('admin')),
);
*/
?>

<h1>Update ArticleDetails <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>