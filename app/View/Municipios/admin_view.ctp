<div class="municipios view">
<h2><?php  echo __('Municipio'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($municipio['Municipio']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($municipio['Municipio']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Departamento'); ?></dt>
		<dd>
			<?php echo $this->Html->link($municipio['Departamento']['name'], array('controller' => 'departamentos', 'action' => 'view', $municipio['Departamento']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codsql Municipio'); ?></dt>
		<dd>
			<?php echo h($municipio['Municipio']['codsql_municipio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($municipio['Municipio']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($municipio['Municipio']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($municipio['Municipio']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($municipio['Municipio']['modified_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Municipio'), array('action' => 'edit', $municipio['Municipio']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Municipio'), array('action' => 'delete', $municipio['Municipio']['id']), null, __('Are you sure you want to delete # %s?', $municipio['Municipio']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Municipios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Municipio'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departamentos'), array('controller' => 'departamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Departamento'), array('controller' => 'departamentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
