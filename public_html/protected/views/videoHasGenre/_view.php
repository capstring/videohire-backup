<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('video_id')); ?>:</b>
	<?php echo CHtml::encode($data->video_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('genre_id')); ?>:</b>
	<?php echo CHtml::encode($data->genre_id); ?>
	<br />


</div>