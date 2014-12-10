<div class="nutritionalGuides view">
	<table class="table">	
		<tbody>		
			<tr>
				<td>
					<h2><strong><?php echo __('Title'); ?>:</strong > <?php echo h($nutritionalGuide['NutritionalGuide']['title']); ?></h2>
				</td>
			</tr>
			
			<tr>
				<td>
					<h4><strong><?php echo __('Type'); ?>:</strong></h> <?php echo h($nutritionalGuide['NutritionalGuideType']['type']); ?></h4>
				</td>
			</tr>
			
			<tr>
				<td>
					<h3><strong><?php echo __('Description'); ?></strong></h3> <?php echo $nutritionalGuide['NutritionalGuide']['description']; ?>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
	$(window).load( function () { window.print(); });
</script>