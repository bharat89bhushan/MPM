<?php
/* @var $this ProductionPlansController */
/* @var $model ProductionPlans */

$this->breadcrumbs=array(
	'Production Plans'=>array('index'),
	$model->id,
);

$this->menu=array(
//	array('label'=>'List ProductionPlans', 'url'=>array('index')),
	array('label'=>'Create ProductionPlans', 'url'=>array('create')),
	array('label'=>'Update ProductionPlans', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete ProductionPlans', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductionPlans', 'url'=>array('admin')),
);
?>

<h1>View ProductionPlans #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
		'label'=>'Item Code',
		'name'=>'Rel_plan_item_id.code',
		),
		array(
		'label'=>'Item Name',
		'name'=>'Rel_plan_item_id.name',
		),
		'value',
		array(
		'name'=>'status',
		'value'=> $model['status']?'InProgress':'Completed',
		),
	),
)); ?>
<?php 

$config = array('keyField'=>'id');
$dataprovider = new CArrayDataProvider($rawData=$model->Rel_plan_id, $config);
 
	$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'items-comp-grid',
        'dataProvider'=>$dataprovider,
        'columns'=>array(
   //     'plan_id',
		array('name'=>'Item Name','value'=>'$data->Rel_plan_rel_item_id->name'),
		array('name'=>'Item Code','value'=>'$data->Rel_plan_rel_item_id->code'),
		'value',
                array(
                        'class'=>'CButtonColumn'
			, 'viewButtonUrl'=>'Yii::app()->createUrl("/PlanItemStockRelations/view", array("id"=>$data["id"]))'
            , 'updateButtonUrl'=>'Yii::app()->createUrl("/PlanItemStockRelations/update", array("id"=>$data["id"]))'
            , 'deleteButtonUrl'=>'Yii::app()->createUrl("/PlanItemStockRelations/delete", array("id"=>$data["id"]))'
		,'template'=>'{update}'
            
                ),
        ),
)); 
 echo CHtml::link('Add', array('PlanItemStockRelations/create','plan_id'=>$model->id));
?>
