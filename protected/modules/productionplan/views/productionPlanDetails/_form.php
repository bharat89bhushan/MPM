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
		<?php echo $form->textField($model,'production_plan_id',array('readOnly'=>true)); ?>
		<?php echo $form->error($model,'production_plan_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'article_detail_id'); ?>
			<?php  
		$type_list=CHtml::listData(ArticleDetails::model()->findAll(array('condition'=>"article_id =$model->tmp_article_id")),'id','Rel_process.name');
			echo $form->dropDownList($model,'article_detail_id',$type_list); ?>
	
		<?php echo $form->error($model,'article_detail_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'party_id'); ?>
			<?php  
		$party_list=CHtml::listData(Parties::model()->findAll(),'id','name');
			echo $form->dropDownList($model,'party_id',$party_list,array('empty'=>'Self')); ?>
	
		<?php echo $form->error($model,'party_id'); ?>
	</div>
<!--
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