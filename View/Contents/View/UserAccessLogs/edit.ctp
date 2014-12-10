<div class="userAccessLogs form">
<?php echo $this->Form->create('UserAccessLog'); ?>
	<fieldset>
		<legend><?php echo __('Edit User Access Log'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('users_id');
		echo $this->Form->input('ip_address');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UserAccessLog.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('UserAccessLog.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List User Access Logs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
