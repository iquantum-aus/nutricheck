<div class="nutritionalGuideTypes view">
<h2><?php echo __('Nutritional Guide Type'); ?></h2>
	<table>
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td>
				<?php echo h($nutritionalGuideType['NutritionalGuideType']['id']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<td><?php echo __('User'); ?></td>
			<td>
				<?php echo $this->Html->link($nutritionalGuideType['User']['name'], array('controller' => 'users', 'action' => 'view', $nutritionalGuideType['User']['id'])); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<td><?php echo __('Type'); ?></td>
			<td>
				<?php echo h($nutritionalGuideType['NutritionalGuideType']['type']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<td><?php echo __('Created'); ?></td>
			<td>
				<?php echo h($nutritionalGuideType['NutritionalGuideType']['created']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<td><?php echo __('Modified'); ?></td>
			<td>
				<?php echo h($nutritionalGuideType['NutritionalGuideType']['modified']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<td><?php echo __('Status'); ?></td>
			<td>
				<?php echo h($nutritionalGuideType['NutritionalGuideType']['status']); ?>
				&nbsp;
			</td>
		</tr>
	</table>
</div>