<p>&nbsp;</p>
<form method="post">
	<?php 
		if(isset($password_encrypt)) {
			echo "<strong>Generated Password Hash is</strong>: <span style='color: red;'>".$password_encrypt."</span>";
		}
	?>
	<input type="text" name="password_encrypt">
	<input type="submit" name="submit">
</form>