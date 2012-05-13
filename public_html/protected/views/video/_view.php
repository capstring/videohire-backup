<div class="view">

	<b><?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?></b>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('genres')); ?>:</b>
	<?php
		echo CHtml::encode($data->getGenreAsString());
	?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dtime')); ?>:</b>
	<?php echo CHtml::encode($data->dtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('actors')); ?>:</b>
	<?php echo CHtml::encode($data->actors); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('producer')); ?>:</b>
	<?php echo CHtml::encode($data->producer); ?>
	<br />


</div>