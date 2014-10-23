<div class="nutritionalGuides form">
<?php echo $this->Form->create('NutritionalGuide'); ?>
	<fieldset>
		<legend><?php echo __('Add Nutritional Guide'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description', array('class' => 'ckeditor'));
		echo $this->Form->input('factor_id', array('options' => $factors, 'class' => 'chosen-select', 'empty' => 'Select Factor'));
		echo $this->Form->input('nutritional_guide_type_id', array('empty' => 'Select Guide Type', 'class' => 'chosen-select', 'options' => $nutritional_guide_types));
	?>
	<input type="submit" class="btn btn-success" value="Submit">
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>

<?php /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Nutritional Guides'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
*/ ?>
