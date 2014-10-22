<div class="histories form">
<?php echo $this->Form->create('History'); ?>
	<fieldset>
		<legend><?php echo __('Add History'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('diagnostics');
	?>
	<input type="submit" value="SUBIMT" class="btn btn-success">
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
