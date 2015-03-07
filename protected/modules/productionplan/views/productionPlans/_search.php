<?php
/* @var $this ProductionPlansController */
/* @var $model ProductionPlans */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'article_id'); ?>
	<?php		$type_list=CHtml::listData(Articles::model()->findAll(),'id','code');
			echo $form->dropDownList($model,'article_id',$type_list,array('empty'=>'--Select--')); 
	?>
	
	</div>

	<div class="row">
		<?php echo $form->label($model,'value'); ?>
		<?php echo $form->textField($model,'value',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>
	
	
<div class="row">
<b>From :</b>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
//    'name'=>'from_date',  // name of post parameter
     'attribute' => 'from_date',
 //   'value'=>Yii::app()->request->cookies['from_date'],  // value comes from cookie after submittion
     'options'=>array(
        'showAnim'=>'fold',
        'dateFormat'=>'yy-mm-dd',
    ),
));

?>
<b>To :</b>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
//    'name'=>'to_date',
    'attribute' => 'to_date',
 //   'value'=>Yii::app()->request->cookies['to_date'],
     'options'=>array(
        'showAnim'=>'fold',
        'dateFormat'=>'yy-mm-dd',
    ),
));
?>
</div>



	
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->