<?php

/**
 * This is the model class for table "production_plan_details".
 *
 * The followings are the available columns in table 'production_plan_details':
 * @property integer $id
 * @property integer $production_plan_id
 * @property integer $article_detail_id
 * @property integer $status
 * @property string $date
 * @property string $updated
 * @property integer $party_id
 * @property integer $val
 */
class ProductionPlanDetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $tmp_article_id;
//	public $val;
	
	
	public function tableName()
	{
		return 'production_plan_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('production_plan_id, article_detail_id, val', 'required'),
			array('val','numerical'),
			array('production_plan_id, article_detail_id,status,party_id', 'numerical', 'integerOnly'=>true),
			array('tmp_article_id, date,val,status,updated','safe'),
			array('article_detail_id','UniqueAttributesValidator', 'with'=>'production_plan_id','message' => 'Process is already Added.'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, production_plan_id, article_detail_id, date,status,party_id', 'safe', 'on'=>'search'),
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
			'Rel_production_plan'=>array(self::BELONGS_TO,'ProductionPlans','production_plan_id'),
			'Rel_article_detail'=>array(self::BELONGS_TO,'ArticleDetails','article_detail_id'),
			'Rel_party_id'=>array(self::BELONGS_TO,'Parties','party_id'),
			'Rel_stock_trans'=>array(self::HAS_MANY,'StockTransDetails','production_plan_detail_id'),
			'Rel_status'=>array(self::BELONGS_TO,'ConfigPlanStatus','status'),
		
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'production_plan_id' => 'Production Plan',
			'article_detail_id' => 'Article Detail',
			'date' => 'Date',
			'status' => 'Status',
			'updated' =>'Updated',
			'party_id' =>'Party',
			'val' => 'Received Qty',
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
		$criteria->compare('production_plan_id',$this->production_plan_id);
		$criteria->compare('article_detail_id',$this->article_detail_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('updated',$this->updated,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductionPlanDetails the static model class
	 */
	 
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	protected function beforeSave(){
			if(parent::beforeSave()){
			if(!$this->isNewRecord){
				if(!$this->status){
				$processmodels=$this->Rel_article_detail->Rel_process_details;
				foreach($processmodels as $processmodel){
					if($this->party_id){
					$partystockmodel=PartyItemStock::model()->findByAttributes(array('item_id'=>$processmodel->item_id,'party_id'=>$this->party_id));
					if((!$partystockmodel) || floatval($partystockmodel->qty) < floatval($processmodel->qty)*floatval($this->val))
					{
						$this->addError('status', $processmodel->Rel_item->name.'('.$processmodel->Rel_item->code.') Stock insufficent to '.$this->Rel_party_id->name);
						return false;
					}
					}else{
					if(floatval($processmodel->Rel_item->qty) < floatval($processmodel->qty)*floatval($this->val))
					{
						$this->addError('status', $processmodel->Rel_item->name.'('.$processmodel->Rel_item->code.') Stock insufficent');
						return false;
					}	
					}
				}
				}
			}
		}else{
			return false;
		}
		return true;
	}
	
/*	public function getPartyStock($item){
		 $item_model = PartyItemStock::model()->findByAttributes(array('item_id'=>$item,'party_id'=>$model->party_id));	
         if($item_model){
         	return $item_model->qty;
         }else{
         	return $model->party_id;
         }
	}
*/
}
