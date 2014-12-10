<div class="vitamins form">
<?php echo $this->Form->create('Vitamin'); ?>
	<fieldset>
		<legend><?php echo __('Edit Vitamin'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('vitamin_name');
		echo $this->Form->input('description');
		echo $this->Form->input('benefits');
		echo $this->Form->input('origin_country');
		echo $this->Form->input('manufacturer');
		echo $this->Form->input('distributor');
		echo $this->Form->input('status');
		echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Vitamin.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Vitamin.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Vitamins'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
