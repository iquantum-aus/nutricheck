<script src="/js/ZeroClipboard.js"></script>

<div class="qgroups index">
	<h2><?php echo __('Widgets'); ?></h2>
	<table class="table table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th>IFrame Link</th>
			<th>Actions</th>
	</tr>
	<?php foreach ($qgroups as $qgroup): ?>
	<tr>
		<td><?php echo h($qgroup['Qgroup']['id']); ?>&nbsp;</td>
		<td><?php echo h($qgroup['Qgroup']['name']); ?>&nbsp;</td>
		<td><?php echo h($qgroup['Qgroup']['created']); ?>&nbsp;</td>
		<td><?php echo h($qgroup['Qgroup']['modified']); ?>&nbsp;</td>
		<td>
			<p>
				<textarea style="font-size: 12px;" name="clipboard-text" id="clipboard-text" cols="30" rows="10"><script type="text/javascript" src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/js/iframe-panel.js"></script><link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/css/iframe-panel.css"><div id="leftbar" style="width='120px' height='690'"><div id="closeButton"></div><div id="panelContentHolder"><iframe sandbox="allow-same-origin allow-scripts allow-popups allow-forms" frameborder="0" width="1560" height="690" src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/qgroups/load_questions/<?php echo $qgroup['Qgroup']['id']; ?>" name="imgbox"></iframe></div></div><a class="btn" id="panelToggle" href="#">Show Panel</a></textarea>
				<br />
				<button class="btn btn-success" id="target-to-copy" data-clipboard-target="clipboard-text">Click To Copy</button><br/>
			</p>
			<p id="target-to-copy-text" style="display:none;">Text Copied.</p>
		</td>
		<td width="33%">
			
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $qgroup['Qgroup']['id']), array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $qgroup['Qgroup']['id']), array('class' => 'btn btn-warning')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $qgroup['Qgroup']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $qgroup['Qgroup']['id'])); ?>
			<a data-width="1080" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/qgroups/load_questions/<?php echo $qgroup['Qgroup']['id']; ?>" class="fancybox fancybox.iframe btn btn-success">Preview</a>
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
		<li><?php echo $this->Html->link(__('New Question Group'), array('action' => 'add'), array('class' => 'btn btn-primary')); ?></li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index'), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add'), array('class' => 'btn btn-primary')); ?> </li>
	</ul>
</div>
*/ ?>
<script>
	$(document).ready( function () {
		
		// main.js
		var clientTarget = new ZeroClipboard( document.getElementById("target-to-copy"), {
		  moviePath: "/js/ZeroClipboard.swf"
		} );

		clientTarget.on( "load", function(clientTarget){
			$('#flash-loaded').fadeIn();

			clientTarget.on( "complete", function(clientTarget, args) {
				clientTarget.setText( args.text );
				$('#target-to-copy-text').fadeIn();
			} );
		} );

		
		$("a.fancybox").fancybox({
			afterLoad: function(){
				this.width = 1150;
			}
		 }); // fancybox
	});
</script>