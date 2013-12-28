<div class="factors index">
	<h2><?php echo __('Factors'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('users_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($factors as $factor): ?>
	<tr>
		<td><?php echo h($factor['Factor']['id']); ?>&nbsp;</td>
		<td><?php echo h($factor['Factor']['name']); ?>&nbsp;</td>
		<td><?php echo h($factor['Factor']['description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($factor['User']['id'], array('controller' => 'users', 'action' => 'view', $factor['User']['id'])); ?>
		</td>
		<td><?php echo h($factor['Factor']['created']); ?>&nbsp;</td>
		<td><?php echo h($factor['Factor']['modified']); ?>&nbsp;</td>
		<td><?php echo h($factor['Factor']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $factor['Factor']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $factor['Factor']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $factor['Factor']['id']), null, __('Are you sure you want to delete # %s?', $factor['Factor']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Factor'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
