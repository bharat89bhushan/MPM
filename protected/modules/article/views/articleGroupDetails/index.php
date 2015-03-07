<?php
/* @var $this ArticleGroupDetailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Article Group Details',
);

$this->menu=array(
	array('label'=>'Create ArticleGroupDetails', 'url'=>array('create')),
	array('label'=>'Manage ArticleGroupDetails', 'url'=>array('admin')),
);
?>

<h1>Article Group Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
