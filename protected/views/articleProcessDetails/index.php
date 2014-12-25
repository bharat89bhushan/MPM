<?php
/* @var $this ArticleProcessDetailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Article Process Details',
);

$this->menu=array(
	array('label'=>'Create ArticleProcessDetails', 'url'=>array('create')),
	array('label'=>'Manage ArticleProcessDetails', 'url'=>array('admin')),
);
?>

<h1>Article Process Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
