<?php

/**
 * This is the model class for table "godown_stocks".
 *
 * The followings are the available columns in table 'godown_stocks':
 * @property integer $id
 * @property integer $article_id
 * @property integer $quality_id
 * @property string $qty
 * @property integer $unit_id
 */
class GodownStocks extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	 public $article_code;
	public function tableName()
	{
		return 'godown_stocks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('article_id, quality_id, qty, unit_id', 'required'),
			array('article_id, quality_id, unit_id', 'numerical', 'integerOnly'=>true),
			array('qty', 'length', 'max'=>10),
			array('article_code','safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, article_id, quality_id, qty, unit_id,article_code', 'safe', 'on'=>'search'),
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
			'Rel_unit_id'=>array(self::BELONGS_TO,'ConfigUnits','unit_id'),
			'Rel_quality_id'=>array(self::BELONGS_TO,'ConfigQualityTypes','quality_id'),
			'Rel_article_id'=>array(self::BELONGS_TO,'Articles','article_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'article_id' => 'Article Name',
			'quality_id' => 'Quality',
			'qty' => 'Qty',
			'unit_id' => 'Unit',
			'article_code' => 'Article Code',
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
		$criteria->with= array('Rel_article_id');

		$criteria->compare('id',$this->id);
		$criteria->compare('quality_id',$this->quality_id);
		$criteria->compare('qty',$this->qty,true);
		$criteria->compare('unit_id',$this->unit_id);
		$criteria->addSearchCondition('Rel_article_id.name',$this->article_id);
		$criteria->addSearchCondition('Rel_article_id.code',$this->article_code);
	
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GodownStocks the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
