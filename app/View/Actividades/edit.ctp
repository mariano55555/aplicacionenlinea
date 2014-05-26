<div class="actividades form">
<?php echo $this->Form->create('Actividade'); ?>
	<fieldset>
		<legend><?php echo __('Edit Actividade'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('institucion');
		echo $this->Form->input('fecha');
		echo $this->Form->input('puesto');
		echo $this->Form->input('user_id');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Actividade.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Actividade.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Actividades'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
