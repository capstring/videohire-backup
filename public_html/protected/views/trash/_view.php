<div class="view">

	<?php echo CHtml::link('Удалить из козрины','/index.php/trash/delete?id='.$data->id,array('class'=>'delete-link'))?>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('Фильм')); ?>:</b>
	<?php echo CHtml::encode($data->copy->video->name); ?>
	<br />



</div>