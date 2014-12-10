<div class="factorsQuestions form">
<?php echo $this->Form->create('FactorsQuestion'); ?>
	<fieldset>
		<legend><?php echo __('Edit Factors Question'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('factors_id');
		echo $this->Form->input('Question.id', array('value' => $this->request->data['Question']['id']));
		echo $this->Form->input('Question.question', array('value' => $this->request->data['Question']['question'], 'type' => 'text'));
		echo $this->Form->input('multiplier');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('FactorsQuestion.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('FactorsQuestion.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Factors Questions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Factors'), array('controller' => 'factors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Factors'), array('controller' => 'factors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questions'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
