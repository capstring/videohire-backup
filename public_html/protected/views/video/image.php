<?php
$form = $this->beginWidget('CActiveForm',array(
	'id'=>'image-form',
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data',
	),
));	

echo $form->label($model,'image');
echo $form->fileField($model,'image');

?>
<div class="row buttons">
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
</div>
<?php $this->endWidget(); ?>