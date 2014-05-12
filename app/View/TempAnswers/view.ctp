<div class="tempAnswers view">
<h2><?php echo __('Temp Answer'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tempAnswer['TempAnswer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip Address'); ?></dt>
		<dd>
			<?php echo h($tempAnswer['TempAnswer']['ip_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Questions'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tempAnswer['Questions']['id'], array('controller' => 'questions', 'action' => 'view', $tempAnswer['Questions']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Factors'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tempAnswer['Factors']['name'], array('controller' => 'factors', 'action' => 'view', $tempAnswer['Factors']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Choice'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tempAnswer['Choice']['title'], array('controller' => 'choices', 'action' => 'view', $tempAnswer['Choice']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rank'); ?></dt>
		<dd>
			<?php echo h($tempAnswer['TempAnswer']['rank']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Answer'); ?></dt>
		<dd>
			<?php echo h($tempAnswer['TempAnswer']['answer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tempAnswer['TempAnswer']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($tempAnswer['TempAnswer']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($tempAnswer['TempAnswer']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Temp Answer'), array('action' => 'edit', $tempAnswer['TempAnswer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Temp Answer'), array('action' => 'delete', $tempAnswer['TempAnswer']['id']), null, __('Are you sure you want to delete # %s?', $tempAnswer['TempAnswer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Temp Answers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Temp Answer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questions'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Factors'), array('controller' => 'factors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Factors'), array('controller' => 'factors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Choices'), array('controller' => 'choices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Choice'), array('controller' => 'choices', 'action' => 'add')); ?> </li>
	</ul>
</div>
