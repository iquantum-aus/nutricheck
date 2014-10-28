<div class="factorTypes index">
	<h2><?php echo __('Factor Types'); ?> <small> - <?php echo $this->Html->link(__('Create New'), array('action' => 'add')); ?></small></h2>
	
	<div class="left" style="width: 100%;">
		<form method="POST" id="GroupSelect" class="left full" action="/factor_types/index/">
			<label style="float: left; margin-right: 20px; padding-top: 10px;"><strong>Search for a Type:</strong></label>
			<?php echo $this->Form->input('FactorType.search_value', array('value' => $search_value, 'style' => "width: 30%; float: left; margin-right: 10px;", 'label' => false, 'div' => false, 'class' => 'left')); ?>
			<input name="data[FactorType][submit]" type="submit" value="SUBMIT" class="btn btn-success left" style="margin-right: 5px;">
			<input name="data[FactorType][reset]" type="submit" value="RESET" class="btn btn-danger left">
			<!-- <input type="submit" class="btn btn-success" value="SELECT" name="data[User][submit]"> -->
		</form>
	</div>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($factorTypes as $factorType): ?>
	<tr>
		<td><?php echo h($factorType['FactorType']['id']); ?>&nbsp;</td>
		<td><?php echo h($factorType['FactorType']['type']); ?>&nbsp;</td>
		<td><?php echo h($factorType['FactorType']['created']); ?>&nbsp;</td>
		<td><?php echo h($factorType['FactorType']['modified']); ?>&nbsp;</td>
		<td><?php echo h($factorType['FactorType']['status']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $factorType['FactorType']['id']), array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $factorType['FactorType']['id']), array('class' => 'btn btn-warning')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $factorType['FactorType']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $factorType['FactorType']['id'])); ?>
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