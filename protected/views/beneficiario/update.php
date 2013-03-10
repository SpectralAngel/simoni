<?php
/* @var $this BeneficiarioController */
/* @var $model Beneficiario */

$this->breadcrumbs=array(
	'Beneficiarios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Beneficiario', 'url'=>array('index')),
	array('label'=>'Create Beneficiario', 'url'=>array('create')),
	array('label'=>'View Beneficiario', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Beneficiario', 'url'=>array('admin')),
);
?>

<h1>Update Beneficiario <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>