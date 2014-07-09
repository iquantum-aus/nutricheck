<div class="nutritionalGuideTypes index">
	<h2><?php echo __('Nutritional Guide Types'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($nutritionalGuideTypes as $nutritionalGuideType): ?>
	<tr>
		<td><?php echo h($nutritionalGuideType['NutritionalGuideType']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($nutritionalGuideType['User']['name'], array('controller' => 'users', 'action' => 'view', $nutritionalGuideType['User']['id'])); ?>
		</td>
		<td><?php echo h($nutritionalGuideType['NutritionalGuideType']['type']); ?>&nbsp;</td>
		<td><?php echo h($nutritionalGuideType['NutritionalGuideType']['created']); ?>&nbsp;</td>
		<td><?php echo h($nutritionalGuideType['NutritionalGuideType']['modified']); ?>&nbsp;</td>
		<td><?php echo h($nutritionalGuideType['NutritionalGuideType']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $nutritionalGuideType['NutritionalGuideType']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $nutritionalGuideType['NutritionalGuideType']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $nutritionalGuideType['NutritionalGuideType']['id']), null, __('Are you sure you want to delete # %s?', $nutritionalGuideType['NutritionalGuideType']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

<?php /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Nutritional Guide Type'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Nutritional Guides'), array('controller' => 'nutritional_guides', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nutritional Guide'), array('controller' => 'nutritional_guides', 'action' => 'add')); ?> </li>
	</ul>
</div>
*/ ?>