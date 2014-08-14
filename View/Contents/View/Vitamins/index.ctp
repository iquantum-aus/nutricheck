<div class="vitamins index">
	<h2><?php echo __('Vitamins'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('vitamin_name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('benefits'); ?></th>
			<th><?php echo $this->Paginator->sort('origin_country'); ?></th>
			<th><?php echo $this->Paginator->sort('manufacturer'); ?></th>
			<th><?php echo $this->Paginator->sort('distributor'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($vitamins as $vitamin): ?>
	<tr>
		<td><?php echo h($vitamin['Vitamin']['id']); ?>&nbsp;</td>
		<td><?php echo h($vitamin['Vitamin']['vitamin_name']); ?>&nbsp;</td>
		<td><?php echo h($vitamin['Vitamin']['description']); ?>&nbsp;</td>
		<td><?php echo h($vitamin['Vitamin']['benefits']); ?>&nbsp;</td>
		<td><?php echo h($vitamin['Vitamin']['origin_country']); ?>&nbsp;</td>
		<td><?php echo h($vitamin['Vitamin']['manufacturer']); ?>&nbsp;</td>
		<td><?php echo h($vitamin['Vitamin']['distributor']); ?>&nbsp;</td>
		<td><?php echo h($vitamin['Vitamin']['created']); ?>&nbsp;</td>
		<td><?php echo h($vitamin['Vitamin']['modified']); ?>&nbsp;</td>
		<td><?php echo h($vitamin['Vitamin']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $vitamin['Vitamin']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $vitamin['Vitamin']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $vitamin['Vitamin']['id']), null, __('Are you sure you want to delete # %s?', $vitamin['Vitamin']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Vitamin'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
