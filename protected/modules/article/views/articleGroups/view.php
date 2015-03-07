<?php
/* @var $this ArticleGroupsController */
/* @var $model ArticleGroups */

$this->breadcrumbs=array(
	'Article Groups'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ArticleGroups', 'url'=>array('index')),
	array('label'=>'Create ArticleGroups', 'url'=>array('create')),
	array('label'=>'Update ArticleGroups', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ArticleGroups', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ArticleGroups', 'url'=>array('admin')),
);
?>

<h1>View ArticleGroups #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
