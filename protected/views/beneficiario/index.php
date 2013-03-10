<?php
/* @var $this BeneficiarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Beneficiarios',
);

$this->menu=array(
	array('label'=>'Create Beneficiario', 'url'=>array('create')),
	array('label'=>'Manage Beneficiario', 'url'=>array('admin')),
);
?>

<h1>Beneficiarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
