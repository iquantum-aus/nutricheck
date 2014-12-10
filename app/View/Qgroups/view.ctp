<div class="qgroups view">
<h2><?php echo __('Question Group'); ?></h2>
	
<dl class="left">
	<table class="full table table-striped table-bordered">
		<tbody>
			<tr>
				<td>ID</td><td><?php echo h($qgroup['Qgroup']['id']); ?></td>
			</tr>
			<tr>
				<td>Name</td><td><?php echo h($qgroup['Qgroup']['name']); ?></td>
			</tr>
			<tr>
				<td>Created</td><td><?php echo h($qgroup['Qgroup']['created']); ?></td>
			</tr>
			<tr>
				<td>Modified</td><td><?php echo h($qgroup['Qgroup']['modified']); ?></td>
			</tr>
		</tbody>
	</table>
</dl>
</div>

<?php /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Qgroup'), array('action' => 'edit', $qgroup['Qgroup']['id']), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Qgroup'), array('action' => 'delete', $qgroup['Qgroup']['id']), array('class' => 'btn btn-primary'), __('Are you sure you want to delete # %s?', $qgroup['Qgroup']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Qgroups'), array('action' => 'index'), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Html->link(__('New Qgroup'), array('action' => 'add'), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index'), array('class' => 'btn btn-primary')); ?> </li>
	</ul>
</div>
*/ ?>
<div class="related">
	<h3><?php echo __('Related Questions'); ?></h3>
	<?php if (!empty($qgroup['Question'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Question'); ?></th>
		
		<?php
		/* <th class="actions"><?php echo __('Actions'); ?></th> */
		?>
		
	</tr>
	<?php foreach ($qgroup['Question'] as $question): ?>
		<tr>
			<td><?php echo $question['id']; ?></td>			
			<td><?php echo $question['question']; ?></td>
			
			<?php
			/* <td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'questions', 'action' => 'view', $question['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'questions', 'action' => 'edit', $question['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'questions', 'action' => 'delete', $question['id']), null, __('Are you sure you want to delete # %s?', $question['id'])); ?>
			</td> */
			?>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
