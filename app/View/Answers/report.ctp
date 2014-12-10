<?php if($_GET['source']) != "remote" { ?>
	<?php
		$total_score = array();
		$raw_score = array();
		$percentage = array();
		
		foreach($reports_per_factor as $factor_key => $report_per_factor) {
			$total_score[$factor_key] = 0;
			$raw_score[$factor_key] = 0;
			$percentage[$factor_key] = 0;
			
			foreach($report_per_factor as $answer) {
				$total_score[$factor_key] += (3*$answer['FactorsQuestion']['multiplier']);
				$raw_score[$factor_key] += ($answer['Answer']['rank'] * $answer['FactorsQuestion']['multiplier']);
			}
			
			$percentage[$factor_key] = ($raw_score[$factor_key]/$total_score[$factor_key]) * 100;		
		}
	?>


	<?php	
		$final_prescription_values = array();
		foreach($percentage as $key => $percentage_final_score) {
			$factor_id = $key;
			$percentage_final_score = round($percentage_final_score);
			
			foreach($grouped_prescriptions[$factor_id] as $prescription) {
				
				$dosage = "";
				
				if(($percentage_final_score >= 0) && ($percentage_final_score <= 20)) { $dosage = $prescription['Prescription']['1_20']; }
				if(($percentage_final_score >= 21) && ($percentage_final_score <= 40)) { $dosage = $prescription['Prescription']['21_40']; }
				if(($percentage_final_score >= 41) && ($percentage_final_score <= 60)) { $dosage = $prescription['Prescription']['41_60']; }
				if(($percentage_final_score >= 61) && ($percentage_final_score <= 80)) { $dosage = $prescription['Prescription']['61_80']; }
				if(($percentage_final_score >= 81) && ($percentage_final_score <= 1000)) {$dosage = $prescription['Prescription']['81_100']; }
			
				$final_prescription_values[$factors[$factor_id]][$prescription['Prescription']['functional_disturbance']]['score'] = $percentage_final_score;
				$final_prescription_values[$factors[$factor_id]][$prescription['Prescription']['functional_disturbance']]['dosage'] = $dosage;
				$final_prescription_values[$factors[$factor_id]][$prescription['Prescription']['functional_disturbance']]['maximum_dosage'] = $prescription['Prescription']['maximum_dosage'];
			}
		}
	?>

	<div class="index">
		<canvas id="canvas" height="450" width="900"></canvas>
		
		<div style="margin-top: 80px;" id="prescription_report left full">
			<?php foreach($final_prescription_values as $factor => $prescriptions) { ?>			
				<table style="margin-bottom: 50px;" class="full left table table-striped table-bordered">
					<tbody>
						<tr>
							<th>Functional Disturbance</th>
							<th>Nutrients</th>
							<!-- <th>Score</th>-->
							<th>Prescription</th>
							<th>Maximum Daily Dose</th>
						</tr>
						
						<?php foreach($prescriptions as $functional_disturbance => $prescription) { ?>
							<tr>
								<td><?php echo $factor; ?></td>
								<td><?php echo $functional_disturbance; ?></td>
								<?php /* <td><?php echo $prescription['score'] ?></td> */ ?>
								<td><?php echo $prescription['dosage'] ?></td>
								<td><?php echo $prescription['maximum_dosage']; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			<?php } ?>
		</div>
	</div>

	<?php 
		foreach($factors as $key => $factor) {
			$factors[$key] = '"'.$factor.'"';
		}
		
		$flatten_percentage = implode(",", $percentage);
		$flatten_factors = implode(",", $factors);
	?>

	<script>
		$(document).ready( function () {
			var barChartData = {
				labels : [<?php echo $flatten_factors; ?>],
				datasets : [
					{
						fillColor : "rgba(220,220,220,0.5)",
						strokeColor : "rgba(220,220,220,1)",
						data : [<?php echo $flatten_percentage; ?>]
					}
				]
				
			}

			var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(barChartData);
		});	
	</script>
<?php } ?>