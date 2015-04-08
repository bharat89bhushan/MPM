<?php
/* @var $this ProductionPlansController */
/* @var $model ProductionPlans */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'production-plans-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php //echo $form->textField($model,'item_id'); 
		$type_list=CHtml::listData(ArticleGroups::model()->findAll(),'id','name');
			echo $form->dropDownList($model,'category_id',$type_list,array('empty'=>'Select','onChange' => 'js:description(this.value)')); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'article_id'); ?>
		<?php //echo $form->textField($model,'item_id'); 
		$type_list=CHtml::listData(Articles::model()->findAll(),'id','code');
			echo $form->dropDownList($model,'article_id',$type_list,array('empty'=>'Select','id'=>'prop_val_id')); ?>
		<?php echo $form->error($model,'article_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model,'value',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

<!--	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
-->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>


<?php
	$buttonToggler_type= <<<JS
	  description=function(ind){
	  jQuery.ajax({
                // The url must be appropriate for your configuration;
                // this works with the default config of 1.1.11
                url: 'index.php?r=sales/salesOrders/dynamicStates',
                type: "POST",
                data: {type_id: ind}, 
                success: function(data){
            		$("#prop_val_id").html(data); // deal with data returned
                    }
                });
    };
JS;
	Yii::app()->clientScript->registerScript('toggleFormInputs_types',$buttonToggler_type, CClientScript::POS_READY);
	?>
		


</div><!-- form -->