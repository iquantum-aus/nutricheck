<div class="performedChecks form">
<?php echo $this->Form->create('PerformedCheck'); ?>
	<fieldset>
		<legend><?php echo __('Add Performed Check'); ?></legend>
	<?php
		echo $this->Form->input('date');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Performed Checks'), array('action' => 'index')); ?></li>
	</ul>
</div>
