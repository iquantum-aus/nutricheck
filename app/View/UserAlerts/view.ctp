<div class="userAlerts view">
<h2><?php echo __('User Alert'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userAlert['UserAlert']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userAlert['User']['name'], array('controller' => 'users', 'action' => 'view', $userAlert['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alert Date'); ?></dt>
		<dd>
			<?php echo h($userAlert['UserAlert']['alert_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sent Date'); ?></dt>
		<dd>
			<?php echo h($userAlert['UserAlert']['sent_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($userAlert['UserAlert']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($userAlert['UserAlert']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($userAlert['UserAlert']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User Alert'), array('action' => 'edit', $userAlert['UserAlert']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Alert'), array('action' => 'delete', $userAlert['UserAlert']['id']), null, __('Are you sure you want to delete # %s?', $userAlert['UserAlert']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List User Alerts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Alert'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
