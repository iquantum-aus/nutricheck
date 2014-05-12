<div class="tempAnswers form">
<?php echo $this->Form->create('TempAnswer'); ?>
	<fieldset>
		<legend><?php echo __('Edit Temp Answer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('ip_address');
		echo $this->Form->input('questions_id');
		echo $this->Form->input('factors_id');
		echo $this->Form->input('choice_id');
		echo $this->Form->input('rank');
		echo $this->Form->input('answer');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TempAnswer.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TempAnswer.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Temp Answers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questions'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Factors'), array('controller' => 'factors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Factors'), array('controller' => 'factors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Choices'), array('controller' => 'choices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Choice'), array('controller' => 'choices', 'action' => 'add')); ?> </li>
	</ul>
</div>
