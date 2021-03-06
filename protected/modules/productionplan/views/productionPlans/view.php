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
		'label'=>'Article Code',
		'name'=>'Rel_article.code',
		),
		array(
		'label'=>'Article Name',
		'name'=>'Rel_article.name',
		),
		'value',
		array(
		'name'=>'status',
		'value'=> $model['status']?'InProgress':'Completed',
		),
		'date',
	),
)); ?>
<?php 

$config = array('keyField'=>'id');
$dataprovider = new CArrayDataProvider($rawData=$model->Rel_production_plan, $config);
 
	$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'items-comp-grid',
        'dataProvider'=>$dataprovider,
        'columns'=>array(
   //     'plan_id',
   
		array('name'=>'Process','value'=>'$data->Rel_article_detail->Rel_process->name'),
	//	array('name'=>'Item Code','value'=>'$data->Rel_plan_rel_item_id->code'),
		array('name'=>'Created','value'=>'$data->date'),
		array('name'=>'Received Date','value'=>'$data->status?NULL:$data->updated'),
		array('name'=>'Received Qty','value'=>'$data->status?NULL:$data->val'),
	//	'value',
                array(
            'class'=>'CButtonColumn'
			, 'viewButtonUrl'=>'Yii::app()->createUrl("/productionplan/ProductionPlanDetails/view", array("id"=>$data["id"],"qty"=>'.$model->value.'))'
            , 'updateButtonUrl'=>'Yii::app()->createUrl("/productionplan/ProductionPlanDetails/update", array("id"=>$data["id"],"production_plan_id"=>'.$model->id.',"article_id"=>'.$model->article_id.'))'
            ,'buttons'=>array(
            	'delete'=>array(
            	'url'=>'Yii::app()->createUrl("/productionplan/ProductionPlanDetails/delete", array("id"=>$data["id"]))',
            	'visible'=>'$data->status?true:false;',
            	)
            	)
		,//'template'=>'{update}'
            
                ),
        ),
));
if($model['status'])
 echo CHtml::link('Add', array('ProductionPlanDetails/create','production_plan_id'=>$model->id,'article_id'=>$model->article_id));
 
else{
$config = array('keyField'=>'id');
$dataprovider = new CArrayDataProvider($rawData=$model->Rel_production_plan_final, $config);
 
	$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'items-comp-grid',
        'dataProvider'=>$dataprovider,
        'columns'=>array(
   //     'plan_id',
   
		array('name'=>'Quality Code','value'=>'$data->Rel_quality->code'),
		array('name'=>'Quality Name','value'=>'$data->Rel_quality->name'),
		array('name'=>'Qty','value'=>'$data->qty'),
	//	array('name'=>'Completed','value'=>'$data->status?NULL:$data->updated'),
	//	'value',
        ),
));
}
?>
