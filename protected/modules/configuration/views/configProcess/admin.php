<?php
/* @var $this ConfigProcessController */
/* @var $model ConfigProcess */

$this->breadcrumbs=array(
	'Config Processes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Units', 'url'=>array('configUnits/admin')),
	array('label'=>'Item Types', 'url'=>array('configItemTypes/admin')),
	array('label'=>'Property Types', 'url'=>array('configPropTypes/admin')),
	array('label'=>'Property Type Values', 'url'=>array('configPropTypeValues/admin')),
//	array('label'=>'Create ConfigProcess', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#config-process-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Processes</h1>
<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php// echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php// $this->renderPartial('_search',array(
//	'model'=>$model,
//)); ?>
</div>--><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'config-process-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'name',
		'descp',
//		'date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
echo CHtml::link('Add Process', array('configProcess/create'));
?>
