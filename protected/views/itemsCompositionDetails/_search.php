<?php
/* @var $this ItemsCompositionDetailsController */
/* @var $model ItemsCompositionDetails */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'icd_id'); ?>
		<?php echo $form->textField($model,'icd_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comp_id'); ?>
		<?php echo $form->textField($model,'comp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Item_id'); ?>
		<?php echo $form->textField($model,'Item_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'value'); ?>
		<?php echo $form->textField($model,'value',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->