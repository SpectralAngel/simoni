<?php
/* @var $this BeneficiarioController */
/* @var $model Beneficiario */

$this->breadcrumbs=array(
	'Beneficiarios'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Beneficiario', 'url'=>array('index')),
	array('label'=>'Create Beneficiario', 'url'=>array('create')),
	array('label'=>'Update Beneficiario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Beneficiario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Beneficiario', 'url'=>array('admin')),
);
?>

<h1>View Beneficiario #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'dimension_id',
	),
)); ?>
