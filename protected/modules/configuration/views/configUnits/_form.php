<?php
/* @var $this ConfigUnitsController */
/* @var $model ConfigUnits */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'config-units-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sign'); ?>
		<?php echo $form->textField($model,'sign',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'sign'); ?>
	</div>
	<?php
	$buttonToggler_type= <<<JS
    toggleInput_type=function(src){
    if(src==3){
	$("#div_manu").show();
    }
	else{
	$("#div_manu").hide();
	}
    }
	var temp = $('#master_id_lst option:selected').val();
	if(temp == 3)
   	$("#div_manu").show();
   	
    
JS;
	Yii::app()->clientScript->registerScript('toggleFormInputs_types',$buttonToggler_type, CClientScript::POS_READY);
	?>
  
	

	<div class="row">

		<?php echo $form->labelEx($model,'master_id'); ?>
		<?php
		$type_list=CHtml::listData(ConfigMaster::model()->findAll(),'id','name');
		echo $form->dropDownList($model,'master_id',$type_list,array('empty'=>'--Select--'));
		?>
		<?php echo $form->error($model,'master_id'); ?>
	</div>

	<div class="row" id="div_manu" style="display: none">
		<?php
//		$unitdetailmodel;
//		if($model->id)
		 $unitdetailmodel=ConfigUnitDetails::model()->findByAttributes(array('unit_id'=>$model->id));
		if(!$unitdetailmodel)
		 $unitdetailmodel= new ConfigUnitDetails;
		   $this->renderPartial('application.modules.configuration.views.configUnitDetails._tform', array(
                'model' => $unitdetailmodel,
            ));
         ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->