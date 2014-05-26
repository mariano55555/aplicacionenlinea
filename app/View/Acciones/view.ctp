<div class="acciones view">
<h2><?php  echo __('Accione'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($accione['Accione']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($accione['Accione']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($accione['Accione']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($accione['Accione']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo $this->Html->link($accione['CreatedBy']['name'], array('controller' => 'users', 'action' => 'view', $accione['CreatedBy']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo $this->Html->link($accione['ModifiedBy']['name'], array('controller' => 'users', 'action' => 'view', $accione['ModifiedBy']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Accione'), array('action' => 'edit', $accione['Accione']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Accione'), array('action' => 'delete', $accione['Accione']['id']), null, __('Are you sure you want to delete # %s?', $accione['Accione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Acciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accione'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Created By'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tablas'), array('controller' => 'tablas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tabla'), array('controller' => 'tablas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($accione['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Dui'); ?></th>
		<th><?php echo __('Nit'); ?></th>
		<th><?php echo __('Genero'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Fechaverificacion'); ?></th>
		<th><?php echo __('Codverificacion'); ?></th>
		<th><?php echo __('Institucion Id'); ?></th>
		<th><?php echo __('Instituciones Adicionale Id'); ?></th>
		<th><?php echo __('Superate Id'); ?></th>
		<th><?php echo __('Pais Id'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Activo'); ?></th>
		<th><?php echo __('Nacimiento'); ?></th>
		<th><?php echo __('Comentarios'); ?></th>
		<th><?php echo __('Bachillerato'); ?></th>
		<th><?php echo __('Direccion'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th><?php echo __('Ingles'); ?></th>
		<th><?php echo __('Idiomas'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($accione['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['dui']; ?></td>
			<td><?php echo $user['nit']; ?></td>
			<td><?php echo $user['genero']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['fechaverificacion']; ?></td>
			<td><?php echo $user['codverificacion']; ?></td>
			<td><?php echo $user['institucion_id']; ?></td>
			<td><?php echo $user['instituciones_adicionale_id']; ?></td>
			<td><?php echo $user['superate_id']; ?></td>
			<td><?php echo $user['pais_id']; ?></td>
			<td><?php echo $user['group_id']; ?></td>
			<td><?php echo $user['activo']; ?></td>
			<td><?php echo $user['nacimiento']; ?></td>
			<td><?php echo $user['comentarios']; ?></td>
			<td><?php echo $user['bachillerato']; ?></td>
			<td><?php echo $user['direccion']; ?></td>
			<td><?php echo $user['created_by']; ?></td>
			<td><?php echo $user['modified_by']; ?></td>
			<td><?php echo $user['ingles']; ?></td>
			<td><?php echo $user['idiomas']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Tablas'); ?></h3>
	<?php if (!empty($accione['Tabla'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($accione['Tabla'] as $tabla): ?>
		<tr>
			<td><?php echo $tabla['id']; ?></td>
			<td><?php echo $tabla['name']; ?></td>
			<td><?php echo $tabla['created']; ?></td>
			<td><?php echo $tabla['modified']; ?></td>
			<td><?php echo $tabla['created_by']; ?></td>
			<td><?php echo $tabla['modified_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tablas', 'action' => 'view', $tabla['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tablas', 'action' => 'edit', $tabla['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tablas', 'action' => 'delete', $tabla['id']), null, __('Are you sure you want to delete # %s?', $tabla['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tabla'), array('controller' => 'tablas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
