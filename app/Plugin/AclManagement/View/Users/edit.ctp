<?php
	$user_info = $this->Session->read('Auth.User');
?>

<div class="users form">
<?php echo $this->Form->create('User', array('class'=>'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
		
		<?php echo $this->Form->input('UserProfile.id', array('value' => $this->request->data['UserProfile']['id'])); ?>
		<?php echo $this->Form->input('User.id'); ?>
		
		<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.first_name', array('div' => false, 'label' => false, 'placeholder' => 'Firstname')); ?></div>
		<div class="left span12 inputHolder"><?php echo $this->Form->input('UserProfile.last_name', array('div' => false, 'label' => false, 'placeholder' => 'Lastname')); ?></div>
		<div class="left span12 inputHolder"><?php echo $this->Form->input('email', array('div' => false, 'label' => false, 'placeholder' => 'Email')); ?></div>
		<div class="left span12 inputHolder"><?php echo $this->Form->input('password', array('div' => false, 'label' => false, 'placeholder' => 'Password')); ?></div>
		<div class="left span12 inputHolder"><?php echo $this->Form->input('password2', array('type' => 'password', 'div' => false, 'label' => false, 'placeholder' => 'Repeat Password')); ?></div>
		
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
            <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false, 'disabled' =>false )); ?>
            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
        </div>
	</fieldset>
<?php echo $this->Form->end();?>
</div>