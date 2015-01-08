<?php
/* @var $this GodownStocksController */

$this->breadcrumbs=array(
	'Godown Stocks'=>array('index'),
	'Manage',
);
/*
$this->menu=array(
	array('label'=>'List GodownStocks', 'url'=>array('index')),
	array('label'=>'Create GodownStocks', 'url'=>array('create')),
);
*/
?>

<h1>Completed Production Plans</h1>
<?php
$ppmodel = new ProductionPlans('search');
$ppmodel->unsetAttributes();  
	$model=ProductionPlans::model()->findAll('status=0 and packed = 0');
//	$model->unsetAttributes();
$config = array('keyField'=>'id');
$dataprovider = new CArrayDataProvider($rawData=$model, $config);
 
	$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'items-comp-grid',
        'dataProvider'=>$ppmodel->search(),
        'filter'=>$ppmodel,
        'columns'=>array(
        	'id',
        	array('name'=>'article_id','value'=>'$data->Rel_article->name'),
        	'value',
                array(
                        'class'=>'CButtonColumn'
			, 'viewButtonUrl'=>'Yii::app()->createUrl("/ArticleDetails/view", array("id"=>$data["id"]))'
            , 'updateButtonUrl'=>'Yii::app()->createUrl("/ArticleDetails/update", array("id"=>$data["id"]))'
            , 'deleteButtonUrl'=>'Yii::app()->createUrl("/ArticleDetails/delete", array("id"=>$data["id"]))'
		,//'template'=>'{update}{delete}'
            
                ),
        ),
)); 


?>
