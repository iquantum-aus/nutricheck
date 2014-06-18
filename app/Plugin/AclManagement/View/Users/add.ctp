<?php
	$user_info = $this->Session->read('Auth.User');
?>

<div class="users form">
<?php echo $this->Form->create('User', array('class'=>'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('New User'); ?></legend>
		
		<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.first_name', array('required' => true, 'div' => false, 'label' => false, 'placeholder' => 'Firstname')); ?></div>
		<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.last_name', array('required' => true, 'div' => false, 'label' => false, 'placeholder' => 'Lastname')); ?></div>
		<div class="left span12 inputHolder"><?php echo $this->Form->input('email', array('required' => true, 'div' => false, 'label' => false, 'placeholder' => 'Email')); ?></div>
		<div class="left span12 inputHolder"><?php echo $this->Form->input('password', array('readonly' => true, 'div' => false, 'label' => false, 'placeholder' => 'Password', 'value' => time())); ?></div>
		<div class="left span12 inputHolder"><?php echo $this->Form->input('password2', array('value' => time(), 'type' => 'hidden')); ?></div>
		
		<div class="left span12 inputHolder">
			<?php	
				if($user_info['group_id'] == 1) {
					echo $this->Form->input('group_id', array('div'=>false));
				} else {
					echo $this->Form->input('parent_id', array('type' => 'hidden', 'value' => $user_info['id']));
				}
			?>
		</div>
	
        <div class="left span12">
            <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>
            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
        </div>
	</fieldset>
<?php echo $this->Form->end();?>
</div>