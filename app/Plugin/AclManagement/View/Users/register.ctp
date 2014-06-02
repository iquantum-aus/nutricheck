<div class="users form">
	
	<?php echo $this->Form->create('User', array('class'=>'form-horizontal'));?>
		<fieldset>
			<legend><?php echo __('Register'); ?></legend>
			<?php
					// echo $this->Form->input('UserProfile.first_name', array('div'=>'control-group',
						// 'before'=>'<label class="control-label">'.__('Firstname').'</label><div class="controls">', 
						// 'after'=>$this->Form->error('name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
						// 'error' => array('attributes' => array('style' => 'display:none')),
						// 'label'=>false, 'class'=>'xlarge'));
					// echo $this->Form->input('UserProfile.last_name', array('div'=>'control-group',
						// 'before'=>'<label class="control-label">'.__('Lastname').'</label><div class="controls">', 
						// 'after'=>$this->Form->error('name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
						// 'error' => array('attributes' => array('style' => 'display:none')),
						// 'label'=>false, 'class'=>'xlarge'));
					// echo $this->Form->input('email', array('div'=>'control-group', 
						// 'before'=>'<label class="control-label">'.__('Email').'</label><div class="controls">',
						// 'after'=>$this->Form->error('email', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
						// 'error' => array('attributes' => array('style' => 'display:none')),
						// 'label'=>false, 'class'=>'xlarge'));
					// echo $this->Form->input('password', array('div'=>'control-group', 
						// 'before'=>'<label class="control-label">'.__('Password').'</label><div class="controls">',
						// 'after'=>$this->Form->error('password', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
						// 'error' => array('attributes' => array('style' => 'display:none')),
						// 'label'=>false, 'class'=>'xlarge'));
					// echo $this->Form->input('password2', array('div'=>'control-group', 'type'=>'password', 
						// 'before'=>'<label class="control-label">'.__('Repeat Password').'</label><div class="controls">',
						// 'after'=>$this->Form->error('password2', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
						// 'error' => array('attributes' => array('style' => 'display:none')),
						// 'label'=>false, 'class'=>'xlarge'));
				?>
				
				<div class="left span12"><?php echo $this->Form->input('UserProfile.first_name', array('div' => false, 'label' => false, 'placeholder' => 'Firstname')); ?></div>
				<div class="left span12"><?php echo $this->Form->input('UserProfile.last_name', array('div' => false, 'label' => false, 'placeholder' => 'Lastname')); ?></div>
				<div class="left span12"><?php echo $this->Form->input('User.email', array('div' => false, 'label' => false, 'placeholder' => 'Email')); ?></div>
				<div class="left span12"><?php echo $this->Form->input('User.password', array('div' => false, 'label' => false, 'placeholder' => 'Password')); ?></div>
				<div class="left span12"><?php echo $this->Form->input('User.repeat_password', array('type' => 'password', 'div' => false, 'label' => false, 'placeholder' => 'Repeat Password')); ?></div>
				
				<div class="control-group"><div class="controls"><a href="<?php echo $this->Html->url('/users/login');?>">Login</a> | <a href="<?php echo $this->Html->url('/users/forgot_password');?>">Forget password?</a></div></div>
				<div class="form-actions left">
					<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>
					<?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
				</div>
		</fieldset>
	<?php echo $this->Form->end();?>
</div>