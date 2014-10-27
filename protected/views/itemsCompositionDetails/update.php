<?php
/* @var $this ItemsCompositionDetailsController */
/* @var $model ItemsCompositionDetails */

/*
$this->breadcrumbs=array(
	'Items Composition Details'=>array('index'),
	$model->icd_id=>array('view','id'=>$model->icd_id),
	'Update',
);
$this->menu=array(
	array('label'=>'List ItemsCompositionDetails', 'url'=>array('index')),
	array('label'=>'Create ItemsCompositionDetails', 'url'=>array('create')),
	array('label'=>'View ItemsCompositionDetails', 'url'=>array('view', 'id'=>$model->icd_id)),
	array('label'=>'Manage ItemsCompositionDetails', 'url'=>array('admin')),
);
*/
?>

<h1>Update ItemsCompositionDetails <?php echo $model->icd_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
