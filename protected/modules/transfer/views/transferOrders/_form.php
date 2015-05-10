<?php
/* @var $this TransferOrdersController */
/* @var $model TransferOrders */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'transfer-orders-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'party_id'); ?>
		<?php
		$type_list=CHtml::listData(Parties::model()->findAll(),'id','name');
		echo $form->dropDownList($model,'party_id',$type_list,array('empty'=>'--Select--'));
		?>
		<?php echo $form->error($model,'party_id'); ?>
	</div>
	<!--
	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>
-->


 <div id="Rel_transfer_detail" class="row">
        <?php
        $index = 0;
        foreach ($model->Rel_transfer_detail as $id => $child):
            $child->type_id = $child->Rel_item_id->type_id;
            $this->renderPartial('application.modules.transfer.views.transferOrders._tform', array(
                'model' => $child,
                'index' => $id,
                'display' => 'block'
            ));
            $index++;
        endforeach;
        ?>

    </div>
    

    <?php
    echo CHtml::link('Add Item', '#', array('id' => 'loadChildByAjax'));
//    echo CHtml::link('Add', array('purchaseOrderDetails/create','article_detail_id'=>$model->id));
    ?>
    


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
            $("#Rel_transfer_detail").append(response);
         
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
                url: 'index.php?r=transfer/transferOrders/dynamicStates',
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
		
