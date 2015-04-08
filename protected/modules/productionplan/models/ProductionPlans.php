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
	 public $article_code,$category_id;
	 public $article_name;
	 public $tmp;
	 public $from_date;
	 public $to_date;

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
			array('to_date,from_date','safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, article_id, value, status,item_code,item_name,qty,article_code,article_name,from_date,to_date', 'safe', 'on'=>'search'),
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
		$criteria->compare('t.date',$this->date);
		$criteria->compare('qty',$this->qty,true);
		
		if(!empty($this->from_date) && empty($this->to_date))
        {
            $criteria->addCondition("t.date >= '$this->from_date'");  // date is database date column field
        }elseif(!empty($this->to_date) && empty($this->from_date))
        {
            $criteria->addCondition("t.date <= '$this->to_date'");
        }elseif(!empty($this->to_date) && !empty($this->from_date))
        {
            $criteria->addCondition("t.date  >= '$this->from_date 00:00:00' and t.date <= '$this->to_date 23:59:59'");
        }

		$criteria->addSearchCondition('Rel_article.code',$this->article_code);
		$criteria->addSearchCondition('Rel_article.article_group_id',$this->article_name);
		$criteria->order = 't.id DESC';
	

		$productionplan = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		$_SESSION['productionplan'] = $productionplan;
		return $productionplan;
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
	
		protected function beforeSave(){
			if(parent::beforeSave()){
				if(!$this->isNewRecord){
					if(!$this->packed){
					$productiondetails = ProductionPlanDetails::model()->findAll('production_plan_id='.$this->id);
					if(floatval(ProductionPlans::model()->findByPk($this->id)->value)!=floatval($this->value)){
						if($productiondetails != null){
								$this->addError('qty', 'Not Allowed To Change the Qty Now.');
								return false;
							
						}
					}
					if(!$this->status){
						foreach($productiondetails as $productiondetail){
							if($productiondetail->status){
								$this->addError('status', 'Few Processes are not completed yet');
								return false;
							
							}
						}
					if(!isset($_POST['ProductionPlanFinalDetails'])){
						$this->addError('', 'Details not Added');
						return false;
							
					}	
						
					}
				}
				}
			}
			return true;
		}
	
}
