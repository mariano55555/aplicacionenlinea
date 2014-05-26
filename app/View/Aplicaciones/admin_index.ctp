<div class="aplicaciones index">
	<h2><?php echo __('Aplicaciones'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('carrera_id'); ?></th>
			<th><?php echo $this->Paginator->sort('proceso_id'); ?></th>
			<th><?php echo $this->Paginator->sort('examen_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tema_id'); ?></th>
			<th><?php echo $this->Paginator->sort('recomendador_id'); ?></th>
			<th><?php echo $this->Paginator->sort('evaluacion_id'); ?></th>
			<th><?php echo $this->Paginator->sort('year'); ?></th>
			<th><?php echo $this->Paginator->sort('ensayo'); ?></th>
			<th><?php echo $this->Paginator->sort('finalizado'); ?></th>
			<th><?php echo $this->Paginator->sort('actividad'); ?></th>
			<th><?php echo $this->Paginator->sort('sql'); ?></th>
			<th><?php echo $this->Paginator->sort('idiomas'); ?></th>
			<th><?php echo $this->Paginator->sort('calificacion'); ?></th>
			<th><?php echo $this->Paginator->sort('codigoPostulante'); ?></th>
			<th><?php echo $this->Paginator->sort('comentarios'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($aplicaciones as $aplicacione): ?>
	<tr>
		<td><?php echo h($aplicacione['Aplicacione']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($aplicacione['User']['name'], array('controller' => 'users', 'action' => 'view', $aplicacione['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($aplicacione['Carrera']['name'], array('controller' => 'carreras', 'action' => 'view', $aplicacione['Carrera']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($aplicacione['Proceso']['name'], array('controller' => 'procesos', 'action' => 'view', $aplicacione['Proceso']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($aplicacione['Examene']['name'], array('controller' => 'examenes', 'action' => 'view', $aplicacione['Examene']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($aplicacione['Tema']['name'], array('controller' => 'temas', 'action' => 'view', $aplicacione['Tema']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($aplicacione['Recomendadore']['name'], array('controller' => 'recomendadores', 'action' => 'view', $aplicacione['Recomendadore']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($aplicacione['Evaluacione']['name'], array('controller' => 'evaluaciones', 'action' => 'view', $aplicacione['Evaluacione']['id'])); ?>
		</td>
		<td><?php echo h($aplicacione['Aplicacione']['year']); ?>&nbsp;</td>
		<td><?php echo h($aplicacione['Aplicacione']['ensayo']); ?>&nbsp;</td>
		<td><?php echo h($aplicacione['Aplicacione']['finalizado']); ?>&nbsp;</td>
		<td><?php echo h($aplicacione['Aplicacione']['actividad']); ?>&nbsp;</td>
		<td><?php echo h($aplicacione['Aplicacione']['sql']); ?>&nbsp;</td>
		<td><?php echo h($aplicacione['Aplicacione']['idiomas']); ?>&nbsp;</td>
		<td><?php echo h($aplicacione['Aplicacione']['calificacion']); ?>&nbsp;</td>
		<td><?php echo h($aplicacione['Aplicacione']['codigoPostulante']); ?>&nbsp;</td>
		<td><?php echo h($aplicacione['Aplicacione']['comentarios']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $aplicacione['Aplicacione']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $aplicacione['Aplicacione']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $aplicacione['Aplicacione']['id']), null, __('Are you sure you want to delete # %s?', $aplicacione['Aplicacione']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Aplicacione'), array('action' => 'add')); ?></li>
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
