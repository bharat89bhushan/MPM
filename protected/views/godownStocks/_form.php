<?php
/* @var $this GodownStocksController */
/* @var $model GodownStocks */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'godown-stocks-form',
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
		<?php echo $form->hiddenField($model,'article_id'); 
		 echo $form->textField($model,'article_code',array('readOnly'=>true,'value'=>$model->Rel_article_id->code)); ?>
		<?php echo $form->error($model,'article_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'quality_id'); ?>
		<?php echo $form->hiddenField($model,'quality_id'); 
		echo $form->textField($model,'quality_name',array('readOnly'=>true,'value'=>$model->Rel_quality_id->name));?>
		<?php echo $form->error($model,'quality_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'qty'); ?>
		<?php echo $form->textField($model,'qty',array('readOnly'=>true,'size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'qty'); ?>
	</div>
	
 <div id="Rel_sales_detail" class="row">
        <?php
        $index = 0;
        ?>

    </div>
<?php
    echo CHtml::link('Add Qty', '#', array('id' => 'loadChildByAjax'));
 ?>
	

	<div class="row">
		<?php echo $form->labelEx($model,'sug_unit_name'); ?>
		
		<?php echo $form->textField($model,'sug_unit_name',array('size'=>10,'maxlength'=>10,'readOnly'=>true));//echo $sug_unit_id; echo $sug_unit_name; ?>
		<?php echo $form->textField($model,'sug_qty',array('size'=>10,'maxlength'=>10)); 
	//	echo " ".CHtml::submitButton($model->isNewRecord ? 'Create' : 'Pack'); 
		echo $form->hiddenField($model,'sug_conv');
		echo $form->hiddenField($model,'sug_unit_id');
		?>
		<?php echo $form->error($model,'sug_unit_name'); ?>
	</div>
	<?php echo " ".CHtml::submitButton('Adjust / Pack'); ?>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'unit_id'); ?>
		<?php echo $form->textField($model,'unit_id'); ?>
		<?php echo $form->error($model,'unit_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
-->
<?php $this->endWidget(); ?>

</div><!-- form -->

<?php

Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerScript('loadchild', '
var _index = ' . $index . ';
var _unit = ' . $model->unit_id . ';
$("#loadChildByAjax").click(function(e){
    e.preventDefault();
    var _url = "' . Yii::app()->controller->createUrl("loadChildByAjax", array("load_for" => $this->action->id)) . '&index="+_index+"&unit="+_unit;
    $.ajax({
        url: _url,
        success:function(response){
            $("#Rel_sales_detail").append(response);
         
        }
    });
    _index++;
});
', CClientScript::POS_END);

?>

    <?php
	$buttonToggler_type= <<<JS
	  description=function(ind,index){
	  jQuery.ajax({
                // The url must be appropriate for your configuration;
                // this works with the default config of 1.1.11
                url: 'index.php?r=sales/salesOrders/dynamicStates',
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
		
