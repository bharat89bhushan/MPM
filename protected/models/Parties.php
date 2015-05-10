<?php

/**
 * This is the model class for table "parties".
 *
 * The followings are the available columns in table 'parties':
 * @property integer $id
 * @property string $code
 * @property string $name
 */
class Parties extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	 
	public $from_date;
	public $to_date;

	public function tableName()
	{
		return 'parties';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code,name', 'required'),
			array('code', 'length', 'max'=>10),
			array('name', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, code, name,from_date,to_date', 'safe', 'on'=>'search'),
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
			'Rel_party_item_stock'=>array(self::HAS_MANY,'PartyItemStock','party_id'),
			'Rel_party_production_plan'=>array(self::HAS_MANY,'ProductionPlanDetails','party_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'code' => 'Short Name',
			'name' => 'Name',
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
		$criteria->compare('code',$this->code,true);
		$criteria->compare('name',$this->name,true);

	$criteria->with = array('Rel_party_production_plan');
	
	
		if(!empty($this->from_date) && empty($this->to_date))
        {
            $criteria->condition = "Rel_party_production_plan.date >= '$this->from_date'";  // date is database date column field
        //    $order_criteria->condition = "Rel_order_id.date >= '$this->from_date'";  // date is database date column field
        }elseif(!empty($this->to_date) && empty($this->from_date))
        {
            $criteria->condition = "Rel_party_production_plan.date <= '$this->to_date'";
       //     $order_criteria->condition = "Rel_order_id.date <= '$this->to_date'";
        }elseif(!empty($this->to_date) && !empty($this->from_date))
        {
        	$criteria->condition = "Rel_party_production_plan.date  >= '$this->from_date 00:00:00' and date <= '$this->to_date 23:59:59'";
    //        $order_criteria->condition = "Rel_order_id.date  >= '$this->from_date 00:00:00' and Rel_order_id.date <= '$this->to_date 23:59:59'";
        }

	$partyplan = new CActiveDataProvider($this, array('criteria'=>$criteria,));
//	$_SESSION['partyplan'] = $partyplan;
		return $partyplan;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Parties the static model class
	 **/
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
