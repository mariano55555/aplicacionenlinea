<div class="otraubicaciones view">
<h2><?php  echo __('Otraubicacione'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($otraubicacione['Otraubicacione']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($otraubicacione['Otraubicacione']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Paise'); ?></dt>
		<dd>
			<?php echo $this->Html->link($otraubicacione['Paise']['name'], array('controller' => 'paises', 'action' => 'view', $otraubicacione['Paise']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($otraubicacione['Otraubicacione']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($otraubicacione['Otraubicacione']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($otraubicacione['Otraubicacione']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($otraubicacione['Otraubicacione']['modified_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Otraubicacione'), array('action' => 'edit', $otraubicacione['Otraubicacione']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Otraubicacione'), array('action' => 'delete', $otraubicacione['Otraubicacione']['id']), null, __('Are you sure you want to delete # %s?', $otraubicacione['Otraubicacione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Otraubicaciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Otraubicacione'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Paises'), array('controller' => 'paises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paise'), array('controller' => 'paises', 'action' => 'add')); ?> </li>
	</ul>
</div>
