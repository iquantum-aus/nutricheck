<div class="privacyPolicyConfirmations view">
<h2><?php echo __('Privacy Policy Confirmation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($privacyPolicyConfirmation['PrivacyPolicyConfirmation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($privacyPolicyConfirmation['PrivacyPolicyConfirmation']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($privacyPolicyConfirmation['User']['name'], array('controller' => 'users', 'action' => 'view', $privacyPolicyConfirmation['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($privacyPolicyConfirmation['PrivacyPolicyConfirmation']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($privacyPolicyConfirmation['PrivacyPolicyConfirmation']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($privacyPolicyConfirmation['PrivacyPolicyConfirmation']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Privacy Policy Confirmation'), array('action' => 'edit', $privacyPolicyConfirmation['PrivacyPolicyConfirmation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Privacy Policy Confirmation'), array('action' => 'delete', $privacyPolicyConfirmation['PrivacyPolicyConfirmation']['id']), null, __('Are you sure you want to delete # %s?', $privacyPolicyConfirmation['PrivacyPolicyConfirmation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Privacy Policy Confirmations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Privacy Policy Confirmation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
