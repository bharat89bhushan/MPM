<?php

class GodownStocksController extends Controller
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
		$model=new GodownStocks;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GodownStocks']))
		{
			$model->attributes=$_POST['GodownStocks'];
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
public function actionPacking($model){
	if(floatval($model->qty)<floatval($model->sug_qty))
	{
		$model->addError('sug_qty', 'Packing Not Possible');
		$this->render('update',array(
			'model'=>$model,
		));
	
	}
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

		if(isset($_POST['GodownStocks']))
		{
			$model->attributes=$_POST['GodownStocks'];
			if(isset($_POST['GodownStocksAdjust'])){
		
				foreach($_POST['GodownStocksAdjust'] as $index => $model_godown){
					$godown_model = new GodownStocks;
					$godown_model->attributes = $model_godown;
					$act_model = GodownStocks::model()->findByAttributes(array('article_id'=>$godown_model->article_id,'quality_id'=>$godown_model->quality_id,'unit_id'=>$godown_model->unit_id));
					if($act_model != null){
						if(intval($act_model->qty)>=intval($godown_model->qty)){
						$model->qty =strval(intval($model->qty)+ intval($godown_model->qty));
						$act_model->qty =strval(intval($act_model->qty)- intval($godown_model->qty));
						$act_model->save();
						}
					}
				}
			}
			if($model->save()){
		
				$packmodel=GodownStocks::model()->findByAttributes(array('article_id'=>$model->article_id,'quality_id'=>$model->quality_id,'unit_id'=>$model->sug_unit_id));
				if($packmodel != null){
					$packmodel->qty=strval(floatval($packmodel->qty)+floatval($model->sug_qty));
					$packmodel->save();
				}
			
				
				$this->redirect(array('update','id'=>$model->id));
			}
		}
 //		$unitdetailmodel=ConfigUnitDetails::model()->findByAttributes(array('sub_unit_id'=>$model->unit_id));
		$model->sug_unit_id = $model->Rel_article_id->pack_unit_id;
		$model->sug_unit_name = $model->Rel_article_id->Rel_pack_unit_id->name;
		$model->sug_conv = $model->Rel_article_id->pack_qty;
		$model->sug_qty = strval(intval(floatval($model->qty)/floatval($model->sug_conv)));
		
	
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
		$dataProvider=new CActiveDataProvider('GodownStocks');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GodownStocks('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GodownStocks']))
			$model->attributes=$_GET['GodownStocks'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return GodownStocks the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=GodownStocks::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param GodownStocks $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='godown-stocks-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionLoadChildByAjax($index,$unit)
    {
      echo $this->renderPartial('application.views.godownStocks._tform', array(
            'model' => new GodownStocksAdjust,
            'index' => $index,
            'unit' => $unit,
            'display' => 'block',
        ),true);
        
    }
    
}
