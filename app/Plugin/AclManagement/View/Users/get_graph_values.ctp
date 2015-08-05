<!-- Nav tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#tableGraph" data-toggle="tab">Table Graph</a></li>
	<li><a href="#pieGraph" data-toggle="tab">Pie Graph</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane active" id="tableGraph">
		
		<table class="table table-striped">
			
			<tr>
				<th>Client Name</th>
				<th style="text-align: center;">Number of Members</th>
				<th style="text-align: center;">Number of Completed NutriChecks</th>
				<th style="text-align: center;">Draft NutriChecks</th>
				<th style="text-align: center;">Scheduled NutriChecks</th>
			</tr>
			
			<?php
				foreach($clients_data as $client_data_key => $client_data) {
					?>
						
						<tr>
							<td>
								<?php 
									$client_name = (!empty($client_data['client_info'][0]['UserProfile']['company']) ? $client_data['client_info'][0]['UserProfile']['company'] : $client_data['client_info'][0]['User']['email']);
									echo $client_name;
								?>
							</td>
							<td style="text-align: center;"><?php echo $client_data['members']; ?></td>
							<td style="text-align: center;"><?php echo $client_data['completed_nutricheck']; ?></td>
							<td style="text-align: center;"><?php echo $client_data['draft_nutricheck']; ?></td>
							<td style="text-align: center;"><?php echo $client_data['scheduled_nutricheck']; ?></td>
						</tr>
					<?php
				}
			?>
		</table>
	</div>
	<div class="tab-pane" id="pieGraph">
		
		<h3>Legend</h3>
		
		<div class="left span12">
			<div class="left span12">
				<div style="background: #F7464A;" class="color-legend"></div>
				<span class="color-legend-label">Member Count</span>
			</div>
			
			<div class="left span12">
				<div style="background: #46BFBD;" class="color-legend"></div>
				<span class="color-legend-label">Completed NutriCheck</span>
			</div>
			
			<div class="left span12">
				<div style="background: #FDB45C;" class="color-legend"></div>
				<span class="color-legend-label">Draft NutriCheck</span>
			</div>
			
			<div class="left span12">
				<div style="background: #949FB1;" class="color-legend"></div>
				<span class="color-legend-label">Schedule NutriCheck</span>
			</div>
		</div>
		
		<div id="canvas-holder">
			<?php
				foreach($clients_data as $client_data_key => $client_data) {
					?>
						<div class="clientPieHolder left span3">
							<center>
								<span class="left span12">
									<strong>
										<?php 
											$client_name = (!empty($client_data['client_info'][0]['UserProfile']['company']) ? $client_data['client_info'][0]['UserProfile']['company'] : $client_data['client_info'][0]['User']['email']);
											echo $client_name;
										?>
									</strong>
								</span>
								<canvas style="float:none;" id="chart-area-<?php echo $client_data_key; ?>" width="150" height="150"></canvas>
							</center>
						</div>
					<?php
				}
			?>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		<?php
			foreach($clients_data as $client_data_key => $client_data) {
				
				$total_population = $client_data['members'] + $client_data['completed_nutricheck'] + $client_data['draft_nutricheck'] + $client_data['scheduled_nutricheck'];
				
				?>
					var pieData<?php echo $client_data_key; ?> = [
						{
							value: <?php echo ($client_data['members']/$total_population) * 100; ?>,
							color:"#F7464A",
							highlight: "#FF5A5E",
							label: "Red"
						},
						{
							value: <?php echo ($client_data['completed_nutricheck']/$total_population) * 100; ?>,
							color: "#46BFBD",
							highlight: "#5AD3D1",
							label: "Green"
						},
						{
							value: <?php echo ($client_data['draft_nutricheck']/$total_population) * 100; ?>,
							color: "#FDB45C",
							highlight: "#FFC870",
							label: "Yellow"
						},
						{
							value: <?php echo ($client_data['scheduled_nutricheck']/$total_population) * 100; ?>,
							color: "#949FB1",
							highlight: "#A8B3C5",
							label: "Grey"
						}
					];

					var ctx<?php echo $client_data_key; ?> = document.getElementById("chart-area-<?php echo $client_data_key; ?>").getContext("2d");
					window.myPie = new Chart(ctx<?php echo $client_data_key; ?>).Pie(pieData<?php echo $client_data_key; ?>);
				<?php
			}
		?>
	});
</script>