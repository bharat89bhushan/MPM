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
		<?php echo $form->textField($model,'',array('readonly'=>'true','value'=>$article_detail_model->Rel_article->code)); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'article_detail_id',array('label'=>'Process')); ?>
		<?php echo $form->textField($model,'',array('readonly'=>'true','value'=>$article_detail_model->Rel_process->name)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_id',array('label'=>'Item Type')); ?>
		
   		<?php $category_list=CHtml::listData(ConfigItemTypes::model()->findAll(),'id','name');?>
    	<?php echo $form->dropDownList($model,'type_id',$category_list,array('empty'=>'Select','onChange' => 'js:description(this.value)')); ?>    
    </div> 
	<div class="row">
		<?php echo $form->labelEx($model,'item_id'); ?>
		<?php
			$type_list=CHtml::listData(Items::model()->findAll(),'id','code');
			echo $form->dropDownList($model,'item_id',$type_list,array('empty'=>'--Select--','id'=>'prop_val_id'));
		?>
		<?php echo $form->error($model,'item_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'calc_per_qty'); ?>
		<?php echo $form->labelEx($model,'qty'); ?>
		<?php echo $form->textField($model,'qty',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'qty'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

		<?php
	$buttonToggler_type= <<<JS
	description=function(ind){
	  jQuery.ajax({
                // The url must be appropriate for your configuration;
                // this works with the default config of 1.1.11
                url: 'index.php?r=transfer/transferOrders/dynamicStates',
                type: "POST",
                data: {type_id: ind}, 
                success: function(data){
            		$("#".concat("prop_val_id")).html(data); // deal with data returned
                    }
                });
    };
   
JS;
	Yii::app()->clientScript->registerScript('toggleFormInputs_types',$buttonToggler_type, CClientScript::POS_READY);
	?>
		