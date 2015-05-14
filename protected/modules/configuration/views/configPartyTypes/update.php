<?php
/* @var $this ConfigPartyTypesController */
/* @var $model ConfigPartyTypes */

$this->breadcrumbs=array(
	'Config Party Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ConfigPartyTypes', 'url'=>array('index')),
	array('label'=>'Create ConfigPartyTypes', 'url'=>array('create')),
	array('label'=>'View ConfigPartyTypes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ConfigPartyTypes', 'url'=>array('admin')),
);
?>

<h1>Update ConfigPartyTypes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>