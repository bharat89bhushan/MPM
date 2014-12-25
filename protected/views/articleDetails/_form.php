<?php
/* @var $this ArticleDetailsController */
/* @var $model ArticleDetails */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-details-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'article_id'); ?>
		<?php echo $form->hiddenField($model,'article_id')?>
		<?php echo $form->textField($model,'',array('value'=>Articles::model()->findByPk($model->article_id)->code));
				// $form->textField($model,'article_id'); 
				echo $model->article_id; ?>
		<?php echo $form->error($model,'article_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'process_id'); ?>
		<?php //echo $form->textField($model,'process_id'); ?>
		<?php
			$type_list=CHtml::listData(ConfigProcess::model()->findAll(),'id','name');
		echo $form->dropDownList($model,'process_id',$type_list,array('empty'=>'--Select--'));
		?>
		<?php echo $form->error($model,'process_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->