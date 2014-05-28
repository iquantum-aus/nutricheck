<div class="prescriptions form">
<?php echo $this->Form->create('Prescription'); ?>
	<fieldset>
		<legend><?php echo __('Edit Prescription'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('factor_id', array('empty' => 'Select Factor'));
		echo $this->Form->input('functional_disturbance');
		echo $this->Form->input('1_20', array('label' => '1 - 20'));
		echo $this->Form->input('21_40', array('label' => '21 - 40'));
		echo $this->Form->input('41_60', array('label' => '41 - 60'));
		echo $this->Form->input('61_80', array('label' => '61 - 80'));
		echo $this->Form->input('81_100', array('label' => '81 - 100'));
		echo $this->Form->input('maximum_dosage');
		echo $this->Form->submit('Submit', array('class' => "btn btn-success"));
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>

<?php /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Prescription.id')), array('class' => "btn btn-primary"), __('Are you sure you want to delete # %s?', $this->Form->value('Prescription.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Prescriptions'), array('action' => 'index'), array('class' => "btn btn-primary")); ?></li>
	</ul>
</div>
*/ ?>