<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionCleanData()
	{
			$this->render('admin_del');
	
	}
	public function actionCleanPlan()
	{
		Yii::app()->db->createCommand()->truncateTable(ProductionPlanFinalDetails::model()->tableName());
		Yii::app()->db->createCommand()->truncateTable(ProductionPlanDetails::model()->tableName());
		Yii::app()->db->createCommand()->truncateTable(ProductionPlans::model()->tableName());
	
			$this->render('admin_del');
	
	}
	public function actionCleanGodownStock()
	{
		Yii::app()->db->createCommand()->truncateTable(GodownStocks::model()->tableName());
		$this->render('admin_del');
	
	}
	public function actionPurchase()
	{
		Yii::app()->db->createCommand()->truncateTable(PurchaseOrderDetails::model()->tableName());
		Yii::app()->db->createCommand()->truncateTable(PurchaseOrders::model()->tableName());
		$this->render('admin_del');
	
	}
	public function actionSales()
	{
		Yii::app()->db->createCommand()->truncateTable(SalesOrderDetails::model()->tableName());
		Yii::app()->db->createCommand()->truncateTable(SalesOrders::model()->tableName());
		$this->render('admin_del');
	
	}
	public function actionTransfer()
	{
		Yii::app()->db->createCommand()->truncateTable(TransferOrderDetails::model()->tableName());
		Yii::app()->db->createCommand()->truncateTable(TransferOrders::model()->tableName());
		$this->render('admin_del');
	
	}
	
	public function actionParties()
	{
		Yii::app()->db->createCommand()->truncateTable(Parties::model()->tableName());
		Yii::app()->db->createCommand()->truncateTable(PartyItemStock::model()->tableName());
		$this->render('admin_del');
	}
	
	public function actionPartiesStocks()
	{
		Yii::app()->db->createCommand()->truncateTable(Parties::model()->tableName());
		$this->render('admin_del');
	}
	
	
	
	
	public function actionArticles()
	{
		Yii::app()->db->createCommand()->truncateTable(ArticleProcessDetails::model()->tableName());
		Yii::app()->db->createCommand()->truncateTable(ArticleDetails::model()->tableName());
		Yii::app()->db->createCommand()->truncateTable(ArticleProperties::model()->tableName());
		Yii::app()->db->createCommand()->truncateTable(Articles::model()->tableName());
		$this->render('admin_del');
	
	}
	
	
	public function actionItems()
	{
		Yii::app()->db->createCommand()->truncateTable(ItemProperties::model()->tableName());
		Yii::app()->db->createCommand()->truncateTable(Items::model()->tableName());
		$this->render('admin_del');
	
	}
	
	
}