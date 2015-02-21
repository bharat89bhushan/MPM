<?php

/**
 * This is the model class for table "purchase_orders".
 *
 * The followings are the available columns in table 'purchase_orders':
 * @property integer $id
 * @property integer $party_id
 * @property string $date
 */
class PurchaseOrders extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	 public $qty = array();
	 public $from_date;
	 public $to_date;
	public function tableName()
	{
		return 'purchase_orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('party_id', 'required'),
			array('party_id', 'numerical', 'integerOnly'=>true),
			array('date,qty', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, party_id, date,from_date,to_date', 'safe', 'on'=>'search'),
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
			'Rel_party_id'=>array(self::BELONGS_TO,'Parties','party_id'),
			'Rel_purchase_detail'=>array(self::HAS_MANY,'PurchaseOrderDetails','purchase_order_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'party_id' => 'Party',
			'date' => 'Date',
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
		$criteria->compare('party_id',$this->party_id);
		$criteria->compare('date',$this->date,true);
		$criteria->order = 'id DESC';

		if(!empty($this->from_date) && empty($this->to_date))
        {
            $criteria->condition = "date >= '$this->from_date'";  // date is database date column field
        }elseif(!empty($this->to_date) && empty($this->from_date))
        {
            $criteria->condition = "date <= '$this->to_date'";
        }elseif(!empty($this->to_date) && !empty($this->from_date))
        {
            $criteria->condition = "date  >= '$this->from_date' and date <= '$this->to_date'";
        }


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PurchaseOrders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	protected function beforeSave(){
			if(parent::beforeSave()){
			
				if(isset($_POST['PurchaseOrderDetails'])){
			
					foreach ($_POST['PurchaseOrderDetails'] as $index => $order_details) {
						$ordermodel = new PurchaseOrderDetails;
						$ordermodel->attributes = $order_details;
						$ordermodel->purchase_order_id = 0;
						if(!$ordermodel->validate()){
						$this->addError('', 'Field is Empty or Contains invalid values ');
						return false;	
						}
							
					}
					
				}
				
			}else{
				return false;
			}
			return true;
	}
}
