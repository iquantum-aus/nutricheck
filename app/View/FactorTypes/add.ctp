<div class="factorTypes form">
<?php echo $this->Form->create('FactorType'); ?>
	<fieldset>
		<legend><?php echo __('Add Factor Type'); ?></legend>
	<?php
		echo $this->Form->input('type');
	?>
	</fieldset>
	
	<input type="submit" class="btn btn-success">
	
<?php echo $this->Form->end(); ?>
</div>
