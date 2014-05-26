<div class="temas view">
<h2><?php  echo __('Tema'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tema['Tema']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($tema['Tema']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contenido'); ?></dt>
		<dd>
			<?php echo h($tema['Tema']['contenido']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tema['Tema']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($tema['Tema']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($tema['Tema']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($tema['Tema']['modified_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tema'), array('action' => 'edit', $tema['Tema']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tema'), array('action' => 'delete', $tema['Tema']['id']), null, __('Are you sure you want to delete # %s?', $tema['Tema']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Temas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tema'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aplicaciones'), array('controller' => 'aplicaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aplicacione'), array('controller' => 'aplicaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Aplicaciones'); ?></h3>
	<?php if (!empty($tema['Aplicacione'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Carrera Id'); ?></th>
		<th><?php echo __('Proceso Id'); ?></th>
		<th><?php echo __('Examen Id'); ?></th>
		<th><?php echo __('Tema Id'); ?></th>
		<th><?php echo __('Recomendador Id'); ?></th>
		<th><?php echo __('Evaluacion Id'); ?></th>
		<th><?php echo __('Year'); ?></th>
		<th><?php echo __('Ensayo'); ?></th>
		<th><?php echo __('Finalizado'); ?></th>
		<th><?php echo __('Actividad'); ?></th>
		<th><?php echo __('Sql'); ?></th>
		<th><?php echo __('Idiomas'); ?></th>
		<th><?php echo __('Calificacion'); ?></th>
		<th><?php echo __('CodigoPostulante'); ?></th>
		<th><?php echo __('Comentarios'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tema['Aplicacione'] as $aplicacione): ?>
		<tr>
			<td><?php echo $aplicacione['id']; ?></td>
			<td><?php echo $aplicacione['user_id']; ?></td>
			<td><?php echo $aplicacione['carrera_id']; ?></td>
			<td><?php echo $aplicacione['proceso_id']; ?></td>
			<td><?php echo $aplicacione['examen_id']; ?></td>
			<td><?php echo $aplicacione['tema_id']; ?></td>
			<td><?php echo $aplicacione['recomendador_id']; ?></td>
			<td><?php echo $aplicacione['evaluacion_id']; ?></td>
			<td><?php echo $aplicacione['year']; ?></td>
			<td><?php echo $aplicacione['ensayo']; ?></td>
			<td><?php echo $aplicacione['finalizado']; ?></td>
			<td><?php echo $aplicacione['actividad']; ?></td>
			<td><?php echo $aplicacione['sql']; ?></td>
			<td><?php echo $aplicacione['idiomas']; ?></td>
			<td><?php echo $aplicacione['calificacion']; ?></td>
			<td><?php echo $aplicacione['codigoPostulante']; ?></td>
			<td><?php echo $aplicacione['comentarios']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'aplicaciones', 'action' => 'view', $aplicacione['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'aplicaciones', 'action' => 'edit', $aplicacione['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'aplicaciones', 'action' => 'delete', $aplicacione['id']), null, __('Are you sure you want to delete # %s?', $aplicacione['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Aplicacione'), array('controller' => 'aplicaciones', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($tema['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Dui'); ?></th>
		<th><?php echo __('Nit'); ?></th>
		<th><?php echo __('Genero'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Candidatoscol'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Fechaverificacion'); ?></th>
		<th><?php echo __('Codverificacion'); ?></th>
		<th><?php echo __('Institucion Id'); ?></th>
		<th><?php echo __('Superate Id'); ?></th>
		<th><?php echo __('Activo'); ?></th>
		<th><?php echo __('Nacimiento'); ?></th>
		<th><?php echo __('Pais Id'); ?></th>
		<th><?php echo __('Comentarios'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Direccion'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tema['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['dui']; ?></td>
			<td><?php echo $user['nit']; ?></td>
			<td><?php echo $user['genero']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['candidatoscol']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td><?php echo $user['fechaverificacion']; ?></td>
			<td><?php echo $user['codverificacion']; ?></td>
			<td><?php echo $user['institucion_id']; ?></td>
			<td><?php echo $user['superate_id']; ?></td>
			<td><?php echo $user['activo']; ?></td>
			<td><?php echo $user['nacimiento']; ?></td>
			<td><?php echo $user['pais_id']; ?></td>
			<td><?php echo $user['comentarios']; ?></td>
			<td><?php echo $user['group_id']; ?></td>
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
