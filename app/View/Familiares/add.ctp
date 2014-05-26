<div class="familiares form">
<?php echo $this->Form->create('Familiare'); ?>
	<fieldset>
		<legend><?php echo __('Add Familiare'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('ocupacion');
		echo $this->Form->input('trabajo');
		echo $this->Form->input('celular');
		echo $this->Form->input('telefono');
		echo $this->Form->input('email');
		echo $this->Form->input('parentesco');
		echo $this->Form->input('tipofamiliar_id');
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

		<li><?php echo $this->Html->link(__('List Familiares'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipofamiliares'), array('controller' => 'tipofamiliares', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipofamiliare'), array('controller' => 'tipofamiliares', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
