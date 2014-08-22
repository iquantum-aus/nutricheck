<div class="users index">
	<h2>Previous Activities</h2>
	<h4>Click the dates to view the report</h4>
	
	<div class="enableChecking">
		<?php if($user_info['can_answer'] == 0) { ?>
			<a id="toggleChecking">Enable Checking</a>
		<?php } else { ?>
			<span>Enabled</span>
		<?php } ?>
	</div>
	
	<div class="panel-group" id="accordion">	
		<table class="table table-striped">
			<tbody>
				<?php
					foreach($answers_per_date as $key => $answer_per_date) {
						?>
							<tr>
								<td>
									<a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/answers/load_date_report/<?php echo strtotime($answer_per_date['Answer']['created']); ?>/<?php echo $user_id; ?>"><?php echo $answer_per_date['Answer']['created']; ?></a>
								</td>
							</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>

	<div id="load_container"></div>
</div>

<script>
	$(document).ready ( function () {
		$('.fancybox').fancybox({
			'width' : 950,
		});
			
		$('#toggleChecking').click( function () {
			$.ajax({
				async:true,
				dataType:'html',
				success:function (data, textStatus) {
					if(data) {
						alert(data);
						$('.enableChecking').html('<span>Enabled</span>');
					}			
				},
				type:'post',
				url:"/acl_management/users/toggle_can_answer/<?php echo $user_info['id']; ?>/0?source=activity_list"
			});
		});
	});
</script>