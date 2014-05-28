<div class="answers form">
<?php echo $this->Form->create('Answer'); ?>
	<fieldset>
		<legend><?php echo __('Edit Answer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('users_id');
		echo $this->Form->input('questions_id');
		echo $this->Form->input('rank');
		echo $this->Form->input('answer');
		echo $this->Form->submit('Submit', array('class' => array('btn btn-success')));
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>

<?php /*
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>

			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Answer.id')), array('class' => 'btn btn-primary'), __('Are you sure you want to delete # %s?', $this->Form->value('Answer.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List Answers'), array('action' => 'index'), array('class' => 'btn btn-primary')); ?></li>
			<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => 'btn btn-primary')); ?> </li>
			<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add'), array('class' => 'btn btn-primary')); ?> </li>
			<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index'), array('class' => 'btn btn-primary')); ?> </li>
			<li><?php echo $this->Html->link(__('New Questions'), array('controller' => 'questions', 'action' => 'add'), array('class' => 'btn btn-primary')); ?> </li>
			<li><?php echo $this->Html->link(__('List Choices'), array('controller' => 'choices', 'action' => 'index'), array('class' => 'btn btn-primary')); ?> </li>
			<li><?php echo $this->Html->link(__('New Choice'), array('controller' => 'choices', 'action' => 'add'), array('class' => 'btn btn-primary')); ?> </li>
		</ul>
	</div>
*/ ?>
