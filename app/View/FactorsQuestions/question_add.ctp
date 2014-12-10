<div class="factorsQuestions form">
<?php echo $this->Form->create('FactorsQuestion'); ?>
	<fieldset>
		<legend><?php echo __('Add Factors Question'); ?></legend>
	<?php
		echo $this->Form->input('factor_id');
		echo $this->Form->input('Question.question', array('type' => 'text'));
		echo $this->Form->input('multiplier');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<?php /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Factors Questions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Factors'), array('controller' => 'factors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Factors'), array('controller' => 'factors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questions'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
*/ ?>