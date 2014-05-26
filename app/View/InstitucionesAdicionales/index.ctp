<div class="institucionesAdicionales index">
	<h2><?php echo __('Instituciones Adicionales'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('pais_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
			<th><?php echo $this->Paginator->sort('activo'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($institucionesAdicionales as $institucionesAdicionale): ?>
	<tr>
		<td><?php echo h($institucionesAdicionale['InstitucionesAdicionale']['id']); ?>&nbsp;</td>
		<td><?php echo h($institucionesAdicionale['InstitucionesAdicionale']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($institucionesAdicionale['Paise']['name'], array('controller' => 'paises', 'action' => 'view', $institucionesAdicionale['Paise']['id'])); ?>
		</td>
		<td><?php echo h($institucionesAdicionale['InstitucionesAdicionale']['created']); ?>&nbsp;</td>
		<td><?php echo h($institucionesAdicionale['InstitucionesAdicionale']['modified']); ?>&nbsp;</td>
		<td><?php echo h($institucionesAdicionale['InstitucionesAdicionale']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($institucionesAdicionale['InstitucionesAdicionale']['modified_by']); ?>&nbsp;</td>
		<td><?php echo h($institucionesAdicionale['InstitucionesAdicionale']['activo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $institucionesAdicionale['InstitucionesAdicionale']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $institucionesAdicionale['InstitucionesAdicionale']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $institucionesAdicionale['InstitucionesAdicionale']['id']), null, __('Are you sure you want to delete # %s?', $institucionesAdicionale['InstitucionesAdicionale']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Instituciones Adicionale'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Paises'), array('controller' => 'paises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paise'), array('controller' => 'paises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
