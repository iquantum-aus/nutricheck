<?php
	echo $this->Html->script('date');
	echo $this->Html->script('strtotime');
?>

<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

<style>	
	#UserEditForm input[type="password"],#UserEditForm input[type="text"]{
		position: relative;
		z-index: 9;
		border: 1px solid #ccc;
		background: transparent;
	}
	
	#UserEditForm input[type="password"]:focus,#UserEditForm input[type="text"]:focus{
		outline:0;
	}
	
	#UserEditForm{
		margin: 0 auto;
		position: relative;
		margin-bottom:60px;
	}
	
	.strength_meter {
		position: absolute;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 35px;
		z-index: -0;
		border-radius:5px;
	}
	
	.button_strength {
		text-decoration: none;
		color: #FFF;
		font-size: 13px;
		display: none;
	}
	
	.strength_meter div {
		width:0%;
		height: 35px;
		text-align: right;
		color: #000;
		line-height: 40px;
		-webkit-transition: all .3s ease-in-out;
		-moz-transition: all .3s ease-in-out;
		-o-transition: all .3s ease-in-out;
		-ms-transition: all .3s ease-in-out;
		transition: all .3s ease-in-out;
		padding-right: 12px;
		border-radius:5px;
	}
	
	.strength_meter div p{
		position: absolute;
		top: -2px;
		right: 20px;
		color: #999;
		font-size: 13px;
	}

	.veryweak{
		background-color: #FFA0A0;
		border-color: #F04040!important;
		width:25%!important;
	}
	
	.weak {
		background-color: #FFB78C;
		border-color: #FF853C!important;
		width:50%!important;
	}
	
	.medium{
		background-color: #FFEC8B;
		border-color: #FC0!important;
		width:75%!important;
	}
	
	.strong{
		background-color: #C3FF88;
		border-color: #8DFF1C!important;
		width:100%!important;
	}
	
	h1{
		color:white;
		font-size:50px;
		text-align:center;
		padding-top:30px;
		margin-bottom:20px;
	}
	
	h1 span{
		font-weight:bold;
		color:white;
		opacity:.3;
	}
	
	.chosen-results {
		float:left;
		width: 100%;
	}
</style>

<?php 
	$user_info = $this->Session->read('Auth.User'); 
	$birthday = explode("-", $this->request->data['UserProfile']['birthday']);
?>

