<?php
/* @var $this ObjetoConservacionController */
/* @var $model ObjetoConservacion */

$this->breadcrumbs=array(
	'Objeto Conservacions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ObjetoConservacion', 'url'=>array('index')),
	array('label'=>'Create ObjetoConservacion', 'url'=>array('create')),
	array('label'=>'Update ObjetoConservacion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ObjetoConservacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ObjetoConservacion', 'url'=>array('admin')),
);
?>

<h1>View ObjetoConservacion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'beneficiario_id',
	),
)); ?>
