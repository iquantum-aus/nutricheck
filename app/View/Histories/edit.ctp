<div class="histories form">
<?php echo $this->Form->create('History'); ?>
	<fieldset>
		<legend><?php echo __('Edit History'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id', array('class' => 'chosen-select'));
		echo $this->Form->input('diagnostics');
	?>
	<input type="submit" value="SUBIMT" class="btn btn-success">
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>