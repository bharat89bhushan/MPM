<?php
/* @var $this ConfigProcessController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Config Processes',
);

$this->menu=array(
	array('label'=>'Create ConfigProcess', 'url'=>array('create')),
	array('label'=>'Manage ConfigProcess', 'url'=>array('admin')),
);
?>

<h1>Config Processes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
