<div class="vitamins view">
<h2><?php echo __('Vitamin'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($vitamin['Vitamin']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vitamin Name'); ?></dt>
		<dd>
			<?php echo h($vitamin['Vitamin']['vitamin_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($vitamin['Vitamin']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Benefits'); ?></dt>
		<dd>
			<?php echo h($vitamin['Vitamin']['benefits']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Origin Country'); ?></dt>
		<dd>
			<?php echo h($vitamin['Vitamin']['origin_country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufacturer'); ?></dt>
		<dd>
			<?php echo h($vitamin['Vitamin']['manufacturer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Distributor'); ?></dt>
		<dd>
			<?php echo h($vitamin['Vitamin']['distributor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($vitamin['Vitamin']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($vitamin['Vitamin']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($vitamin['Vitamin']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Vitamin'), array('action' => 'edit', $vitamin['Vitamin']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Vitamin'), array('action' => 'delete', $vitamin['Vitamin']['id']), null, __('Are you sure you want to delete # %s?', $vitamin['Vitamin']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Vitamins'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vitamin'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($vitamin['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('User Groups Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($vitamin['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['groups_id']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td><?php echo $user['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
