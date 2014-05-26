<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('dui');
		echo $this->Form->input('nit');
		echo $this->Form->input('genero');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('candidatoscol');
		echo $this->Form->input('fechaverificacion');
		echo $this->Form->input('codverificacion');
		echo $this->Form->input('institucion_id');
		echo $this->Form->input('superate_id');
		echo $this->Form->input('activo');
		echo $this->Form->input('nacimiento');
		echo $this->Form->input('pais_id');
		echo $this->Form->input('comentarios');
		echo $this->Form->input('group_id');
		echo $this->Form->input('direccion');
		echo $this->Form->input('Carrera');
		echo $this->Form->input('Proceso');
		echo $this->Form->input('Tema');
		echo $this->Form->input('Recomendadore');
		echo $this->Form->input('Evaluacione');
		echo $this->Form->input('Examene');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
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
