<?php

/**
 * This is the model class for table "sales_orders".
 *
 * The followings are the available columns in table 'sales_orders':
 * @property integer $id
 * @property integer $party_id
 * @property string $date
 */
class SalesOrders extends CActiveRecord
{
	public $qty;
	public $from_date;
	public $to_date;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sales_orders';
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
			'Rel_sales_detail'=>array(self::HAS_MANY,'SalesOrderDetails','order_id'),
	
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

		$criteria->compare('t.id',$this->id);
		
		$criteria->compare('party_id',$this->party_id);
		$criteria->compare('date',$this->date,true);
		$criteria->order = 't.id DESC';
		
		
		$order_criteria=new CDbCriteria;
		$order_criteria->with = array('Rel_order_id');
		$order_criteria->compare('Rel_order_id.party_id',$this->party_id);
		
	
		
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

		$sales_order= new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		$sales_order_details= new CActiveDataProvider('SalesOrderDetails', array(
			'criteria'=>$order_criteria,
		));
		$_SESSION['sales'] = $sales_order_details;
		return $sales_order;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SalesOrders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	protected function beforeSave(){
			if(parent::beforeSave()){
				if(isset($_POST['SalesOrderDetails'])){
					foreach ($_POST['SalesOrderDetails'] as $index => $order_details) {
						$ordermodel = new SalesOrderDetails;
						$ordermodel->attributes = $order_details;
						if($ordermodel->validate()){
							$godownmodel = GodownStocks::model()->findByAttributes(array('article_id'=>$ordermodel->article_id,'quality_id'=>$ordermodel->quality_id,'unit_id'=>$ordermodel->unit_id));
							if($godownmodel == null){
								$this->addError('', 'InSufficent Stock for '.Articles::model()->findByPk($ordermodel->article_id)->name.'('.ConfigQualityTypes::model()->findByPk($ordermodel->quality_id)->name.') in '.ConfigUnits::model()->findByPk($ordermodel->unit_id)->name);
								return false;
							}else{
								if(floatval($godownmodel->qty)<floatval($ordermodel->qty)){
									$this->addError('', 'InSufficent Stock for '.Articles::model()->findByPk($ordermodel->article_id)->name.'('.ConfigQualityTypes::model()->findByPk($ordermodel->quality_id)->name.') in '.ConfigUnits::model()->findByPk($ordermodel->unit_id)->name);
									return false;
								}
							}
							
						}else{
							$this->addError('', 'Field is Empty or Contains invalid values ');
							return false;	
						}
						
						
					}
					
				}
				
			}
			return parent::beforeSave();
		}
	
}
