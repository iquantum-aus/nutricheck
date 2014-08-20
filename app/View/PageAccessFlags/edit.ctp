<div class="pageAccessFlags form">
<?php echo $this->Form->create('PageAccessFlag'); ?>
	<fieldset>
		<legend><?php echo __('Edit Page Access Flag'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('plugin');
		echo $this->Form->input('controllers');
		echo $this->Form->input('action');
		echo $this->Form->input('user_id');
		echo $this->Form->input('group_id');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PageAccessFlag.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PageAccessFlag.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Page Access Flags'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
