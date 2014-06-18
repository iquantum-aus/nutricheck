<div class="users form">
<?php echo $this->Form->create('User', array('class'=>'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Edit Profile'); ?></legend>
			
			<?php echo $this->Form->input('UserProfile.id'); ?>
			<?php echo $this->Form->input('User.id'); ?>
			
			<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.first_name', array('div' => false, 'label' => false, 'placeholder' => 'Firstname')); ?></div>
			<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.last_name', array('div' => false, 'label' => false, 'placeholder' => 'Lastname')); ?></div>

			<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.age', array('type' => 'text', 'div' => false, 'label' => false, 'placeholder' => 'Age')); ?></div>
			<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.gender', array('div' => false, 'label' => false, 'empty' => 'Gender', 'options' => array('male' => 'Male', 'female', 'Female'))); ?></div>
									
			<br /><br />
			<div class="left span12 inputHolder"><?php echo $this->Form->input('User.email', array('div' => false, 'label' => false, 'placeholder' => 'Email')); ?></div>
			<div class="left span12 inputHolder"><?php echo $this->Form->input('User.password', array('div' => false, 'label' => false, 'placeholder' => 'Password')); ?></div>
			<div class="left span12 inputHolder"><?php echo $this->Form->input('User.password2', array('type' => 'password', 'div' => false, 'label' => false, 'placeholder' => 'Repeat Password')); ?></div>			

        <div class="form-actions">
            <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false, 'disabled' =>false )); ?>
            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
        </div>
	</fieldset>
<?php echo $this->Form->end();?>
</div>