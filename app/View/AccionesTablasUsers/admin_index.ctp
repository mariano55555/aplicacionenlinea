<div class="accionesTablasUsers index">
	<h2><?php echo __('Acciones Tablas Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('accion_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tabla_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($accionesTablasUsers as $accionesTablasUser): ?>
	<tr>
		<td><?php echo h($accionesTablasUser['AccionesTablasUser']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($accionesTablasUser['Accione']['name'], array('controller' => 'acciones', 'action' => 'view', $accionesTablasUser['Accione']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($accionesTablasUser['Tabla']['name'], array('controller' => 'tablas', 'action' => 'view', $accionesTablasUser['Tabla']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($accionesTablasUser['User']['name'], array('controller' => 'users', 'action' => 'view', $accionesTablasUser['User']['id'])); ?>
		</td>
		<td><?php echo h($accionesTablasUser['AccionesTablasUser']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $accionesTablasUser['AccionesTablasUser']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $accionesTablasUser['AccionesTablasUser']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $accionesTablasUser['AccionesTablasUser']['id']), null, __('Are you sure you want to delete # %s?', $accionesTablasUser['AccionesTablasUser']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Acciones Tablas User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Acciones'), array('controller' => 'acciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accione'), array('controller' => 'acciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tablas'), array('controller' => 'tablas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tabla'), array('controller' => 'tablas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
