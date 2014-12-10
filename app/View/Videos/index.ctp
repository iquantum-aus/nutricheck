<div class="videos index">
	<h2><?php echo __('Videos'); ?> <small> - <?php echo $this->Html->link(__('Create New'), array('action' => 'add')); ?></small></h2>
	
	<div class="left" style="width: 100%;">
		<form method="POST" id="GroupSelect" class="left full" action="/videos/index/">
			<label style="float: left; margin-right: 20px; padding-top: 10px;"><strong>Search for a Video:</strong></label>
			<?php echo $this->Form->input('Video.search_value', array('value' => $search_value, 'style' => "width: 30%; float: left; margin-right: 10px;", 'label' => false, 'div' => false, 'class' => 'left')); ?>
			<input name="data[Video][submit]" type="submit" value="SUBMIT" class="btn btn-success left" style="margin-right: 5px;">
			<input name="data[Video][reset]" type="submit" value="RESET" class="btn btn-danger left">
			<!-- <input type="submit" class="btn btn-success" value="SELECT" name="data[User][submit]"> -->
		</form>
	</div>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('video_link'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($videos as $video): ?>
	<tr>
		<td width="5%"><?php echo h($video['Video']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($video['Group']['name'], array('controller' => 'groups', 'action' => 'view', $video['Group']['id'])); ?>
		</td>
		<td><?php echo h($video['Video']['video_link']); ?>&nbsp;</td>
		<td width="20%">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $video['Video']['id']), array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $video['Video']['id']), array('class' => 'btn btn-warning')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $video['Video']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $video['Video']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Video'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
*/ ?>