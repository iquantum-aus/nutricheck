<div class="baseNutrients form">
<?php echo $this->Form->create('BaseNutrient'); ?>
	<fieldset>
		<legend><?php echo __('Add Base Nutrient'); ?></legend>
	<?php
		echo $this->Form->input('base_nutrient_formula');
		echo $this->Form->input('daily_dosage');
		echo $this->Form->input('maximum_dosage');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Base Nutrients'), array('action' => 'index')); ?></li>
	</ul>
</div>
