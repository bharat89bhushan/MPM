<?php

class SalesOrdersController extends Controller
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new SalesOrders;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SalesOrders']))
		{
			$model->attributes=$_POST['SalesOrders'];
			$model->date=new CDbExpression('NOW()');
			if($model->save()){
					if(isset($_POST['SalesOrderDetails']))
					{
					foreach ($_POST['SalesOrderDetails'] as $index => $order_details) {
						$ordermodel = new SalesOrderDetails;
						$ordermodel->attributes = $order_details;
						$ordermodel->order_id= $model->id;
						$godownmodel = GodownStocks::model()->findByAttributes(array('article_id'=>$ordermodel->article_id,'quality_id'=>$ordermodel->quality_id,'unit_id'=>$ordermodel->unit_id));
						if($godownmodel != null){
						$godownmodel->qty = strval(floatval($godownmodel->qty)-intval($ordermodel->qty));
						$ordermodel->godown_id = $godownmodel->id;
						$ordermodel->save();
						$godownmodel->save();
						}
							
					}
				}
			
				$this->redirect(array('view','id'=>$model->id));
			}else{
					print_r($model->getErrors());
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
		if(isset($_POST['SalesOrders']))
		{
			$model->attributes=$_POST['SalesOrders'];
			if($model->save()){
					if(isset($_POST['SalesOrderDetails']))
					{
						$ordermodels = SalesOrderDetails::model()->findAll("order_id ='" . $model->id . "'");
						foreach($ordermodels as $ordermodel){
						$godownmodel = GodownStocks::model()->findByAttributes(array('article_id'=>$ordermodel->Rel_godown_id->article_id,'quality_id'=>$ordermodel->Rel_godown_id->quality_id,'unit_id'=>$ordermodel->Rel_godown_id->unit_id));
						$godownmodel->qty = strval(floatval($godownmodel->qty)+intval($ordermodel->qty));
						$godownmodel->save();
						$ordermodel->delete();
						}
					foreach ($_POST['SalesOrderDetails'] as $index => $order_details) {
						$ordermodel = new SalesOrderDetails;
						$ordermodel->attributes = $order_details;
						$ordermodel->order_id= $model->id;
						$godownmodel = GodownStocks::model()->findByAttributes(array('article_id'=>$ordermodel->article_id,'quality_id'=>$ordermodel->quality_id,'unit_id'=>$ordermodel->unit_id));
						if($godownmodel != null){
						$godownmodel->qty = strval(floatval($godownmodel->qty)-intval($ordermodel->qty));
						$ordermodel->godown_id = $godownmodel->id;
						$ordermodel->save();
						$godownmodel->save();
						}
							
					}
				}
			
				$this->redirect(array('view','id'=>$model->id));
			}
		}

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
		$dataProvider=new CActiveDataProvider('SalesOrders');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SalesOrders('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SalesOrders']))
			$model->attributes=$_GET['SalesOrders'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SalesOrders the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SalesOrders::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SalesOrders $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sales-orders-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionLoadChildByAjax($index)
    {
      echo $this->renderPartial('application.modules.sales.views.salesOrderDetails._tform', array(
            'model' => new SalesOrderDetails,
            'index' => $index,
            'display' => 'block',
        ),true);
        
    }
	
}
