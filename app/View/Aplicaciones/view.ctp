<div class="aplicaciones view">
<h2><?php  echo __('Aplicacione'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($aplicacione['Aplicacione']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aplicacione['User']['name'], array('controller' => 'users', 'action' => 'view', $aplicacione['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Carrera'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aplicacione['Carrera']['name'], array('controller' => 'carreras', 'action' => 'view', $aplicacione['Carrera']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proceso'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aplicacione['Proceso']['name'], array('controller' => 'procesos', 'action' => 'view', $aplicacione['Proceso']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Examene'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aplicacione['Examene']['name'], array('controller' => 'examenes', 'action' => 'view', $aplicacione['Examene']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tema'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aplicacione['Tema']['name'], array('controller' => 'temas', 'action' => 'view', $aplicacione['Tema']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recomendadore'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aplicacione['Recomendadore']['name'], array('controller' => 'recomendadores', 'action' => 'view', $aplicacione['Recomendadore']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evaluacione'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aplicacione['Evaluacione']['name'], array('controller' => 'evaluaciones', 'action' => 'view', $aplicacione['Evaluacione']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Year'); ?></dt>
		<dd>
			<?php echo h($aplicacione['Aplicacione']['year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ensayo'); ?></dt>
		<dd>
			<?php echo h($aplicacione['Aplicacione']['ensayo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Finalizado'); ?></dt>
		<dd>
			<?php echo h($aplicacione['Aplicacione']['finalizado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Actividad'); ?></dt>
		<dd>
			<?php echo h($aplicacione['Aplicacione']['actividad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sql'); ?></dt>
		<dd>
			<?php echo h($aplicacione['Aplicacione']['sql']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Idiomas'); ?></dt>
		<dd>
			<?php echo h($aplicacione['Aplicacione']['idiomas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Calificacion'); ?></dt>
		<dd>
			<?php echo h($aplicacione['Aplicacione']['calificacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CodigoPostulante'); ?></dt>
		<dd>
			<?php echo h($aplicacione['Aplicacione']['codigoPostulante']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comentarios'); ?></dt>
		<dd>
			<?php echo h($aplicacione['Aplicacione']['comentarios']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Aplicacione'), array('action' => 'edit', $aplicacione['Aplicacione']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Aplicacione'), array('action' => 'delete', $aplicacione['Aplicacione']['id']), null, __('Are you sure you want to delete # %s?', $aplicacione['Aplicacione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Aplicaciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aplicacione'), array('action' => 'add')); ?> </li>
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
