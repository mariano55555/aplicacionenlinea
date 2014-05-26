<div class="telefonos view">
<h2><?php  echo __('Telefono'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($telefono['Telefono']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($telefono['Telefono']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($telefono['Telefono']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($telefono['Telefono']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($telefono['Telefono']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified Int'); ?></dt>
		<dd>
			<?php echo h($telefono['Telefono']['modified_int']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($telefono['User']['name'], array('controller' => 'users', 'action' => 'view', $telefono['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($telefono['Telefono']['tipo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Telefono'), array('action' => 'edit', $telefono['Telefono']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Telefono'), array('action' => 'delete', $telefono['Telefono']['id']), null, __('Are you sure you want to delete # %s?', $telefono['Telefono']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Telefonos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Telefono'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
