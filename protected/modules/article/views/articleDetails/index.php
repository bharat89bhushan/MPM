<?php
/* @var $this ArticleDetailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Article Details',
);

$this->menu=array(
	array('label'=>'Create ArticleDetails', 'url'=>array('create')),
	array('label'=>'Manage ArticleDetails', 'url'=>array('admin')),
);
?>

<h1>Article Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
