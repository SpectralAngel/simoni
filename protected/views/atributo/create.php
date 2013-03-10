<?php
/* @var $this AtributoController */
/* @var $model Atributo */

$this->breadcrumbs=array(
	'Atributos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Atributo', 'url'=>array('index')),
	array('label'=>'Manage Atributo', 'url'=>array('admin')),
);
?>

<h1>Create Atributo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>