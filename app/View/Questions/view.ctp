<div class="questions view">
<h2><?php echo __('Question'); ?></h2>
	<table>
		<tr>
			<td class="column_label">Question</td>
			<td>
				<?php echo h($question['Question']['question']); ?>
			</td>
		</tr>
		
		<tr>
			<td class="column_label">Created</td>
			<td>
				<?php echo h($question['Question']['created']); ?>
			</td>
		</tr>
		
		<tr>
			<td class="column_label">Modified</td>
			<td>
				<?php echo h($question['Question']['modified']); ?>
			</td>
		</tr>
	</table>
</div>
<?php /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Question'), array('action' => 'edit', $question['Question']['id']), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Question'), array('action' => 'delete', $question['Question']['id']), array('class' => 'btn btn-primary'), __('Are you sure you want to delete # %s?', $question['Question']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('action' => 'index'), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('action' => 'add'), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => 'btn btn-primary')); ?> </li>
	</ul>
</div>
*/ ?>