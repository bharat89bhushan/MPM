
<?php
/* @var $this SalesOrdersController */
/* @var $model SalesOrders */

$this->breadcrumbs=array(
	'Sales Orders'=>array('index'),
	'Manage',
);

$this->menu=array(
//	array('label'=>'List SalesOrders', 'url'=>array('index')),
	array('label'=>'Create SalesOrders', 'url'=>array('create')),
);
/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sales-orders-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");*/
?>

<h1>Manage Sales Orders</h1>
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

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'page-form',
    'enableAjaxValidation'=>true,
)); ?>
<b>Party :</b>
<?php
	$type_list=CHtml::listData(Parties::model()->findAll(),'id','name');
	echo CHtml::dropDownList('party_id','',$type_list,array('empty'=>'--Select--','options' => array(isset(Yii::app()->request->cookies["party_id"])?Yii::app()->request->cookies["party_id"]->value:0=>array('selected'=>true))));
?>
<br>
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
    Yii::app()->clientScript->registerScript('delete-item', "

    $('#export-button').on('click',function() {
        $.fn.yiiGridView.export();
    });
    $.fn.yiiGridView.export = function() {
        $.fn.yiiGridView.update('sales-orders-grid',{ 
            success: function() {
                $('#sales-orders-grid').removeClass('grid-view-loading');
                window.location = '". $this->createUrl('exportToFile')  . "';
            },
             data: $('.search-form form').serialize() + '&export=true'
        });
    }
    ");
    ?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sales-orders-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
	//	'id',
		array(
		'name'=>'party_id',
		'value'=>'$data->Rel_party_id->name',
//		'filter' => CHtml::listData( Parties::model()->findAll(), 'id','name' )
		),
		'date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<?php echo CHtml::link('Export', array('/exportToPDFExcel/salesExportToExcel'), array('class'=>'btnblue'));?>

