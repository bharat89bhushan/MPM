<div id="div-1">
<div class="row">
        <?php if(!intval($index)){echo CHtml::activeLabelEx($model, '[' . $index . ']item_id'); }?>
        <?php// echo CHtml::error($model, '[' . $index . ']item_id'); ?>
    </div>
 
    <div class="row">
        
       <?php $category_list=CHtml::listData(ConfigItemTypes::model()->findAll(),'id','name');?>
        <?php $tindex = $index;?>
        <?php echo CHtml::activeDropDownList($model, '[' . $index . ']type_id',$category_list,array('empty'=>'Select','onChange' => 'js:description(this.value,'.$tindex.')')); ?>    
        
    	<?php $type_list=CHtml::listData(Items::model()->findAll(),'id','code');?>
        <?php echo CHtml::activeDropDownList($model, '[' . $index . ']item_id',$type_list,array('empty'=>'Select','id'=>$index .'prop_val_id')); ?>    
        <?php echo CHtml::activeTextField($model, '[' . $index . ']qty',array('placeholder'=>'Qty')); ?>
        <?php echo CHtml::link('Delete', '#', array('onclick' => 'deleteChild(this, ' . $index . '); return false;'));?>
        <?php// echo CHtml::error($model, '[' . $index . ']qty'); ?>
    </div>
</div>
    <?php
    /*
    Yii::app()->clientScript->registerScript('deleteChild', "
function deleteChild(elm, index)
{
   var element=$(elm).parent();
     $(#div-1).remove();
    
}", CClientScript::POS_END);
    */?>