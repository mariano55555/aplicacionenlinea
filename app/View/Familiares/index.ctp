<div class="familiares index">
	<h2><?php echo __('Familiares'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('ocupacion'); ?></th>
			<th><?php echo $this->Paginator->sort('trabajo'); ?></th>
			<th><?php echo $this->Paginator->sort('celular'); ?></th>
			<th><?php echo $this->Paginator->sort('telefono'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('parentesco'); ?></th>
			<th><?php echo $this->Paginator->sort('tipofamiliar_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($familiares as $familiare): ?>
	<tr>
		<td><?php echo h($familiare['Familiare']['id']); ?>&nbsp;</td>
		<td><?php echo h($familiare['Familiare']['name']); ?>&nbsp;</td>
		<td><?php echo h($familiare['Familiare']['ocupacion']); ?>&nbsp;</td>
		<td><?php echo h($familiare['Familiare']['trabajo']); ?>&nbsp;</td>
		<td><?php echo h($familiare['Familiare']['celular']); ?>&nbsp;</td>
		<td><?php echo h($familiare['Familiare']['telefono']); ?>&nbsp;</td>
		<td><?php echo h($familiare['Familiare']['email']); ?>&nbsp;</td>
		<td><?php echo h($familiare['Familiare']['parentesco']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($familiare['Tipofamiliare']['name'], array('controller' => 'tipofamiliares', 'action' => 'view', $familiare['Tipofamiliare']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($familiare['User']['name'], array('controller' => 'users', 'action' => 'view', $familiare['User']['id'])); ?>
		</td>
		<td><?php echo h($familiare['Familiare']['created']); ?>&nbsp;</td>
		<td><?php echo h($familiare['Familiare']['modified']); ?>&nbsp;</td>
		<td><?php echo h($familiare['Familiare']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($familiare['Familiare']['modified_by']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $familiare['Familiare']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $familiare['Familiare']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $familiare['Familiare']['id']), null, __('Are you sure you want to delete # %s?', $familiare['Familiare']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Familiare'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipofamiliares'), array('controller' => 'tipofamiliares', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipofamiliare'), array('controller' => 'tipofamiliares', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
