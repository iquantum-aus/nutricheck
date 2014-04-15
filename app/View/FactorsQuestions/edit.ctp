<div class="factorsQuestions form">
<?php echo $this->Form->create('FactorsQuestion'); ?>
	<fieldset>
		<legend><?php echo __('Edit Factors Question'); ?></legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('questions_id', array('empty' => 'Select a Question...', 'class' => 'chosen-select', 'style' => 'width:450px;'));
			echo $this->Form->input('factors_id', array('empty' => 'Select a Factor...', 'class' => 'chosen-select', 'style' => 'width:450px;'));
			echo $this->Form->input('multiplier', array('maxlength' => '2', 'type' => 'text'));
		?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('FactorsQuestion.id')), null, __('Are you sure you want to delete this record')); ?></li>
		<li><?php echo $this->Html->link(__('List Association'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Factors'), array('controller' => 'factors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Factors'), array('controller' => 'factors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questions'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
