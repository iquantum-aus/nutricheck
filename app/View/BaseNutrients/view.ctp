<div class="baseNutrients view">
<h2><?php echo __('Base Nutrient'); ?></h2>
	<table>
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td>
				<?php echo h($baseNutrient['BaseNutrient']['id']); ?>
				&nbsp;
			</td>
		</tr>
		
		<tr>
			<td><?php echo __('Base Nutrient Formula'); ?></td>
			<td>
				<?php echo h($baseNutrient['BaseNutrient']['base_nutrient_formula']); ?>
				&nbsp;
			</td>
		</tr>	
		
		<tr>
			<td><?php echo __('Daily Dosage'); ?></td>
			<td>
				<?php echo h($baseNutrient['BaseNutrient']['daily_dosage']); ?>
				&nbsp;
			</td>
		</tr>
		
		<tr>
			<td><?php echo __('Maximum Dosage'); ?></td>
			<td>
				<?php echo h($baseNutrient['BaseNutrient']['maximum_dosage']); ?>
				&nbsp;
			</td>
		</tr>
		
		<tr>
			<td><?php echo __('Created'); ?></td>
			<td>
				<?php echo h($baseNutrient['BaseNutrient']['created']); ?>
				&nbsp;
			</td>
		</tr>	
		
		<tr>
			<td><?php echo __('Modified'); ?></td>
			<td>
				<?php echo h($baseNutrient['BaseNutrient']['modified']); ?>
				&nbsp;
			</td>
		</tr>
		
		<tr>
			<td><?php echo __('Status'); ?></td>
			<td>
				<?php echo h($baseNutrient['BaseNutrient']['status']); ?>
				&nbsp;
			</td>
		</tr>
	</table>
</div>
