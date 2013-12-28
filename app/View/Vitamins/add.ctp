<div class="vitamins form">
<?php echo $this->Form->create('Vitamin'); ?>
	<fieldset>
		<legend><?php echo __('Add Vitamin'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Vitamins'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
