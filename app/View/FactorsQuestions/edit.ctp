<div class="factorsQuestions form">
<?php echo $this->Form->create('FactorsQuestion'); ?>
	<fieldset>
		<legend><?php echo __('Edit Factors Question'); ?></legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('question_id', array('empty' => 'Select a Question...', 'class' => 'chosen-select', 'style' => 'width:450px;'));
			echo $this->Form->input('factor_id', array('empty' => 'Select a Factor...', 'class' => 'chosen-select', 'style' => 'width:450px;'));
			echo $this->Form->input('multiplier', array('maxlength' => '2', 'type' => 'text'));
			echo $this->Form->submit('Submit', array('class' => 'btn btn-success'));
		?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
<?php /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('FactorsQuestion.id')), array('class' => 'btn btn-primary'), __('Are you sure you want to delete this record')); ?></li>
		<li><?php echo $this->Html->link(__('List Association'), array('action' => 'index'), array('class' => 'btn btn-primary')); ?></li>
		<li><?php echo $this->Html->link(__('List Factors'), array('controller' => 'factors', 'action' => 'index'), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Html->link(__('New Factors'), array('controller' => 'factors', 'action' => 'add'), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index'), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questions'), array('controller' => 'questions', 'action' => 'add'), array('class' => 'btn btn-primary')); ?> </li>
	</ul>
</div>
*/ ?>