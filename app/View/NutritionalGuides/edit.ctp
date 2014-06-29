<div class="nutritionalGuides form">
<?php echo $this->Form->create('NutritionalGuide'); ?>
	<fieldset>
		<legend><?php echo __('Edit Nutritional Guide'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('user_id');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('NutritionalGuide.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('NutritionalGuide.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Nutritional Guides'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
