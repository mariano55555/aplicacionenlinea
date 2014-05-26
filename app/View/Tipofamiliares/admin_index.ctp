<div class="tipofamiliares index">
	<h2><?php echo __('Tipofamiliares'); ?></h2>
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
	<?php
	foreach ($tipofamiliares as $tipofamiliare): ?>
	<tr>
		<td><?php echo h($tipofamiliare['Tipofamiliare']['id']); ?>&nbsp;</td>
		<td><?php echo h($tipofamiliare['Tipofamiliare']['name']); ?>&nbsp;</td>
		<td><?php echo h($tipofamiliare['Tipofamiliare']['created']); ?>&nbsp;</td>
		<td><?php echo h($tipofamiliare['Tipofamiliare']['modified']); ?>&nbsp;</td>
		<td><?php echo h($tipofamiliare['Tipofamiliare']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($tipofamiliare['Tipofamiliare']['modified_by']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tipofamiliare['Tipofamiliare']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tipofamiliare['Tipofamiliare']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tipofamiliare['Tipofamiliare']['id']), null, __('Are you sure you want to delete # %s?', $tipofamiliare['Tipofamiliare']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tipofamiliare'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Familiares'), array('controller' => 'familiares', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Familiare'), array('controller' => 'familiares', 'action' => 'add')); ?> </li>
	</ul>
</div>
