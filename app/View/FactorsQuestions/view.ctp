<div class="factorsQuestions view">
<h2><?php echo __('Question'); ?></h2>
	
	<table>
		<tr>
			<td>Factor</td>
			<td><?php echo $this->Html->link($factorsQuestion['Factor']['name'], array('controller' => 'factors', 'action' => 'view', $factorsQuestion['Factor']['id'])); ?></td>
		</tr>
		
		<tr>
			<td>Question</td>
			<td><?php echo $factorsQuestion['Question']['question']; ?></td>
		</tr>
		
		<tr>
			<td>Multiplier</td>
			<td><?php echo $factorsQuestion['FactorsQuestion']['multiplier']; ?></td>
		</tr>
	</table>
</div>

<?php /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Question'), array('action' => 'question_edit', $factorsQuestion['FactorsQuestion']['id']), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Question'), array('action' => 'delete', $factorsQuestion['FactorsQuestion']['id']), array('class' => 'btn btn-primary'), __('Are you sure you want to delete this record?')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('action' => 'index'), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('action' => 'question_add'), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Html->link(__('List Factors'), array('controller' => 'factors', 'action' => 'index'), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Html->link(__('New Factors'), array('controller' => 'factors', 'action' => 'add'), array('class' => 'btn btn-primary')); ?> </li>
	</ul>
</div>
*/ ?>