<?php
/* @var $this GodownStocksController */
/* @var $model GodownStocks */

$this->breadcrumbs=array(
	'Godown Stocks'=>array('index'),
	'Manage',
);

$this->menu=array(
//	array('label'=>'List GodownStocks', 'url'=>array('index')),
	array('label'=>'Add Plan To Godown', 'url'=>array('productionplan/productionPlans/addStock')),
);
/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#godown-stocks-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
*/
?>

<h1>Godown Stocks</h1>
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
	'id'=>'godown-stocks-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	//	'id',
	//	'article_id',
		array(
		'name'=>'article_code',
		'value'=>'$data->Rel_article_id->code',
//		'filter' => CHtml::listData( ConfigQualityTypes::model()->findAll(), 'id','name' )
		),
		array(
		'name'=>'article_id',
		'value'=>'$data->Rel_article_id->name',
//		'filter' => CHtml::listData( ConfigQualityTypes::model()->findAll(), 'id','name' )
		),
	//	'quality_id',
		array(
		'name'=>'quality_id',
		'value'=>'$data->Rel_quality_id->name',
		'filter' => CHtml::listData( ConfigQualityTypes::model()->findAll(), 'id','name' )
		),
		'qty',
	//	'unit_id',
		array(
		'name'=>'unit_id',
		'value'=>'$data->Rel_unit_id->name',
		'filter' => CHtml::listData( ConfigUnits::model()->findAll('master_id=3 or master_id=2'), 'id','name' )
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
			'buttons'=>array(
			'update'=>array(
				'visible'=>'$data->Rel_unit_id->master_id!=3?true:false;',
			)),
		),
	),
)); ?>
