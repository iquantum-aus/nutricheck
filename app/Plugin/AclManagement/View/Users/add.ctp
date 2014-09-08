<?php
	$user_info = $this->Session->read('Auth.User');
?>

<div class="users form">
<?php echo $this->Form->create('User', array('class'=>'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('New User'); ?></legend>
		
		<?php if($user_info['group_id'] != 1) { ?>
			<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.first_name', array('div' => false, 'placeholder' => 'Firstname')); ?></div>
			
			<?php /*
				<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.middle_name', array('div' => false, 'placeholder' => 'Middlename')); ?></div>
			*/ ?>
			
			<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.last_name', array('div' => false, 'placeholder' => 'Lastname')); ?></div>
		<?php } ?>
		
		<?php if($user_info['group_id'] != 1) { ?>
			<div class="left span12 inputHolder">
				<label>Gender</label>
				<div class="left">
					<input name="data[UserProfile][gender]" id="UserProfileGender_" value="" type="hidden">
					
					<div class="left">
						<input name="data[UserProfile][gender]" id="UserProfileGenderMale" value="male" type="radio">
						<label style="margin-top: 6px; margin-left: 10px;" class="left" for="UserProfileGenderMale">male</label>
					</div>
					
					<div class="left">
						<input name="data[UserProfile][gender]" id="UserProfileGenderFemale" value="female" type="radio">
						<label style="margin-top: 6px; margin-left: 10px;" class="left" for="UserProfileGenderFemale">female</label>
					</div>
				</div>
			</div>
		<?php } ?>
		
		<?php if($user_info['group_id'] == 1) { ?>
			<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.company', array('type' => 'text', 'div' => false, 'placeholder' => 'Company', 'label' => 'Company')); ?></div>
		<?php } ?>
		
		<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.contact', array('type' => 'text', 'div' => false, 'placeholder' => 'Contact Numbers', 'label' => 'Contact numbers - landline, mobile')); ?></div>
		
		<?php if($user_info['group_id'] == 2) { ?>
			<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.age', array('type' => 'text', 'div' => false, 'placeholder' => 'Age')); ?></div>
			
			<div class="left span12 inputHolder">
				<label>Birthday</label>
				<select required name="data[UserProfile][birthday][month]">
					<option value="">Select Month</option>
					<option value="01">January</option>
					<option value="02">February</option>
					<option value="03">March</option>
					<option value="04">April</option>
					<option value="05">May</option>
					<option value="06">June</option>
					<option value="07">July</option>
					<option value="08">August</option>
					<option value="09">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
				</select>
				-
				<select required name="data[UserProfile][birthday][day]">
					<option value="">Select Day</option>
					<?php  for($i=1; $i<=31; $i++) { ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
					<?php } ?>
				</select>
				-
				<select required name="data[UserProfile][birthday][year]">
					<option value="">Select Year</option>
					<?php  for($y=1950; $y<=2014; $y++) { ?>
						<option value="<?php echo $y; ?>"><?php echo $y; ?></option>
					<?php } ?>
				</select>
			</div>
			
			
			<div class="left span12 inputHolder ethnicityOptions">
				<label style="width: 15%; margin-right: 0;">Nationality</label>				
				<?php
					$ethnicity_options = array(
						"Caucasian",
						"Asian",
						"African",
						"Aboriginal / Torres Straight",
						"Pacific Island /Mauri  "
					);
				?>
				
				<?php echo $this->Form->input('UserProfile.nationality', array('legend' => false, 'type' => 'radio', 'div' => false, 'placeholder' => 'Nationality', 'options' => $ethnicity_options)); ?>
			</div>
		<?php } ?>

		<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.zip', array('type' => 'text', 'div' => false, 'placeholder' => 'Zip Code')); ?></div>
		<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.suburb', array('type' => 'text', 'div' => false, 'placeholder' => 'Suburb')); ?></div>
		<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.address', array('type' => 'text', 'div' => false, 'placeholder' => 'Address')); ?></div>
		
		<br /><br />
		<div class="left span12 inputHolder">
			<?php echo $this->Form->input('User.email', array('div' => false, 'placeholder' => 'Email')); ?>
			<span id="emailExist">Email Already Exist</span>
		</div>
		
		<div class="left span12 inputHolder"><?php echo $this->Form->input('password', array('readonly' => true, 'div' => false, 'placeholder' => 'Password', 'value' => time())); ?></div>
		<div class="left span12 inputHolder"><?php echo $this->Form->input('password2', array('value' => time(), 'type' => 'hidden')); ?></div>
		
		<div class="left span12 inputHolder">
			<?php	
				if($user_info['group_id'] == 1) {
					echo $this->Form->hidden('group_id', array('value' => 2));
				} else {
					echo $this->Form->input('parent_id', array('type' => 'hidden', 'value' => $user_info['id']));
				}
			?>
		</div>
	
        <div class="left span12">
            <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>
            <input type="submit" value="Create and Answer" class="btn btn-warning" name="create_and_answer">
            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
        </div>
	</fieldset>
<?php echo $this->Form->end();?>
</div>

<script>
	$(document).ready( function () {
		
		$( "#datepicker" ).datepicker();
		
		$('#UserEmail').focusout( function () {
			var email = $('#UserEmail').val();
			if(email != "") {
				$.ajax({
					async:true,
					dataType:'html',
					success:function (data, textStatus) {
						if(data > 0) {
							$('#emailExist').fadeIn();
						} else {
							$('#emailExist').hide();
						}
					},
					url:"/users/check_email_existence?email="+email
				});
			}
		});
		
		$('#UserAddForm').submit( function () {
			if($('#emailExist').is(':visible')) {
				return false;
			}
		});
	});
</script>

<style>
	#emailExist {
		float: left;
		margin-left: 17%;
		margin-top: 5px;
		margin-bottom: 10px;
		color: red;
		display: none;
	}
</style>