<div class="performedChecks view">
<h2><?php echo __('Performed Check'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($performedCheck['PerformedCheck']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($performedCheck['PerformedCheck']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($performedCheck['PerformedCheck']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($performedCheck['PerformedCheck']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($performedCheck['PerformedCheck']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Performed Check'), array('action' => 'edit', $performedCheck['PerformedCheck']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Performed Check'), array('action' => 'delete', $performedCheck['PerformedCheck']['id']), null, __('Are you sure you want to delete # %s?', $performedCheck['PerformedCheck']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Performed Checks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Performed Check'), array('action' => 'add')); ?> </li>
	</ul>
</div>
