<?php

/**
 * This is the model class for table "transfer_order_details".
 *
 * The followings are the available columns in table 'transfer_order_details':
 * @property integer $id
 * @property integer $transfer_id
 * @property integer $item_id
 * @property string $qty
 */
class TransferOrderDetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	 public $type_id;
	public function tableName()
	{
		return 'transfer_order_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('transfer_id, item_id, qty', 'required'),
			array('transfer_id, item_id', 'numerical', 'integerOnly'=>true),
			array('qty', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, transfer_id, item_id, qty', 'safe', 'on'=>'search'),
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
				'Rel_item_id'=>array(self::BELONGS_TO,'Items','item_id'),
				'Rel_order_id'=>array(self::BELONGS_TO,'TransferOrders','transfer_id'),
	
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'transfer_id' => 'Transfer',
			'item_id' => 'Item',
			'qty' => 'Qty',
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
		$criteria->compare('transfer_id',$this->transfer_id);
		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('qty',$this->qty,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TransferOrderDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
