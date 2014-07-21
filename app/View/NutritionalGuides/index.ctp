<div class="nutritionalGuides index">
	<h2><?php echo __('Nutritional Guides'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nutritional_guide_type_id', 'Type'); ?></th>
			<th><?php echo $this->Paginator->sort('factor_id', 'Functional Disturbances'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($nutritionalGuides as $nutritionalGuide): ?>
	<tr>
		<td><?php echo h($nutritionalGuide['NutritionalGuide']['id']); ?>&nbsp;</td>
		<td><?php echo h($nutritionalGuide['NutritionalGuide']['title']); ?>&nbsp;</td>
		<td width="50%">
			<?php 
				// echo $nutritionalGuide['NutritionalGuide']['description']; 
				echo substr(strip_tags($nutritionalGuide['NutritionalGuide']['description']), 0, 300);  
				echo "...";
			?>&nbsp;
		</td>
		<td>
			<?php echo $this->Html->link($nutritionalGuide['User']['email'], array('controller' => 'users', 'action' => 'view', $nutritionalGuide['User']['id'])); ?>
		</td>
		<td><?php echo $nutritionalGuide['NutritionalGuideType']['type']; ?></td>
		<td><?php echo $nutritionalGuide['Factor']['name']; ?></td>
		<td width="25%">
			<a class="btn btn-primary" href="/nutritional_guides/view/<?php echo $nutritionalGuide['NutritionalGuide']['id']; ?>">View</a>
			<a class="btn btn-warning" href="/nutritional_guides/edit/<?php echo $nutritionalGuide['NutritionalGuide']['id']; ?>">Edit</a>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $nutritionalGuide['NutritionalGuide']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $nutritionalGuide['NutritionalGuide']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Nutritional Guide'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
*/ ?>