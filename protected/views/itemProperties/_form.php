<?php
/* @var $this ItemPropertiesController */
/* @var $model ItemProperties */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'item-properties-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	
)); ?>

<!--	<p class="note">Fields with <span class="required">*</span> are required.</p>
-->

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'item_id'); 
		$type_list=CHtml::listData(ConfigPropTypes::model()->findAll(),'id','name');
		?>
		<?php echo// $form->textField($model,'type_id');
		//$form->dropDownList($model,'type_id',$type_list,array('empty'=>'Select Option','options' => array(($model->prop_val_id)?$model->Rel_prop_val->Rel_prop_type->id:0=>array('selected'=>true))));
		);
	
		?>
		
		
		<?php echo $form->error($model,'type_id'); ?>
		
		<?php //echo $form->labelEx($model,'prop_val_id');
	//	$val_list=CHtml::listData(ConfigPropTypeValues::model()->findAll('prop_type_id='.$model->Rel_prop_val->Rel_prop_type->id),'id','name');
		?>
		
		<?php echo// $form->textField($model,'prop_val_id');
//			$form->dropDownList($model,'prop_val_id',$val_list,array('empty'=>'Select Option'));
//	$form->dropDownList($model,'prop_val_id',array(),array('empty'=>'Select Option'));
		?>
		<?php echo $form->error($model,'prop_val_id'); ?>
		
	</div>
<!--
	<div class="row">
	
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
-->
<?php $this->endWidget(); ?>

</div><!-- form -->