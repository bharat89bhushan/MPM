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
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('readonly'=>'true','size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_id'); ?>
		<?php 
		echo //($model->Rel_item_subtype)?$model->Rel_item_subtype->Rel_item_type->name:"Not Defined"; //$form->textField($model,'type_id'); 
		$form->textField($model,'',array('readonly'=>'true','value'=>($model->Rel_item_type)?$model->Rel_item_type->name:"Not Defined"));
	?>
		<?php echo $form->error($model,'type_id'); ?>
	</div>

	<!--
	<div class="row">
		<?php echo $form->labelEx($model,'sub_type_id'); ?>
		<?php 
		echo// ($model->Rel_item_subtype)?$model->Rel_item_subtype->name:"Not Defined"; 
		$form->textField($model,'',array('readonly'=>'true','value'=>($model->Rel_item_subtype)?$model->Rel_item_subtype->name:"Not Defined")); 
	
	?>
		<?php echo $form->error($model,'sub_type_id'); ?>
	</div>
	
	
	<div class="row">
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
		echo ($model->is_manufactured)?"Yes":"No";
		//echo $form->textField($model,'is_manufactured');
		//	echo $form->checkBox($model,'is_manufactured',array('value' => '1', 'uncheckValue'=>'0','onchange'=>'js:toggleInput(this,"ModelName[org_id]")'));
		?>
		<?php echo $form->error($model,'is_manufactured'); ?>
	</div>

	<div class="row" id="div_org">
		<?php echo $form->labelEx($model,'org_id'); ?>
		<?php 
		$type_list;
		if($model->is_manufactured)
		$type_list=CHtml::listData(Clients::model()->findAll(),'id','name');
		else
		$type_list = array("0"=>"NA");
		echo //$form->textField($model,'org_id'); 
		
		$form->dropDownList($model,'org_id',$type_list,array());
	?>
		<?php echo $form->error($model,'org_id'); ?>
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
	

<?php
   // echo CHtml::link('Add Properties', '#', array('id' => 'loadChildByAjax'));
    ?>
    <!--
 <div id="Rel_item_prop">
        <?php
       /* $index = 0;
        foreach ($model->Rel_item_prop as $id => $child):
            $this->renderPartial('application.views.itemProperties._form', array(
                'model' => $child,
                'index' => $id,
                'display' => 'block'
            ));
            $index++;
        endforeach;*/
        ?>
    </div>

-->

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
/*
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
*/
?>
