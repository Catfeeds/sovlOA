<?php
$this->breadcrumbs=array(
	'Yqljs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Yqlj', 'url'=>array('index')),
	array('label'=>'Manage Yqlj', 'url'=>array('admin')),
);
?>

<h1>Create Yqlj</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>