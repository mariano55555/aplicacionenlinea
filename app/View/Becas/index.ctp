<div class="becas index">
	<h2><?php echo __('Becas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('duracion'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($becas as $beca): ?>
	<tr>
		<td><?php echo h($beca['Beca']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($beca['User']['name'], array('controller' => 'users', 'action' => 'view', $beca['User']['id'])); ?>
		</td>
		<td><?php echo h($beca['Beca']['name']); ?>&nbsp;</td>
		<td><?php echo h($beca['Beca']['duracion']); ?>&nbsp;</td>
		<td><?php echo h($beca['Beca']['created']); ?>&nbsp;</td>
		<td><?php echo h($beca['Beca']['modified']); ?>&nbsp;</td>
		<td><?php echo h($beca['Beca']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($beca['Beca']['modified_by']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $beca['Beca']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $beca['Beca']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $beca['Beca']['id']), null, __('Are you sure you want to delete # %s?', $beca['Beca']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Beca'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
