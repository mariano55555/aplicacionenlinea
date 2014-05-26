<div class="users view">
<h2><?php  echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dui'); ?></dt>
		<dd>
			<?php echo h($user['User']['dui']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nit'); ?></dt>
		<dd>
			<?php echo h($user['User']['nit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Genero'); ?></dt>
		<dd>
			<?php echo h($user['User']['genero']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Candidatoscol'); ?></dt>
		<dd>
			<?php echo h($user['User']['candidatoscol']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fechaverificacion'); ?></dt>
		<dd>
			<?php echo h($user['User']['fechaverificacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codverificacion'); ?></dt>
		<dd>
			<?php echo h($user['User']['codverificacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Institucione'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Institucione']['name'], array('controller' => 'instituciones', 'action' => 'view', $user['Institucione']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Superate'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Superate']['name'], array('controller' => 'superates', 'action' => 'view', $user['Superate']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activo'); ?></dt>
		<dd>
			<?php echo h($user['User']['activo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nacimiento'); ?></dt>
		<dd>
			<?php echo h($user['User']['nacimiento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Paise'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Paise']['name'], array('controller' => 'paises', 'action' => 'view', $user['Paise']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comentarios'); ?></dt>
		<dd>
			<?php echo h($user['User']['comentarios']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($user['User']['direccion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Instituciones'), array('controller' => 'instituciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institucione'), array('controller' => 'instituciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Superates'), array('controller' => 'superates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Superate'), array('controller' => 'superates', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Paises'), array('controller' => 'paises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paise'), array('controller' => 'paises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Actividades'), array('controller' => 'actividades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Actividade'), array('controller' => 'actividades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aplicaciones'), array('controller' => 'aplicaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aplicacione'), array('controller' => 'aplicaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Becas'), array('controller' => 'becas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Beca'), array('controller' => 'becas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Familiares'), array('controller' => 'familiares', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Familiare'), array('controller' => 'familiares', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hermanos'), array('controller' => 'hermanos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hermano'), array('controller' => 'hermanos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Telefonos'), array('controller' => 'telefonos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Telefono'), array('controller' => 'telefonos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Carreras'), array('controller' => 'carreras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Carrera'), array('controller' => 'carreras', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Procesos'), array('controller' => 'procesos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proceso'), array('controller' => 'procesos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Temas'), array('controller' => 'temas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tema'), array('controller' => 'temas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recomendadores'), array('controller' => 'recomendadores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recomendadore'), array('controller' => 'recomendadores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Evaluaciones'), array('controller' => 'evaluaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluacione'), array('controller' => 'evaluaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Examenes'), array('controller' => 'examenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Examene'), array('controller' => 'examenes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Actividades'); ?></h3>
	<?php if (!empty($user['Actividade'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Institucion'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Puesto'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Actividade'] as $actividade): ?>
		<tr>
			<td><?php echo $actividade['id']; ?></td>
			<td><?php echo $actividade['name']; ?></td>
			<td><?php echo $actividade['institucion']; ?></td>
			<td><?php echo $actividade['fecha']; ?></td>
			<td><?php echo $actividade['puesto']; ?></td>
			<td><?php echo $actividade['user_id']; ?></td>
			<td><?php echo $actividade['created']; ?></td>
			<td><?php echo $actividade['modified']; ?></td>
			<td><?php echo $actividade['created_by']; ?></td>
			<td><?php echo $actividade['modified_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'actividades', 'action' => 'view', $actividade['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'actividades', 'action' => 'edit', $actividade['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'actividades', 'action' => 'delete', $actividade['id']), null, __('Are you sure you want to delete # %s?', $actividade['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Actividade'), array('controller' => 'actividades', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Aplicaciones'); ?></h3>
	<?php if (!empty($user['Aplicacione'])): ?>
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
		foreach ($user['Aplicacione'] as $aplicacione): ?>
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
	<h3><?php echo __('Related Becas'); ?></h3>
	<?php if (!empty($user['Beca'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Duracion'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Beca'] as $beca): ?>
		<tr>
			<td><?php echo $beca['id']; ?></td>
			<td><?php echo $beca['user_id']; ?></td>
			<td><?php echo $beca['name']; ?></td>
			<td><?php echo $beca['duracion']; ?></td>
			<td><?php echo $beca['created']; ?></td>
			<td><?php echo $beca['modified']; ?></td>
			<td><?php echo $beca['created_by']; ?></td>
			<td><?php echo $beca['modified_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'becas', 'action' => 'view', $beca['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'becas', 'action' => 'edit', $beca['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'becas', 'action' => 'delete', $beca['id']), null, __('Are you sure you want to delete # %s?', $beca['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Beca'), array('controller' => 'becas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Familiares'); ?></h3>
	<?php if (!empty($user['Familiare'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Ocupacion'); ?></th>
		<th><?php echo __('Trabajo'); ?></th>
		<th><?php echo __('Celular'); ?></th>
		<th><?php echo __('Telefono'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Parentesco'); ?></th>
		<th><?php echo __('Tipofamiliar Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Familiare'] as $familiare): ?>
		<tr>
			<td><?php echo $familiare['id']; ?></td>
			<td><?php echo $familiare['name']; ?></td>
			<td><?php echo $familiare['ocupacion']; ?></td>
			<td><?php echo $familiare['trabajo']; ?></td>
			<td><?php echo $familiare['celular']; ?></td>
			<td><?php echo $familiare['telefono']; ?></td>
			<td><?php echo $familiare['email']; ?></td>
			<td><?php echo $familiare['parentesco']; ?></td>
			<td><?php echo $familiare['tipofamiliar_id']; ?></td>
			<td><?php echo $familiare['user_id']; ?></td>
			<td><?php echo $familiare['created']; ?></td>
			<td><?php echo $familiare['modified']; ?></td>
			<td><?php echo $familiare['created_by']; ?></td>
			<td><?php echo $familiare['modified_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'familiares', 'action' => 'view', $familiare['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'familiares', 'action' => 'edit', $familiare['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'familiares', 'action' => 'delete', $familiare['id']), null, __('Are you sure you want to delete # %s?', $familiare['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Familiare'), array('controller' => 'familiares', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Hermanos'); ?></h3>
	<?php if (!empty($user['Hermano'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Year'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Hermano'] as $hermano): ?>
		<tr>
			<td><?php echo $hermano['id']; ?></td>
			<td><?php echo $hermano['name']; ?></td>
			<td><?php echo $hermano['year']; ?></td>
			<td><?php echo $hermano['user_id']; ?></td>
			<td><?php echo $hermano['created']; ?></td>
			<td><?php echo $hermano['modified']; ?></td>
			<td><?php echo $hermano['created_by']; ?></td>
			<td><?php echo $hermano['modified_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'hermanos', 'action' => 'view', $hermano['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'hermanos', 'action' => 'edit', $hermano['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'hermanos', 'action' => 'delete', $hermano['id']), null, __('Are you sure you want to delete # %s?', $hermano['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Hermano'), array('controller' => 'hermanos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Telefonos'); ?></h3>
	<?php if (!empty($user['Telefono'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified Int'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Telefono'] as $telefono): ?>
		<tr>
			<td><?php echo $telefono['id']; ?></td>
			<td><?php echo $telefono['name']; ?></td>
			<td><?php echo $telefono['created']; ?></td>
			<td><?php echo $telefono['modified']; ?></td>
			<td><?php echo $telefono['created_by']; ?></td>
			<td><?php echo $telefono['modified_int']; ?></td>
			<td><?php echo $telefono['user_id']; ?></td>
			<td><?php echo $telefono['tipo']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'telefonos', 'action' => 'view', $telefono['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'telefonos', 'action' => 'edit', $telefono['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'telefonos', 'action' => 'delete', $telefono['id']), null, __('Are you sure you want to delete # %s?', $telefono['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Telefono'), array('controller' => 'telefonos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Carreras'); ?></h3>
	<?php if (!empty($user['Carrera'])): ?>
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
		foreach ($user['Carrera'] as $carrera): ?>
		<tr>
			<td><?php echo $carrera['id']; ?></td>
			<td><?php echo $carrera['name']; ?></td>
			<td><?php echo $carrera['created']; ?></td>
			<td><?php echo $carrera['modified']; ?></td>
			<td><?php echo $carrera['created_by']; ?></td>
			<td><?php echo $carrera['modified_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'carreras', 'action' => 'view', $carrera['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'carreras', 'action' => 'edit', $carrera['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'carreras', 'action' => 'delete', $carrera['id']), null, __('Are you sure you want to delete # %s?', $carrera['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Carrera'), array('controller' => 'carreras', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Procesos'); ?></h3>
	<?php if (!empty($user['Proceso'])): ?>
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
		foreach ($user['Proceso'] as $proceso): ?>
		<tr>
			<td><?php echo $proceso['id']; ?></td>
			<td><?php echo $proceso['name']; ?></td>
			<td><?php echo $proceso['created']; ?></td>
			<td><?php echo $proceso['modified']; ?></td>
			<td><?php echo $proceso['created_by']; ?></td>
			<td><?php echo $proceso['modified_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'procesos', 'action' => 'view', $proceso['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'procesos', 'action' => 'edit', $proceso['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'procesos', 'action' => 'delete', $proceso['id']), null, __('Are you sure you want to delete # %s?', $proceso['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Proceso'), array('controller' => 'procesos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Temas'); ?></h3>
	<?php if (!empty($user['Tema'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Contenido'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Tema'] as $tema): ?>
		<tr>
			<td><?php echo $tema['id']; ?></td>
			<td><?php echo $tema['name']; ?></td>
			<td><?php echo $tema['contenido']; ?></td>
			<td><?php echo $tema['created']; ?></td>
			<td><?php echo $tema['modified']; ?></td>
			<td><?php echo $tema['created_by']; ?></td>
			<td><?php echo $tema['modified_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'temas', 'action' => 'view', $tema['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'temas', 'action' => 'edit', $tema['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'temas', 'action' => 'delete', $tema['id']), null, __('Are you sure you want to delete # %s?', $tema['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tema'), array('controller' => 'temas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Recomendadores'); ?></h3>
	<?php if (!empty($user['Recomendadore'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Celular'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th><?php echo __('Cargo Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Recomendadore'] as $recomendadore): ?>
		<tr>
			<td><?php echo $recomendadore['id']; ?></td>
			<td><?php echo $recomendadore['name']; ?></td>
			<td><?php echo $recomendadore['celular']; ?></td>
			<td><?php echo $recomendadore['email']; ?></td>
			<td><?php echo $recomendadore['created']; ?></td>
			<td><?php echo $recomendadore['modified']; ?></td>
			<td><?php echo $recomendadore['created_by']; ?></td>
			<td><?php echo $recomendadore['modified_by']; ?></td>
			<td><?php echo $recomendadore['cargo_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'recomendadores', 'action' => 'view', $recomendadore['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'recomendadores', 'action' => 'edit', $recomendadore['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'recomendadores', 'action' => 'delete', $recomendadore['id']), null, __('Are you sure you want to delete # %s?', $recomendadore['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Recomendadore'), array('controller' => 'recomendadores', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Evaluaciones'); ?></h3>
	<?php if (!empty($user['Evaluacione'])): ?>
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
		foreach ($user['Evaluacione'] as $evaluacione): ?>
		<tr>
			<td><?php echo $evaluacione['id']; ?></td>
			<td><?php echo $evaluacione['name']; ?></td>
			<td><?php echo $evaluacione['created']; ?></td>
			<td><?php echo $evaluacione['modified']; ?></td>
			<td><?php echo $evaluacione['created_by']; ?></td>
			<td><?php echo $evaluacione['modified_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'evaluaciones', 'action' => 'view', $evaluacione['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'evaluaciones', 'action' => 'edit', $evaluacione['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'evaluaciones', 'action' => 'delete', $evaluacione['id']), null, __('Are you sure you want to delete # %s?', $evaluacione['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Evaluacione'), array('controller' => 'evaluaciones', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Examenes'); ?></h3>
	<?php if (!empty($user['Examene'])): ?>
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
		foreach ($user['Examene'] as $examene): ?>
		<tr>
			<td><?php echo $examene['id']; ?></td>
			<td><?php echo $examene['name']; ?></td>
			<td><?php echo $examene['created']; ?></td>
			<td><?php echo $examene['modified']; ?></td>
			<td><?php echo $examene['created_by']; ?></td>
			<td><?php echo $examene['modified_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'examenes', 'action' => 'view', $examene['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'examenes', 'action' => 'edit', $examene['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'examenes', 'action' => 'delete', $examene['id']), null, __('Are you sure you want to delete # %s?', $examene['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Examene'), array('controller' => 'examenes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
