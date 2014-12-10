<div class="factors view">
<h2><?php echo __('Factor'); ?></h2>
	
	<table class="full table table-striped">
		<tr>
			<td>
				<strong>ID</strong>
			</td>
			<td>
				<?php echo h($factor['Factor']['id']); ?>
			</td>
		</tr>
		<tr>
			<td>
				<strong>Name</strong>
			</td>
			<td>
				<?php echo h($factor['Factor']['name']); ?>
			</td>
		</tr>
		<tr>
			<td>
				<strong>Description</strong>
			</td>
			<td>
				<?php echo h($factor['Factor']['description']); ?>
			</td>
		</tr>
		<tr>
			<td>
				<strong>User</strong>
			</td>
			<td>
				<?php echo $this->Html->link($factor['User']['name'], array('controller' => 'users', 'action' => 'view', $factor['User']['id'])); ?>
			</td>
		</tr>
		<tr>
			<td>
				<strong>Created</strong>
			</td>
			<td>
				<?php echo h($factor['Factor']['created']); ?>
			</td>
		</tr>
		<tr>
			<td>
				<strong>Modified</strong>
			</td>
			<td>
				<?php echo h($factor['Factor']['modified']); ?>
			</td>
		</tr>
	</table>
</div>
<?php /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Factor'), array('action' => 'edit', $factor['Factor']['id']), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Factor'), array('action' => 'delete', $factor['Factor']['id']), array('class' => 'btn btn-primary'), __('Are you sure you want to delete # %s?', $factor['Factor']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Factors'), array('action' => 'index'), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Html->link(__('New Factor'), array('action' => 'add'), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => 'btn btn-primary')); ?> </li>
	</ul>
</div>
*/ ?>