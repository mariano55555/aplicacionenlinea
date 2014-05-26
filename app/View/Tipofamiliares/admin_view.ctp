<div class="tipofamiliares view">
<h2><?php  echo __('Tipofamiliare'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tipofamiliare['Tipofamiliare']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($tipofamiliare['Tipofamiliare']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tipofamiliare['Tipofamiliare']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($tipofamiliare['Tipofamiliare']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($tipofamiliare['Tipofamiliare']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($tipofamiliare['Tipofamiliare']['modified_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tipofamiliare'), array('action' => 'edit', $tipofamiliare['Tipofamiliare']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tipofamiliare'), array('action' => 'delete', $tipofamiliare['Tipofamiliare']['id']), null, __('Are you sure you want to delete # %s?', $tipofamiliare['Tipofamiliare']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipofamiliares'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipofamiliare'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Familiares'), array('controller' => 'familiares', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Familiare'), array('controller' => 'familiares', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Familiares'); ?></h3>
	<?php if (!empty($tipofamiliare['Familiare'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Ocupacion'); ?></th>
		<th><?php echo __('Trabajo'); ?></th>
		<th><?php echo __('Celular'); ?></th>
		<th><?php echo __('Telefono'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Parentesco'); ?></th>
		<th><?php echo __('Tipofamiliar Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tipofamiliare['Familiare'] as $familiare): ?>
		<tr>
			<td><?php echo $familiare['id']; ?></td>
			<td><?php echo $familiare['name']; ?></td>
			<td><?php echo $familiare['ocupacion']; ?></td>
			<td><?php echo $familiare['trabajo']; ?></td>
			<td><?php echo $familiare['celular']; ?></td>
			<td><?php echo $familiare['telefono']; ?></td>
			<td><?php echo $familiare['email']; ?></td>
			<td><?php echo $familiare['parentesco']; ?></td>
			<td><?php echo $familiare['tipofamiliar_id']; ?></td>
			<td><?php echo $familiare['user_id']; ?></td>
			<td><?php echo $familiare['created']; ?></td>
			<td><?php echo $familiare['modified']; ?></td>
			<td><?php echo $familiare['created_by']; ?></td>
			<td><?php echo $familiare['modified_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'familiares', 'action' => 'view', $familiare['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'familiares', 'action' => 'edit', $familiare['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'familiares', 'action' => 'delete', $familiare['id']), null, __('Are you sure you want to delete # %s?', $familiare['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Familiare'), array('controller' => 'familiares', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
