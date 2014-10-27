<?php

/**
 * This is the model class for table "items_composition_details".
 *
 * The followings are the available columns in table 'items_composition_details':
 * @property integer $icd_id
 * @property integer $comp_id
 * @property integer $Item_id
 * @property string $value
 */
class ItemsCompositionDetails extends CActiveRecord
{
	public $org_id;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'items_composition_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comp_id, Item_id, value', 'required'),
			array('comp_id, Item_id', 'numerical', 'integerOnly'=>true),
			array('Item_id, ', 'UniqueAttributesValidator', 'with'=>'comp_id'),
			array('value', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('icd_id, comp_id, Item_id, value', 'safe', 'on'=>'search'),
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
			'Rel_item_comp_id'=>array(self::BELONGS_TO,'Items','comp_id'),
			'Rel_item_item_id'=>array(self::BELONGS_TO,'Items','Item_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'icd_id' => 'Icd',
			'comp_id' => 'Comp',
			'Item_id' => 'Item',
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

		$criteria->compare('icd_id',$this->icd_id);
		$criteria->compare('comp_id',$this->comp_id);
		$criteria->compare('Item_id',$this->Item_id);
		$criteria->compare('value',$this->value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ItemsCompositionDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
