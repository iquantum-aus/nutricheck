<div class="nutritionalGuides index">
	<h2><?php echo __('Nutritional Guides'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($nutritionalGuides as $nutritionalGuide): ?>
	<tr>
		<td><?php echo h($nutritionalGuide['NutritionalGuide']['id']); ?>&nbsp;</td>
		<td><?php echo h($nutritionalGuide['NutritionalGuide']['title']); ?>&nbsp;</td>
		<td><?php echo h($nutritionalGuide['NutritionalGuide']['description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($nutritionalGuide['Users']['id'], array('controller' => 'users', 'action' => 'view', $nutritionalGuide['Users']['id'])); ?>
		</td>
		<td><?php echo h($nutritionalGuide['NutritionalGuide']['created']); ?>&nbsp;</td>
		<td><?php echo h($nutritionalGuide['NutritionalGuide']['modified']); ?>&nbsp;</td>
		<td><?php echo h($nutritionalGuide['NutritionalGuide']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $nutritionalGuide['NutritionalGuide']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $nutritionalGuide['NutritionalGuide']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $nutritionalGuide['NutritionalGuide']['id']), null, __('Are you sure you want to delete # %s?', $nutritionalGuide['NutritionalGuide']['id'])); ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Nutritional Guide'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
