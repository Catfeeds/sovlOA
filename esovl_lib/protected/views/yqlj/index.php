<?php
$this->breadcrumbs=array(
	'Yqljs',
);

$this->menu=array(
	array('label'=>'Create Yqlj', 'url'=>array('create')),
	array('label'=>'Manage Yqlj', 'url'=>array('admin')),
);
?>

<h1>Yqljs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
