<?php

/**
 * This is the model class for table "transfer_orders".
 *
 * The followings are the available columns in table 'transfer_orders':
 * @property integer $id
 * @property integer $party_id
 * @property string $date
 */
class TransferOrders extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $from_date;
	public $to_date;

	public function tableName()
	{
		return 'transfer_orders';
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
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, party_id, date', 'safe', 'on'=>'search'),
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
			'Rel_transfer_detail'=>array(self::HAS_MANY,'TransferOrderDetails','transfer_id'),
		
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


		$order_criteria=new CDbCriteria;

		if(!empty($this->from_date) && empty($this->to_date))
        {
            $criteria->condition = "date >= '$this->from_date'";  // date is database date column field
            $order_criteria->condition = "Rel_order_id.date >= '$this->from_date'";  // date is database date column field
        }elseif(!empty($this->to_date) && empty($this->from_date))
        {
            $criteria->condition = "date <= '$this->to_date'";
            $order_criteria->condition = "Rel_order_id.date <= '$this->to_date'";
        }elseif(!empty($this->to_date) && !empty($this->from_date))
        {
        	$criteria->condition = "date  >= '$this->from_date 00:00:00' and date <= '$this->to_date 23:59:59'";
            $order_criteria->condition = "Rel_order_id.date  >= '$this->from_date 00:00:00' and Rel_order_id.date <= '$this->to_date 23:59:59'";
        }


		$criteria->compare('id',$this->id);
		$criteria->compare('party_id',$this->party_id);
		$criteria->compare('date',$this->date,true);
		$criteria->order = 'id DESC';



		$order_criteria->with = array('Rel_order_id');
		$order_criteria->compare('Rel_order_id.party_id',$this->party_id);



	$transfer_order= new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		$transfer_order_details= new CActiveDataProvider('TransferOrderDetails', array(
			'criteria'=>$order_criteria,
		));
		$_SESSION['transfer'] = $transfer_order_details;
		return $transfer_order;
	

	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TransferOrders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	protected function beforeSave(){
			if(parent::beforeSave()){
			
				if(isset($_POST['TransferOrderDetails'])){
			
					foreach ($_POST['TransferOrderDetails'] as $index => $order_details) {
						$ordermodel = new TransferOrderDetails;
						$ordermodel->attributes = $order_details;
						$ordermodel->transfer_id = 0;
						if(!$ordermodel->validate()){
						$this->addError('', 'Field is Empty or Contains invalid values ');
						return false;	
						}
						$itemmodel = Items::model()->findByPk($ordermodel->item_id);
						if(floatval($itemmodel->qty)<floatval($ordermodel->qty)){
						$this->addError('', 'Stock Insufficent for '.$itemmodel->name.'('.$itemmodel->code.')');
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
