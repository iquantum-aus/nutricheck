<div class="tempAnswers index">
	<h2><?php echo __('Temp Answers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('ip_address'); ?></th>
			<th><?php echo $this->Paginator->sort('question_id'); ?></th>
			<th><?php echo $this->Paginator->sort('factor_id'); ?></th>
			<th><?php echo $this->Paginator->sort('choice_id'); ?></th>
			<th><?php echo $this->Paginator->sort('rank'); ?></th>
			<th><?php echo $this->Paginator->sort('answer'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tempAnswers as $tempAnswer): ?>
	<tr>
		<td><?php echo h($tempAnswer['TempAnswer']['id']); ?>&nbsp;</td>
		<td><?php echo h($tempAnswer['TempAnswer']['ip_address']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tempAnswer['Questions']['id'], array('controller' => 'questions', 'action' => 'view', $tempAnswer['Questions']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($tempAnswer['Factors']['name'], array('controller' => 'factors', 'action' => 'view', $tempAnswer['Factors']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($tempAnswer['Choice']['title'], array('controller' => 'choices', 'action' => 'view', $tempAnswer['Choice']['id'])); ?>
		</td>
		<td><?php echo h($tempAnswer['TempAnswer']['rank']); ?>&nbsp;</td>
		<td><?php echo h($tempAnswer['TempAnswer']['answer']); ?>&nbsp;</td>
		<td><?php echo h($tempAnswer['TempAnswer']['created']); ?>&nbsp;</td>
		<td><?php echo h($tempAnswer['TempAnswer']['modified']); ?>&nbsp;</td>
		<td><?php echo h($tempAnswer['TempAnswer']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tempAnswer['TempAnswer']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tempAnswer['TempAnswer']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tempAnswer['TempAnswer']['id']), null, __('Are you sure you want to delete # %s?', $tempAnswer['TempAnswer']['id'])); ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Temp Answer'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questions'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Factors'), array('controller' => 'factors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Factors'), array('controller' => 'factors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Choices'), array('controller' => 'choices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Choice'), array('controller' => 'choices', 'action' => 'add')); ?> </li>
	</ul>
</div>
