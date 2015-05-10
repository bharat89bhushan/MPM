<?php
$this->breadcrumbs=array(
	'backup'=>array('backup'),
	'Upload',
);

$this->menu=array(
	
	array('label'=>'Property Types', 'url'=>array('configPropTypes/admin')),
	array('label'=>'Property Type Values', 'url'=>array('configPropTypeValues/admin')),
);
$this->menu=array(
	array('label'=>'Units', 'url'=>array('/configuration/configUnits/admin')),
	array('label'=>'Process', 'url'=>array('/configuration/configProcess/admin')),
	array('label'=>'Property Types', 'url'=>array('/configuration/configPropTypes/admin')),
	array('label'=>'Property Type Values', 'url'=>array('/configuration/configPropTypeValues/admin')),
	array('label'=>'Clean Data', 'url'=>array('/configuration/default/CleanData')),
//	array('label'=>'Backup & Restore Data', 'url'=>array('/backup/default/upload')),
);

?>
<h1>Backup And Restore</h1>

<div class="form">


<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'install-form',
	'enableAjaxValidation' => true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
));
?>
		<div class="row">
		<?php echo $form->labelEx($model,'upload_file'); ?>
		<?php echo $form->fileField($model,'upload_file'); ?>
		<?php echo $form->error($model,'upload_file'); ?>
		</div><!-- row -->	
<?php
	echo CHtml::submitButton(Yii::t('app', 'Restore'));
	$this->endWidget();
?>
</div><!-- form -->
<br>

<?php echo CHtml::link('Backup All', array('/backup/default/create')); ?>