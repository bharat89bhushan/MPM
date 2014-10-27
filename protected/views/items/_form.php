<?php
/* @var $this ItemsController */
/* @var $model Items */
/* @var $form CActiveForm */
?>
<script type="text/javascript">
function clickedVal(){
        $('#MODELNAME_org_id').toggle();
}
	
</script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'items-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_id'); ?>
		<?php echo //$form->textField($model,'type_id'); 
			$form->dropDownList($model,'type_id',array(''=>'Select Type','1'=>'Raw','2'=>'Semi'));?>
		<?php echo $form->error($model,'type_id'); ?>
	</div>

	<div class="row">
	<?php
	$buttonToggler= <<<JS
    toggleInput=function(src,inputName){
	$("#div_org").toggle();
    }
JS;
Yii::app()->clientScript->registerScript('toggleFormInputs',$buttonToggler, CClientScript::POS_READY);
?>
		<?php echo $form->labelEx($model,'is_manufactured'); 
		//echo $form->textField($model,'is_manufactured');
			echo $form->checkBox($model,'is_manufactured',array('value' => '1', 'uncheckValue'=>'0','onchange'=>'js:toggleInput(this,"ModelName[org_id]")'));?>
		<?php echo $form->error($model,'is_manufactured'); ?>
	</div>

	<div class="row" id="div_org" style="display: none">
		<?php echo $form->labelEx($model,'org_id'); ?>
		<?php echo //$form->textField($model,'org_id'); 
			$form->dropDownList($model,'org_id',array('0'=>'--Self--','1'=>'JK Trader','2'=>'Balaji'));?>
		<?php echo $form->error($model,'org_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unit_type'); ?>
		<?php echo //$form->textField($model,'unit_type'); 
			$form->dropDownList($model,'unit_type',array(''=>'Select Unit','1'=>'Pcs','2'=>'Gms'));?>
		<?php echo $form->error($model,'unit_type'); ?>
	</div>

<!--
	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>
-->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
