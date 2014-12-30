<?php
/* @var $this PurchaseOrdersController */
/* @var $model PurchaseOrders */

$this->breadcrumbs=array(
	'Purchase Orders'=>array('index'),
	'Manage',
);

$this->menu=array(
//	array('label'=>'List PurchaseOrders', 'url'=>array('index')),
	array('label'=>'Create PurchaseOrders', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#purchase-orders-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Purchase Orders</h1>
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
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'purchase-orders-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
		'name'=>'party_id',
		'value'=>'$data->Rel_party_id->name',
		'filter' => CHtml::listData( Parties::model()->findAll(), 'id','name' )
		),
		'date',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
		),
	),
)); ?>
