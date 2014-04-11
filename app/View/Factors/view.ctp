<div class="factors view">
<h2><?php echo __('Factor'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($factor['Factor']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($factor['Factor']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($factor['Factor']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($factor['User']['name'], array('controller' => 'users', 'action' => 'view', $factor['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($factor['Factor']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($factor['Factor']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($factor['Factor']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Factor'), array('action' => 'edit', $factor['Factor']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Factor'), array('action' => 'delete', $factor['Factor']['id']), null, __('Are you sure you want to delete # %s?', $factor['Factor']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Factors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Factor'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
