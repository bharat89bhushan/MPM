<?php

/**
 * This is the model class for table "stock_details".
 *
 * The followings are the available columns in table 'stock_details':
 * @property integer $id
 * @property integer $item_id
 * @property string $value
 */
class StockDetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $qty;
	public function tableName()
	{
		return 'stock_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item_id', 'required'),
			array('item_id', 'numerical', 'integerOnly'=>true),
			array('value', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, item_id, value', 'safe', 'on'=>'search'),
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
			'Rel_stock_details_item_id'=>array(self::BELONGS_TO,'Items','item_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'item_id' => 'Item',
			'value' => 'Value',
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
		$criteria->with= array('Rel_stock_details_item_id');

	//	$criteria->compare('id',$this->id);
	//	$criteria->compare('item_id',$this->item_id);
		$criteria->compare('value',$this->value,true);
		$criteria->addSearchCondition('Rel_stock_details_item_id.code',$this->id);
		$criteria->addSearchCondition('Rel_stock_details_item_id.name',$this->item_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StockDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	 public function beforeSave()
        {
                if(! $this->isNewRecord){
                        $itemcomps = ItemsCompositionDetails::model()->findAllByAttributes(array('comp_id'=>$this->item_id));
                        foreach($itemcomps as $itemcomp)
                        {
				$total = floatval(StockDetails::model()->findByAttributes(array('item_id'=>$itemcomp->Item_id))->value);
				$itemcompval = floatval($itemcomp->value);
				$addqtyval = floatval($this->qty);
                                if($total < $itemcompval*$addqtyval)
				{
					 $this->addError('value', $total.' '.$itemcompval.' '.$addqtyval);
                                        return false;
				}
                        }


                }
                return parent::beforeSave();
        }
	 public function afterSave()
        {
                if(! $this->isNewRecord){
			$trans_type = 1; //1-- Addition| 0-- Deduction
			
			$stocktrans = new StockTransDetails;
			$stocktrans->item_id = $this->item_id;
			$stocktrans->qty = $this->qty;
			$stocktrans->value = $this->value;
			$stocktrans->trans_type = $trans_type;
			$stocktrans->date = new CDbExpression('NOW()');
			$stocktrans->created_by = Yii::app()->user->id;
			$stocktrans->save();
			

			$trans_type = 0; //1-- Addition| 0-- Deduction
                        $itemcomps = ItemsCompositionDetails::model()->findAllByAttributes(array('comp_id'=>$this->item_id));
                        foreach($itemcomps as $itemcomp)
                        {

				$stockitemmodel = StockDetails::model()->findByAttributes(array('item_id'=>$itemcomp->Item_id));
				$total = floatval($stockitemmodel->value);
				$itemcompval = floatval($itemcomp->value);
				$addqtyval = floatval($this->qty);
				$stockitemmodel->value = strval($total-$itemcompval*$addqtyval);
				if($stockitemmodel->save())
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


                }
                return parent::afterSave();
        }

}
