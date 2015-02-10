<div class="userAlerts form">
<?php echo $this->Form->create('UserAlert'); ?>
	<fieldset>
		<legend><?php echo __('Add User Alert'); ?></legend>
		
		<select name="data[UserAlert][user_id]" id="UserAlertUserId">
			<option value=">">Select A User</option>
			<?php foreach($user_profiles as $user_profile) { ?>
				<?php if(empty($user_profile['UserProfile']['first_name']) && empty($user_profile['UserProfile']['last_name'])) { ?>
					<option value="<?php echo $user_profile['UserProfile']['user_id']; ?>"><?php echo $user_profile['User']['email']; ?></option>
				<?php } else { ?>
					<option value="<?php echo $user_profile['UserProfile']['user_id']; ?>"><?php echo $user_profile['UserProfile']['first_name']." ".$user_profile['UserProfile']['last_name']; ?></option>
				<?php } ?>
			<?php } ?>
		</select>
		
		<?php echo $this->Form->input('alert_date', array('id' => "datepicker", 'type' => 'text')); ?>
		<input type="submit" class="btn btn-danger">
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List User Alerts'), array('action' => 'alert_list', $id), array('class' => 'btn')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'index'), array('class' => 'btn')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'add'), array('class' => 'btn')); ?> </li>
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
</script>