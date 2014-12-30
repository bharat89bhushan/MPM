<?php
/* @var $this PurchaseOrdersController */
/* @var $model PurchaseOrders */

$this->breadcrumbs=array(
	'Purchase Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
//	array('label'=>'List PurchaseOrders', 'url'=>array('index')),
	array('label'=>'Create PurchaseOrders', 'url'=>array('create')),
	array('label'=>'Update PurchaseOrders', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete PurchaseOrders', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PurchaseOrders', 'url'=>array('admin')),
);
?>

<h1>View PurchaseOrders #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
		'label'=>'Party Name',
		'name'=>'Rel_party_id.name',
		),
		'date',
	),
)); ?>
<?php 

$config = array('keyField'=>'id');
$dataprovider = new CArrayDataProvider($rawData=$model->Rel_purchase_detail, $config);
 
	$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'items-comp-grid',
        'dataProvider'=>$dataprovider,
        'columns'=>array(
        	array('name'=>'Item Code','value'=>'$data->Rel_item_id->code'),
		array('name'=>'Item Name','value'=>'$data->Rel_item_id->name'),
		'qty',
        ),
)); 

?>
