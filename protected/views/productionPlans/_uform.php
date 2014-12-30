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
		<?php echo $form->labelEx($model,'article_id'); ?>
		<?php //echo $form->textField($model,'item_id'); 
		$type_list=CHtml::listData(Articles::model()->findAll(),'id','code');
			echo $form->dropDownList($model,'article_id',$type_list); ?>
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
	
 <div id="Rel_production_plan_final_t" class="row">
        <?php
        $index = 0;
        foreach ($model->Rel_production_plan_final as $child):
            $this->renderPartial('application.views.productionPlanFinalDetails._tform', array(
                'model' => $child,
                'index' => $index,
         //       'display' => 'block'
            ));
            $index++;
        endforeach;
      
        ?>
    </div>
 <div  id="Rel_production_plan_final" class="row">
 	
 </div>
<div class="row" id="div_manu">
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
