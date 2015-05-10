<?php
/* @var $this SalesOrdersController */
/* @var $model SalesOrders */

$this->breadcrumbs=array(
	'Sales Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
//	array('label'=>'List SalesOrders', 'url'=>array('index')),
	array('label'=>'Create SalesOrders', 'url'=>array('create')),
	array('label'=>'Update SalesOrders', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete SalesOrders', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SalesOrders', 'url'=>array('admin')),
);
?>

<h1>View SalesOrders #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
	//	'id',
	//	'party_id',
		array(
		'label'=>'Party Name',
		'name'=>'Rel_party_id.name',
		),
		'date',
	),
)); ?>
<?php 

$config = array('keyField'=>'id');
$dataprovider = new CArrayDataProvider($rawData=$model->Rel_sales_detail, $config);
 
	$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'items-comp-grid',
        'dataProvider'=>$dataprovider,
        'columns'=>array(
        array('name'=>'Article Code','value'=>'$data->Rel_godown_id->Rel_article_id->code'),
		array('name'=>'Article Name','value'=>'$data->Rel_godown_id->Rel_article_id->name'),
		array('name'=>'Quality','value'=>'$data->Rel_godown_id->Rel_quality_id->name'),
		array('name'=>'Unit','value'=>'$data->Rel_godown_id->Rel_unit_id->name'),
		'qty',
        ),
)); 

?>
