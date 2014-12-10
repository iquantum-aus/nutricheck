<div class="selectedFactors form">
<?php echo $this->Form->create('SelectedFactor'); ?>
	<fieldset>
		<legend><?php echo __('Add Selected Factor'); ?></legend>
	<?php
		echo $this->Form->input('performed_check_id');
		echo $this->Form->input('factor_id');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Selected Factors'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Performed Checks'), array('controller' => 'performed_checks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Performed Check'), array('controller' => 'performed_checks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Factors'), array('controller' => 'factors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Factor'), array('controller' => 'factors', 'action' => 'add')); ?> </li>
	</ul>
</div>
