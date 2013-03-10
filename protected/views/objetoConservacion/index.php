<?php
/* @var $this ObjetoConservacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Objeto Conservacions',
);

$this->menu=array(
	array('label'=>'Create ObjetoConservacion', 'url'=>array('create')),
	array('label'=>'Manage ObjetoConservacion', 'url'=>array('admin')),
);
?>

<h1>Objeto Conservacions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
