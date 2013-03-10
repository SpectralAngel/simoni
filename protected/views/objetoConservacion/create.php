<?php
/* @var $this ObjetoConservacionController */
/* @var $model ObjetoConservacion */

$this->breadcrumbs=array(
	'Objeto Conservacions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ObjetoConservacion', 'url'=>array('index')),
	array('label'=>'Manage ObjetoConservacion', 'url'=>array('admin')),
);
?>

<h1>Create ObjetoConservacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>