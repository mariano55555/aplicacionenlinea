<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
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
