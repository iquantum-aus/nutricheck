<div class="nutritionalGuides form">
<?php echo $this->Form->create('NutritionalGuide'); ?>
	<fieldset>
		<legend><?php echo __('Edit Nutritional Guide'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('description', array('class' => 'ckeditor'));
		echo $this->Form->input('factor_id', array('options' => $factors));
		echo $this->Form->input('nutritional_guide_type_id', array('empty' => 'Select Guide Type', 'class' => 'chosen-select', 'options' => $nutritional_guide_types));
	?>
	</fieldset>
	<input type="submit" class="btn btn-success" value="Submit">
<?php echo $this->Form->end(); ?>
</div>

<?php /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('NutritionalGuide.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('NutritionalGuide.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Nutritional Guides'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
*/ ?>