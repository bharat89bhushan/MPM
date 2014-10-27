<?php
/* @var $this ItemsCompositionDetailsController */
/* @var $model ItemsCompositionDetails */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'items-composition-details-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'comp_id'); ?>
		<?php echo $form->textField($model,'comp_id',array('readonly' => true)); ?>
		<?php echo $form->error($model,'comp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Item_id'); ?>
		<?php //echo $form->textField($model,'Item_id'); 
			$type_list=CHtml::listData(Items::model()->findAll(array('condition'=>'org_id='.$model->org_id)),'id','name');
			echo $form->dropDownList($model,'Item_id',$type_list,array('empty'=>'Select Option'));
		?>
		<?php echo $form->error($model,'Item_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model,'value',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
