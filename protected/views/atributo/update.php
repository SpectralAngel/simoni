<?php
/* @var $this AtributoController */
/* @var $model Atributo */

$this->breadcrumbs=array(
	'Atributos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Atributo', 'url'=>array('index')),
	array('label'=>'Create Atributo', 'url'=>array('create')),
	array('label'=>'View Atributo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Atributo', 'url'=>array('admin')),
);
?>

<h1>Update Atributo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>