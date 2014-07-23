<div class="analysisResults form">
<?php echo $this->Form->create('AnalysisResult'); ?>
	<fieldset>
		<legend><?php echo __('Edit Analysis Result'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('factor_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('score');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AnalysisResult.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('AnalysisResult.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Analysis Results'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Factors'), array('controller' => 'factors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Factors'), array('controller' => 'factors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
