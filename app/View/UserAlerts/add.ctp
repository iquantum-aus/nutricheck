<<<<<<< HEAD
<div class="userAlerts form">
<?php echo $this->Form->create('UserAlert'); ?>
	<fieldset>
		<legend><?php echo __('Add User Alert'); ?></legend>
		<?php
			echo $this->Form->input('user_id', array('selected' => $id));
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
	$(document).ready( function () {
		var current_date = "<?php echo date('Y-m-d'); ?>";
		
		$( "#datepicker" ).datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		}).on('changeDate', function (ev) {
			$(this).datepicker('hide');
			var selected_date = $( "#datepicker" ).val();
			
			if(selected_date < current_date) {
				alert('Selecting previous dates are not allowed');
				$( "#datepicker" ).css('border', "1px solid red");
				return false;
			} else {
				$( "#datepicker" ).css('border', "1px solid #ccc");
				return true;
			}
		});
		
		$('form').submit( function () {
			var selected_date = $( "#datepicker" ).val();
			if(selected_date < current_date) {
				return false;
			} else {
				return true;
			}
		});
	});
=======
<div class="userAlerts form">
<?php echo $this->Form->create('UserAlert'); ?>
	<fieldset>
		<legend><?php echo __('Add User Alert'); ?></legend>
		<?php
			echo $this->Form->input('user_id', array('selected' => $id));
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
	$(document).ready( function () {
		var current_date = "<?php echo date('Y-m-d'); ?>";
		
		$( "#datepicker" ).datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		}).on('changeDate', function (ev) {
			$(this).datepicker('hide');
			var selected_date = $( "#datepicker" ).val();
			
			if(selected_date < current_date) {
				alert('Selecting previous dates are not allowed');
				$( "#datepicker" ).css('border', "1px solid red");
				return false;
			} else {
				$( "#datepicker" ).css('border', "1px solid #ccc");
				return true;
			}
		});
		
		$('form').submit( function () {
			var selected_date = $( "#datepicker" ).val();
			if(selected_date < current_date) {
				return false;
			} else {
				return true;
			}
		});
	});
>>>>>>> f18ca3729075ee10c123aae81ddd2cbd171ea351
</script>