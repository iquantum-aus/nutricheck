<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Groups'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['UserGroups']['name'], array('controller' => 'user_groups', 'action' => 'view', $user['UserGroups']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($user['User']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Groups'), array('controller' => 'user_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Groups'), array('controller' => 'user_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vitamins'), array('controller' => 'vitamins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vitamin'), array('controller' => 'vitamins', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Vitamins'); ?></h3>
	<?php if (!empty($user['Vitamin'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Vitamin Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Benefits'); ?></th>
		<th><?php echo __('Origin Country'); ?></th>
		<th><?php echo __('Manufacturer'); ?></th>
		<th><?php echo __('Distributor'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Vitamin'] as $vitamin): ?>
		<tr>
			<td><?php echo $vitamin['id']; ?></td>
			<td><?php echo $vitamin['vitamin_name']; ?></td>
			<td><?php echo $vitamin['description']; ?></td>
			<td><?php echo $vitamin['benefits']; ?></td>
			<td><?php echo $vitamin['origin_country']; ?></td>
			<td><?php echo $vitamin['manufacturer']; ?></td>
			<td><?php echo $vitamin['distributor']; ?></td>
			<td><?php echo $vitamin['created']; ?></td>
			<td><?php echo $vitamin['modified']; ?></td>
			<td><?php echo $vitamin['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'vitamins', 'action' => 'view', $vitamin['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'vitamins', 'action' => 'edit', $vitamin['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'vitamins', 'action' => 'delete', $vitamin['id']), null, __('Are you sure you want to delete # %s?', $vitamin['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Vitamin'), array('controller' => 'vitamins', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
