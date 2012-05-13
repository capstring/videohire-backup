<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'copy-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php
			$videos_array = array();
			$videos = Video::model()->findAll();
			foreach ($videos as $video)
				$videos_array[$video->id] = $video->name;
		?>
		<?php echo $form->labelEx($model,'video_id'); ?>
		<?php echo $form->dropDownList($model,'video_id',$videos_array); ?>
		<?php echo $form->error($model,'video_id'); ?>
	</div>

	<div class="row">
		<?php
			$types_array = array();
			$types = Media::model()->findAll();
			foreach ($types as $type)
				$types_array[$type->id] = $type->name;
		?>
		<?php echo $form->labelEx($model,'type_id'); ?>
		<?php echo $form->dropDownList($model,'type_id',$types_array); ?>
		<?php echo $form->error($model,'type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cost'); ?>
		<?php echo $form->textField($model,'cost'); ?>
		<?php echo $form->error($model,'cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model,'location',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->