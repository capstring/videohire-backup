<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_id')); ?>:</b>
	<?php echo CHtml::encode($data->order_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('copy_id')); ?>:</b>
	<?php echo CHtml::encode($data->copy_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dtime_start')); ?>:</b>
	<?php echo CHtml::encode($data->dtime_start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dtime_end')); ?>:</b>
	<?php echo CHtml::encode($data->dtime_end); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dtime_end_actual')); ?>:</b>
	<?php echo CHtml::encode($data->dtime_end_actual); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_id); ?>
	<br />


</div>