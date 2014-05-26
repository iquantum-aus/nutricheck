<div class="panel-group" id="accordion">
	<?php
		foreach($answers_per_date as $key => $answer_per_date) {
			?>
				
				<div class="panel panel-default">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a class="report_loader_link" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo strtotime($answer_per_date['Answer']['created']); ?>">
						  <?php echo $answer_per_date['Answer']['created']; ?>
						</a>
					  </h4>
					</div>
					<div id="collapse_<?php echo strtotime($answer_per_date['Answer']['created']); ?>" class="panel-collapse collapse">
					  <div class="panel-body">
						Loading...
					  </div>
					</div>
				  </div>
			<?php
		}
	?>
</div>

<div id="load_container"></div>

<!-- <a href="/answers/load_date_report/<?php echo strtotime($answer_per_date['Answer']['created']); ?>"> -->

<script>
	$(document).ready ( function () {
		$('.report_loader_link').on('click', function () {
			var link_target = $(this).attr('href');
			
			var link_splitted = link_target.split("_");
			console.log(link_splitted);
			
				$.ajax({
					async:true,
					dataType:'html',
					success:function (data) {
							// $('#load_container').append(data);
							$('#collapse_'+link_splitted[1]+' .panel-body').delay(3000).html(data);
					},
					error:function(e) {
					console.debug(e);
					},
					type:'post',
					url:"/answers/load_date_report/"+link_splitted[1]
				});
			
			
		});
	});
</script>