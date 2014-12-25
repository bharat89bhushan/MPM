<?php
/* @var $this ProductionPlanDetailsController */
/* @var $model ProductionPlanDetails */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'production_plan_id'); ?>
		<?php echo $form->textField($model,'production_plan_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'article_detail_id'); ?>
		<?php echo $form->textField($model,'article_detail_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->