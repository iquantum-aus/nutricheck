<div class="pageAccessFlags view">
<h2><?php echo __('Page Access Flag'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pageAccessFlag['PageAccessFlag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Plugin'); ?></dt>
		<dd>
			<?php echo h($pageAccessFlag['PageAccessFlag']['plugin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Controllers'); ?></dt>
		<dd>
			<?php echo h($pageAccessFlag['PageAccessFlag']['controllers']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Action'); ?></dt>
		<dd>
			<?php echo h($pageAccessFlag['PageAccessFlag']['action']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pageAccessFlag['User']['name'], array('controller' => 'users', 'action' => 'view', $pageAccessFlag['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pageAccessFlag['Group']['name'], array('controller' => 'groups', 'action' => 'view', $pageAccessFlag['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($pageAccessFlag['PageAccessFlag']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($pageAccessFlag['PageAccessFlag']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($pageAccessFlag['PageAccessFlag']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Page Access Flag'), array('action' => 'edit', $pageAccessFlag['PageAccessFlag']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Page Access Flag'), array('action' => 'delete', $pageAccessFlag['PageAccessFlag']['id']), null, __('Are you sure you want to delete # %s?', $pageAccessFlag['PageAccessFlag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Page Access Flags'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page Access Flag'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
