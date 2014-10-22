<div class="userProfiles index">
	<h2><?php echo __('User Profiles'); ?> <small> - <?php echo $this->Html->link(__('Create New'), array('action' => 'add')); ?></small></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('birthday'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('nationality'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($userProfiles as $userProfile): ?>
	<tr>
		<td><?php echo h($userProfile['UserProfile']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($userProfile['Users']['id'], array('controller' => 'users', 'action' => 'view', $userProfile['Users']['id'])); ?>
		</td>
		<td><?php echo h($userProfile['UserProfile']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($userProfile['UserProfile']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($userProfile['UserProfile']['birthday']); ?>&nbsp;</td>
		<td><?php echo h($userProfile['UserProfile']['address']); ?>&nbsp;</td>
		<td><?php echo h($userProfile['UserProfile']['nationality']); ?>&nbsp;</td>
		
		<td>
			<a class="btn btn-primary" href="/user_profiles/view/<?php echo $userProfile['UserProfile']['id']; ?>">View</a>
			<a class="btn btn-warning" href="/user_profiles/edit/<?php echo $userProfile['UserProfile']['id']; ?>">Edit</a>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userProfile['UserProfile']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $userProfile['UserProfile']['id'])); ?>
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