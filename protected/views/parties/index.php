<?php
/* @var $this PartiesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Parties',
);

$this->menu=array(
	array('label'=>'Create Parties', 'url'=>array('create')),
	array('label'=>'Manage Parties', 'url'=>array('admin')),
);
?>

<h1>Parties</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
