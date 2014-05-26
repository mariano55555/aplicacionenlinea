<div class="estudios view">
<h2><?php  echo __('Estudio'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($estudio['Estudio']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($estudio['User']['name'], array('controller' => 'users', 'action' => 'view', $estudio['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($estudio['Estudio']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Institucion'); ?></dt>
		<dd>
			<?php echo h($estudio['Estudio']['institucion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Periodo'); ?></dt>
		<dd>
			<?php echo h($estudio['Estudio']['periodo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Estudio'), array('action' => 'edit', $estudio['Estudio']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Estudio'), array('action' => 'delete', $estudio['Estudio']['id']), null, __('Are you sure you want to delete # %s?', $estudio['Estudio']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Estudios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estudio'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
