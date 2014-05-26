<div class="acciones index">
	<h2><?php echo __('Acciones'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($acciones as $accione): ?>
	<tr>
		<td><?php echo h($accione['Accione']['id']); ?>&nbsp;</td>
		<td><?php echo h($accione['Accione']['name']); ?>&nbsp;</td>
		<td><?php echo h($accione['Accione']['created']); ?>&nbsp;</td>
		<td><?php echo h($accione['Accione']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($accione['CreatedBy']['name'], array('controller' => 'users', 'action' => 'view', $accione['CreatedBy']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($accione['ModifiedBy']['name'], array('controller' => 'users', 'action' => 'view', $accione['ModifiedBy']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $accione['Accione']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $accione['Accione']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $accione['Accione']['id']), null, __('Are you sure you want to delete # %s?', $accione['Accione']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Accione'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Created By'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tablas'), array('controller' => 'tablas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tabla'), array('controller' => 'tablas', 'action' => 'add')); ?> </li>
	</ul>
</div>
