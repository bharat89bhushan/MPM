<?php

class ProductionPlansController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
		/*
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			*/
			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
		//		'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			/*
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			*/
			array('deny',  // deny all users
				'users'=>array('*'),
			),
			
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	 
	public function createPlanItemRel($comp_id,$planid,$planval){
		
		
		$itemcomps=ItemsCompositionDetails::model()->findAll('comp_id='.$comp_id);
		foreach($itemcomps as $itemcomp){
		
		$planrel = new PlanItemStockRelations;
		$planrel->plan_id = $planid;
		$planrel->item_id = $itemcomp->Item_id;
		$planrel->req_qty = strval(floatval($itemcomp->value) * floatval($planval));
		$planrel->value = '0';
		$planrel->save();
		$this->createPlanItemRel($itemcomp->Item_id,$planid,$planrel->req_qty);
			
		}
		
		
	}
	 
	public function actionCreate()
	{
		$model=new ProductionPlans;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProductionPlans']))
		{
			$model->attributes=$_POST['ProductionPlans'];
			$model->date=new CDbExpression('NOW()');
			$model->status=1;
			if($model->save())
			{
			/*
			$planrel = new PlanItemStockRelations;
			$planrel->plan_id = $model->id;
			$planrel->item_id = $model->item_id;
			$planrel->req_qty = $model->value;
			$planrel->value = "0";
			$planrel->save();
			
			$this->createPlanItemRel($model->item_id,$model->id,$model->value);
				*/
				$this->redirect(array('view','id'=>$model->id));
				//$this->redirect(array('admin','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['ProductionPlans']))
		{
			$model->attributes=$_POST['ProductionPlans'];
			if($model->save()){
				$planmodels = ProductionPlanFinalDetails::model()->findAll("plan_id ='" . $model->id . "'");
					foreach($planmodels as $planmodel){
						$planmodel->delete();
					}
				if(isset($_POST['ProductionPlanFinalDetails']))
				{
					foreach ($_POST['ProductionPlanFinalDetails'] as $index => $plan_final_details) {
					
							$ordermodel = new ProductionPlanFinalDetails;
							$ordermodel->attributes = $plan_final_details;
							$ordermodel->plan_id = $model->id;
							$ordermodel->date=new CDbExpression('NOW()');
							$ordermodel->save();	
						
					}
				}
				$this->redirect(array('view','id'=>$model->id));
			}
		}
		
		$model->category_id = $model->Rel_article->article_group_id;
		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ProductionPlans');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ProductionPlans('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProductionPlans']))
			$model->attributes=$_GET['ProductionPlans'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ProductionPlans the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ProductionPlans::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ProductionPlans $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='production-plans-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionLoadChildByAjax($index)
    {
     // $relmodel = new PurchaseOrderDetails;
      echo $this->renderPartial('application.modules.productionplan.views.productionPlanFinalDetails._tform', array(
            'model' => new ProductionPlanFinalDetails,
            'index' => $index,
            'display' => 'block',
        ),true);
   //    	echo CHtml::textField('qty');
        
    }
    
    public function actionaddStock()
	{
	//	$this->render('view_plan');
		$model=new ProductionPlans('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProductionPlans']))
			$model->attributes=$_GET['ProductionPlans'];

		$this->render('view_plan',array(
			'model'=>$model,
		));
	}
	
    public function actionaddPPStock($id)
	{
	$model=$this->loadModel($id);
	
	foreach($model->Rel_production_plan_final as $finalmodel){
		$godownmodel = GodownStocks::model()->findByAttributes(array('article_id'=>$model->article_id,'quality_id'=>$finalmodel->quality_id,'unit_id'=>$model->Rel_article->pack_unit_id));
		if($godownmodel == null){
			$godownmodel = new GodownStocks;
			$godownmodel->article_id = $model->article_id;
			$godownmodel->quality_id = $finalmodel->quality_id;
			$godownmodel->unit_id = $model->Rel_article->pack_unit_id;
			$godownmodel->qty = "0";
		}
		
		$lgodownmodel = GodownStocks::model()->findByAttributes(array('article_id'=>$model->article_id,'quality_id'=>$finalmodel->quality_id,'unit_id'=>$model->Rel_article->unit_id));
		if($lgodownmodel == null){
			$lgodownmodel = new GodownStocks;
			$lgodownmodel->article_id = $model->article_id;
			$lgodownmodel->quality_id = $finalmodel->quality_id;
			$lgodownmodel->unit_id = $model->Rel_article->unit_id;
			$lgodownmodel->qty = "0";
		}
		
//		$unitdetailmodel = ConfigUnitDetails::model()->findByAttributes(array('unit_id'=>$godownmodel->unit_id));
	
		$godownmodel->qty = strval(intval($godownmodel->qty)+intval(intval($finalmodel->qty)/intval($model->Rel_article->pack_qty)));
		$lgodownmodel->qty = strval(intval($lgodownmodel->qty)+(intval($finalmodel->qty)%intval($model->Rel_article->pack_qty)));
		
		if($godownmodel->save())
			$lgodownmodel->save();
		
	}
	
	$model->packed = 1;
	$model->save();
	$this->redirect(array('addStock'));
	}


    
}
