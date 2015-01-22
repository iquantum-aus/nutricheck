<div class="groupAffiliations view">
<h2><?php echo __('Group Affiliation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($groupAffiliation['GroupAffiliation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($groupAffiliation['GroupAffiliation']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($groupAffiliation['GroupAffiliation']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($groupAffiliation['GroupAffiliation']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($groupAffiliation['GroupAffiliation']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Group Affiliation'), array('action' => 'edit', $groupAffiliation['GroupAffiliation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Group Affiliation'), array('action' => 'delete', $groupAffiliation['GroupAffiliation']['id']), null, __('Are you sure you want to delete # %s?', $groupAffiliation['GroupAffiliation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Group Affiliations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group Affiliation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Client Groups'), array('controller' => 'client_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Group'), array('controller' => 'client_groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Client Groups'); ?></h3>
	<?php if (!empty($groupAffiliation['ClientGroup'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Group Affiliation Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($groupAffiliation['ClientGroup'] as $clientGroup): ?>
		<tr>
			<td><?php echo $clientGroup['id']; ?></td>
			<td><?php echo $clientGroup['name']; ?></td>
			<td><?php echo $clientGroup['group_affiliation_id']; ?></td>
			<td><?php echo $clientGroup['created']; ?></td>
			<td><?php echo $clientGroup['modified']; ?></td>
			<td><?php echo $clientGroup['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'client_groups', 'action' => 'view', $clientGroup['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'client_groups', 'action' => 'edit', $clientGroup['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'client_groups', 'action' => 'delete', $clientGroup['id']), null, __('Are you sure you want to delete # %s?', $clientGroup['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Client Group'), array('controller' => 'client_groups', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
