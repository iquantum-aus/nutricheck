<div class="qgroups form">
<?php echo $this->Form->create('Qgroup'); ?>
	<fieldset>
		<legend><?php echo __('Edit Question Group'); ?></legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('name');
			echo $this->Form->input('Question', array("class" => "chosen-select"));
		?>
	
		<input type="submit" value="Submit" class="btn btn-success">
	</fieldset>	
	
<?php echo $this->Form->end(); ?>
</div>
<?php /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Qgroup.id')), array('class' => "btn btn-primary"), __('Are you sure you want to delete # %s?', $this->Form->value('Qgroup.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Question Groups'), array('action' => 'index'), array('class' => "btn btn-primary")); ?></li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index'), array('class' => "btn btn-primary")); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add'), array('class' => "btn btn-primary")); ?> </li>
	</ul>
</div>
*/ ?>