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
		'order_id::Sales ID',
		'Rel_order_id.Rel_party_id.name::Vender',
		'Rel_order_id.date',
		'Rel_godown_id.Rel_article_id.Rel_article_group_id.name::Category',
		'Rel_godown_id.Rel_article_id.code::Article Code',
		'Rel_godown_id.Rel_quality_id.name::Quality',
		'qty',
		'Rel_godown_id.Rel_unit_id.name::Unit',
		
		),
		'Sales_Orders',
		array(
		    'creator' => 'Bharat',
		),
		'Excel5'
	    );
	    
	    
	}	    

public function actionTransferExportToExcel()
	{
		$this->toExcel( $_SESSION['transfer'],
		array(
		//'id',
//		'Rel_party_id.name::Party',
//		'date',
		'Rel_order_id.id',
		'Rel_order_id.Rel_party_id.name::Vendor Name',
		'Rel_order_id.date',
		'Rel_item_id.Rel_item_type.name::Item Type',
		'Rel_item_id.code::Item Code',
		'qty',
		),
		'Issue_Orders',
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
		'Rel_article_detail.Rel_article.Rel_article_group_id.name',
		'Rel_article_detail.Rel_article.code',
		'Rel_status.name::Status',
//		'status?"InProgress":"Completed"',
		'val',
		'updated::Received Date',

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
		'id::Plan ID',
		'Rel_article.Rel_article_group_id.name',
		'Rel_article.code',
		'Rel_status.name::Status',
		'value',
		'date',
		),
		'Production_Plan_Details',
		array(
		    'creator' => 'Bharat',
		),
		'Excel5'
	    );
	    
	    
	}	    


public function actionArticlesExportToExcel()
	{
		$this->toExcel( $_SESSION['articles'],
		array(
	//	'id',
		'Rel_article_group_id.name::Category',
		'code::Code',
		'Rel_unit_id.name::Unit',
		'Rel_pack_unit_id.name::Packing Unit',
		'pack_qty::Packing Qty'
		),
		'Articles',
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
		
		'Rel_order_id.id',
		'Rel_order_id.Rel_party_id.name::Vendor Name',
		'Rel_order_id.date',
		'Rel_item_id.Rel_item_type.name::Item Type',
		'Rel_item_id.code::Item Code',
		'qty',
		'Rel_item_id.Rel_unit_type.name::Unit',
	
		),
		'Purchase_Orders',
		array(
		    'creator' => 'Bharat',
		),
		'Excel5'
	    );
	    
	    
	}	    


}
