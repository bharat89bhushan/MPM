<?php

class TransferOrdersController extends Controller
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
		$model=new TransferOrders;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TransferOrders']))
		{
			$model->attributes=$_POST['TransferOrders'];
			$model->date=new CDbExpression('NOW()');
			if($model->save()){
				if(isset($_POST['TransferOrderDetails']))
				{
					foreach ($_POST['TransferOrderDetails'] as $index => $order_details) {
						$ordermodel = new TransferOrderDetails;
						$ordermodel->attributes = $order_details;
						$ordermodel->transfer_id = $model->id;
						if($ordermodel->save()){
						$itemmodel = PartyItemStock::model()->findByAttributes(array('party_id'=>$model->party_id,'item_id'=>$ordermodel->item_id));
						if($itemmodel == null){
							$itemmodel = new PartyItemStock;
							$itemmodel->party_id = $model->party_id;
							$itemmodel->item_id = $ordermodel->item_id;
							$itemmodel->qty = '0';
						}
						$itemmodel->qty = strval(floatval($itemmodel->qty)+floatval($ordermodel->qty));
						if($itemmodel->save()){
							$itemstockmodel = Items::model()->findByPk($ordermodel->item_id);
							$itemstockmodel->qty = strval(floatval($itemstockmodel->qty)-floatval($ordermodel->qty));
							$itemstockmodel->save();
						}
						}
					}
					
				}
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['TransferOrders']))
		{
			
			$model->attributes=$_POST['TransferOrders'];
			if($model->save()){
				$transmodels = TransferOrderDetails::model()->findAll("transfer_id ='" . $model->id . "'");
					foreach($transmodels as $transmodel){
						$itemmodel = PartyItemStock::model()->findByAttributes(array('party_id'=>$model->party_id,'item_id'=>$transmodel->item_id));
						$itemmodel->qty = strval(floatval($itemmodel->qty)-floatval($transmodel->qty));
						if($itemmodel->save()){
							$itemstockmodel = Items::model()->findByPk($transmodel->item_id);
							$itemstockmodel->qty = strval(floatval($itemstockmodel->qty)+floatval($transmodel->qty));
							$itemstockmodel->save();
						$transmodel->delete();
						}
					}
				
				if(isset($_POST['TransferOrderDetails']))
				{
					foreach ($_POST['TransferOrderDetails'] as $index => $order_details) {
						$ordermodel = new TransferOrderDetails;
						$ordermodel->attributes = $order_details;
						$ordermodel->transfer_id = $model->id;
						if($ordermodel->save()){
						$itemmodel = PartyItemStock::model()->findByAttributes(array('party_id'=>$model->party_id,'item_id'=>$ordermodel->item_id));
						if($itemmodel == null){
							$itemmodel = new PartyItemStock;
							$itemmodel->party_id = $model->party_id;
							$itemmodel->item_id = $ordermodel->item_id;
							$itemmodel->qty = '0';
						}
						$itemmodel->qty = strval(floatval($itemmodel->qty)+floatval($ordermodel->qty));
						if($itemmodel->save()){
							$itemstockmodel = Items::model()->findByPk($ordermodel->item_id);
							$itemstockmodel->qty = strval(floatval($itemstockmodel->qty)-floatval($ordermodel->qty));
							$itemstockmodel->save();
						}
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
		$dataProvider=new CActiveDataProvider('TransferOrders');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TransferOrders('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TransferOrders']))
			$model->attributes=$_GET['TransferOrders'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TransferOrders the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TransferOrders::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TransferOrders $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='transfer-orders-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionLoadChildByAjax($index)
    {
      echo    $this->renderPartial('application.modules.transfer.views.transferOrders._tform', array(
            'model' => new TransferOrderDetails,
            'index' => $index,
            'display' => 'block',
        ),true);
        
    }
}
