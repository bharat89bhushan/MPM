<?php

/**
 * This is the model class for table "sales_order_details".
 *
 * The followings are the available columns in table 'sales_order_details':
 * @property integer $id
 * @property integer $order_id
 * @property integer $godown_id
 * @property string $qty
 */
class SalesOrderDetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	 public $article_id,$quality_id,$unit_id;
	public function tableName()
	{
		return 'sales_order_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('article_id, quality_id,unit_id, qty', 'required'),
			array('article_id, quality_id,unit_id,', 'numerical', 'integerOnly'=>true),
			array('qty', 'length', 'max'=>10),
			array('article_id, quality_id,unit_id','safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, order_id, godown_id, qty', 'safe', 'on'=>'search'),
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
			'Rel_godown_id'=>array(self::BELONGS_TO,'GodownStocks','godown_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'order_id' => 'Order',
			'godown_id' => 'Godown',
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
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('godown_id',$this->godown_id);
		$criteria->compare('qty',$this->qty,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SalesOrderDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
