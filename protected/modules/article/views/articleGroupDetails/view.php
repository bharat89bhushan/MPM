<?php
/* @var $this ArticleGroupDetailsController */
/* @var $model ArticleGroupDetails */

$this->breadcrumbs=array(
	'Article Group Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ArticleGroupDetails', 'url'=>array('index')),
	array('label'=>'Create ArticleGroupDetails', 'url'=>array('create')),
	array('label'=>'Update ArticleGroupDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ArticleGroupDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ArticleGroupDetails', 'url'=>array('admin')),
);
?>

<h1>View ArticleGroupDetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'article_group_id',
		'process_id',
	),
)); ?>
