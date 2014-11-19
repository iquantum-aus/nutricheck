<div class="selectedFactors view">
<h2><?php echo __('Selected Factor'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($selectedFactor['SelectedFactor']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Performed Check'); ?></dt>
		<dd>
			<?php echo $this->Html->link($selectedFactor['PerformedCheck']['id'], array('controller' => 'performed_checks', 'action' => 'view', $selectedFactor['PerformedCheck']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Factor'); ?></dt>
		<dd>
			<?php echo $this->Html->link($selectedFactor['Factor']['name'], array('controller' => 'factors', 'action' => 'view', $selectedFactor['Factor']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($selectedFactor['SelectedFactor']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($selectedFactor['SelectedFactor']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($selectedFactor['SelectedFactor']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Selected Factor'), array('action' => 'edit', $selectedFactor['SelectedFactor']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Selected Factor'), array('action' => 'delete', $selectedFactor['SelectedFactor']['id']), null, __('Are you sure you want to delete # %s?', $selectedFactor['SelectedFactor']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Selected Factors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Selected Factor'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Performed Checks'), array('controller' => 'performed_checks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Performed Check'), array('controller' => 'performed_checks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Factors'), array('controller' => 'factors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Factor'), array('controller' => 'factors', 'action' => 'add')); ?> </li>
	</ul>
</div>
