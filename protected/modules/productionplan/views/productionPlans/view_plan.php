<?php
/* @var $this ProductionPlansController */
/* @var $model ProductionPlans */

?>

<h1>Completed Production Plans</h1>
<?php
$ppmodel=ProductionPlans::model()->findAll('status=0 and packed = 0');
$config = array('keyField'=>'id');
$dataprovider = new CArrayDataProvider($rawData=$ppmodel, $config,array('status'=>0));
 
	$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'items-comp-grid',
        'dataProvider'=>$dataprovider,
  //      'filter'=>$model,
        'columns'=>array(
        	'id',
        	array('name'=>'article_id','value'=>'$data->Rel_article->name'),
        	'value',
        	 array(
                'class'=>'CLinkColumn',
                 'label'=>'Add',
             //   'urlExpression'=>'"/productionplan/productionPlans/addPPStock&id=".$data->id',
                'urlExpression'=>'Yii::app()->createUrl("/productionplan/productionPlans/addPPStock",array("id"=>$data["id"]))',
               'linkHtmlOptions'=>array('id'=>'add_cargo'),
            //    'header'=>'Add'
                ),
                array(
                        'class'=>'CButtonColumn'
		//	, 'viewButtonUrl'=>'Yii::app()->createUrl("/productionplan/productionPlans/addPPStock", array("id"=>$data["id"]))'
			, 'viewButtonUrl'=>'Yii::app()->createUrl("/productionplan/productionPlans/view", array("id"=>$data["id"]))'
        //    , 'updateButtonUrl'=>'Yii::app()->createUrl("/ArticleDetails/update", array("id"=>$data["id"]))'
        //    , 'deleteButtonUrl'=>'Yii::app()->createUrl("/ArticleDetails/delete", array("id"=>$data["id"]))'
		,'template'=>'{view}'
                ),
        ),
)); 

?>
