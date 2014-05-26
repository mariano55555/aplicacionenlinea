<div class="tablas form">
<?php echo $this->Form->create('Tabla'); ?>
	<fieldset>
		<legend><?php echo __('Add Tabla'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
		echo $this->Form->input('Accione');
		echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tablas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Created By'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Acciones'), array('controller' => 'acciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accione'), array('controller' => 'acciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
