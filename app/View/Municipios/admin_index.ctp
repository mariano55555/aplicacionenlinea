<div class="municipios index">
	<h2><?php echo __('Municipios'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('departamento_id'); ?></th>
			<th><?php echo $this->Paginator->sort('codsql_municipio'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($municipios as $municipio): ?>
	<tr>
		<td><?php echo h($municipio['Municipio']['id']); ?>&nbsp;</td>
		<td><?php echo h($municipio['Municipio']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($municipio['Departamento']['name'], array('controller' => 'departamentos', 'action' => 'view', $municipio['Departamento']['id'])); ?>
		</td>
		<td><?php echo h($municipio['Municipio']['codsql_municipio']); ?>&nbsp;</td>
		<td><?php echo h($municipio['Municipio']['created']); ?>&nbsp;</td>
		<td><?php echo h($municipio['Municipio']['modified']); ?>&nbsp;</td>
		<td><?php echo h($municipio['Municipio']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($municipio['Municipio']['modified_by']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $municipio['Municipio']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $municipio['Municipio']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $municipio['Municipio']['id']), null, __('Are you sure you want to delete # %s?', $municipio['Municipio']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Municipio'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Departamentos'), array('controller' => 'departamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Departamento'), array('controller' => 'departamentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
