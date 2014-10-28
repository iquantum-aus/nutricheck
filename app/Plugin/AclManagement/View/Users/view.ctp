<div class="users view">
<ul class="breadcrumb">
    <li><?php echo $this->Html->link('User', array('action'=>'index'));?><span class="divider">/</span></li>
    <li class="active">Edit User</li>
</ul>
<table class="table">
    <tbody>
        <tr>
            <td><?php echo __('Id'); ?></td>
            <td><?php echo h($user['User']['id']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Group'); ?></td>
            <td><?php echo h($user['Group']['name']); ?></td>
        </tr>
		<tr>
            <td><?php echo __('Pharmacist'); ?></td>
            <td><?php echo h($user['User']['parent_id']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('First Name'); ?></td>
            <td><?php echo h($user['UserProfile']['first_name']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Last Name'); ?></td>
            <td><?php echo h($user['UserProfile']['last_name']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Gender'); ?></td>
            <td><?php echo h($user['UserProfile']['gender']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Contact Number'); ?></td>
            <td><?php echo h($user['UserProfile']['contact']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Gender'); ?></td>
            <td><?php echo h($user['UserProfile']['gender']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Birthday'); ?></td>
            <td><?php echo h($user['UserProfile']['birthday']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Nationality'); ?></td>
            <td>
				<?php 
					
					$ethnicity_options = array(
							"Caucasian",
							"Asian",
							"African",
							"Aboriginal / Torres Strait",
							"Pacific Islander /Maori"
						);
						
					switch($user['UserProfile']['nationality']) {
						case 0:
							echo "Caucasian";
							break;
						
						case 1:
							echo "Asian";
							break;
						
						case 2:
							echo "African";
							break;
						
						case 3:
							echo "Aboriginal / Torres Strait";
							break;
						
						case 4:
							echo "Pacific Islander /Maori";
							break;
					}
				?>
			</td>
        </tr>
        <tr>
            <td><?php echo __('Zip'); ?></td>
            <td><?php echo h($user['UserProfile']['zip']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Suburb'); ?></td>
            <td><?php echo h($user['UserProfile']['suburb']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Address'); ?></td>
            <td><?php echo h($user['UserProfile']['address']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Username'); ?></td>
            <td><?php echo h($user['User']['username']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Email'); ?></td>
            <td><?php echo h($user['User']['email']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Created'); ?></td>
            <td><?php echo h($user['User']['created']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Modified'); ?></td>
            <td><?php echo h($user['User']['modified']); ?></td>
        </tr>
    </tbody>
</table>  
</div>
