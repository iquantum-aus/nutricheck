<?php
	echo $this->Html->script('date');
	echo $this->Html->script('strtotime');
?>

<?php $user_info = $this->Session->read('Auth.User'); ?>
<?php
	if($user_info['group_id'] == 1) {
		?>
			<style>
				.memberFields { display: none; }
				.clientFields { display: none; }
			</style>
		<?php
	} else {
		?>
			<style>
				.clientFields { display: none; }
			</style>
		<?php 
	}
?>

<div class="users form">
<?php echo $this->Form->create('User', array('class'=>'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('New User'); ?></legend>
		
				
		<div class="left span12 inputHolder">
			<?php	
				if($user_info['group_id'] == 1) {
					echo $this->Form->input('group_id', array('label' => 'Group<span>*</span>', 'class' => 'requiredField chosen-select', 'div' => false, 'empty' => 'Select Group', 'class' => 'chosen-select'));
				} else {
					echo $this->Form->input('parent_id', array('type' => 'hidden', 'value' => $user_info['id']));
				}
			?>
		</div>
		
		<div id="formFieldsHolder">
			<div class="memberFields">
			
				<div class="left span12 inputHolder">
					<?php
						if($user_info['group_id'] == 1) {
							echo $this->Form->input('parent_id', array('options' => $pharmacists, 'div' => false, 'empty' => 'Select Pharmacist', 'label' => 'Pharmacist', 'class' => 'chosen-select'));
						}
					?>
				</div>
				
				<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.first_name', array('required' => 'false', 'label' => 'Firstname<span>*</span>', 'class' => 'textOnly requiredField', 'div' => false, 'placeholder' => 'Firstname')); ?></div>
				<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.last_name', array('label' => 'Lastname<span>*</span>', 'class' => 'textOnly requiredField', 'div' => false, 'placeholder' => 'Lastname')); ?></div>
			</div>
			
			<div class="memberFields">
				<div class="left span12 inputHolder">
					<label>Gender<span>*</span></label>
					<div class="left">
						<input name="data[UserProfile][gender]" id="UserProfileGender_" value="" type="hidden">
						
						<div class="radioHolder left full">
							<div class="left">
								<input name="data[UserProfile][gender]" id="UserProfileGenderMale" value="male" type="radio" class="requiredField">
								<label style="margin-top: 6px; margin-left: 10px;" class="left" for="UserProfileGenderMale">male</label>
							</div>
							
							<div class="left">
								<input name="data[UserProfile][gender]" id="UserProfileGenderFemale" value="female" type="radio" class="requiredField">
								<label style="margin-top: 6px; margin-left: 10px;" class="left" for="UserProfileGenderFemale">female</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<?php if($user_info['group_id'] == 1) { ?>
				<div class="clientFields">
					<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.company', array('label' => 'Company<span>*</span>', 'class' => 'requiredField', 'type' => 'text', 'div' => false, 'placeholder' => 'Company')); ?></div>
				</div>
			<?php } ?>
			
			<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.contact', array('class' => 'requiredField', 'type' => 'text', 'div' => false, 'placeholder' => 'Contact Numbers', 'label' => 'Contact numbers - landline, mobile<span>*</span>')); ?></div>
			
			<div class="memberFields">
				<div class="left span12 inputHolder">
					<label>Birthday<span>*</span></label>
					<select id="birthdayMonth" class="requiredField" name="data[UserProfile][birthday][month]">
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
					<select class="requiredField" id="birthdayDay" name="data[UserProfile][birthday][day]">
						<option value="">Select Day</option>
						<?php  for($i=1; $i<=31; $i++) { ?>
							<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php } ?>
					</select>
					-
					<select class="requiredField" id="birthdayYear" name="data[UserProfile][birthday][year]">
						<option value="">Select Year</option>
						<?php  for($y=1900; $y<=2014; $y++) { ?>
							<option value="<?php echo $y; ?>"><?php echo $y; ?></option>
						<?php } ?>
					</select>
				</div>
				
				
			</div>
			
			<div class="memberFields">
				<div class="left span12 inputHolder ethnicityOptions">
					<label for="UserProfileNationality" style="margin: 0; width: 15%; margin-right: 0;">Are you:<span>*</span></label>
					<?php
						$ethnicity_options = array(
							"Caucasian",
							"Asian",
							"African",
							"Aboriginal / Torres Strait",
							"Pacific Islander /Maori"
						);
					?>
					
					<div class="left">
						<div id="UserProfileNationality" class="radioHolder left full">
							<?php echo $this->Form->input('UserProfile.nationality', array('class' => 'requiredField', 'legend' => false, 'type' => 'radio', 'div' => false, 'placeholder' => 'Nationality', 'options' => $ethnicity_options)); ?>
						</div>
					</div>
				</div>
			</div>
				
			<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.zip', array('label' => 'Zip Code<span>*</span>', 'class' => 'numberOnly requiredField', 'type' => 'text', 'div' => false, 'placeholder' => 'Zip Code')); ?></div>
			<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.suburb', array('label' => 'Suburb<span>*</span>', 'class' => 'textOnly requiredField', 'type' => 'text', 'div' => false, 'placeholder' => 'Suburb')); ?></div>
			<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.address', array('label' => 'Address<span>*</span>', 'class' => 'requiredField', 'type' => 'text', 'div' => false, 'placeholder' => 'Address')); ?></div>
			
			<br /><br />
			<div class="left span12 inputHolder">
				<?php echo $this->Form->input('User.email', array('div' => false, 'placeholder' => 'Email')); ?>
				<span id="emailExist">Email Already Exist</span>
			</div>
			
			<p>&nbsp;</p>
			
			<input type="checkbox" id="termsConditions"> <label style="float:left; font-weight: bold;">Agree to <a class="fancybox" href="#privacyPolicy">Terms and Conditions</a></label>
			
			<div class="left span12 inputHolder"><?php echo $this->Form->input('password', array('type' => "hidden", 'value' => time())); ?></div>
		
			<div class="left span12">
				<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>
				
				<?php if($user_info['group_id'] == 2) { ?>
					<input type="submit" value="Start Nutricheck" class="btn btn-warning" name="create_and_answer">
				<?php } ?>
				
				<?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
			</div>
		</div>
	</fieldset>
<?php echo $this->Form->end();?>
</div>

<script>
	$(document).ready( function () {
		
		var current_time = "<?php echo time(); ?>";
		$( "#datepicker" ).datepicker();
		
		<?php if($user_info['group_id'] == 1) { ?>
			$('#formFieldsHolder').find("*").prop("disabled", true);
		<?php } ?>
		
		$('#UserGroupId').change( function () {
			var group_id = $("#UserGroupId option:selected").val();
			if(group_id != "") {
				$('#formFieldsHolder').find("*").prop("disabled", false);
				$('#formFieldsHolder input').not(':button, :submit, :reset, :hidden').val('').removeAttr('checked').removeAttr('selected');
				if(group_id == 2) {
					$('.memberFields').hide();
					$('.clientFields').show();
				} else {
					$('.clientFields').hide();
					$('.memberFields').show();
				}
			} else {
				$('#formFieldsHolder').find("*").prop("disabled", true);
			}
			
			$(".chosen-select").attr('disabled', false).trigger("chosen:updated");
		});
		
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
			var empty_field = 0;
			
			var bmonth = $('#birthdayMonth').val();
			var bday = $('#birthdayDay').val();
			var byear = $('#birthdayYear').val();
			
			var birthday_date = byear+"/"+bmonth+"/"+bday;
			var time_difference = current_time - strtotime(birthday_date);
			
			// 31536000 = seconds in a year
			var year_difference = Math.round(Math.abs(time_difference) / 31536000);
			
			if($('#emailExist').is(':visible')) {
				return false;
			}
			
			if(!$("#termsConditions").is(":checked")) {
				alert('Please check the Terms and Conditions to continue');
				return false;
			}
			
			$('.requiredField').each( function () {
				if($(this).is(':visible')) {
					
					var input_name = $(this).attr('name');
					var input_id = $(this).attr('id');
					
					if ($(this).is(':radio')) {
						
						if($("input:radio[name='"+input_name+"']").is(":checked")) {
							$(this).closest('.radioHolder').css('border', 'none');
						} else {
							empty_field++;
							$(this).closest('.radioHolder').css('border', '1px solid red');
							console.log(input_id);
						}
						
					} else {
						if($(this).val() == "") {
							empty_field++;
							$(this).css('border', '1px solid red');
						} else {
							$(this).css('border', '1px solid #ccc');
						}
					}
				}
			});
			
			if(empty_field > 0) {
				alert('There are fields that were left empty.');
				return false;
			}
			
			if(strtotime(birthday_date) > 0) {
				if(year_difference <= 12) {
					alert("Ages 12 and below isn't allowed in the system");
					return false;
				}
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
	
	.chosen-results {
		float: left;
		width: 100%;
	}
	
	#UserParentId_chosen {
		width: 220px !important;
	}
</style>