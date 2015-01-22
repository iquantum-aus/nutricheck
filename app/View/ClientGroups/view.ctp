<div class="clientGroups view">
<h2><?php echo __('Client Group'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($clientGroup['ClientGroup']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($clientGroup['ClientGroup']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group Affiliation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($clientGroup['GroupAffiliation']['name'], array('controller' => 'group_affiliations', 'action' => 'view', $clientGroup['GroupAffiliation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($clientGroup['ClientGroup']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($clientGroup['ClientGroup']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($clientGroup['ClientGroup']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Client Group'), array('action' => 'edit', $clientGroup['ClientGroup']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Client Group'), array('action' => 'delete', $clientGroup['ClientGroup']['id']), null, __('Are you sure you want to delete # %s?', $clientGroup['ClientGroup']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Client Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Group'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Group Affiliations'), array('controller' => 'group_affiliations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group Affiliation'), array('controller' => 'group_affiliations', 'action' => 'add')); ?> </li>
	</ul>
</div>
