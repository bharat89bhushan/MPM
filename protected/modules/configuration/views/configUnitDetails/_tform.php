<div id="div-1">
<div class="row">
        <?php echo CHtml::activeLabelEx($model, 'sub_unit_id'); ?>
    </div>
 
    <div class="row">
    	<?php $type_list=CHtml::listData(ConfigUnits::model()->findAll('master_id!=3'),'id','name');?>
        <?php echo CHtml::activeDropDownList($model, 'sub_unit_id',$type_list,array('empty'=>'Select')); ?>    
        <?php echo CHtml::activeTextField($model, 'qty',array('placeholder'=>'Qty')); ?>
    </div>
</div>
    