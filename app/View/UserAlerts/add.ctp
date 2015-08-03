<div class="userAlerts form">
<?php echo $this->Form->create('UserAlert'); ?>
	<fieldset>
		<legend><?php echo __('Add User Alert'); ?></legend>
		
		<?php if($this->Session->read('Auth.User.group_id') == 1) { ?>
			<select name="data[UserAlert][user_id]" id="UserAlertUserId">
				<option value=">">Select A User</option>
				<?php $selected = false; ?>
				
				<?php foreach($user_profiles as $user_profile) { ?>
					<?php if($user_profile['UserProfile']['user_id'] == $id) { $selected = true; } else { $selected = false; } ?>
					
					<?php if(empty($user_profile['UserProfile']['first_name']) && empty($user_profile['UserProfile']['last_name'])) { ?>
						<option <?php if($selected) { echo "selected=selected"; } ?> value="<?php echo $user_profile['UserProfile']['user_id']; ?>"><?php echo $user_profile['User']['email']; ?></option>
					<?php } else { ?>
						<option <?php if($selected) { echo "selected=selected"; } ?> value="<?php echo $user_profile['UserProfile']['user_id']; ?>"><?php echo $user_profile['UserProfile']['first_name']." ".$user_profile['UserProfile']['last_name']; ?></option>
					<?php } ?>
				<?php } ?>
			</select>
		<?php } else { ?>
			<input type="hidden" name="data[UserAlert][user_id]" value="<?php echo $id; ?>">
		<?php } ?>
		
		<div class="input text">
			<?php echo $this->Form->input('message', array('div' => false, 'value' => "Hi <firstname>\n\nYour Practitioner at <company> requests that you complete an online NutriCheck re-assessment.\n\nThis will enable your Practitioner to review your results against your previous NutriCheck assessment and enable management of your ongoing lifestyle and nutritional requirements. Once completed, your Practitioner will be notified of your results.\n\nTo login please click <here>.\n\nKind Regards\nThe Nutricheck Team")); ?>
			<small><strong>Note:</strong> <i>Do not change/replace the tag <strong>"&#60;here&#62;"</strong> since it's a constant value that will be replaced by the system.<br />The tag <strong>&#60;company&#62; and &#60;firstname&#62;</strong> is an optional value so you can remove them as you desire and everything associated to it.</i></small>
		</div>
		
		<?php echo $this->Form->input('alert_date', array('id' => "datepicker", 'type' => 'text')); ?>
		
		<?php if(empty($alertee['User']['email'])) { ?>
			<small style="color: red;">Please be informed that this patient doesn't have an email address.<br /><strong>The email alert will be sent to the corresponding pharmacist.</strong></small>
			<br />
			<br />
		<?php } ?>
		
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