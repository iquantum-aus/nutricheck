<div class="histories index">
	<h2><?php echo __('Histories'); ?> <small> - <?php echo $this->Html->link(__('Create New'), array('action' => 'add')); ?></small></h2>
	
	<div class="left" style="width: 100%;">
		<form method="POST" id="GroupSelect" class="left full" action="/histories/index/">
			<label style="float: left; margin-right: 20px; padding-top: 10px;"><strong>Search for a Diagnosis:</strong></label>
			<?php echo $this->Form->input('History.search_value', array('value' => $search_value, 'style' => "width: 30%; float: left; margin-right: 10px;", 'label' => false, 'div' => false, 'class' => 'left')); ?>
			<input name="data[History][submit]" type="submit" value="SUBMIT" class="btn btn-success left" style="margin-right: 5px;">
			<input name="data[History][reset]" type="submit" value="RESET" class="btn btn-danger left">
		</form>
	</div>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('diagnostics'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($histories as $history): ?>
	<tr>
		<td><?php echo h($history['History']['id']); ?>&nbsp;</td>
		<td>
			<?php
				$display_data = "";
				if(empty($history['UserProfile']['first_name']) && empty($history['UserProfile']['last_name'])) {				
					if(!empty($history['User']['username'])) {
						$display_data = $history['User']['username'];
					} else {
						$display_data = $history['User']['email'];
					}
				} else {
					$display_data = $history['UserProfile']['first_name']." ".$history['UserProfile']['last_name'];
				}
				
				echo $this->Html->link($display_data, array('controller' => 'users', 'action' => 'view', $history['User']['id'])); 
			?>
		</td>
		<td width="40%"><?php echo h($history['History']['diagnostics']); ?>&nbsp;</td>
		<td><?php echo h($history['History']['created']); ?>&nbsp;</td>
		<td><?php echo h($history['History']['modified']); ?>&nbsp;</td>
		
		<td>
			<a href="/histories/view/<?php echo $history['History']['id']; ?>" class="btn btn-primary">View</a>
			<a href="/histories/edit/<?php echo $history['History']['id']; ?>" class="btn btn-warning">Edit</a>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $history['History']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $history['History']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
