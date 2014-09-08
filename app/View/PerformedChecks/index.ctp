<div class="performedChecks index">
	<h2><?php echo __('Performed Checks'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('modified', 'Completed Date'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($performedChecks as $performedCheck): ?>
	<tr>
		<td><?php echo h($performedCheck['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($performedCheck['PerformedCheck']['modified']); ?>&nbsp;</td>
		<td>			
			<a class="btn btn-info" href="/answers/load_date_report/<?php echo strtotime($performedCheck['PerformedCheck']['modified'])."/".$performedCheck['User']['id']; ?>">Report</a>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $performedCheck['PerformedCheck']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $performedCheck['PerformedCheck']['id'])); ?>
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