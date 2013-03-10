<?php
/* @var $this DimensionController */
/* @var $model Dimension */

$this->breadcrumbs=array(
	'Dimensions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Dimension', 'url'=>array('index')),
	array('label'=>'Create Dimension', 'url'=>array('create')),
	array('label'=>'Update Dimension', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Dimension', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dimension', 'url'=>array('admin')),
);
?>

<h1>Detalles de la Dimensi&oacute;n <?php echo $model->nombre; ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>new CArrayDataProvider('Beneficiario', array('data'=>$model->beneficiarios)),
	'columns' => array(
	    array(
	        'class'=>'CLinkColumn',
	        'labelExpression'=>'$data->nombre',
	        'header'=>'Beneficiario',
    	    'urlExpression'=>'Yii::app()->createUrl("beneficiario/view", array("id"=>$data["id"]))',
        ),
	),
)); ?>

<a>
    <?php echo CHtml::link('Agregar Beneficiario', array("beneficiario/create")); ?>
</a>
