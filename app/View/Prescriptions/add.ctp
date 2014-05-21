<div class="prescriptions form">
<?php echo $this->Form->create('Prescription'); ?>
	<fieldset>
		<legend><?php echo __('Add Prescription'); ?></legend>
	<?php
		echo $this->Form->input('factor_id', array('empty' => 'Select Factor'));
		echo $this->Form->input('functional_disturbance');
		echo $this->Form->input('1_20');
		echo $this->Form->input('21_40');
		echo $this->Form->input('41_60');
		echo $this->Form->input('61_80');
		echo $this->Form->input('81_100');
		echo $this->Form->input('maximum_dosage');
		echo $this->Form->submit('submit', array('class' => 'btn btn-success'));
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Prescriptions'), array('action' => 'index'), array('class' => "btn btn-primary")); ?></li>
	</ul>
</div>
