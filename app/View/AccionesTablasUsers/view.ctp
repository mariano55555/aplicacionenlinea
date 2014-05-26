<div class="accionesTablasUsers view">
<h2><?php  echo __('Acciones Tablas User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($accionesTablasUser['AccionesTablasUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Accione'); ?></dt>
		<dd>
			<?php echo $this->Html->link($accionesTablasUser['Accione']['name'], array('controller' => 'acciones', 'action' => 'view', $accionesTablasUser['Accione']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tabla'); ?></dt>
		<dd>
			<?php echo $this->Html->link($accionesTablasUser['Tabla']['name'], array('controller' => 'tablas', 'action' => 'view', $accionesTablasUser['Tabla']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($accionesTablasUser['User']['name'], array('controller' => 'users', 'action' => 'view', $accionesTablasUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($accionesTablasUser['AccionesTablasUser']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Acciones Tablas User'), array('action' => 'edit', $accionesTablasUser['AccionesTablasUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Acciones Tablas User'), array('action' => 'delete', $accionesTablasUser['AccionesTablasUser']['id']), null, __('Are you sure you want to delete # %s?', $accionesTablasUser['AccionesTablasUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Acciones Tablas Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Acciones Tablas User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Acciones'), array('controller' => 'acciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accione'), array('controller' => 'acciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tablas'), array('controller' => 'tablas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tabla'), array('controller' => 'tablas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
