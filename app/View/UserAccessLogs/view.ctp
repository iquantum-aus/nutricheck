<div class="userAccessLogs view">
<h2><?php echo __('User Access Log'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userAccessLog['UserAccessLog']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Users'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userAccessLog['Users']['id'], array('controller' => 'users', 'action' => 'view', $userAccessLog['Users']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip Address'); ?></dt>
		<dd>
			<?php echo h($userAccessLog['UserAccessLog']['ip_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($userAccessLog['UserAccessLog']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($userAccessLog['UserAccessLog']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($userAccessLog['UserAccessLog']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User Access Log'), array('action' => 'edit', $userAccessLog['UserAccessLog']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Access Log'), array('action' => 'delete', $userAccessLog['UserAccessLog']['id']), null, __('Are you sure you want to delete # %s?', $userAccessLog['UserAccessLog']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List User Access Logs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Access Log'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
