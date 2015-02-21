<div id="div-1">
<div class="row">
        <?php if(!intval($index)){echo CHtml::activeLabelEx($model, '[' . $index . ']quality_id'); }?>
        <?php// echo CHtml::error($model, '[' . $index . ']item_id'); ?>
    </div>
 
    <div class="row">
    	<?php $type_list=CHtml::listData(ConfigQualityTypes::model()->findAll(),'id','name');?>
        <?php echo CHtml::activeDropDownList($model, '[' . $index . ']quality_id',$type_list,array('empty'=>'Select')); ?>    
        <?php echo CHtml::activeTextField($model, '[' . $index . ']qty',array('placeholder'=>'Qty')); ?>
        <?php echo CHtml::link('Delete', '#', array('onclick' => 'deleteChild(this); return false;'));?>
        <?php// echo CHtml::error($model, '[' . $index . ']qty'); ?>
    </div>
</div>
    