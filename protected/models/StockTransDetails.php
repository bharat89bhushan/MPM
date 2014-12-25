<?php

/**
 * This is the model class for table "stock_trans_details".
 *
 * The followings are the available columns in table 'stock_trans_details':
 * @property integer $id
 * @property integer $item_id
 * @property string $qty
 * @property integer $trans_type
 * @property string $date
 * @property integer $production_plan_detail_id
 */
class StockTransDetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'stock_trans_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item_id, qty, trans_type, date, production_plan_detail_id', 'required'),
			array('item_id, trans_type,production_plan_detail_id', 'numerical', 'integerOnly'=>true),
			array('qty', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, item_id, qty, trans_type, date', 'safe', 'on'=>'search'),
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
			'Rel_trans_item_id'=>array(self::BELONGS_TO,'Items','item_id'),
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
			'qty' => 'Qty',
			'trans_type' => 'Trans Type',
			'date' => 'Date',
			'production_plan_detail_id' => 'Production Plan Details',
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
		$criteria->with= array('Rel_trans_item_id');
	//	$criteria->compare('id',$this->id);
	//	$criteria->compare('item_id',$this->item_id);
		$criteria->compare('qty',$this->qty,true);
		$criteria->compare('trans_type',$this->trans_type);
		$criteria->compare('t.date',$this->date,true);
	//	$criteria->compare('created_by',$this->created_by);
		$criteria->addSearchCondition('Rel_trans_item_id.code',$this->id);
		$criteria->addSearchCondition('Rel_trans_item_id.name',$this->item_id);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
                        'defaultOrder'=>'t.id DESC',
                    ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StockTransDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
