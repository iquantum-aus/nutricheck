<div class="videos view">
<h2><?php echo __('Video'); ?></h2>
	<table>
		<tbody>
			<tr>
				<td><?php echo __('Id'); ?></td>
				<td>
					<?php echo h($video['Video']['id']); ?>
					&nbsp;
				</td>
			</tr>
			
			<tr>
				<td><?php echo __('Group'); ?></td>
				<td>
					<?php echo $this->Html->link($video['Group']['name'], array('controller' => 'groups', 'action' => 'view', $video['Group']['id'])); ?>
					&nbsp;
				</td>
			</tr>
			
			<tr>
				<td><?php echo __('Video Link'); ?></td>
				<td>
					<?php 
						$newWitdh = "500";
						$newHeight = "281";

						$content = preg_replace(
						array('/witdh="\d+"/i', '/height="\d+"/i'),
						array(sprintf('witdh="%d"', $newWitdh), sprintf('height="%d"', $newHeight)),
						$video['Video']['video_link']);
						
						echo $content;
					?>
					&nbsp;
				</td>
			</tr>
			
			<tr>
				<td><?php echo __('Created'); ?></td>
				<td>
					<?php echo h($video['Video']['created']); ?>
					&nbsp;
				</td>
			</tr>
			
			<tr>			
				<td><?php echo __('Modified'); ?></td>
				<td>
					<?php echo h($video['Video']['modified']); ?>
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
		<li><?php echo $this->Html->link(__('Edit Video'), array('action' => 'edit', $video['Video']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Video'), array('action' => 'delete', $video['Video']['id']), null, __('Are you sure you want to delete # %s?', $video['Video']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('action' => 'atd')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'atd')); ?> </li>
	</ul>
</div>
*/ ?>