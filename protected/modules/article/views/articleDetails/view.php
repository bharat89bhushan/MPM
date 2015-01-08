<?php
/* @var $this ArticleDetailsController */
/* @var $model ArticleDetails */

$this->breadcrumbs=array(
	'Article Details'=>array('index'),
	$model->id,
);
/*
$this->menu=array(
	array('label'=>'List ArticleDetails', 'url'=>array('index')),
	array('label'=>'Create ArticleDetails', 'url'=>array('create')),
	array('label'=>'Update ArticleDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ArticleDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ArticleDetails', 'url'=>array('admin')),
);*/
?>

<h1>View ArticleDetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
	//	'article_id',
	//	'process_id',
		array(
		'label'=>'Article',
		'name'=>'Rel_article.code',
		),
		array(
		'label'=>'Process',
		'name'=>'Rel_process.name',
		),
	),
)); ?>
<?php

$config = array('keyField'=>'id');
$dataprovider = new CArrayDataProvider($rawData=$model->Rel_process_details, $config);
 
	$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'items-comp-grid',
        'dataProvider'=>$dataprovider,
        'columns'=>array(
        	array('name'=>'Items','value'=>'$data->Rel_item->name'),
        	'qty',
                array(
                        'class'=>'CButtonColumn'
			, 'viewButtonUrl'=>'Yii::app()->createUrl("/article/articleProcessDetails/view", array("id"=>$data["id"]))'
            , 'updateButtonUrl'=>'Yii::app()->createUrl("/article/articleProcessDetails/update", array("id"=>$data["id"]))'
            , 'deleteButtonUrl'=>'Yii::app()->createUrl("/article/articleProcessDetails/delete", array("id"=>$data["id"]))'
		,'template'=>'{update}{delete}'
            
                ),
        ),
)); 
 echo CHtml::link('Add', array('ArticleProcessDetails/create','article_detail_id'=>$model->id));

?>
