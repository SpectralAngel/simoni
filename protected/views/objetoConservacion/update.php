<?php
/* @var $this ObjetoConservacionController */
/* @var $model ObjetoConservacion */

$this->breadcrumbs=array(
	'Objeto Conservacions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ObjetoConservacion', 'url'=>array('index')),
	array('label'=>'Create ObjetoConservacion', 'url'=>array('create')),
	array('label'=>'View ObjetoConservacion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ObjetoConservacion', 'url'=>array('admin')),
);
?>

<h1>Update ObjetoConservacion <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>