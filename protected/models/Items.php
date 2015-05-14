<?php

/**
 * This is the model class for table "items".
 *
 * The followings are the available columns in table 'items':
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property integer $type_id
 * @property integer $unit_type
 * @property integer $created_by
 * @property string $date
 * @property string $qty
 */
class Items extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $size_prop_val_id;
	public $color_prop_val_id;
	
	
	public function tableName()
	{
		return 'items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
	//		array('code, name, type_id, unit_type,size_prop_val_id,color_prop_val_id', 'required'),
			array('name, type_id, unit_type', 'required'),
			array('type_id, unit_type', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>30),
			array('code', 'length', 'max'=>50),
	//		array('code','unique'),
	
			array('date,size_prop_val_id,color_prop_val_id,qty', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, code, name, type_id, unit_type, created_by,qty', 'safe', 'on'=>'search'),
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
			'Rel_item_type'=>array(self::BELONGS_TO,'ConfigItemTypes','type_id'),
			'Rel_created_by'=>array(self::BELONGS_TO,'Users','created_by'),
			'Rel_unit_type'=>array(self::BELONGS_TO,'ConfigUnits','unit_type'),
			'Rel_item_prop'=>array(self::HAS_MANY,'ItemProperties','item_id'),
			'Rel_item_party_stock'=>array(self::HAS_MANY,'PartyItemStock','item_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'code' => 'Code',
			'name' => 'Name',
			'type_id' => 'Type',
			'unit_type' => 'Unit Type',
			'created_by' => 'Created By',
			'date' => 'Date',
			'size_prop_val_id' => 'Size',
			'color_prop_val_id' => 'Colour',
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

		$criteria->with=array('Rel_item_type');

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.code',$this->code,true);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('Rel_item_type.name',$this->type_id);
		$criteria->compare('unit_type',$this->unit_type);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('qty',$this->qty,true);
		$criteria->order = 't.code';
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Items the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getPropValSize($id)
	{
		 $text = 'Not Defined';

	$ItemProps = ItemProperties::model()->findAll('item_id='.$id);
	  foreach($ItemProps as $ItemProp)
        {
            if($ItemProp->Rel_prop_val->Rel_prop_type->name == 'Size') 
               $text = $ItemProp->Rel_prop_val->name;
           //    $text = 'no';
           
        }
	  return $text;    
	}
	public function getPropValColour($id)
	{
		 $text = 'Not Defined';
		$ItemProps = ItemProperties::model()->findAll('item_id='.$id);
	  foreach($ItemProps as $ItemProp)
        {
            if($ItemProp->Rel_prop_val->Rel_prop_type->name == 'Colour') 
               $text = $ItemProp->Rel_prop_val->name;
           
        }
	  return $text;    
	}
	
	protected function beforeSave(){
			if(parent::beforeSave()){
			$typemodel = ConfigItemTypes::model()->findByPk($this->type_id);
			$this->code = strtoupper($typemodel->name)."_".strtoupper(str_replace(' ', '_', $this->name));
			
				if(isset($_POST['ItemProperties'])){
				foreach($_POST['ItemProperties'] as $index => $order_details) {
						$ordermodel = new ItemProperties;
						$ordermodel->attributes = $order_details;
					//	$ordermodel->item_id = 0;
						if(!$ordermodel->validate()){
							$this->addError('', 'Item Properties Field is Empty or Contains invalid values');
							return false;
						}
						$this->code = $this->code."_".strtoupper(str_replace(' ','_',ConfigPropTypeValues::model()->findByPk($ordermodel->prop_val_id)->name));
				
					}
				}
			if($this->isNewRecord){
			if(Items::model()->findByAttributes(array('code'=>$this->code)) != null){
					$this->addError('', 'Item already exist');
					return false;
						
			}	
			}else{
			$itemmodel = Items::model()->findByAttributes(array('code'=>$this->code));
			if($itemmodel != null){
				if($itemmodel->id != $this->id){
					$this->addError('', 'Item already exist');
					return false;
				}
			}	
			}
				
			}
			return true;
	}
	
}
