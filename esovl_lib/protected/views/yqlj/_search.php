<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'yq_id'); ?>
		<?php echo $form->textField($model,'yq_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'yq_title'); ?>
		<?php echo $form->textField($model,'yq_title',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'yq_link'); ?>
		<?php echo $form->textField($model,'yq_link',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->