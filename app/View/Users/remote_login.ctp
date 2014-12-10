<div class="users form">
	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('User'); ?>
		<fieldset>
			<legend>
				<?php echo __('Please enter your username and password'); ?>
			</legend>
			<?php echo $this->Form->input('username', array('div' => false, 'autocomplete' => 'off'));
			echo $this->Form->input('password', array('div' => false, 'autocomplete' => 'off'));
		?>
		</fieldset>
		
		<a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/users/remote_register">Signup</a>
		
	<?php echo $this->Form->end(__('Login')); ?>
</div>