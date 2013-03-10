<?php
/* @var $this AtributoController */
/* @var $data Atributo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('presion')); ?>:</b>
	<?php echo CHtml::encode($data->presion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('linea_base')); ?>:</b>
	<?php echo CHtml::encode($data->linea_base); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('objeto_conservacion_id')); ?>:</b>
	<?php echo CHtml::encode($data->objeto_conservacion_id); ?>
	<br />


</div>