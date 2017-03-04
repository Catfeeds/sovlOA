<?php
$this->breadcrumbs=array(
	'Yqljs'=>array('index'),
	$model->yq_id,
);

$this->menu=array(
	array('label'=>'List Yqlj', 'url'=>array('index')),
	array('label'=>'Create Yqlj', 'url'=>array('create')),
	array('label'=>'Update Yqlj', 'url'=>array('update', 'id'=>$model->yq_id)),
	array('label'=>'Delete Yqlj', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->yq_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Yqlj', 'url'=>array('admin')),
);
?>

<h1>View Yqlj #<?php echo $model->yq_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'yq_id',
		'yq_title',
		'yq_link',
	),
)); ?>
