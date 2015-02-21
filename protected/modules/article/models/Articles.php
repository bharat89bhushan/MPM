<?php

/**
 * This is the model class for table "articles".
 *
 * The followings are the available columns in table 'articles':
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property integer $unit_id
 * @property string $date
 * @property integer $calc_per_qty
 * @property integer $pack_unit_id
 * @property string $pack_qty
 */
class Articles extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'articles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, unit_id, calc_per_qty', 'required'),
			array('name', 'length', 'max'=>30),
			array('code', 'length', 'max'=>50),
			array('calc_per_qty,unit_id,pack_unit_id', 'numerical', 'integerOnly'=>true),
			array('code,date,pack_qty', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, code, date,unit_id,calc_per_qty,pack_unit_id,pack_qty', 'safe', 'on'=>'search'),
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
			'Rel_process'=>array(self::HAS_MANY,'ArticleDetails','article_id'),
			'Rel_article_prop'=>array(self::HAS_MANY,'ArticleProperties','article_id'),
			'Rel_unit_id'=>array(self::BELONGS_TO,'ConfigUnits','unit_id'),
			'Rel_pack_unit_id'=>array(self::BELONGS_TO,'ConfigUnits','pack_unit_id'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'code' => 'Code',
			'date' => 'Date',
			'unit_id' => 'Unit',
			'calc_per_qty' => 'Calculation Per Qty',
			'pack_unit_id' => 'Packing Unit',
			'pack_qty' => 'Packing Qty'
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('unit_id',$this->unit_id);
		$criteria->compare('calc_per_qty',$this->calc_per_qty);
		$criteria->order = 'id DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Articles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	protected function beforeSave(){
			if(parent::beforeSave()){
			$this->code = strtoupper(str_replace(' ', '_', $this->name));
				if(isset($_POST['ArticleProperties'])){
				foreach($_POST['ArticleProperties'] as $index => $order_details) {
						$ordermodel = new ArticleProperties;
						$ordermodel->attributes = $order_details;
					//	$ordermodel->item_id = 0;
						if(!$ordermodel->validate()){
							$this->addError('', 'Article Properties Field is Empty or Contains invalid values');
							return false;
						}
						$this->code = $this->code."_".strtoupper(str_replace(' ','_',ConfigPropTypeValues::model()->findByPk($ordermodel->prop_val_id)->name));
				
					}
				}
			if($this->isNewRecord){
			if(Articles::model()->findByAttributes(array('code'=>$this->code)) != null){
					$this->addError('', 'Articles already exist');
					return false;
						
			}	
			}else{
			$itemmodel = Articles::model()->findByAttributes(array('code'=>$this->code));
			if($itemmodel != null){
				if($itemmodel->id != $this->id){
					$this->addError('', 'Articles already exist');
					return false;
				}
			}	
			}	
			}
			return true;
	}
	
	
}
