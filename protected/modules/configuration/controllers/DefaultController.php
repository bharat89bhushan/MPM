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
		ProductionPlanFinalDetails::model()->DeleteAll();
		ProductionPlanDetails::model()->DeleteAll();
		ProductionPlans::model()->DeleteAll();
			$this->render('admin_del');
	
	}
	public function actionCleanGodownStock()
	{
		GodownStocks::model()->DeleteAll();
		$this->render('admin_del');
	
	}
	public function actionPurchase()
	{
		PurchaseOrderDetails::model()->DeleteAll();
		PurchaseOrders::model()->DeleteAll();
		$this->render('admin_del');
	
	}
	public function actionSales()
	{
		SalesOrderDetails::model()->DeleteAll();
		SalesOrders::model()->DeleteAll();
		$this->render('admin_del');
	
	}
	public function actionTransfer()
	{
		TransferOrderDetails::model()->DeleteAll();
		TransferOrders::model()->DeleteAll();
		$this->render('admin_del');
	
	}
	
	public function actionParties()
	{
		Parties::model()->DeleteAll();
		PartyItemStock::model()->DeleteAll();
		$this->render('admin_del');
	
	}
	
	public function actionArticles()
	{
		ArticleProcessDetails::model()->DeleteAll();
		ArticleDetails::model()->DeleteAll();
		ArticleProperties::model()->DeleteAll();
		Articles::model()->DeleteAll();
		$this->render('admin_del');
	
	}
	
	
	public function actionItems()
	{
		ItemProperties::model()->DeleteAll();
		Items::model()->DeleteAll();
		$this->render('admin_del');
	
	}
}