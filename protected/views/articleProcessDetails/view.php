<?php
/* @var $this ArticleProcessDetailsController */
/* @var $model ArticleProcessDetails */

$this->breadcrumbs=array(
	'Article Process Details'=>array('index'),
	$model->id,
);
/*
$this->menu=array(
	array('label'=>'List ArticleProcessDetails', 'url'=>array('index')),
	array('label'=>'Create ArticleProcessDetails', 'url'=>array('create')),
	array('label'=>'Update ArticleProcessDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ArticleProcessDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ArticleProcessDetails', 'url'=>array('admin')),
);
*/
?>

<h1>View ArticleProcessDetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'article_detail_id',
		'item_id',
		'qty',
	),
)); ?>
