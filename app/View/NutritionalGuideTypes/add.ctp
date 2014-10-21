<div class="nutritionalGuideTypes form">
<?php echo $this->Form->create('NutritionalGuideType'); ?>
	<fieldset>
		<legend><?php echo __('Add Nutritional Guide Type'); ?></legend>
	<?php
		echo $this->Form->input('type');
	?>
	<input type="submit" value="SUBIMT" class="btn btn-success">
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>

<?php /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Nutritional Guide Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Nutritional Guides'), array('controller' => 'nutritional_guides', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nutritional Guide'), array('controller' => 'nutritional_guides', 'action' => 'add')); ?> </li>
	</ul>
</div>
*/ ?>
