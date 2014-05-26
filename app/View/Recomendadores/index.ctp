<div class="recomendadores index">
	<h2><?php echo __('Recomendadores'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('celular'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
			<th><?php echo $this->Paginator->sort('cargo_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($recomendadores as $recomendadore): ?>
	<tr>
		<td><?php echo h($recomendadore['Recomendadore']['id']); ?>&nbsp;</td>
		<td><?php echo h($recomendadore['Recomendadore']['name']); ?>&nbsp;</td>
		<td><?php echo h($recomendadore['Recomendadore']['celular']); ?>&nbsp;</td>
		<td><?php echo h($recomendadore['Recomendadore']['email']); ?>&nbsp;</td>
		<td><?php echo h($recomendadore['Recomendadore']['created']); ?>&nbsp;</td>
		<td><?php echo h($recomendadore['Recomendadore']['modified']); ?>&nbsp;</td>
		<td><?php echo h($recomendadore['Recomendadore']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($recomendadore['Recomendadore']['modified_by']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($recomendadore['Cargo']['name'], array('controller' => 'cargos', 'action' => 'view', $recomendadore['Cargo']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $recomendadore['Recomendadore']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $recomendadore['Recomendadore']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $recomendadore['Recomendadore']['id']), null, __('Are you sure you want to delete # %s?', $recomendadore['Recomendadore']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Recomendadore'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cargos'), array('controller' => 'cargos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cargo'), array('controller' => 'cargos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
