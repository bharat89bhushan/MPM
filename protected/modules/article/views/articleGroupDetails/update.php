<?php
/* @var $this ArticleGroupDetailsController */
/* @var $model ArticleGroupDetails */

$this->breadcrumbs=array(
	'Article Group Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ArticleGroupDetails', 'url'=>array('index')),
	array('label'=>'Create ArticleGroupDetails', 'url'=>array('create')),
	array('label'=>'View ArticleGroupDetails', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ArticleGroupDetails', 'url'=>array('admin')),
);
?>

<h1>Update ArticleGroupDetails <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>