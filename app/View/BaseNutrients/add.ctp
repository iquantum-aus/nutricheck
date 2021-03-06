<div class="baseNutrients form">
	<?php echo $this->Form->create('BaseNutrient'); ?>
		<fieldset>
			<legend><?php echo __('Add Base Nutrient'); ?></legend>
		<?php
			echo $this->Form->input('base_nutrient_formula');
			echo $this->Form->input('daily_dosage');
			echo $this->Form->input('maximum_dosage');
			echo $this->Form->input('order', array('type' => 'number'));
			$nutrient_group = array('Allergy', 'Digestion', 'Git Dysbiosis', 'Vitamins', 'Minerals', 'Neurotransmitter Precursors');
			echo $this->Form->input('nutrient_group', array('class' => 'chosen-select', 'options' => $nutrient_group, 'empty' => 'Select Group'));
		?>
		
		<input type="submit" value="SUBMIT" class="btn btn-success">
		</fieldset>
	<?php echo $this->Form->end(); ?>
</div>
