<?php
/* @var $this ProductionPlanDetailsController */
/* @var $model ProductionPlanDetails */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'production-plan-details-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'production_plan_id'); ?>
		<?php echo $form->textField($model,'production_plan_id',array('readOnly'=>'true')); ?>
		<?php echo $form->error($model,'production_plan_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'article_detail_id'); ?>
			<?php  echo $form->hiddenField($model,'article_detail_id');
			$type_list=CHtml::listData(ArticleDetails::model()->findAll(array('condition'=>"article_id =$model->tmp_article_id")),'id','Rel_process.name');
			echo $form->dropDownList($model,'article_detail_id',$type_list,array('disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'article_detail_id'); ?>
	</div>
	<?php echo $form->hiddenField($model,'val');?>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>
-->
	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',array(0=>'Completed',1=>'InProgress')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->