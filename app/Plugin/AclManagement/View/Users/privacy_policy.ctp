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
			<?php echo Configure::read('General.privacy_policy'); ?>
			
			<div class="confirmarion_holder" style="width: 370px; margin: 35px auto 0px; text-align: center;">
				<input type="checkbox" name="privacyPolicy_confirmation" value="1" id="privacyPolicyConfirmation">
				<label style="font-weight: bold;">Click to confirm that you agree to the Privacy Policy</label>
				<input type="submit" class="btn btn-success" value="AGREE" style="margin-top: 15px;" id="privacyPolicyButton">
			</div>
		</form>
	</div>
</div>