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
<?php
	$buttonToggler_type= <<<JS
    toggleInput_type=function(src){
    if(src==1){
	$("#div_manu").hide();
    }
	else{
	$("#div_manu").show();
	}
    }
    var temp = $('#status_lst option:selected').val();
	if(temp != 1)
   	$("#div_manu").show();
   	deleteChild=function(elm){
    var element=$(elm).parent().parent();
     element.remove();
    }
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
	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',array(0=>'Completed',1=>'InProgress'),array('onchange'=>'js:toggleInput_type(this.selectedIndex)','id'=>'status_lst')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
	<!--
	<div class="row" style="display: none">
		<?php echo $form->labelEx($model,'qty'); ?>
		<?php echo $form->textField($model,'qty',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'qty'); ?>
	</div>
	-->
	
 <div id="Rel_production_plan_final" class="row">
        <?php
        $index = 0;
        foreach ($model->Rel_production_plan_final as $child):
            $this->renderPartial('application.modules.productionplan.views.productionPlanFinalDetails._tform', array(
                'model' => $child,
                'index' => $index,
         //       'display' => 'block'
            ));
            $index++;
        endforeach;
      
        ?>
    </div>

<div class="row" id="div_manu" style="display: none">
	  <?php echo CHtml::link('Add Item', '#', array('id' => 'loadChildByAjax'));?>
</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
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
            $("#Rel_production_plan_final").append(response);
         
        }
    });
    _index++;
});
', CClientScript::POS_END);
?>

</div>
	
