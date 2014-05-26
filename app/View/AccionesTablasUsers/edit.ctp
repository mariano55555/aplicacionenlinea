<div class="accionesTablasUsers form">
<?php echo $this->Form->create('AccionesTablasUser'); ?>
	<fieldset>
		<legend><?php echo __('Edit Acciones Tablas User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('accion_id');
		echo $this->Form->input('tabla_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AccionesTablasUser.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('AccionesTablasUser.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Acciones Tablas Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Acciones'), array('controller' => 'acciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accione'), array('controller' => 'acciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tablas'), array('controller' => 'tablas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tabla'), array('controller' => 'tablas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
