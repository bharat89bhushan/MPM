<?php
/* @var $this PartiesController */
/* @var $model Parties */



$this->breadcrumbs=array(
	'Parties'=>array('index'),
	$model->name,
);

$this->menu=array(
//	array('label'=>'List Parties', 'url'=>array('index')),
//	array('label'=>'Create Parties', 'url'=>array('create')),
	array('label'=>'Create Parties', 'url'=>array('create')),
	array('label'=>'Update Parties', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete Parties', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Parties', 'url'=>array('admin')),
);
?>

<h1>View Parties #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
		'label'=>'Type',
		'name'=>'Rel_party_type.name',
	//	'value'=> $model['Rel_item_type.name'],
		),
	//	'code',
		'name',
	),
)); ?>


<?php

Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerScript('loadchild', '
$("#party_item_stock_button").click(function(e){
    $("#party_item_stock").toggle();
});
$("#party_article_process_button").click(function(e){
    $("#party_article_process").toggle();
});
', CClientScript::POS_END);
?>
<br><br>
<?php
    echo CHtml::link('Party Stocks', '#', array('id' => 'party_item_stock_button'));
 ?>
<div id="party_item_stock" style="display:none">
	<!--
<h3>Party Item Stocks</h3>
-->
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
</div>
<br><br>
<?php
    echo CHtml::link('Article Processing', '#', array('id' => 'party_article_process_button'));
 ?>
<div id="party_article_process" style="display:none">
<!--
<h3>Party Article Processing Details</h3>
-->
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'page-form',
    'enableAjaxValidation'=>true,
)); ?>
<br>
<b>From :</b>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
//	'model'=>$model,
    'name'=>'from_date',  // name of post parameter
    'value'=>Yii::app()->request->cookies['from_date'],  // value comes from cookie after submittion
     'options'=>array(
        'showAnim'=>'fold',
        'dateFormat'=>'yy-mm-dd',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));

?>
<b>To :</b>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
//	'model'=>$model,
    'name'=>'to_date',
    'value'=>Yii::app()->request->cookies['to_date'],
     'options'=>array(
        'showAnim'=>'fold',
        'dateFormat'=>'yy-mm-dd',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));
?>
<?php echo " ".CHtml::submitButton('Search'); ?>
<?php $this->endWidget(); ?>



<?php
$config = array('keyField'=>'id');
$dataprovider = new CArrayDataProvider($rawData=$_SESSION['partyplan'], $config);
 
	$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'items-comp-grid',
        'dataProvider'=>$dataprovider,
        'columns'=>array(
        	'production_plan_id',
        	array('name'=>'Article Code','value'=>'$data->Rel_article_detail->Rel_article->code'),
        	array('name'=>'Article Name','value'=>'$data->Rel_article_detail->Rel_article->name'),
        	array('name'=>'Qty','value'=>'$data->val'),
        	array('name'=>'Status','value'=>'$data->status?"InProgress":"Completed"'),
        	array('name'=>'Date','value'=>'$data->date'),
            array('name'=>'Received Date','value'=>'$data->status?NULL:$data->updated'),
        ),
)); 
?>
<?php echo CHtml::link('Export', array('/exportToPDFExcel/partyPlanExportToExcel'), array('class'=>'btnblue'));?>
</div>
