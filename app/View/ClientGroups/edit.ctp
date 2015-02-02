<<<<<<< HEAD
<div class="clientGroups form">
<?php echo $this->Form->create('ClientGroup'); ?>
	<fieldset>
		<legend><?php echo __('Edit Client Group'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('group_affiliation_id');
		echo $this->Form->submit('submit', array('class' => 'btn btn-success'));
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
=======
<div class="clientGroups form">
<?php echo $this->Form->create('ClientGroup'); ?>
	<fieldset>
		<legend><?php echo __('Edit Client Group'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('group_affiliation_id');
		echo $this->Form->submit('submit', array('class' => 'btn btn-success'));
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
>>>>>>> f18ca3729075ee10c123aae81ddd2cbd171ea351
