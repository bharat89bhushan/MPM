<?php
/* @var $this ProductionPlansController */
/* @var $model ProductionPlans */

$this->breadcrumbs=array(
	'Production Plans'=>array('index'),
	'Manage',
);

$this->menu=array(
//	array('label'=>'List ProductionPlans', 'url'=>array('index')),
	array('label'=>'Create ProductionPlans', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#production-plans-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Production Plans</h1>
<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php 
//echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); 
?>
<div class="search-form" style="display:none">
<?php// $this->renderPartial('_search',array(
//	'model'=>$model,
// ));
?>
</div>--><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'production-plans-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array('name'=>'item_code','header'=>'Item Code','value'=>'$data->Rel_plan_item_id->code','filter'=> CHtml::activeTextField($model, 'item_code')),
		array('name'=>'item_name','header'=>'Item Name','value'=>'$data->Rel_plan_item_id->name','filter'=> CHtml::activeTextField($model, 'item_name')),
		'value',
		array('name'=>'status','value'=>'(!$data->status)?\'Complete\':\'In Progress\'','filter' => array('0' => 'Complete', '1' => 'In Progress'),),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
		),
	),
)); ?>
