<?php
/* @var $this PlanItemStockRelationsController */
/* @var $model PlanItemStockRelations */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'plan-item-stock-relations-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'plan_id'); ?>
		<?php echo $form->textField($model,'plan_id',array('readonly' => true)); ?>
		<?php echo $form->error($model,'plan_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item_id'); ?>
		<?php $form->hiddenField($model,'item_id');
			$type_list=CHtml::listData(Items::model()->findAll(),'id','code');
			echo $form->dropDownList($model,'item_id',$type_list,array('empty'=>'Select Item',"disabled"=>"disabled"));
			?>
		<?php echo $form->error($model,'item_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value',array('label' => 'Add Qty')); ?>
		<?php echo $form->textField($model,'value',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->