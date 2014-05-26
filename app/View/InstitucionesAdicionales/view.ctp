<div class="institucionesAdicionales view">
<h2><?php  echo __('Instituciones Adicionale'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($institucionesAdicionale['InstitucionesAdicionale']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($institucionesAdicionale['InstitucionesAdicionale']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Paise'); ?></dt>
		<dd>
			<?php echo $this->Html->link($institucionesAdicionale['Paise']['name'], array('controller' => 'paises', 'action' => 'view', $institucionesAdicionale['Paise']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($institucionesAdicionale['InstitucionesAdicionale']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($institucionesAdicionale['InstitucionesAdicionale']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($institucionesAdicionale['InstitucionesAdicionale']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($institucionesAdicionale['InstitucionesAdicionale']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activo'); ?></dt>
		<dd>
			<?php echo h($institucionesAdicionale['InstitucionesAdicionale']['activo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Instituciones Adicionale'), array('action' => 'edit', $institucionesAdicionale['InstitucionesAdicionale']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Instituciones Adicionale'), array('action' => 'delete', $institucionesAdicionale['InstitucionesAdicionale']['id']), null, __('Are you sure you want to delete # %s?', $institucionesAdicionale['InstitucionesAdicionale']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Instituciones Adicionales'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Instituciones Adicionale'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Paises'), array('controller' => 'paises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paise'), array('controller' => 'paises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($institucionesAdicionale['User'])): ?>
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
		<th><?php echo __('Departamento Id'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Activo'); ?></th>
		<th><?php echo __('Nacimiento'); ?></th>
		<th><?php echo __('Comentarios'); ?></th>
		<th><?php echo __('Direccion'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($institucionesAdicionale['User'] as $user): ?>
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
			<td><?php echo $user['departamento_id']; ?></td>
			<td><?php echo $user['group_id']; ?></td>
			<td><?php echo $user['activo']; ?></td>
			<td><?php echo $user['nacimiento']; ?></td>
			<td><?php echo $user['comentarios']; ?></td>
			<td><?php echo $user['direccion']; ?></td>
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
