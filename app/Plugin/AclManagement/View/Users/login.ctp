<div id="loginWidget_holder">
	<?php
		echo $this->Form->create('User', array('action' => 'login', 'class'=>'form-horizontal'));
			?>
				<fieldset class="span12">
					<legend><?php echo __('Login'); ?></legend>
					<div class="left span12 inputHolder"><?php echo $this->Form->input('email', array('div' => false, 'label' => false, 'placeholder' => "Email")); ?></div>
					<div class="left span12 inputHolder"><?php echo $this->Form->input('password', array('div' => false, 'label' => false, 'placeholder' => "Password")); ?></div>
					
					<br /><br />
					
					<div class="control-group span12 left">
						<div class="left">
							<a href="<?php echo $this->Html->url('/users/forgot_password');?>">Forget password?</a>
						</div>
					</div>
					
					<div class="left span12">
						<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>
						<?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
					</div>

				</fieldset>
			<?php
		echo $this->Form->end();
	?>
</div>