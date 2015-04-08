<?php

class ExportToPDFExcelController extends CController
{
	public $layout='//layouts/column2';

	 //Uncomment the following methods and override them if needed
	
	public function filters()
	{
		return array(
	//		'rights', // perform access control for CRUD operations
					'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
	
		);
	}
	public function accessRules()
	{
		return array(
			/*
			array('allow',  // allow all users to perform 'index' and 'view' actions
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
			),*/
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	 public function behaviors()
	 {
		return array(
		    'eexcelview'=>array(
		        'class'=>'ext.eexcelview.EExcelBehavior',
		    ),
		);
	 }
	


	public function actionSalesExportToExcel()
	{
		$this->toExcel( $_SESSION['sales'],
		array(
		//'id',
//		'Rel_party_id.name::Party',
//		'date',
		'order_id',
		'Rel_godown_id.Rel_article_id.name',
		'qty',
		/*'course_name',
		'relCat.qualification_type_name::Category Name',
		'course_level',
		'course_completion_hours',
		'course_code',
		'course_cost',
		'course_desc',
		'Rel_user.user_organization_email_id::Created By',
		*/
		),
		'Sales_Orders',
		array(
		    'creator' => 'Bharat',
		),
		'Excel5'
	    );
	    
	    
	}	    

public function actionPartyPlanExportToExcel()
	{
		$this->toExcel( $_SESSION['partyplan'],
		array(
		'production_plan_id',
		'Rel_article_detail.Rel_article.code',
		'Rel_article_detail.Rel_article.name',
//		'status?"InProgress":"Completed"',
//		'qty',
		),
		'Party_Plan_Details',
		array(
		    'creator' => 'Bharat',
		),
		'Excel5'
	    );
	    
	    
	}	    


public function actionPlanExportToExcel()
	{
		$this->toExcel( $_SESSION['productionplan'],
		array(
		'id',
//		'Rel_article_detail.Rel_article.code',
//		'Rel_article_detail.Rel_article.name',
//		'status?"InProgress":"Completed"',
		'value',
		),
		'Production_Plan_Details',
		array(
		    'creator' => 'Bharat',
		),
		'Excel5'
	    );
	    
	    
	}	    



public function actionPurchaseExportToExcel()
	{
		$this->toExcel( $_SESSION['purchase'],
		array(
		
		'purchase_order_id',
		'Rel_item_id.code',
		'qty',
	
		),
		'Purchase_Orders',
		array(
		    'creator' => 'Bharat',
		),
		'Excel5'
	    );
	    
	    
	}	    


}
