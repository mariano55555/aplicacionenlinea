<div class="familiares view">
<h2><?php  echo __('Familiare'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($familiare['Familiare']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($familiare['Familiare']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ocupacion'); ?></dt>
		<dd>
			<?php echo h($familiare['Familiare']['ocupacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trabajo'); ?></dt>
		<dd>
			<?php echo h($familiare['Familiare']['trabajo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Celular'); ?></dt>
		<dd>
			<?php echo h($familiare['Familiare']['celular']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono'); ?></dt>
		<dd>
			<?php echo h($familiare['Familiare']['telefono']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($familiare['Familiare']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parentesco'); ?></dt>
		<dd>
			<?php echo h($familiare['Familiare']['parentesco']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipofamiliare'); ?></dt>
		<dd>
			<?php echo $this->Html->link($familiare['Tipofamiliare']['name'], array('controller' => 'tipofamiliares', 'action' => 'view', $familiare['Tipofamiliare']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($familiare['User']['name'], array('controller' => 'users', 'action' => 'view', $familiare['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($familiare['Familiare']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($familiare['Familiare']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($familiare['Familiare']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($familiare['Familiare']['modified_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Familiare'), array('action' => 'edit', $familiare['Familiare']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Familiare'), array('action' => 'delete', $familiare['Familiare']['id']), null, __('Are you sure you want to delete # %s?', $familiare['Familiare']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Familiares'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Familiare'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipofamiliares'), array('controller' => 'tipofamiliares', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipofamiliare'), array('controller' => 'tipofamiliares', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
