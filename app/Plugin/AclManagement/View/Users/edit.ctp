<?php
	$user_info = $this->Session->read('Auth.User');	
	$birthday = explode("-", $this->request->data['UserProfile']['birthday']);
?>

<div class="users form">
<?php echo $this->Form->create('User', array('class'=>'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('New User'); ?></legend>
		
		<?php echo $this->Form->input('User.id'); ?>
		<?php echo $this->Form->input('UserProfile.id'); ?>
		<?php if($user_info['group_id'] != 1) { ?>
			<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.first_name', array('required' => true, 'class' => 'alphaNumeric', 'div' => false, 'placeholder' => 'Firstname')); ?></div>
			
			<?php /*
				<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.middle_name', array('div' => false, 'placeholder' => 'Middlename')); ?></div>
			*/ ?>
			
			<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.last_name', array('required' => true, 'class' => 'alphaNumeric', 'div' => false, 'placeholder' => 'Lastname')); ?></div>
		<?php } ?>
		
		<?php if($user_info['group_id'] != 1) { ?>
			<div class="left span12 inputHolder">
				<label>Gender</label>
				<div class="left">
					<input name="data[UserProfile][gender]" id="UserProfileGender_" value="" type="hidden">
					
					<div class="left">
						<input name="data[UserProfile][gender]" <?php if($this->request->data['UserProfile']['gender'] == "male") { echo "checked"; } ?> id="UserProfileGenderMale" value="male" type="radio" required="required">
						<label style="margin-top: 6px; margin-left: 10px;" class="left" for="UserProfileGenderMale">male</label>
					</div>
					
					<div class="left">
						<input name="data[UserProfile][gender]" <?php if($this->request->data['UserProfile']['gender'] == "female") { echo "checked"; } ?> id="UserProfileGenderFemale" value="female" type="radio" required="required">
						<label style="margin-top: 6px; margin-left: 10px;" class="left" for="UserProfileGenderFemale">female</label>
					</div>
				</div>
			</div>
		<?php } ?>
		
		<?php if($user_info['group_id'] == 1) { ?>
			<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.company', array('required' => true, 'type' => 'text', 'div' => false, 'placeholder' => 'Company', 'label' => 'Company')); ?></div>
		<?php } ?>
		
		<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.contact', array('required' => true, 'type' => 'text', 'div' => false, 'placeholder' => 'Contact Numbers', 'label' => 'Contact numbers - landline, mobile')); ?></div>
		
		<?php if($user_info['group_id'] == 2) { ?>
			
			<div class="left span12 inputHolder">
				<label>Birthday</label>
				<select required name="data[UserProfile][birthday][month]">
					<option value="">Select Month</option>
					
					<?php
						$months = array(
							"01" => "January",
							"02" => "February",
							"03" => "March",
							"04" => "April",
							"05" => "May",
							"06" => "June",
							"07" => "July",
							"08" => "August",
							"09" => "September",
							"10" => "October",
							"11" => "November",
							"12" => "December"
						);
					?>
					
					<?php foreach($months as $key_value => $month) { ?>
						<option <?php if($birthday[1] == $key_value) { echo "selected"; } ?> value="<?php echo $key_value; ?>"><?php echo $month; ?></option>
					<?php } ?>
				</select>
				-
				<select required name="data[UserProfile][birthday][day]">
					<option value="">Select Day</option>
					<?php  for($i=1; $i<=31; $i++) { ?>
						<option <?php if($birthday[2] == $i) { echo "selected"; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
					<?php } ?>
				</select>
				-
				<select required name="data[UserProfile][birthday][year]">
					<option value="">Select Year</option>
					<?php  for($y=1950; $y<=2014; $y++) { ?>
						<option <?php if($birthday[0] == $y) { echo "selected"; } ?> value="<?php echo $y; ?>"><?php echo $y; ?></option>
					<?php } ?>
				</select>
			</div>
			
			
			<div class="left span12 inputHolder ethnicityOptions">
				<label style="margin: 0; width: 15%; margin-right: 0;">Nationality</label>
				<?php
					$ethnicity_options = array(
						"Caucasian",
						"Asian",
						"African",
						"Aboriginal / Torres Straight",
						"Pacific Island /Mauri  "
					);
				?>
				
				<?php echo $this->Form->input('UserProfile.nationality', array('required' => true, 'legend' => false, 'type' => 'radio', 'div' => false, 'placeholder' => 'Nationality', 'options' => $ethnicity_options)); ?>
			</div>
		<?php } ?>

		<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.zip', array('required' => true, 'type' => 'text', 'div' => false, 'placeholder' => 'Zip Code')); ?></div>
		<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.suburb', array('required' => true, 'type' => 'text', 'div' => false, 'placeholder' => 'Suburb')); ?></div>
		<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.address', array('required' => true, 'type' => 'text', 'div' => false, 'placeholder' => 'Address')); ?></div>
		
		<br /><br />
		<div class="left span12 inputHolder">
			<?php echo $this->Form->input('User.email', array('required' => true, 'div' => false, 'placeholder' => 'Email')); ?>
			<?php echo $this->Form->input('User.old_email', array('type' => "hidden", "value" => $this->request->data['User']['email'])); ?>
		</div>
		
		<div class="left span12 inputHolder"><?php echo $this->Form->input('password', array('div' => false, 'placeholder' => 'Password')); ?></div>
		<div class="left span12 inputHolder"><?php echo $this->Form->input('password2', array('div' => false, 'type' =>'password', 'placeholder' => "Repeat Password")); ?></div>
	
        <div class="left span12">
            <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>
            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
        </div>
	</fieldset>
<?php echo $this->Form->end();?>
</div>


<script>
	$(document).ready( function () {
		
		$( "#datepicker" ).datepicker();
		
		$('#UserEditForm').submit( function () {
			var user_password = $('#UserPassword').val();
			var user_password2 = $('#UserPassword2').val();
			
			if((user_password !== "") && (user_password2 === "")) {
				$('#UserPassword2').addClass('required');
				alert('Please repeat your password to continue');
				return false;
			} else {
				$('#UserPassword2').removeClass('required');
			}
			
			if((user_password !== "") && (user_password2 !== "")) {
				if(user_password !== user_password2) {
					alert('Passwords mismatch');
					return false;
				}
			}
		});
	});
</script>