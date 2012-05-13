<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_id'); ?>
		<?php echo $form->textField($model,'order_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'copy_id'); ?>
		<?php echo $form->textField($model,'copy_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dtime_start'); ?>
		<?php echo $form->textField($model,'dtime_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dtime_end'); ?>
		<?php echo $form->textField($model,'dtime_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dtime_end_actual'); ?>
		<?php echo $form->textField($model,'dtime_end_actual'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_id'); ?>
		<?php echo $form->textField($model,'employee_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->