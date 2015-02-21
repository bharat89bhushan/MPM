<?php
/* @var $this ConfigPropTypeValuesController */
/* @var $model ConfigPropTypeValues */

$this->breadcrumbs=array(
	'Config Prop Type Values'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Units', 'url'=>array('configUnits/admin')),
	array('label'=>'Item Types', 'url'=>array('configItemTypes/admin')),
	array('label'=>'Property Types', 'url'=>array('configPropTypes/admin')),
//	array('label'=>'Property Type Values', 'url'=>array('configPropTypeValues/admin')),
	array('label'=>'Process', 'url'=>array('configProcess/admin')),
);
/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#config-prop-type-values-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
*/
?>

<h1>Manage Config Prop Type Values</h1>
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
	'id'=>'config-prop-type-values-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	//	'id',
			array(
		'name'=>'prop_type_id',
		'value'=>'$data->Rel_prop_type->name',
		'filter' => CHtml::listData( ConfigPropTypes::model()->findAll(), 'id','name' )
		),'name',
		'desc',
		array(
			'class'=>'CButtonColumn',
		),
	),
));

echo CHtml::link('Add Property Value', array('configPropTypeValues/create'));

?>
