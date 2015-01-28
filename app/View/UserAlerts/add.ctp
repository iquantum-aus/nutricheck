<div class="userAlerts form">
<?php echo $this->Form->create('UserAlert'); ?>
	<fieldset>
		<legend><?php echo __('Add User Alert'); ?></legend>
		<?php
			echo $this->Form->input('user_id', array('value' => $id, 'type' => 'hidden'));
			echo $this->Form->input('alert_date', array('id' => "datepicker", 'type' => 'text'));
		?>
		<input type="submit" class="btn btn-danger">
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List User Alerts'), array('action' => 'index'), array('class' => 'btn')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => 'btn')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => 'btn')); ?> </li>
	</ul>
</div>

<script>
	$(function() {
		$( "#datepicker" ).datepicker({
			format: 'yyyy-mm-dd'
		});
	});
</script>