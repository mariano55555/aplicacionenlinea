<div class="departamentos view">
<h2><?php  echo __('Departamento'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($departamento['Departamento']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($departamento['Departamento']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Coddepartamento Sql'); ?></dt>
		<dd>
			<?php echo h($departamento['Departamento']['coddepartamento_sql']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($departamento['Departamento']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($departamento['Departamento']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($departamento['Departamento']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($departamento['Departamento']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Paise'); ?></dt>
		<dd>
			<?php echo $this->Html->link($departamento['Paise']['name'], array('controller' => 'paises', 'action' => 'view', $departamento['Paise']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Departamento'), array('action' => 'edit', $departamento['Departamento']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Departamento'), array('action' => 'delete', $departamento['Departamento']['id']), null, __('Are you sure you want to delete # %s?', $departamento['Departamento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Departamentos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Departamento'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Paises'), array('controller' => 'paises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paise'), array('controller' => 'paises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Municipios'), array('controller' => 'municipios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Municipio'), array('controller' => 'municipios', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Municipios'); ?></h3>
	<?php if (!empty($departamento['Municipio'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Departamento Id'); ?></th>
		<th><?php echo __('Codsql Municipio'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($departamento['Municipio'] as $municipio): ?>
		<tr>
			<td><?php echo $municipio['id']; ?></td>
			<td><?php echo $municipio['name']; ?></td>
			<td><?php echo $municipio['departamento_id']; ?></td>
			<td><?php echo $municipio['codsql_municipio']; ?></td>
			<td><?php echo $municipio['created']; ?></td>
			<td><?php echo $municipio['modified']; ?></td>
			<td><?php echo $municipio['created_by']; ?></td>
			<td><?php echo $municipio['modified_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'municipios', 'action' => 'view', $municipio['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'municipios', 'action' => 'edit', $municipio['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'municipios', 'action' => 'delete', $municipio['id']), null, __('Are you sure you want to delete # %s?', $municipio['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Municipio'), array('controller' => 'municipios', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
