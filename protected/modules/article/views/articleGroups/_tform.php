<div id="div-1">

    <div class="row">
        
    	<?php $type_list=CHtml::listData(ConfigProcess::model()->findAll(),'id','name');?>
        <?php echo CHtml::activeDropDownList($model, '[' . $index . ']process_id',$type_list,array('empty'=>'Select' )); ?>    
       	<?php echo CHtml::link('Delete', '#', array('onclick' => 'deleteChild(this,'.$index.'); return false;'));?>
        </div>
</div>