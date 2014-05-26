<div class="hermanos view">
<h2><?php  echo __('Hermano'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($hermano['Hermano']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($hermano['Hermano']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Year'); ?></dt>
		<dd>
			<?php echo h($hermano['Hermano']['year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hermano['User']['name'], array('controller' => 'users', 'action' => 'view', $hermano['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($hermano['Hermano']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($hermano['Hermano']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($hermano['Hermano']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($hermano['Hermano']['modified_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Hermano'), array('action' => 'edit', $hermano['Hermano']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Hermano'), array('action' => 'delete', $hermano['Hermano']['id']), null, __('Are you sure you want to delete # %s?', $hermano['Hermano']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Hermanos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hermano'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
