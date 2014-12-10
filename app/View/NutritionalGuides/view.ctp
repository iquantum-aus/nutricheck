<div class="nutritionalGuides view">
	<h2><?php echo __('Nutritional Guide'); ?> <a target="_blank" href="/nutritional_guides/data/<?php echo $nutritionalGuide['NutritionalGuide']['id']; ?>" class="btn btn-info">PRINT</a></h2>
	<table class="table">	
		<tbody>
		
			<tr>
				<td><?php echo __('Title'); ?></td>
				<td>
					<?php echo h($nutritionalGuide['NutritionalGuide']['title']); ?>
					&nbsp;
				</td>
			</tr>
			
			<tr>
				<td><?php echo __('Description'); ?></td>
				<td>
					<?php echo $nutritionalGuide['NutritionalGuide']['description']; ?>
					&nbsp;
				</td>
			</tr>
			
			<tr>
				<td><?php echo __('Type'); ?></td>
				<td>
					<?php echo h($nutritionalGuide['NutritionalGuideType']['type']); ?>
					&nbsp;
				</td>
			</tr>
			
		</tbody>
	</table>
</div>

<?php /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Nutritional Guide'), array('action' => 'edit', $nutritionalGuide['NutritionalGuide']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Nutritional Guide'), array('action' => 'delete', $nutritionalGuide['NutritionalGuide']['id']), null, __('Are you sure you want to delete # %s?', $nutritionalGuide['NutritionalGuide']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Nutritional Guides'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nutritional Guide'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
*/ ?>