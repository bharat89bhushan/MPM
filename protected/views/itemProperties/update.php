<?php
/* @var $this ItemPropertiesController */
/* @var $model ItemProperties */

$this->breadcrumbs=array(
	'Item Properties'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ItemProperties', 'url'=>array('index')),
	array('label'=>'Create ItemProperties', 'url'=>array('create')),
	array('label'=>'View ItemProperties', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ItemProperties', 'url'=>array('admin')),
);
?>

<h1>Update ItemProperties <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>