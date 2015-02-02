<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

<style>	
	#UserEditProfileForm input[type="password"],#UserEditProfileForm input[type="text"]{
		position: relative;
		z-index: 9;
		border: 1px solid #ccc;
		background: transparent;
	}
	
	#UserEditProfileForm input[type="password"]:focus,#UserEditProfileForm input[type="text"]:focus{
		outline:0;
	}
	
	#UserEditProfileForm{
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
	
	.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-dialog .ui-dialog-buttonpane button {
		min-width: 20px;
	}
	
	.ui-widget-content {
		background: #fff;
	}
	
	.ui-widget-header {
		background: #aaa;
		border: none;
	}
	
	.ui-dialog .ui-dialog-titlebar-close { display: none }
	
	.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
		color: #999;
	}
	
	.ui-state-hover, .ui-widget-content .ui-state-hover, .ui-widget-header .ui-state-hover, .ui-state-focus, .ui-widget-content .ui-state-focus, .ui-widget-header .ui-state-focus {
		border: 1px solid #ccc;
		background: #eee;
	}
</style>

<?php
	$user_info = $this->Session->read('Auth.User');
	$birthday = explode("-", $this->request->data['UserProfile']['birthday']);
?>

<div class="users form">
<?php echo $this->Form->create('User', array('class'=>'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Profile Information'); ?></legend>
			
			<?php echo $this->Form->input('UserProfile.id'); ?>
			<?php echo $this->Form->input('User.id'); ?>
			
			<?php if ($user_info['group_id'] == 3) { ?>
				<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.first_name', array('required' => true, 'class' => 'textOnly', 'div' => false, 'placeholder' => 'Firstname')); ?></div>
				
				<?php /*
					<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.middle_name', array('div' => false, 'placeholder' => 'Middlename')); ?></div>
				*/ ?>
				
				<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.last_name', array('required' => true, 'class' => 'textOnly', 'div' => false, 'placeholder' => 'Lastname')); ?></div>
			<?php } ?>
			
			<?php if($user_info['group_id'] == 3) { ?>
				<div class="left span12 inputHolder">
					<label>Gender</label>
					<div class="left">
						<input name="data[UserProfile][gender]" id="UserProfileGender_" value="" type="hidden">
						
						<div class="left">
							<input <?php if($this->request->data['UserProfile']['gender'] == "male") { echo "checked"; } ?> name="data[UserProfile][gender]" id="UserProfileGenderMale" value="male" type="radio">
							<label style="margin-top: 6px; margin-left: 10px;" class="left" for="UserProfileGenderMale">male</label>
						</div>
						
						<div class="left">
							<input <?php if($this->request->data['UserProfile']['gender'] == "female") { echo "checked"; } ?> name="data[UserProfile][gender]" id="UserProfileGenderFemale" value="female" type="radio">
							<label style="margin-top: 6px; margin-left: 10px;" class="left" for="UserProfileGenderFemale">female</label>
						</div>
					</div>
				</div>
			<?php } ?>
			
			<?php if($user_info['group_id'] != 3) { ?>
				<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.company', array('type' => 'text', 'div' => false, 'placeholder' => 'Company', 'label' => 'Company', 'required' => true)); ?></div>
			<?php } ?>
			
			<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.contact', array('type' => 'text', 'div' => false, 'placeholder' => 'Contact Number', 'label' => 'Contact Number')); ?></div>
			
			<?php if($user_info['group_id'] == 3) { ?>
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
						<?php  for($y=1900; $y<=2014; $y++) { ?>
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
			
			<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.zip', array('class' => 'numberOnly', 'required' => true, 'type' => 'text', 'div' => false, 'placeholder' => 'Zip Code')); ?></div>
			<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.suburb', array('class' => 'textOnly', 'required' => true, 'type' => 'text', 'div' => false, 'placeholder' => 'Suburb')); ?></div>
			<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.address', array('required' => true, 'type' => 'text', 'div' => false, 'placeholder' => 'Address')); ?></div>
			
			<br /><br />
			<div class="left span12 inputHolder"><?php echo $this->Form->input('User.username', array('div' => false, 'placeholder' => 'Username')); ?></div>
			<div class="left span12 inputHolder"><?php echo $this->Form->input('User.email', array('div' => false, 'placeholder' => 'Email', 'readonly' => true)); ?></div>
			
			<div class="left span12 inputHolder">
				<label for="UserPassword">Password</label>
				<div style="position: relative; float: left; width: 75%; clear: none;">
						<?php echo $this->Form->input('User.password', array('div' => false, 'placeholder' => 'Password', 'required' => false, 'label' => false, 'style' => "width: 100%")); ?>
				</div>
			</div>
			
			<div class="left span12 inputHolder"><?php echo $this->Form->input('User.password2', array('required' => false, 'type' => 'password', 'div' => false, 'placeholder' => 'Repeat Password', 'label' => 'Repeat Password')); ?></div>			

        <div class="left span12">
            <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false, 'disabled' =>false )); ?>
            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
        </div>
	</fieldset>
<?php echo $this->Form->end();?>
</div>

<?php if($alert_password) { ?>
	<div id="dialog-message" title="Security Alert">
		Please change your password to protect your account
	</div>
<?php } ?>




<script type="text/javascript" src="/js/strength.js"></script>
<script type="text/javascript" src="/js/js.js"></script>

<script>
	$(document).ready( function () {
		
		$('#UserPassword').strength({
			strengthClass: 'strength',
			strengthMeterClass: 'strength_meter',
			strengthButtonClass: 'button_strength',
			strengthButtonText: 'Show Password',
			strengthButtonTextToggle: 'Hide Password'
		});
		
		$( "#datepicker" ).datepicker();
		
		$('#UserEditProfileForm').submit( function () {
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
		});
		
		<?php if($alert_password) { ?>
			$( "#dialog-message" ).dialog({
				modal: true,
				  buttons: {
					Ok: function() {
						$( this ).dialog( "close" );
					}
				},
				draggable: false,
				width: 430,
				closeOnEscape: false
			});
		<?php } ?>
	});
</script>