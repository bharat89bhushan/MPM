
<?php
/* @var $this ItemsController */
/* @var $model Items */



$this->breadcrumbs=array(
	'Items'=>array('index'),
	'Manage',
);

$this->menu=array(
//	array('label'=>'List Items', 'url'=>array('index')),
	array('label'=>'Create Items', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#items-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Items</h1>
<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button'));
?>
<div class="search-form" style="display:none">
<?php// $this->renderPartial('_search',array(
	//'model'=>$model,
//));
?>
</div>--><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'items-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		/*array(
			'name'=>'id',
			'htmlOptions'=>array('width'=>'25')
			),*/
		'code',
		'name',
		array(
		'name'=>'type_id',
		'value'=>'$data->Rel_item_type->name',
		'filter' => CHtml::listData( ConfigItemTypes::model()->findAll(), 'name','name' )
		),
		'qty',
		/*
		array(
			'name'=>'qty',
			'value'=>'$data->qty.\' \'.$data->Rel_unit_type->name',
			),
			*/
		array(
			'name'=>'unit_type',
			'header'=>'Unit',
			'value'=>'$data->Rel_unit_type->name',
			'filter' => CHtml::listData( ConfigUnits::model()->findAll(), 'id','name' )
			),
		
		/*
		'unit_type',
		'created_by',
		'date',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
			'visible'=>true
		),
	),
)); ?>
