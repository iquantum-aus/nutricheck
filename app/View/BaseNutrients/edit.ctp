<div class="baseNutrients form">
<?php echo $this->Form->create('BaseNutrient'); ?>
	<fieldset>
		<legend><?php echo __('Edit Base Nutrient'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('base_nutrient_formula');
		echo $this->Form->input('daily_dosage');
		echo $this->Form->input('maximum_dosage');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BaseNutrient.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('BaseNutrient.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Base Nutrients'), array('action' => 'index')); ?></li>
	</ul>
</div>
