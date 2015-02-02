<div class="clientGroups index">
	<h2><?php echo __('Client Groups'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('group_affiliation_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($clientGroups as $clientGroup): ?>
	<tr>
		<td><?php echo h($clientGroup['ClientGroup']['id']); ?>&nbsp;</td>
		<td><?php echo h($clientGroup['ClientGroup']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($clientGroup['GroupAffiliation']['name'], array('controller' => 'group_affiliations', 'action' => 'view', $clientGroup['GroupAffiliation']['id'])); ?>
		</td>
		<td><?php echo h($clientGroup['ClientGroup']['created']); ?>&nbsp;</td>
		<td><?php echo h($clientGroup['ClientGroup']['modified']); ?>&nbsp;</td>
		<td><?php echo h($clientGroup['ClientGroup']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $clientGroup['ClientGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $clientGroup['ClientGroup']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $clientGroup['ClientGroup']['id']), null, __('Are you sure you want to delete # %s?', $clientGroup['ClientGroup']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Client Group'), array('action' => 'add'), array('class' => 'btn btn-success')); ?></li>
		<li><?php echo $this->Html->link(__('List Group Affiliations'), array('controller' => 'group_affiliations', 'action' => 'index'), array('class' => 'btn btn-success')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group Affiliation'), array('controller' => 'group_affiliations', 'action' => 'add'), array('class' => 'btn btn-success')); ?> </li>
	</ul>
</div>
