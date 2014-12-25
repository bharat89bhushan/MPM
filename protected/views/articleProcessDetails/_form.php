<?php
/* @var $this ArticleProcessDetailsController */
/* @var $model ArticleProcessDetails */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-process-details-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->hiddenField($model,'article_detail_id'); ?>
		<?php echo $form->error($model,'article_detail_id'); ?>
	</div>

	<div class="row">
		<?php $article_detail_model = ArticleDetails::model()->findByPk($model->article_detail_id);?>
		<?php echo $form->labelEx($model,'article_detail_id',array('label'=>'Article')); ?>
		<?php echo $form->textField($model,'',array('value'=>$article_detail_model->Rel_article->code)); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'article_detail_id',array('label'=>'Process')); ?>
		<?php echo $form->textField($model,'',array('value'=>$article_detail_model->Rel_process->name)); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'item_id'); ?>
		<?php
			$type_list=CHtml::listData(Items::model()->findAll(),'id','name');
		echo $form->dropDownList($model,'item_id',$type_list,array('empty'=>'--Select--'));
		?>
		<?php echo $form->error($model,'item_id'); ?>
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