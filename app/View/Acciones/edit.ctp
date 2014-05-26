<div class="acciones form">
<?php echo $this->Form->create('Accione'); ?>
	<fieldset>
		<legend><?php echo __('Edit Accione'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
		echo $this->Form->input('User');
		echo $this->Form->input('Tabla');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Accione.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Accione.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Acciones'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Created By'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tablas'), array('controller' => 'tablas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tabla'), array('controller' => 'tablas', 'action' => 'add')); ?> </li>
	</ul>
</div>
