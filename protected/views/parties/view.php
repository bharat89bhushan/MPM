<?php
/* @var $this PartiesController */
/* @var $model Parties */

$this->breadcrumbs=array(
	'Parties'=>array('index'),
	$model->name,
);

$this->menu=array(
//	array('label'=>'List Parties', 'url'=>array('index')),
	array('label'=>'Create Parties', 'url'=>array('create')),
	array('label'=>'Update Parties', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Parties', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Parties', 'url'=>array('admin')),
);
?>

<h1>View Parties #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		'name',
	),
)); ?>
<h3><br><br><br>Party Item Stocks</h3>
<?php

$config = array('keyField'=>'id');
$dataprovider = new CArrayDataProvider($rawData=$model->Rel_party_item_stock, $config);
 
	$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'items-comp-grid',
        'dataProvider'=>$dataprovider,
        'columns'=>array(
        	array('name'=>'Code','value'=>'$data->Rel_item_id->code'),
    	   	array('name'=>'Item Name','value'=>'$data->Rel_item_id->name'),
        	'qty',
        ),
)); 

?>
<h3>Party Article Processing Details</h3>
<?php
$config = array('keyField'=>'id');
$dataprovider = new CArrayDataProvider($rawData=$model->Rel_party_production_plan, $config);
 
	$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'items-comp-grid',
        'dataProvider'=>$dataprovider,
        'columns'=>array(
        	'production_plan_id',
        	array('name'=>'Article Code','value'=>'$data->Rel_article_detail->Rel_article->code'),
        	array('name'=>'Article Name','value'=>'$data->Rel_article_detail->Rel_article->name'),
        	array('name'=>'Qty','value'=>'$data->Rel_production_plan->value'),
        	array('name'=>'Status','value'=>'$data->status?"InProgress":"Completed"'),
        ),
)); 

?>
