<?php
/* @var $this ArticlesController */
/* @var $model Articles */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'articles-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>
-->
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'unit_id'); ?>
		<?php 
		$type_list=CHtml::listData(ConfigUnits::model()->findAll('master_id=2'),'id','name');
		echo //$form->textField($model,'unit_type'); 
			
			$form->dropDownList($model,'unit_id',$type_list,array('empty'=>'Select Option'));
	?>
		<?php echo $form->error($model,'unit_id'); ?>
	</div>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'calc_per_qty'); ?>
		<?php echo $form->textField($model,'calc_per_qty'); ?>
		<?php echo $form->error($model,'calc_per_qty'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'pack_unit_id'); ?>
		<?php 
		$type_list=CHtml::listData(ConfigUnits::model()->findAll('master_id=3'),'id','name');
		echo //$form->textField($model,'unit_type'); 
			
			$form->dropDownList($model,'pack_unit_id',$type_list,array('empty'=>'Select Option'));
	?>
		<?php echo $form->error($model,'pack_unit_id'); ?>
	</div>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'pack_qty'); ?>
		<?php echo $form->textField($model,'pack_qty'); ?>
		<?php echo $form->error($model,'pack_qty'); ?>
	</div>
	

<!--
	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>
	-->
 <div id="Rel_article_prop">
        <?php
        $index = 0;
        foreach ($model->Rel_article_prop as $id => $child):
        	$child->type_id = $child->Rel_prop_val->prop_type_id;
            $this->renderPartial('application.modules.article.views.articles._tform', array(
                'model' => $child,
                'index' => $id,
                'notsure'=>$child->type_id,
                'display' => 'block'
            ));
            $index++;
        endforeach;
        
        ?>
    </div>

<?php
    echo CHtml::link('Add Properties', '#', array('id' => 'loadChildByAjax'));
    ?>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

		<?php
	$buttonToggler_type= <<<JS
    description=function(ind,index){
	  jQuery.ajax({
                // The url must be appropriate for your configuration;
                // this works with the default config of 1.1.11
                url: 'index.php?r=itemProperties/dynamicStates',
                type: "POST",
                data: {type_id: ind}, 
                success: function(data){
            		$("#".concat(index,"prop_val_id")).html(data); // deal with data returned
                    }
                });
    };
    deleteChild=function(elm){
    var element=$(elm).parent().parent();
     element.remove();
    }
JS;
	Yii::app()->clientScript->registerScript('toggleFormInputs_types',$buttonToggler_type, CClientScript::POS_READY);
	?>
		
<?php

Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerScript('loadchild', '
var _index = ' . $index . ';
$("#loadChildByAjax").click(function(e){
    e.preventDefault();
    var _url = "' . Yii::app()->controller->createUrl("loadChildByAjax", array("load_for" => $this->action->id)) . '&index="+_index;
    $.ajax({
        url: _url,
        success:function(response){
            $("#Rel_article_prop").append(response);
         
        }
    });
    _index++;
});
', CClientScript::POS_END);

?>
