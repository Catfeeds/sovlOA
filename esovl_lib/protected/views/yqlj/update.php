<?php
$this->breadcrumbs=array(
	'Yqljs'=>array('index'),
	$model->yq_id=>array('view','id'=>$model->yq_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Yqlj', 'url'=>array('index')),
	array('label'=>'Create Yqlj', 'url'=>array('create')),
	array('label'=>'View Yqlj', 'url'=>array('view', 'id'=>$model->yq_id)),
	array('label'=>'Manage Yqlj', 'url'=>array('admin')),
);
?>

<h1>Update Yqlj <?php echo $model->yq_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>