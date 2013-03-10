<?php
/* @var $this AtributoController */
/* @var $model Atributo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'atributo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'presion'); ?>
		<?php echo $form->textField($model,'presion',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'presion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'linea_base'); ?>
		<?php echo $form->checkBox($model,'linea_base'); ?>
		<?php echo $form->error($model,'linea_base'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'objeto_conservacion_id'); ?>
		<?php echo $form->textField($model,'objeto_conservacion_id'); ?>
		<?php echo $form->error($model,'objeto_conservacion_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->