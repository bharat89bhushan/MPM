<?php
/* @var $this ArticleGroupsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Article Groups',
);

$this->menu=array(
	array('label'=>'Create ArticleGroups', 'url'=>array('create')),
	array('label'=>'Manage ArticleGroups', 'url'=>array('admin')),
);
?>

<h1>Article Groups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
