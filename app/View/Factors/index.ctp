<div class="factors index">
	<h2><?php echo __('Factors'); ?> <small> - <?php echo $this->Html->link(__('Create New'), array('action' => 'add')); ?></small></h2>
	
	<div class="left" style="width: 100%;">
		<form method="POST" id="GroupSelect" class="left full" action="/factors/index/">
			<label style="float: left; margin-right: 20px; padding-top: 10px;"><strong>Search for a Factor:</strong></label>
			<?php echo $this->Form->input('Factor.search_value', array('value' => $search_value, 'style' => "width: 30%; float: left; margin-right: 10px;", 'label' => false, 'div' => false, 'class' => 'left')); ?>
			<input name="data[Factor][submit]" type="submit" value="SUBMIT" class="btn btn-success left" style="margin-right: 5px;">
			<input name="data[Factor][reset]" type="submit" value="RESET" class="btn btn-danger left">
		</form>
	</div>
	
	<table class="full table table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('factor_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($factors as $factor): ?>
	<tr>
		<td><?php echo h($factor['Factor']['id']); ?>&nbsp;</td>
		<td><?php echo h($factor['FactorType']['type']); ?>&nbsp;</td>
		<td><?php echo h($factor['Factor']['name']); ?>&nbsp;</td>
		<td><?php echo h($factor['Factor']['description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $factor['Factor']['id']), array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $factor['Factor']['id']), array('class' => 'btn btn-warning')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $factor['Factor']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $factor['Factor']['id'])); ?>
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
<?php /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Factor'), array('action' => 'add'), array('class' => 'btn btn-primary')); ?></li>
		<li><?php echo $this->Html->link(__('Associate Factor'), array('controller' => 'FactorsQuestions', 'action' => 'add'), array('class' => 'btn btn-primary')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => 'btn btn-primary')); ?> </li>
	</ul>
</div>
*/ ?>