<?php
	$user_info = $this->Session->read('Auth.User');
?>

<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		
		if($user_info['group_id'] == 1) {
			echo $this->Form->input('group_id', array('options' => $userGroups));
		} else {
			echo $this->Form->input('parent_id', array('type' => 'hidden', 'value' => $user_info['id']));
		}
		
		// echo $this->Form->input('status');
		// echo $this->Form->input('Vitamin');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<?php /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List User Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Groups'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vitamins'), array('controller' => 'vitamins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vitamin'), array('controller' => 'vitamins', 'action' => 'add')); ?> </li>
	</ul>
</div>
*/ ?>