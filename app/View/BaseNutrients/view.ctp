<div class="baseNutrients view">
<h2><?php echo __('Base Nutrient'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($baseNutrient['BaseNutrient']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Base Nutrient Formula'); ?></dt>
		<dd>
			<?php echo h($baseNutrient['BaseNutrient']['base_nutrient_formula']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Daily Dosage'); ?></dt>
		<dd>
			<?php echo h($baseNutrient['BaseNutrient']['daily_dosage']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Maximum Dosage'); ?></dt>
		<dd>
			<?php echo h($baseNutrient['BaseNutrient']['maximum_dosage']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($baseNutrient['BaseNutrient']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($baseNutrient['BaseNutrient']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($baseNutrient['BaseNutrient']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Base Nutrient'), array('action' => 'edit', $baseNutrient['BaseNutrient']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Base Nutrient'), array('action' => 'delete', $baseNutrient['BaseNutrient']['id']), null, __('Are you sure you want to delete # %s?', $baseNutrient['BaseNutrient']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Base Nutrients'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Base Nutrient'), array('action' => 'add')); ?> </li>
	</ul>
</div>