<?php
	if($user_info['group_id'] == 1 || $user_info['group_id'] == 5 || $user_info['group_id'] == 4) {
		?>
			<style>
				<?php if($this->request->data['User']['group_id'] == 2) { ?>
					.memberFields { display: none; }
				<?php } ?>
				
				<?php if($this->request->data['User']['group_id'] == 3) { ?>
					.clientFields { display: none; }
				<?php } ?>
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
		<legend><?php echo __('Edit User'); ?></legend>
		
		<?php echo $this->Form->input('User.id'); ?>
		<?php echo $this->Form->input('UserProfile.id'); ?>
		
		<div class="left span12 inputHolder">
			<?php	
				if($user_info['group_id'] == 1 || $user_info['group_id'] == 5 || $user_info['group_id'] == 4) {
					echo $this->Form->input('group_id', array('label' => 'Group<span>*</span>', 'class' => 'requiredField chosen-select', 'div' => false, 'empty' => 'Select Group', 'class' => 'chosen-select'));
				} else {
					echo $this->Form->input('parent_id', array('type' => 'hidden', 'value' => $user_info['id']));
				}
			?>
		</div>
		
		<div id="formFieldsHolder">

			<div class="clientGroupFields" style="display: none;">
				<div class="left span12 inputHolder">
					<?php if($user_info['group_id'] == 5) { ?>
						<?php echo $this->Form->input('User.group_affiliation_id', array('value' => $user_info['id'], 'type' => 'hidden')); ?>
					<?php } else { ?>
						<?php echo $this->Form->input('User.group_affiliation_id', array('required' => 'false', 'label' => 'Group Affiliation', 'empty' => 'Select Group Affiliation', 'class' => 'chosen-select', 'div' => false, 'placeholder' => 'Select Group Affiliation', 'options' => $group_affiliations)); ?>
					<?php } ?>
				</div>

				<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.company-client', array('required' => 'false', 'label' => 'Name<span>*</span>', 'class' => 'textOnly requiredField', 'div' => false, 'placeholder' => 'Name', 'value' => $this->data['UserProfile']['company'])); ?></div>
			</div>
			
			<div class="groupAffiliationFields" style="display: none;">
				<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.company-group', array('required' => 'false', 'label' => 'Name<span>*</span>', 'class' => 'textOnly requiredField', 'div' => false, 'placeholder' => 'Name', 'value' => $this->data['UserProfile']['company'])); ?></div>
			</div>

			<div class="memberFields">
				
				<div class="left span12 inputHolder">
					<?php
						if($user_info['group_id'] == 1 || $user_info['group_id'] == 5 || $user_info['group_id'] == 4) {
							echo $this->Form->input('parent_id', array('options' => $pharmacists, 'div' => false, 'empty' => 'Select Pharmacist', 'label' => 'Pharmacist', 'class' => 'chosen-select'));
						}
					?>
				</div>
				
				<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.first_name', array('required' => 'false', 'label' => 'Firstname<span>*</span>', 'class' => 'textOnly requiredField', 'div' => false, 'placeholder' => 'Firstname')); ?></div>
				<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.last_name', array('label' => 'Lastname<span>*</span>', 'class' => 'textOnly requiredField', 'div' => false, 'placeholder' => 'Lastname')); ?></div>
			</div>
			
			<div class="clientFields">
				<div class="left span12 inputHolder">
					<?php if($user_info['group_id'] == 4) { ?>
						<?php echo $this->Form->input('User.client_group_id', array('value' => $user_info['id'], 'type' => 'hidden')); ?>
					<?php } else { ?>
						<?php echo $this->Form->input('User.client_group_id', array('required' => 'false', 'label' => 'Client Group', 'empty' => 'Select Client Group', 'class' => 'chosen-select', 'div' => false, 'placeholder' => 'Select Client Group', 'options' => $client_groups)); ?>
					<?php } ?>
				</div>
			</div>

			<div class="memberFields">
				<div class="left span12 inputHolder">
					<label>Gender<span>*</span></label>
					<div class="left">
						<input name="data[UserProfile][gender]" id="UserProfileGender_" value="" type="hidden">
						
						<div class="radioHolder left full">
							<div class="left">
								<input name="data[UserProfile][gender]" <?php if($this->request->data['UserProfile']['gender'] == "male") { echo "checked"; } ?> id="UserProfileGenderMale" value="male" type="radio" class="requiredField">
								<label style="margin-top: 6px; margin-left: 10px;" class="left" for="UserProfileGenderMale">male</label>
							</div>
							
							<div class="left">
								<input name="data[UserProfile][gender]" <?php if($this->request->data['UserProfile']['gender'] == "female") { echo "checked"; } ?> id="UserProfileGenderFemale" value="female" type="radio" class="requiredField">
								<label style="margin-top: 6px; margin-left: 10px;" class="left" for="UserProfileGenderFemale">female</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<?php if($user_info['group_id'] == 1 || $user_info['group_id'] == 5 || $user_info['group_id'] == 4) { ?>
				<div class="clientFields">
					<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.company', array('label' => 'Company<span>*</span>', 'class' => 'requiredField', 'type' => 'text', 'div' => false, 'placeholder' => 'Company', 'label' => 'Company')); ?></div>
				</div>
			<?php } ?>
			
			<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.contact', array('class' => 'requiredField', 'type' => 'text', 'div' => false, 'placeholder' => 'Contact Numbers', 'label' => 'Contact numbers - landline, mobile<span>*</span>')); ?></div>
			
			<div class="memberFields">
				<div class="left span12 inputHolder">
					<label>Birthday<span>*</span></label>
					<select id="birthdayMonth" class="chosen-select requiredField" name="data[UserProfile][birthday][month]">
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
					<select class="chosen-select requiredField" id="birthdayDay" name="data[UserProfile][birthday][day]">
						<option value="">Select Day</option>
						<?php  for($i=1; $i<=31; $i++) { ?>
							<option <?php if($birthday[2] == $i) { echo "selected"; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php } ?>
					</select>
					-
					<select class="chosen-select requiredField" id="birthdayYear" name="data[UserProfile][birthday][year]">
						<option value="">Select Year</option>
						<?php  for($y=1900; $y<=2014; $y++) { ?>
							<option <?php if($birthday[0] == $y) { echo "selected"; } ?> value="<?php echo $y; ?>"><?php echo $y; ?></option>
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

			<div class="generalFields">
				<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.zip', array('label' => 'Zip Code<span>*</span>', 'class' => 'numberOnly requiredField', 'type' => 'text', 'div' => false, 'placeholder' => 'Zip Code')); ?></div>
				<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.suburb', array('label' => 'Suburb<span>*</span>', 'class' => 'textOnly requiredField', 'type' => 'text', 'div' => false, 'placeholder' => 'Suburb')); ?></div>
				<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.address', array('label' => 'Address<span>*</span>', 'class' => 'requiredField', 'type' => 'text', 'div' => false, 'placeholder' => 'Address')); ?></div>
			</div>

			<br /><br />
			<div class="left span12 inputHolder">
				<?php echo $this->Form->input('User.username', array('class' => 'requiredField', 'div' => false, 'placeholder' => 'Username')); ?>
			</div>
			
			<div class="left span12 inputHolder">
				<?php echo $this->Form->input('User.email', array('div' => false, 'placeholder' => 'Email')); ?>
				<?php echo $this->Form->input('User.old_email', array('type' => "hidden", "value" => $this->request->data['User']['email'])); ?>
			</div>
			
			<div class="left span12 inputHolder">
				<label for="UserPassword">Password</label>
				<div style="position: relative; float: left; width: 75%; clear: none;">
					<?php echo $this->Form->input('User.password', array('div' => false, 'placeholder' => 'Password', 'required' => false, 'label' => false, 'style' => "width: 100%")); ?>
				</div>
			</div>
			
			<div class="left span12 inputHolder"><?php echo $this->Form->input('User.password2', array('div' => false, 'type' =>'password', 'placeholder' => "Repeat Password")); ?></div>
		
			<div class="left span12">
				<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>
				<?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
			</div>
		</div>
	</fieldset>
<?php echo $this->Form->end();?>
</div>

<script type="text/javascript" src="/js/strength.js"></script>
<script type="text/javascript" src="/js/js.js"></script>

<script>
	$(document).ready( function () {
		
		var group_id = <?php echo $this->data['User']['group_id'] ?>;

		if(group_id == 2) {
			$('.clientGroupFields').hide();
			$('.groupAffiliationFields').hide();
			$('.memberFields').hide();
			$('.clientFields').show();
			$('.generalFields').show();
		} else if(group_id == 3) {
			$('.clientGroupFields').hide();
			$('.groupAffiliationFields').hide();
			$('.clientFields').hide();
			$('.memberFields').show();
			$('.generalFields').show();
		} else if(group_id == 4) {
			$('.clientGroupFields').show();
			$('.groupAffiliationFields').hide();
			$('.clientFields').hide();
			$('.memberFields').hide();
			$('.generalFields').hide();
		} else if(group_id == 5) {
			$('.clientGroupFields').hide();
			$('.groupAffiliationFields').show();
			$('.clientFields').hide();
			$('.memberFields').hide();
			$('.generalFields').hide();
		}

		var current_time = "<?php echo time(); ?>";
		$('#UserPassword').strength({
			strengthClass: 'strength',
			strengthMeterClass: 'strength_meter',
			strengthButtonClass: 'button_strength',
			strengthButtonText: 'Show Password',
			strengthButtonTextToggle: 'Hide Password'
		});
		
		$( "#datepicker" ).datepicker();
		
		<?php if($user_info['group_id'] == 1) { ?>
			<?php if($this->request->data['User']['group_id'] == "") { ?>
				$('#formFieldsHolder').find("*").prop("disabled", true);
			<?php } ?>
		<?php } ?>
		
		$('#UserGroupId').change( function () {
			var group_id = $("#UserGroupId option:selected").val();
			if(group_id != "") {
				$('#formFieldsHolder').find("*").prop("disabled", false);
				
				/* 
				// resetting should only happen in adding of patient
				$('#formFieldsHolder input').not(':button, :submit, :reset, :hidden').val('').removeAttr('checked').removeAttr('selected');
				 */
				 
				if(group_id == 2) {
					$('.clientGroupFields').hide();
					$('.groupAffiliationFields').hide();
					$('.memberFields').hide();
					$('.clientFields').show();
					$('.generalFields').show();
				} else if(group_id == 3) {
					$('.clientGroupFields').hide();
					$('.groupAffiliationFields').hide();
					$('.clientFields').hide();
					$('.memberFields').show();
					$('.generalFields').show();
				} else if(group_id == 4) {
					$('.clientGroupFields').show();
					$('.groupAffiliationFields').hide();
					$('.clientFields').hide();
					$('.memberFields').hide();
					$('.generalFields').hide();
				} else if(group_id == 5) {
					$('.clientGroupFields').hide();
					$('.groupAffiliationFields').show();
					$('.clientFields').hide();
					$('.memberFields').hide();
					$('.generalFields').hide();
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
			if($('#emailExist').is(':visible')) {
				return false;
			}
		});
		
		$('#UserEditForm').submit( function () {
			var empty_field = 0;
			
			var bmonth = $('#birthdayMonth').val();
			var bday = $('#birthdayDay').val();
			var byear = $('#birthdayYear').val();
			
			var user_password = $('#UserPassword').val();
			var user_password2 = $('#UserPassword2').val();
			
			var birthday_date = byear+"/"+bmonth+"/"+bday;
			var time_difference = current_time - strtotime(birthday_date);
			
			// 31536000 = seconds in a year
			var year_difference = Math.round(Math.abs(time_difference) / 31536000);
			
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
				} else {
					var strenghtClass = $('.strength_meter').children('div').attr('class');
					console.log(strenghtClass);
					if($('.strength_meter').children('div').hasClass("medium") || $('.strength_meter').children('div').hasClass("strong")) {
						if($('#UserPassword').val().length < 9) {
							alert('You need to have at least 9 characters for your password');
							return false;
						}
					} else {
						alert("Your password needs to be stronger than that");
						return false;
					}
				}
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
	
	.chosen-container {
		width: 220px !important;
	}
</style>