<?php
/* @var $this ConfigPropTypesController */
/* @var $model ConfigPropTypes */

$this->breadcrumbs=array(
	'Config Prop Types'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Units', 'url'=>array('configUnits/admin')),
	array('label'=>'Process', 'url'=>array('configProcess/admin')),
//	array('label'=>'Item Types', 'url'=>array('configItemTypes/admin')),
//	array('label'=>'Property Types', 'url'=>array('configPropTypes/admin')),
	array('label'=>'Property Type Values', 'url'=>array('configPropTypeValues/admin')),
	array('label'=>'Clean Data', 'url'=>array('default/CleanData')),
	array('label'=>'Backup & Restore Data', 'url'=>array('/backup/default/upload')),

);
/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#config-prop-types-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
*/
?>

<h1>Manage Config Prop Types</h1>
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
</div>
-->
<!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'config-prop-types-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'name',
		'desc',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
echo CHtml::link('Add Property', array('configPropTypes/create'));

?>
