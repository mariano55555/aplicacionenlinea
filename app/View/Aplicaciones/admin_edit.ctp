<div class="aplicaciones form">
<?php echo $this->Form->create('Aplicacione'); ?>
	<fieldset>
		<legend><?php echo __('Edit Aplicacione'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('carrera_id');
		echo $this->Form->input('proceso_id');
		echo $this->Form->input('examen_id');
		echo $this->Form->input('tema_id');
		echo $this->Form->input('recomendador_id');
		echo $this->Form->input('evaluacion_id');
		echo $this->Form->input('year');
		echo $this->Form->input('ensayo');
		echo $this->Form->input('finalizado');
		echo $this->Form->input('actividad');
		echo $this->Form->input('sql');
		echo $this->Form->input('idiomas');
		echo $this->Form->input('calificacion');
		echo $this->Form->input('codigoPostulante');
		echo $this->Form->input('comentarios');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Aplicacione.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Aplicacione.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Aplicaciones'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Carreras'), array('controller' => 'carreras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Carrera'), array('controller' => 'carreras', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Procesos'), array('controller' => 'procesos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proceso'), array('controller' => 'procesos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Examenes'), array('controller' => 'examenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Examene'), array('controller' => 'examenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Temas'), array('controller' => 'temas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tema'), array('controller' => 'temas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recomendadores'), array('controller' => 'recomendadores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recomendadore'), array('controller' => 'recomendadores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Evaluaciones'), array('controller' => 'evaluaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluacione'), array('controller' => 'evaluaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
