<div class="selectedAnswerLogs view">
<h2><?php echo __('Selected Answer Log'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($selectedAnswerLog['SelectedAnswerLog']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Choice Value'); ?></dt>
		<dd>
			<?php echo h($selectedAnswerLog['SelectedAnswerLog']['choice_value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question'); ?></dt>
		<dd>
			<?php echo $this->Html->link($selectedAnswerLog['Question']['question'], array('controller' => 'questions', 'action' => 'view', $selectedAnswerLog['Question']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($selectedAnswerLog['User']['name'], array('controller' => 'users', 'action' => 'view', $selectedAnswerLog['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Performed Time'); ?></dt>
		<dd>
			<?php echo h($selectedAnswerLog['SelectedAnswerLog']['performed_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($selectedAnswerLog['SelectedAnswerLog']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($selectedAnswerLog['SelectedAnswerLog']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($selectedAnswerLog['SelectedAnswerLog']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Selected Answer Log'), array('action' => 'edit', $selectedAnswerLog['SelectedAnswerLog']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Selected Answer Log'), array('action' => 'delete', $selectedAnswerLog['SelectedAnswerLog']['id']), null, __('Are you sure you want to delete # %s?', $selectedAnswerLog['SelectedAnswerLog']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Selected Answer Logs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Selected Answer Log'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
