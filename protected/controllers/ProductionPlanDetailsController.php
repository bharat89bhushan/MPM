<?php

class ProductionPlanDetailsController extends Controller
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
			//	'actions'=>array('create','update'),
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
		$model=$this->loadModel($id);
		$model->val = $_GET['qty'];
		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ProductionPlanDetails;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProductionPlanDetails']))
		{
			$model->attributes=$_POST['ProductionPlanDetails'];
			$model->date=new CDbExpression('NOW()');
			if($model->save())
				$this->redirect(array('ProductionPlans/view','id'=>$model->production_plan_id));
		}
		
		if(isset($_GET['production_plan_id']))
			$model->production_plan_id = $_GET['production_plan_id'];
			
		if(isset($_GET['article_id']))
			$model->tmp_article_id = $_GET['article_id'];
			
		if(isset($_GET['qty']))
			$model->val = $_GET['qty'];

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

		if(isset($_POST['ProductionPlanDetails']))
		{
			$model->attributes=$_POST['ProductionPlanDetails'];
			$model->updated=new CDbExpression('NOW()');
			if($model->save()){
				if(!$model->status){
				$processmodels=$model->Rel_article_detail->Rel_process_details;
				
				foreach($processmodels as $processmodel){
					$itemmodel =Items::model()->findByPk($processmodel->item_id);
					$itemmodel->qty = strval(floatval($itemmodel->qty)-(floatval($processmodel->qty)*floatval($model->val)));
					if($itemmodel->save())
					{
					$transmodel = StockTransDetails::model()->findByAttributes(array('item_id'=>$processmodel->item_id,'production_plan_detail_id'=>$model->id));
					if(!$transmodel){
					$transmodel = new StockTransDetails;
					$transmodel->item_id = $processmodel->item_id;
					$transmodel->trans_type = 0; //0-Deduction 1-Addition
					$transmodel->production_plan_detail_id =$model->id;
					}
					$transmodel->qty = strval(floatval($processmodel->qty)*floatval($model->val));
					$transmodel->date=new CDbExpression('NOW()');
					if(!$transmodel->save()){
						print_r($transmodel->getErrors());
						break;
					}
					}
				}
				}
				$this->redirect(array('ProductionPlans/view','id'=>$model->production_plan_id));
			}
		}
		if(isset($_GET['production_plan_id']))
			$model->production_plan_id = $_GET['production_plan_id'];
			
		if(isset($_GET['article_id']))
			$model->tmp_article_id = $_GET['article_id'];
	
		if(isset($_GET['qty']))
			$model->val = $_GET['qty'];


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
		$dataProvider=new CActiveDataProvider('ProductionPlanDetails');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ProductionPlanDetails('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProductionPlanDetails']))
			$model->attributes=$_GET['ProductionPlanDetails'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ProductionPlanDetails the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ProductionPlanDetails::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ProductionPlanDetails $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='production-plan-details-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
