<?php

/**
 * This is the model class for table "plan_item_stock_relations".
 *
 * The followings are the available columns in table 'plan_item_stock_relations':
 * @property integer $id
 * @property integer $plan_id
 * @property integer $item_id
 * @property string $value
 * @property string $req_qty
 */
class PlanItemStockRelations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	 public $qty;
	public function tableName()
	{
		return 'plan_item_stock_relations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('plan_id, item_id, value', 'required'),
			array('plan_id, item_id', 'numerical', 'integerOnly'=>true),
			array('value, req_qty', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, plan_id, item_id, value, req_qty', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'Rel_plan_rel_plan_id'=>array(self::BELONGS_TO,'ProductionPlans','plan_id'),
			'Rel_plan_rel_item_id'=>array(self::BELONGS_TO,'Items','item_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'plan_id' => 'Plan',
			'item_id' => 'Item',
			'value' => 'In Stock',
			'req_qty' => 'Required Qty',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	 
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('plan_id',$this->plan_id);
		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('value',$this->value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PlanItemStockRelations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	protected function beforeSave()
	{
		if(parent::beforeSave()){
			if(! $this->isNewRecord){
			$itemmode= Items::model()->findByPk($this->item_id);
			if($itemmode->is_manufactured){
               $itemcomps = ItemsCompositionDetails::model()->findAllByAttributes(array('comp_id'=>$this->item_id));
               foreach($itemcomps as $itemcomp)
               {
               	$total =0.0;
      //         	if(! $itemcomp->Rel_item_item_id->is_manufactured){
	//			$total = floatval(StockDetails::model()->findByAttributes(array('item_id'=>$itemcomp->Item_id))->value);
     //         	} else{
               		$total = floatval(PlanItemStockRelations::model()->findByAttributes(array('item_id'=>$itemcomp->Item_id,'plan_id'=>$this->plan_id))->value);
     //         	}
				$itemcompval = floatval($itemcomp->value);
				$addqtyval = floatval($this->qty);
                if($total < $itemcompval*$addqtyval)
				{
		//			 $this->addError('value', $total.' '.$itemcompval.' '.$addqtyval);
					 $this->addError('value', $itemcomp->Rel_item_item_id->name.'('.$itemcomp->Rel_item_item_id->code.') Stock insufficent');
                     return false;
				}
               }

		$stockdetailsmodel = StockDetails::model()->findByAttributes(array('item_id'=>$this->item_id));
		$stockdetailsmodel->value = strval(floatval($stockdetailsmodel->value) + floatval($this->qty));
		if(!$stockdetailsmodel->save())
			return false;
			
			
			
				$trans_type = 1; //1-- Addition| 0-- Deduction
			
			$stocktrans = new StockTransDetails;
			$stocktrans->item_id = $this->item_id;
			$stocktrans->qty = $this->qty;
			$stocktrans->value = $stockdetailsmodel->value;
			$stocktrans->trans_type = $trans_type;
			$stocktrans->date = new CDbExpression('NOW()');
			$stocktrans->created_by = Yii::app()->user->id;
			$stocktrans->save();
			

			$trans_type = 0; //1-- Addition| 0-- Deduction
                        $itemcomps = ItemsCompositionDetails::model()->findAllByAttributes(array('comp_id'=>$this->item_id));
                        foreach($itemcomps as $itemcomp)
                        {

				$stockitemmodel = StockDetails::model()->findByAttributes(array('item_id'=>$itemcomp->Item_id));
				$stocktotal = floatval($stockitemmodel->value);
				$itemcompval = floatval($itemcomp->value);
				$addqtyval = floatval($this->qty);
				$stockitemmodel->value = strval($stocktotal-$itemcompval*$addqtyval);
				
		//		if( $itemcomp->Rel_item_item_id->is_manufactured){
					$planitemmodel = PlanItemStockRelations::model()->findByAttributes(array('item_id'=>$itemcomp->Item_id,'plan_id'=>$this->plan_id));
					$planitemtotal = floatval($planitemmodel->value);
					$planitemmodel->value = strval($planitemtotal-$itemcompval*$addqtyval);
			//		$planitemmodel->req_qty = strval(floatval($planitemmodel->req_qty)-($itemcompval*$addqtyval));
					$planitemmodel->saveAttributes(array('value','req_qty'));
		//		}
				
				if($stockitemmodel->saveAttributes(array('value')) )
				{
					$stocktrans = new StockTransDetails;
					$stocktrans->item_id = $itemcomp->Item_id;
					$stocktrans->qty = strval($itemcompval*$addqtyval);
					$stocktrans->value = $stockitemmodel->value;
					$stocktrans->trans_type = $trans_type;
					$stocktrans->date = new CDbExpression('NOW()');
					$stocktrans->created_by = Yii::app()->user->id;
					$stocktrans->save();
						
				}
                        }

			
	//	return parent::beforeSave();
	//	return true;
		}
		else {
				$total = floatval(StockDetails::model()->findByAttributes(array('item_id'=>$this->item_id))->value);
				$addqtyval = floatval($this->qty);
				if($total < $addqtyval)
				{
	
					 $this->addError('value', $itemmode->name.'('.$itemmode->code.') Stock insufficent');
                     return false;
				}
		}
			}	
	} else{
		return false;
	}
		return true;
	}	
}
