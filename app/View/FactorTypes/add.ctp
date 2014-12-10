<div class="factorTypes form">
<?php echo $this->Form->create('FactorType'); ?>
	<fieldset>
		<legend><?php echo __('Add Factor Type'); ?></legend>
	<?php
		echo $this->Form->input('type');
	?>
	<input type="submit" value="Submit" class="btn btn-success">
	</fieldset>	
<?php echo $this->Form->end(); ?>
</div>
