<?php
/* @var $this PartyItemStockController */
/* @var $model PartyItemStock */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'party-item-stock-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'item_id'); ?>
		<?php echo $form->textField($model,'item_id',array('readOnly'=>'true')); ?>
		<?php echo $form->error($model,'item_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'party_id'); ?>
		<?php echo $form->hiddenField($model,'party_id'); 
		$type_list=CHtml::listData(Parties::model()->findAll(),'id','name');
		echo $form->dropDownList($model,'party_id',$type_list,array('empty'=>'Select Party',"disabled"=>"disabled"));
	?>
		<?php echo $form->error($model,'party_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'qty'); ?>
		<?php echo $form->textField($model,'qty',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'qty'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->