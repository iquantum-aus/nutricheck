<div class="userAlerts index">
	<h2><?php echo __('User Alerts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('alert_date'); ?></th>
			<th><?php echo $this->Paginator->sort('sent_date'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($userAlerts as $userAlert): ?>
	<tr>
		<td><?php echo h($userAlert['UserAlert']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($userAlert['User']['email'], array('controller' => 'users', 'action' => 'view', $userAlert['User']['id'])); ?>
		</td>
		<td><?php echo h($userAlert['UserAlert']['alert_date']); ?>&nbsp;</td>
		<td><?php echo h($userAlert['UserAlert']['sent_date']); ?>&nbsp;</td>
		<td><?php echo h($userAlert['UserAlert']['created']); ?>&nbsp;</td>
		<td><?php echo h($userAlert['UserAlert']['modified']); ?>&nbsp;</td>
		<td><?php echo h($userAlert['UserAlert']['status']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userAlert['UserAlert']['id']), array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userAlert['UserAlert']['id']), array('class' => 'btn btn-warning')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userAlert['UserAlert']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $userAlert['UserAlert']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New User Alert'), array('action' => 'add'), array('class' => 'btn')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => 'btn')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => 'btn')); ?> </li>
	</ul>
</div>
