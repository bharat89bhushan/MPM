<?php
/* @var $this ItemsController */
/* @var $model Items */

$this->breadcrumbs=array(
	'Items'=>array('index'),
	$model->name,
);

$this->menu=array(
//	array('label'=>'List Items', 'url'=>array('index')),
	array('label'=>'Create Item', 'url'=>array('create')),
	array('label'=>'Update Item', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete Item', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Items', 'url'=>array('admin')),
);
?>

<h1>View Items #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		'name',
		array(
		'label'=>'Type',
		'name'=>'Rel_item_type.name',
	//	'value'=> $model['Rel_item_type.name'],
		),
		array(
		'label'=>'Unit',
		'name'=>'Rel_unit_type.name',
		),
		array(
		'label'=>'Created By',
		'name'=>'Rel_created_by.username',
		),
		'date',
		array(
      	'label'=>'Size',
      	'value'=> $model->getPropValSize($model->id), 
		),
		array(
      	'label'=>'Colour',
      	'value'=> $model->getPropValColour($model->id), 
		),
		array(
      	'label'=>'Qty(Self)',
      	'value'=> $model->qty, 
		),
	),
)); ?>

<?php /*
if($model->is_manufactured)
{
$config = array('keyField'=>'icd_id');
$dataprovider = new CArrayDataProvider($rawData=$model->Rel_item_comp, $config);
 
	$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'items-comp-grid',
        'dataProvider'=>$dataprovider,
        'columns'=>array(
        	array('name'=>'Item Code','value'=>'$data->Rel_item_item_id->code'),
		array('name'=>'Item Name','value'=>'$data->Rel_item_item_id->name'),
		'value',
                array(
                        'class'=>'CButtonColumn'
			, 'viewButtonUrl'=>'Yii::app()->createUrl("/ItemsCompositionDetails/view", array("id"=>$data["icd_id"]))'
            , 'updateButtonUrl'=>'Yii::app()->createUrl("/ItemsCompositionDetails/update", array("id"=>$data["icd_id"],"org_id"=>'.$model->org_id.',"comp_id"=>'.$model->id.'))'
            , 'deleteButtonUrl'=>'Yii::app()->createUrl("/ItemsCompositionDetails/delete", array("id"=>$data["icd_id"]))'
		,'template'=>'{update}{delete}'
            
                ),
        ),
)); 
 echo CHtml::link('Add', array('ItemsCompositionDetails/create','comp_id'=>$model->id,'org_id'=>$model->org_id));
}
*/
?>

<?php 

$config = array('keyField'=>'id');
$dataprovider = new CArrayDataProvider($rawData=$model->Rel_item_party_stock, $config);
 
	$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'items-comp-grid',
        'dataProvider'=>$dataprovider,
        'columns'=>array(
        	array('name'=>'Party Code','value'=>'$data->Rel_party_id->code'),
		array('name'=>'Party Name','value'=>'$data->Rel_party_id->name'),
		'qty',
                array(
                        'class'=>'CButtonColumn'
			, 'viewButtonUrl'=>'Yii::app()->createUrl("/PartyItemStock/view", array("id"=>$data["id"]))'
            , 'updateButtonUrl'=>'Yii::app()->createUrl("/PartyItemStock/update", array("id"=>$data["id"]))'
            , 'deleteButtonUrl'=>'Yii::app()->createUrl("/PartyItemStock/delete", array("id"=>$data["id"]))'
		,'template'=>'{update}{delete}'
            
                ),
        ),
)); 
 echo CHtml::link('Add', array('PartyItemStock/create','item_id'=>$model->id));


?>
