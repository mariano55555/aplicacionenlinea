<div class="accesos view">
<h2><?php  echo __('Acceso'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($acceso['Acceso']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($acceso['User']['name'], array('controller' => 'users', 'action' => 'view', $acceso['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inicio'); ?></dt>
		<dd>
			<?php echo h($acceso['Acceso']['inicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fin'); ?></dt>
		<dd>
			<?php echo h($acceso['Acceso']['fin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip'); ?></dt>
		<dd>
			<?php echo h($acceso['Acceso']['ip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitud'); ?></dt>
		<dd>
			<?php echo h($acceso['Acceso']['longitud']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitud'); ?></dt>
		<dd>
			<?php echo h($acceso['Acceso']['latitud']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Acceso'), array('action' => 'edit', $acceso['Acceso']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Acceso'), array('action' => 'delete', $acceso['Acceso']['id']), null, __('Are you sure you want to delete # %s?', $acceso['Acceso']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Accesos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Acceso'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
