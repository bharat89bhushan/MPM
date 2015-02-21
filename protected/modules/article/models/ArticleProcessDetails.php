<?php

/**
 * This is the model class for table "article_process_details".
 *
 * The followings are the available columns in table 'article_process_details':
 * @property integer $id
 * @property integer $article_detail_id
 * @property integer $item_id
 * @property string $qty
 */
class ArticleProcessDetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	 public $calc_per_qty;
	public function tableName()
	{
		return 'article_process_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('article_detail_id, item_id', 'required'),
			array('article_detail_id, item_id', 'numerical', 'integerOnly'=>true),
			array('qty', 'length', 'max'=>10),
			array('calc_per_qty','safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, article_detail_id, item_id, qty', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 * 
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'Rel_item'=>array(self::BELONGS_TO,'Items','item_id'),
				'Rel_article_detail_id'=>array(self::BELONGS_TO,'ArticleDetails','article_detail_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'article_detail_id' => 'Article Detail',
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
		$criteria->compare('article_detail_id',$this->article_detail_id);
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
	 * @return ArticleProcessDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
