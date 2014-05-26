<div class="departamentos index">
	<h2><?php echo __('Departamentos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('coddepartamento_sql'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
			<th><?php echo $this->Paginator->sort('pais_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($departamentos as $departamento): ?>
	<tr>
		<td><?php echo h($departamento['Departamento']['id']); ?>&nbsp;</td>
		<td><?php echo h($departamento['Departamento']['name']); ?>&nbsp;</td>
		<td><?php echo h($departamento['Departamento']['coddepartamento_sql']); ?>&nbsp;</td>
		<td><?php echo h($departamento['Departamento']['created']); ?>&nbsp;</td>
		<td><?php echo h($departamento['Departamento']['modified']); ?>&nbsp;</td>
		<td><?php echo h($departamento['Departamento']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($departamento['Departamento']['modified_by']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($departamento['Paise']['name'], array('controller' => 'paises', 'action' => 'view', $departamento['Paise']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $departamento['Departamento']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $departamento['Departamento']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $departamento['Departamento']['id']), null, __('Are you sure you want to delete # %s?', $departamento['Departamento']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Departamento'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Paises'), array('controller' => 'paises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paise'), array('controller' => 'paises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Municipios'), array('controller' => 'municipios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Municipio'), array('controller' => 'municipios', 'action' => 'add')); ?> </li>
	</ul>
</div>
