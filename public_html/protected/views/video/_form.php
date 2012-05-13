<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'video-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php
			$genres_array = array();
			$genres = Genre::model()->findAll();
			foreach ($genres as $genre)
				$genres_array[$genre->id] = $genre->name;
		?>
		<?php echo $form->labelEx($model,'genres'); ?>
		<?php echo $form->checkBoxList($model,'genres',$genres_array); ?>
		<?php echo $form->error($model,'genres'); ?>
	</div>	

	<div class="row">
		<?php echo $form->labelEx($model,'dtime'); ?>
		<?php echo $form->textField($model,'dtime',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'dtime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'actors'); ?>
		<?php echo $form->textField($model,'actors',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'actors'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'producer'); ?>
		<?php echo $form->textField($model,'producer',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'producer'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->