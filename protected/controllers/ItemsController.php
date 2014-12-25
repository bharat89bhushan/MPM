<?php

class ItemsController extends Controller
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
		$model=new Items;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Items']))
		{
			$model->attributes=$_POST['Items'];
			$model->date=new CDbExpression('NOW()');
			$model->created_by = Yii::app()->user->id;
			
			$typemodel = ConfigItemTypes::model()->findByPk($model->type_id);
			$model->code = strtoupper($typemodel->name)."_".strtoupper(str_replace(' ', '_', $model->name));
			
			if($model->save())
			{
			/*	$stockmodel = new StockDetails;
				$stockmodel->item_id=$model->id;
				if(!$stockmodel->save())
					print_r($stockmodel->getErrors());
			*/	
				if($model->size_prop_val_id){
				$itemprop = new ItemProperties;
				$itemprop->item_id = $model->id;
				$itemprop->prop_val_id = $model->size_prop_val_id;
				if(!$itemprop->save())
					print_r($itemprop->getErrors());
				}
				
				if($model->color_prop_val_id){
				$itemprop = new ItemProperties;
				$itemprop->item_id = $model->id;
				$itemprop->prop_val_id = $model->color_prop_val_id;
				if(!$itemprop->save())
					print_r($itemprop->getErrors());
				}
				
				
				$this->redirect(array('view','id'=>$model->id));
			}
			else
			$model->addError('Rel_item_prop', 'Error occured while saving item properties.');
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

		if(isset($_POST['Items']))
		{
			$model->attributes=$_POST['Items'];
			
			$typemodel = ConfigItemTypes::model()->findByPk($model->type_id);
			$model->code = strtoupper($typemodel->name)."_".strtoupper(str_replace(' ', '_', $model->name));
			
			if($model->save()){
				
				
		$itemprops = ItemProperties::model()->findAll('item_id='.$model->id);
		foreach($itemprops as $itemprop)
		{
			if($itemprop->Rel_prop_val->Rel_prop_type->id == 2){
				if($model->size_prop_val_id ){
			$itemprop->prop_val_id=	$model->size_prop_val_id ;
			$itemprop->save();
				}else{
					$itemprop->delete();
				}
			}
			elseif($itemprop->Rel_prop_val->Rel_prop_type->id == 1){
				if($model->color_prop_val_id){
			$itemprop->prop_val_id=	$model->color_prop_val_id ;
			$itemprop->save();
				}else{
					$itemprop->delete();
				}
			}
		}
		
		if($model->size_prop_val_id){
			$itemprop = ItemProperties::model()->findByAttributes(array('item_id'=>$model->id,'prop_val_id'=>$model->size_prop_val_id));
			if(!$itemprop){
				$itemprop = new ItemProperties;
				$itemprop->item_id = $model->id;
			}
			$itemprop->prop_val_id = $model->size_prop_val_id;
				if(!$itemprop->save())
					print_r($itemprop->getErrors());
		}
				
		if($model->color_prop_val_id){
			$itemprop = ItemProperties::model()->findByAttributes(array('item_id'=>$model->id,'prop_val_id'=>$model->color_prop_val_id));
			if(!$itemprop){
				$itemprop = new ItemProperties;
				$itemprop->item_id = $model->id;
			}
				$itemprop->prop_val_id = $model->color_prop_val_id;
				if(!$itemprop->save())
					print_r($itemprop->getErrors());
		}
		
				
				
				
				$this->redirect(array('view','id'=>$model->id));
			}
		}
		
		$itemprops = ItemProperties::model()->findAll('item_id='.$model->id);
		foreach($itemprops as $itemprop)
		{
			if($itemprop->Rel_prop_val->Rel_prop_type->id == 2)
				$model->size_prop_val_id = $itemprop->prop_val_id;
			elseif($itemprop->Rel_prop_val->Rel_prop_type->id == 1)
				$model->color_prop_val_id = $itemprop->prop_val_id;
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
		$dataProvider=new CActiveDataProvider('Items');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Items('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Items']))
			$model->attributes=$_GET['Items'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Items the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Items::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Items $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='items-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	 public function actionLoadChildByAjax($index)
    {
        $model = new ItemProperties;
        $this->renderPartial('application.views.itemProperties._form', array(
            'model' => $model,
            'index' => $index,
//            'display' => 'block',
        ), false, true);
    }
    
    
    public function actionDynamicStates()
    {
       
    
   $data=ConfigItemSubtypes::model()->findAll('type_id=:type_id', 
                  array(':type_id'=>(int) $_POST['Items']['type_id']));
                  
    $data=CHtml::listData($data,'id','name');
     echo CHtml::tag('option',
                   array('value'=>""),CHtml::encode("Select"),true);
    foreach($data as $value=>$name)
    {
        echo CHtml::tag('option',
                   array('value'=>$value),CHtml::encode($name),true);
    }
    
   // echo (int)$_POST['Items']['type_id'];
    
    }
     
}
