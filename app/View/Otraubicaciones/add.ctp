<div class="otraubicaciones form">
<?php echo $this->Form->create('Otraubicacione'); ?>
	<fieldset>
		<legend><?php echo __('Add Otraubicacione'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('pais_id');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Otraubicaciones'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Paises'), array('controller' => 'paises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paise'), array('controller' => 'paises', 'action' => 'add')); ?> </li>
	</ul>
</div>
