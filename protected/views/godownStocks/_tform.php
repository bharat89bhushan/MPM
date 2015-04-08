<div id="div-1">
<div class="row">
        <?php if(!intval($index)){echo CHtml::activeLabelEx($model, '[' . $index . ']article_id'); }?>
        <?php// echo CHtml::error($model, '[' . $index . ']item_id'); ?>
    </div>
 
    <div class="row">
        <?php $category_list=CHtml::listData(ArticleGroups::model()->findAll(),'id','name');?>
        <?php $tindex = $index;?>
        <?php echo CHtml::activeDropDownList($model, '[' . $index . ']group_id',$category_list,array('empty'=>'Select','onChange' => 'js:description(this.value,'.$tindex.')')); ?>    
        
    	<?php $type_list=CHtml::listData(Articles::model()->findAll(),'id','code');?>
        <?php echo CHtml::activeDropDownList($model, '[' . $index . ']article_id',$type_list,array('empty'=>'Select','id'=>$index .'prop_val_id')); ?>    
        
        <?php $quality_list=CHtml::listData(ConfigQualityTypes::model()->findAll(),'id','name');?>
        <?php echo CHtml::activeDropDownList($model, '[' . $index . ']quality_id',$quality_list,array('empty'=>'Select')); ?>    
        
        <?php echo CHtml::activeHiddenField($model,'[' . $index . ']unit_id',array('readOnly'=>true,'value'=>$unit,'size'=>10)); ?>
        <?php echo ConfigUnits::model()->findByPk($unit)->name;?>
    
        
        <?php echo CHtml::activeTextField($model, '[' . $index . ']qty',array('placeholder'=>'Qty','size'=>10)); ?>
        <?php echo CHtml::link('Delete', '#', array('onclick' => 'deleteChild(this, ' . $index . '); return false;'));?>
        <?php// echo CHtml::error($model, '[' . $index . ']qty'); ?>
    </div>
</div>