<?php

/**
 * This is the model class for table "production_plans".
 *
 * The followings are the available columns in table 'production_plans':
 * @property integer $id
 * @property integer $article_id
 * @property string $value
 * @property integer $status
 * @property string $date
 * @property string $qty
 */
class ProductionPlans extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	 public $article_code;
	 public $article_name;
	 public $tmp;
	public function tableName()
	{
		return 'production_plans';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('article_id, value, status', 'required'),
			array('article_id, status', 'numerical', 'integerOnly'=>true),
			array('value, qty', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, article_id, value, status,item_code,item_name,qty', 'safe', 'on'=>'search'),
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
			'Rel_production_plan'=>array(self::HAS_MANY,'ProductionPlanDetails','production_plan_id'),
			'Rel_production_plan_final'=>array(self::HAS_MANY,'ProductionPlanFinalDetails','plan_id'),
			'Rel_article'=>array(self::BELONGS_TO,'Articles','article_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'article_id' => 'Article',
			'value' => 'Qty',
			'status' => 'Status',
			'date' => 'Date',
			'qty' => 'Finished Qty',
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
			$criteria->with= array('Rel_article');

		$criteria->compare('t.id',$this->id);
		$criteria->compare('article_id',$this->article_id);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('date',$this->date);
		$criteria->compare('qty',$this->qty,true);
		$criteria->addSearchCondition('Rel_article.code',$this->article_code);
		$criteria->addSearchCondition('Rel_article.name',$this->article_name);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductionPlans the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}