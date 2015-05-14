<?php
/* @var $this ConfigPartyTypesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Config Party Types',
);

$this->menu=array(
	array('label'=>'Create ConfigPartyTypes', 'url'=>array('create')),
	array('label'=>'Manage ConfigPartyTypes', 'url'=>array('admin')),
);
?>

<h1>Config Party Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
