<style>
	#privacyConfirmationForm {
		padding: 50px;
		margin-top: 25px;
		float: left;
		background: #eee;
		border-radius: 15px;
		margin-right: 0px;
	}
	
	#privacyConfirmationForm form {
		width: 100%;
	}
</style>

<div class="index">
	<div id="privacyConfirmationForm">
		<form method="POST">
			<?php Configure::load('general'); ?>
			<?php 
				$consent = Configure::read('General.privacy_consent'); 
				$consent = str_replace("member_name_replace", $patient_info['UserProfile']['first_name']." ".$patient_info['UserProfile']['last_name'],$consent);
				$consent = str_replace("pharmacist_name_replace", $pharmacist_info['UserProfile']['company'],$consent);
				
				echo $consent;
			?>
			
			<div class="confirmarion_holder" style="width: 385px; margin: 35px auto 0px; text-align: center;">
				<input type="checkbox" name="privacyPolicy_confirmation" value="1" id="privacyPolicyConfirmation">
				<label style="font-weight: bold;">Click to confirm that you agree to the Privacy Consent</label>
				<input type="submit" class="btn btn-success" value="AGREE" style="margin-top: 15px;" id="privacyPolicyButton">
			</div>
		</form>
	</div>
</div>