<?php
/* @var $this ProductionPlanDetailsController */
/* @var $model ProductionPlanDetails */

$this->breadcrumbs=array(
	'Production Plan Details'=>array('index'),
	$model->id,
);

$this->menu=array(
//	array('label'=>'List ProductionPlanDetails', 'url'=>array('index')),
//	array('label'=>'Create ProductionPlanDetails', 'url'=>array('create')),
//	array('label'=>'Update ProductionPlanDetails', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete ProductionPlanDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage ProductionPlanDetails', 'url'=>array('admin')),
);

?>

<h1>View ProductionPlanDetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'production_plan_id',
		array(
		'label'=>'Article',
		'name'=>'Rel_article_detail.Rel_article.name',
		),
		array(
		'label'=>'Process',
		'name'=>'Rel_article_detail.Rel_process.name',
		),
		array(
		'label'=>'Party',
		'name'=>'Rel_party_id.name',
		),
		array(
		'name'=>'status',
		'value'=> $model['status']?'InProgress':'Completed',
		),
		'date',
	),
)); ?>
<?php 
if($model->status){
if($model->party_id){	
$config = array('keyField'=>'id');
$dataprovider = new CArrayDataProvider($rawData=$model->Rel_article_detail->Rel_process_details, $config);
 
	$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'items-comp-grid',
        'dataProvider'=>$dataprovider,
        'columns'=>array(
        	array('name'=>'Item Code','value'=>'$data->Rel_item->code'),
		array('name'=>'Item Name','value'=>'$data->Rel_item->name'),
		array(
         'name' => 'Party Stock',
         'value' => '($pmodel=PartyItemStock::model()->findByAttributes(array("item_id"=>$data->item_id,"party_id"=>'.$model->party_id.')))?$pmodel->qty:"NA"',
     	),
		 array(
         'name' => 'Required',
         'value' => 'strval(floatval($data->qty)*floatval('.$model->val.'))',
     	),
        ),
));
}else{
$config = array('keyField'=>'id');
$dataprovider = new CArrayDataProvider($rawData=$model->Rel_article_detail->Rel_process_details, $config);
 
	$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'items-comp-grid',
        'dataProvider'=>$dataprovider,
        //l($data->qty)*floatval('.$model->val.')<floatval($data->Rel_item->qty)?"Green":"Red"',
        'columns'=>array(
        	array('name'=>'Item Code','value'=>'$data->Rel_item->code'),
		array('name'=>'Item Name','value'=>'$data->Rel_item->name'),
		array(
         'name' => 'In Stock',
         'value' => '$data->Rel_item->qty',
     	),
		 array(
         'name' => 'Required',
         'value' => 'strval(floatval($data->qty)*floatval('.$model->val.'))',
     	),
        ),
));	
}
}else{
$config = array('keyField'=>'id');
$dataprovider = new CArrayDataProvider($rawData=$model->Rel_stock_trans, $config);
 
	$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'items-comp-grid',
        'dataProvider'=>$dataprovider,
        //l($data->qty)*floatval('.$model->val.')<floatval($data->Rel_item->qty)?"Green":"Red"',
        'columns'=>array(
        	array('name'=>'Item Code','value'=>'$data->Rel_trans_item_id->code'),
		array('name'=>'Item Name','value'=>'$data->Rel_trans_item_id->name'),
		array(
         'name' => 'Qty',
         'value' => '$data->qty',
     	),
        ),
));
}
?>
