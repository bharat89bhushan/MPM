<?php
/* @var $this ConfigUnitDetailsController */
/* @var $model ConfigUnitDetails */

$this->breadcrumbs=array(
	'Config Unit Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ConfigUnitDetails', 'url'=>array('index')),
	array('label'=>'Create ConfigUnitDetails', 'url'=>array('create')),
	array('label'=>'View ConfigUnitDetails', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ConfigUnitDetails', 'url'=>array('admin')),
);
?>

<h1>Update ConfigUnitDetails <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>