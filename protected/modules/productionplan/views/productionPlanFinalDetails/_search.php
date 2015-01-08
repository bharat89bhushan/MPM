<?php
/* @var $this ProductionPlanFinalDetailsController */
/* @var $model ProductionPlanFinalDetails */
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
		<?php echo $form->label($model,'plan_id'); ?>
		<?php echo $form->textField($model,'plan_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'quality_id'); ?>
		<?php echo $form->textField($model,'quality_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qty'); ?>
		<?php echo $form->textField($model,'qty',array('size'=>10,'maxlength'=>10)); ?>
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