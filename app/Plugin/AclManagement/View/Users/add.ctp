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
		<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.birthday', array('data-date-format' => 'yyyy-mm-dd', 'type' => 'text', 'div' => false, 'class' => 'hasDatepicker', 'id' => 'datepicker', 'placeholder' => 'Birthday')); ?></div>
		<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.nationality', array('type' => 'text', 'div' => false, 'placeholder' => 'Nationality')); ?></div>
		<?php } ?>

		<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.zip', array('type' => 'text', 'div' => false, 'placeholder' => 'Post Code')); ?></div>
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