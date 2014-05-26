<div class="becas view">
<h2><?php  echo __('Beca'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($beca['Beca']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($beca['User']['name'], array('controller' => 'users', 'action' => 'view', $beca['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($beca['Beca']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Duracion'); ?></dt>
		<dd>
			<?php echo h($beca['Beca']['duracion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($beca['Beca']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($beca['Beca']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($beca['Beca']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($beca['Beca']['modified_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Beca'), array('action' => 'edit', $beca['Beca']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Beca'), array('action' => 'delete', $beca['Beca']['id']), null, __('Are you sure you want to delete # %s?', $beca['Beca']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Becas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Beca'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
