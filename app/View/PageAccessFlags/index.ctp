<div class="pageAccessFlags index">
	<h2><?php echo __('Page Access Flags'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('plugin'); ?></th>
			<th><?php echo $this->Paginator->sort('controllers'); ?></th>
			<th><?php echo $this->Paginator->sort('action'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($pageAccessFlags as $pageAccessFlag): ?>
	<tr>
		<td><?php echo h($pageAccessFlag['PageAccessFlag']['id']); ?>&nbsp;</td>
		<td><?php echo h($pageAccessFlag['PageAccessFlag']['plugin']); ?>&nbsp;</td>
		<td><?php echo h($pageAccessFlag['PageAccessFlag']['controllers']); ?>&nbsp;</td>
		<td><?php echo h($pageAccessFlag['PageAccessFlag']['action']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pageAccessFlag['User']['name'], array('controller' => 'users', 'action' => 'view', $pageAccessFlag['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pageAccessFlag['Group']['name'], array('controller' => 'groups', 'action' => 'view', $pageAccessFlag['Group']['id'])); ?>
		</td>
		<td><?php echo h($pageAccessFlag['PageAccessFlag']['created']); ?>&nbsp;</td>
		<td><?php echo h($pageAccessFlag['PageAccessFlag']['modified']); ?>&nbsp;</td>
		<td><?php echo h($pageAccessFlag['PageAccessFlag']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $pageAccessFlag['PageAccessFlag']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pageAccessFlag['PageAccessFlag']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $pageAccessFlag['PageAccessFlag']['id']), null, __('Are you sure you want to delete # %s?', $pageAccessFlag['PageAccessFlag']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Page Access Flag'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
