<div class="actividades view">
<h2><?php  echo __('Actividade'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($actividade['Actividade']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($actividade['Actividade']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Institucion'); ?></dt>
		<dd>
			<?php echo h($actividade['Actividade']['institucion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($actividade['Actividade']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Puesto'); ?></dt>
		<dd>
			<?php echo h($actividade['Actividade']['puesto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($actividade['User']['name'], array('controller' => 'users', 'action' => 'view', $actividade['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($actividade['Actividade']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($actividade['Actividade']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($actividade['Actividade']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($actividade['Actividade']['modified_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Actividade'), array('action' => 'edit', $actividade['Actividade']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Actividade'), array('action' => 'delete', $actividade['Actividade']['id']), null, __('Are you sure you want to delete # %s?', $actividade['Actividade']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Actividades'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Actividade'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
