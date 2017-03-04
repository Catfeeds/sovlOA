<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('yq_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->yq_id), array('view', 'id'=>$data->yq_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('yq_title')); ?>:</b>
	<?php echo CHtml::encode($data->yq_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('yq_link')); ?>:</b>
	<?php echo CHtml::encode($data->yq_link); ?>
	<br />


</div>