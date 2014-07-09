<div class="nutritionalGuideTypes view">
<h2><?php echo __('Nutritional Guide Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($nutritionalGuideType['NutritionalGuideType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($nutritionalGuideType['User']['name'], array('controller' => 'users', 'action' => 'view', $nutritionalGuideType['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($nutritionalGuideType['NutritionalGuideType']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($nutritionalGuideType['NutritionalGuideType']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($nutritionalGuideType['NutritionalGuideType']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($nutritionalGuideType['NutritionalGuideType']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Nutritional Guide Type'), array('action' => 'edit', $nutritionalGuideType['NutritionalGuideType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Nutritional Guide Type'), array('action' => 'delete', $nutritionalGuideType['NutritionalGuideType']['id']), null, __('Are you sure you want to delete # %s?', $nutritionalGuideType['NutritionalGuideType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Nutritional Guide Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nutritional Guide Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Nutritional Guides'), array('controller' => 'nutritional_guides', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nutritional Guide'), array('controller' => 'nutritional_guides', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Nutritional Guides'); ?></h3>
	<?php if (!empty($nutritionalGuideType['NutritionalGuide'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Nutritional Guide Type Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($nutritionalGuideType['NutritionalGuide'] as $nutritionalGuide): ?>
		<tr>
			<td><?php echo $nutritionalGuide['id']; ?></td>
			<td><?php echo $nutritionalGuide['title']; ?></td>
			<td><?php echo $nutritionalGuide['description']; ?></td>
			<td><?php echo $nutritionalGuide['user_id']; ?></td>
			<td><?php echo $nutritionalGuide['nutritional_guide_type_id']; ?></td>
			<td><?php echo $nutritionalGuide['created']; ?></td>
			<td><?php echo $nutritionalGuide['modified']; ?></td>
			<td><?php echo $nutritionalGuide['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'nutritional_guides', 'action' => 'view', $nutritionalGuide['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'nutritional_guides', 'action' => 'edit', $nutritionalGuide['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'nutritional_guides', 'action' => 'delete', $nutritionalGuide['id']), null, __('Are you sure you want to delete # %s?', $nutritionalGuide['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Nutritional Guide'), array('controller' => 'nutritional_guides', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
