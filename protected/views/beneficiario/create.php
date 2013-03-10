<?php
/* @var $this BeneficiarioController */
/* @var $model Beneficiario */

$this->breadcrumbs=array(
	'Beneficiarios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Beneficiario', 'url'=>array('index')),
	array('label'=>'Manage Beneficiario', 'url'=>array('admin')),
);
?>

<h1>Create Beneficiario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>