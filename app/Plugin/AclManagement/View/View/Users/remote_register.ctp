<div class="userProfiles form">
<?php echo $this->Form->create('UserProfile'); ?>
	<fieldset>
		<legend><?php echo __('Sign Up'); ?></legend>
		
		
		<div class="left span12"><?php echo $this->Form->input('UserProfile.first_name', array('div' => false, 'label' => false, 'placeholder' => 'Firstname')); ?></div>
		<div class="left span12"><?php echo $this->Form->input('UserProfile.last_name', array('div' => false, 'label' => false, 'placeholder' => 'Lastname')); ?></div>
		<div class="left span12"><?php echo $this->Form->input('User.email', array('div' => false, 'label' => false, 'placeholder' => 'Email')); ?></div>
		<div class="left span12"><?php echo $this->Form->input('User.username', array('div' => false, 'label' => false, 'placeholder' => 'Username')); ?></div>
		<div class="left span12"><?php echo $this->Form->input('User.password', array('div' => false, 'label' => false, 'placeholder' => 'Password')); ?></div>
		<div class="left span12"><?php echo $this->Form->input('User.repeat_password', array('div' => false, 'label' => false, 'placeholder' => 'Repeat Password')); ?></div>
	
	
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<script>
	$(document).ready( function () {
		$( "#UserProfileBirthday" ).datepicker({
			dateFormat : 'yy-mm-dd',
			changeMonth : true,
			changeYear : true
		});
	});
</script>
