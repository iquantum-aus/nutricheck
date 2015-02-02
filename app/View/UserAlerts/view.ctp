<div class="userAlerts view">
<h2><?php echo __('User Alert'); ?></h2>
	<table>
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td>
				<?php echo h($userAlert['UserAlert']['id']); ?>
				&nbsp;
			</td>
		</tr>
		
		<tr>
			<td><?php echo __('User'); ?></td>
			<td>
				<?php echo $this->Html->link($userAlert['User']['email'], array('controller' => 'users', 'action' => 'view', $userAlert['User']['id'])); ?>
				&nbsp;
			</td>
		</tr>
		
		<tr>
			<td><?php echo __('Alert Date'); ?></td>
			<td>
				<?php echo h($userAlert['UserAlert']['alert_date']); ?>
				&nbsp;
			</td>
		</tr>
		
		<tr>
			<td><?php echo __('Sent Date'); ?></td>
			<td>
				<?php echo h($userAlert['UserAlert']['sent_date']); ?>
				&nbsp;
			</td>
		</tr>
		
		<tr>
			<td><?php echo __('Created'); ?></td>
			<td>
				<?php echo h($userAlert['UserAlert']['created']); ?>
				&nbsp;
			</td>
		</tr>
		
		<tr>
			<td><?php echo __('Modified'); ?></td>
			<td>
				<?php echo h($userAlert['UserAlert']['modified']); ?>
				&nbsp;
			</td>
		</tr>
		
		<tr>
			<td><?php echo __('Status'); ?></td>
			<td>
				<?php 
					if($userAlert['UserAlert']['status']) {
						echo "On Queue";
					} else {
						echo "Alerted";
					}
				?>
			</td>
		</tr>
		
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List User Alerts'), array('action' => 'alert_list', $userAlert['User']['id']), array('class' => 'btn')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Alert'), array('action' => 'add', $userAlert['User']['id']), array('class' => 'btn')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => 'btn')); ?> </li>
	</ul>
</div>
