<div class="factorsQuestions index">
	<h2><?php echo __('Factors Questions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('factors_id'); ?></th>
			<th><?php echo $this->Paginator->sort('questions_id'); ?></th>
			<th><?php echo $this->Paginator->sort('multiplier'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($factorsQuestions as $factorsQuestion): ?>
	<tr>
		<td><?php echo h($factorsQuestion['FactorsQuestion']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($factorsQuestion['Factor']['name'], array('controller' => 'factors', 'action' => 'view', $factorsQuestion['Factor']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($factorsQuestion['Question']['question'], array('controller' => 'questions', 'action' => 'view', $factorsQuestion['Question']['id'])); ?>
		</td>
		<td><?php echo h($factorsQuestion['FactorsQuestion']['multiplier']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $factorsQuestion['FactorsQuestion']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'question_edit', $factorsQuestion['FactorsQuestion']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $factorsQuestion['FactorsQuestion']['id']), null, __('Are you sure you want to delete # %s?', $factorsQuestion['FactorsQuestion']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Factors Question'), array('action' => 'question_add')); ?></li>
		<li><?php echo $this->Html->link(__('List Factors'), array('controller' => 'factors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Factors'), array('controller' => 'factors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questions'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
