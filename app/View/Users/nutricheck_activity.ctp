<div class="users index">
	<h2>Previous Activities</h2>
	<h4>Click the dates to view the report</h4>

	<div class="panel-group" id="accordion">	
		<table class="table table-striped">
			<tbody>
				<?php
					foreach($answers_per_date as $key => $answer_per_date) {
						?>
							<tr>
								<td>
									<a class="fancybox fancybox.iframe" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/answers/load_date_report/<?php echo strtotime($answer_per_date['Answer']['created']); ?>"><?php echo $answer_per_date['Answer']['created']; ?></a>
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
	});
</script>