<div class="analysisResults index">
	<h2><?php echo __('Analysis Results'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('factor_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('score'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($analysisResults as $analysisResult): ?>
	<tr>
		<td><?php echo h($analysisResult['AnalysisResult']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($analysisResult['Factors']['name'], array('controller' => 'factors', 'action' => 'view', $analysisResult['Factors']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($analysisResult['Users']['id'], array('controller' => 'users', 'action' => 'view', $analysisResult['Users']['id'])); ?>
		</td>
		<td><?php echo h($analysisResult['AnalysisResult']['score']); ?>&nbsp;</td>
		<td><?php echo h($analysisResult['AnalysisResult']['created']); ?>&nbsp;</td>
		<td><?php echo h($analysisResult['AnalysisResult']['modified']); ?>&nbsp;</td>
		<td><?php echo h($analysisResult['AnalysisResult']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $analysisResult['AnalysisResult']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $analysisResult['AnalysisResult']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $analysisResult['AnalysisResult']['id']), null, __('Are you sure you want to delete # %s?', $analysisResult['AnalysisResult']['id'])); ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Analysis Result'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Factors'), array('controller' => 'factors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Factors'), array('controller' => 'factors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
