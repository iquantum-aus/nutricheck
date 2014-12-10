<div class="answers view">
<h2><?php echo __('Answer'); ?></h2>
	
	<table class="table table-striped">
		<tbody>
			<tr>
				<td><strong>ID</strong></td>
				<td><?php echo h($answer['Answer']['id']); ?></td>
			</tr>
			<tr>
				<td><strong>User</strong></td>
				<td><?php echo $this->Html->link($answer['User']['id'], array('controller' => 'users', 'action' => 'view', $answer['User']['id'])); ?></td>
			</tr>
			<tr>
				<td><strong>Question</strong></td>
				<td><?php echo $this->Html->link($answer['Question']['question'], array('controller' => 'questions', 'action' => 'view', $answer['Question']['id'])); ?></td>
			</tr>
			<tr>
				<td><strong>Rank</strong></td>
				<td><?php echo h($answer['Answer']['rank']); ?></td>
			</tr>
			<tr>
				<td><strong>Created</strong></td>
				<td><?php echo h($answer['Answer']['created']); ?></td>
			</tr>
			<tr>
				<td><strong>Modified</strong></td>
				<td><?php echo h($answer['Answer']['modified']); ?></td>
			</tr>
		</tbody>
	</table>
	
</div>

<?php /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Answer'), array('action' => 'edit', $answer['Answer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Answer'), array('action' => 'delete', $answer['Answer']['id']), null, __('Are you sure you want to delete # %s?', $answer['Answer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Answers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Answer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questions'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Choices'), array('controller' => 'choices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Choice'), array('controller' => 'choices', 'action' => 'add')); ?> </li>
	</ul>
</div>
*/ ?>