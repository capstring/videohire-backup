<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-has-copy-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'order_id'); ?>
		<?php echo $form->textField($model,'order_id'); ?>
		<?php echo $form->error($model,'order_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'copy_id'); ?>
		<?php echo $form->textField($model,'copy_id'); ?>
		<?php echo $form->error($model,'copy_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dtime_start'); ?>
		<?php echo $form->textField($model,'dtime_start'); ?>
		<?php echo $form->error($model,'dtime_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dtime_end'); ?>
		<?php echo $form->textField($model,'dtime_end'); ?>
		<?php echo $form->error($model,'dtime_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dtime_end_actual'); ?>
		<?php echo $form->textField($model,'dtime_end_actual'); ?>
		<?php echo $form->error($model,'dtime_end_actual'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_id'); ?>
		<?php echo $form->textField($model,'employee_id'); ?>
		<?php echo $form->error($model,'employee_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->