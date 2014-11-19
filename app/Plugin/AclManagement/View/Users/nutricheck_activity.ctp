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
									<a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/answers/load_date_report/<?php echo $answer_per_date['PerformedCheck']['completion_time']; ?>/<?php echo $user_id; ?>/<?php echo $answer_per_date['PerformedCheck']['id']; ?>">
										<?php echo date("M d, Y H:i:s", $answer_per_date['PerformedCheck']['completion_time']); ?>
									</a>
									
									<input type="button" class="deleteReport btn btn-danger right" id="<?php echo $answer_per_date['PerformedCheck']['completion_time']; ?>_<?php echo $user_id; ?>" value="DELETE">
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

<a href="#verifyAdminPass" class="hidden fancybox" id="verifyTrigger"></a>
<div class="hidden">
	<div id="verifyAdminPass" style="width: 320px;">
		<form style="width: 310px;" id="verifyPassword">
			<h4>Moderator Password</h4>
			<input type="password" name="data[User][password]" id="passwordValue" style="float: left; clear: none; width: 225px;">
			
			<input type="hidden"  id="reportUserId">
			<input type="hidden"  id="reportCompletionTime">
			<input type="button" value="Verify" id="verifyPassword" class="btn btn-success" style="float: left; clear: none; margin-left: 15px; min-width: 50px;">
		</form>
	</div>
</div>

<script>
	$(document).ready ( function () {
		
		$('.deleteReport').click( function () {
			var id = $(this).attr('id');
			var user_identity = id.split('_');
			
			$('#reportCompletionTime').val(user_identity[0]);
			$('#reportUserId').val(user_identity[1]);
			$('#verifyTrigger').click();			
		});
		
		$('input#verifyPassword').click( function () {
			var passwordValue = $('#passwordValue').val();
			if(passwordValue == "") {
				alert('Password can not be empty');
			} else {
				$.ajax({
					async:true,
					data:$('#verifyPassword').serialize(),
					dataType:'html',
					success:function (data, textStatus) {						
						if(data == 1) {
							var reportUserId = $('#reportUserId').val();
							var reportCompletionTime = $('#reportCompletionTime').val();
							window.location.href = 'http://<?php echo $_SERVER['SERVER_NAME']; ?>/users/delete_report/'+reportUserId+'/'+reportCompletionTime;
						} else {
							alert('Password is invalid');
						}
					},
					type:'post',
					url:"/questions/verify_password/"
				});	
			}
			
			return false;
		});
		
		
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