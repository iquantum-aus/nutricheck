<div class="baseNutrients form">
	<?php echo $this->Form->create('BaseNutrient'); ?>
		<fieldset>
			<legend><?php echo __('Add Base Nutrient'); ?></legend>
		<?php
			echo $this->Form->input('base_nutrient_formula');
			echo $this->Form->input('daily_dosage');
			echo $this->Form->input('maximum_dosage');
		?>
		
		<input type="submit" value="SUBIMT" class="btn btn-success">
		</fieldset>
	<?php echo $this->Form->end(); ?>
</div>
