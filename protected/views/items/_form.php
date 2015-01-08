<?php
/* @var $this ItemsController */
/* @var $model Items */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'items-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		
		<?php
	$buttonToggler_type= <<<JS
    toggleInput_type=function(src){
    if(src==1 || src ==0)
	$("#div_manu").hide();
	else
	$("#div_manu").show();
	
    };
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
		
		
		<?php echo $form->labelEx($model,'type_id'); ?>
		<?php 
			$type_list=CHtml::listData(ConfigItemTypes::model()->findAll(),'id','name');
		echo //$form->textField($model,'type_id'); 
	
		$form->dropDownList($model,'type_id',$type_list,array('empty'=>'Select Type'));
	/*			$form->dropDownList($model,'type_id',$type_list,array('empty'=>'Select Type','onchange'=>'js:toggleInput_type(this.selectedIndex)',
				'ajax' => array(
                        'type'=>'POST',
                        'url'=>CController::createUrl('items/dynamicStates'),
                        'update'=>'#'.CHtml::activeId($model,'sub_type_id'),
       ) ));
       */
	?>
		<?php echo $form->error($model,'type_id'); ?>
	</div>

<!--
		<div class="row">
		<?php /*echo $form->labelEx($model,'sub_type_id'); ?>
		<?php 
	//		$type_list=CHtml::listData(ConfigItemTypes::model()->findAll(),'id','name');
		echo //$form->textField($model,'type_id'); 
	
			$form->dropDownList($model,'sub_type_id',array(),array('empty'=>'Select','onchange'=>"($(this).find('option:selected').val())?$('#codearea').val($(this).find('option:selected').text().toUpperCase()+'_'):$('#codearea').val('');",
	//		$form->dropDownList($model,'sub_type_id',array(),array('empty'=>'Selec','onchange'=>"javascript:$('#codearea').val($(#".CHtml::activeId($model,'sub_type_id').").find('option:selected').text())",
				)
			);
	?>
		<?php echo $form->error($model,'sub_type_id'); ?>
	</div>
	
	<div class="row" id="div_manu" style="display: none">
	<?php
	$buttonToggler= <<<JS
    toggleInput=function(src,inputName){
    if(src.checked)
	$("#div_org").show();
	else
	$("#div_org").hide();
	
    }
JS;
	Yii::app()->clientScript->registerScript('toggleFormInputs',$buttonToggler, CClientScript::POS_READY);
	?>
		<?php echo $form->labelEx($model,'is_manufactured'); 
		//echo $form->textField($model,'is_manufactured');
			echo $form->checkBox($model,'is_manufactured',array('value' => '1', 'uncheckValue'=>'0','onchange'=>'js:toggleInput(this,"ModelName[org_id]")'));?>
		<?php echo $form->error($model,'is_manufactured'); ?>
	</div>

	<div class="row" id="div_org" style="display: none">
		<?php echo $form->labelEx($model,'org_id'); ?>
		<?php 
		$type_list=CHtml::listData(Clients::model()->findAll(),'id','name');
		echo //$form->textField($model,'org_id'); 
		
			$form->dropDownList($model,'org_id',$type_list,array('empty'=>'Select Option'));
	?>
		<?php echo $form->error($model,'org_id'); */?>
	</div>


	-->
	
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>30,//'onKeyUp'=>"$('#codearea').val($(this).val()+$('#sub_text_id').text());",
				'ajax' => array(
                        'type'=>'POST',
                        'url'=>CController::createUrl('items/setCode'),
                   //     'update'=>'#'.CHtml::activeId($model,'code'),
                        'update'=>'#code',
       ) 
		
		)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

<!--
	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<div id="code-div">
		<?php echo $form->textField($model,'code',array('id'=>'codearea','size'=>30,'maxlength'=>30)); ?>
		</div>
		<?php echo $form->error($model,'code'); ?>
	</div>

-->	

	<div class="row">
		<?php echo $form->labelEx($model,'unit_type'); ?>
		<?php 
		$type_list=CHtml::listData(ConfigUnits::model()->findAll('master_id=1'),'id','name');
		echo //$form->textField($model,'unit_type'); 
			
			$form->dropDownList($model,'unit_type',$type_list,array('empty'=>'Select Option'));
	?>
		<?php echo $form->error($model,'unit_type'); ?>
	</div>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'size_prop_val_id'); ?>
		<?php 
		$type_list=CHtml::listData(ConfigPropTypeValues::model()->findAll('prop_type_id=2'),'id','name');
		//	$type_list=CHtml::listData(ConfigPropTypeValues::model()->findAll(),'id','name');
		echo// $form->textField($model,'size_prop_val_id'); 
		$form->dropDownList($model,'size_prop_val_id',$type_list,array('empty'=>'Select Option'));
	?>
		<?php echo $form->error($model,'size_prop_val_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'color_prop_val_id'); ?>
		<?php 
		$type_list=CHtml::listData(ConfigPropTypeValues::model()->findAll('prop_type_id=1'),'id','name');
		//	$type_list=CHtml::listData(ConfigPropTypeValues::model()->findAll(),'id','name');
		echo// $form->textField($model,'size_prop_val_id'); 
		$form->dropDownList($model,'color_prop_val_id',$type_list,array('empty'=>'Select Option'));
	?>
		<?php echo $form->error($model,'color_prop_val_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'qty'); ?>
		<div id="code-div">
		<?php echo $form->textField($model,'qty'); ?>
		</div>
		<?php echo $form->error($model,'qty'); ?>
	</div>
-->
	
 <div id="Rel_item_prop">
        <?php
        $index = 0;
        foreach ($model->Rel_item_prop as $id => $child):
        	$child->type_id = $child->Rel_prop_val->prop_type_id;
            $this->renderPartial('application.views.itemProperties._tform', array(
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
   

<!--
	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>
-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

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
            $("#Rel_item_prop").append(response);
         
        }
    });
    _index++;
});
', CClientScript::POS_END);

?>
