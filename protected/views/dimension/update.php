<?php
/* @var $this DimensionController */
/* @var $model Dimension */

$this->breadcrumbs=array(
	'Dimensions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dimension', 'url'=>array('index')),
	array('label'=>'Create Dimension', 'url'=>array('create')),
	array('label'=>'View Dimension', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Dimension', 'url'=>array('admin')),
);
?>

<h1>Update Dimension <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>