<div class="factors form">
<?php echo $this->Form->create('Factor'); ?>
	<fieldset>
		<legend><?php echo __('Edit Factor'); ?></legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('factor_type_id', array('class' => 'chosen-select'));
			echo $this->Form->input('name');
			echo $this->Form->input('description');
			echo $this->Form->submit('Submit', array('class' => 'btn btn-success'));
		?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
<?php /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Factor.id')), array('class' => 'btn btn-primary'), __('Are you sure you want to delete # %s?', $this->Form->value('Factor.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Factors'), array('action' => 'index'), array('class' => 'btn btn-primary')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => 'btn btn-primary')); ?> </li>
	</ul>
</div>
*/ ?>