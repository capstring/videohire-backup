<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'video-has-genre-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'video_id'); ?>
		<?php echo $form->textField($model,'video_id'); ?>
		<?php echo $form->error($model,'video_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'genre_id'); ?>
		<?php echo $form->textField($model,'genre_id'); ?>
		<?php echo $form->error($model,'genre_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->