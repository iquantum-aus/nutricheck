<div class="baseNutrients form">
<?php echo $this->Form->create('BaseNutrient'); ?>
	<fieldset>
		<legend><?php echo __('Edit Base Nutrient'); ?></legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('base_nutrient_formula');
			echo $this->Form->input('daily_dosage');
			echo $this->Form->input('maximum_dosage');
			$nutrient_group = array('Allergy', 'Digestion', 'Git Dysbiosis', 'Vitamins', 'Minerals', ' Neurotransmitter Precursors');
			echo $this->Form->input('nutrient_group', array('class' => 'chosen-select', 'options' => $nutrient_group));
		?>
		<input type="submit" value="SUBMIT" class="btn btn-success">
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>