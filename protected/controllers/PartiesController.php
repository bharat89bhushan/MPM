<?php

class PartiesController extends Controller
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
			/*array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),*/
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
unset(Yii::app()->request->cookies['from_date']);  // first unset cookie for dates
unset(Yii::app()->request->cookies['to_date']);
//unset(Yii::app()->request->cookies['party_id']);
	$model=$this->loadModel($id);	
	
//	$model=new Parties('search');
//	$model->unsetAttributes();  // clear any default values
if(!empty($_POST))
  {
    Yii::app()->request->cookies['from_date'] = new CHttpCookie('from_date', $_POST['from_date']);  // define cookie for from_date
    Yii::app()->request->cookies['to_date'] = new CHttpCookie('to_date', $_POST['to_date']);
 //   Yii::app()->request->cookies['party_id'] = new CHttpCookie('party_id', $_POST['party_id']);
    $model->from_date = $_POST['from_date'];
    $model->to_date = $_POST['to_date'];
  //  $model->party_id = $_POST['party_id'];
}


		$criteria=new CDbCriteria();
//		$criteria->select = "party_id,date";
		$criteria->condition = "party_id='$id'";
	
		if(!empty($model->from_date) && empty($model->to_date))
        {
            $criteria->condition = "date >= '$model->from_date'";  // date is database date column field
        }elseif(!empty($model->to_date) && empty($model->from_date))
        {
            $criteria->condition = "date <= '$model->to_date'";
        }elseif(!empty($model->to_date) && !empty($model->from_date))
        {
        	$criteria->condition = "date  >= '$model->from_date 00:00:00' and date <= '$model->to_date 23:59:59'";
        }


	$_SESSION['partyplan'] = ProductionPlanDetails::model()->findAll($criteria);
	
	
		
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
		$model=new Parties;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Parties']))
		{
			$model->attributes=$_POST['Parties'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['Parties']))
		{
			$model->attributes=$_POST['Parties'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('Parties');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Parties('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Parties']))
			$model->attributes=$_GET['Parties'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Parties the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Parties::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Parties $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='parties-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
