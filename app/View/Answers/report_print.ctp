<style>
	h1 { font-size: 20px; font-weight: bold; }
</style>

<?php
	$total_score = array();
	$raw_score = array();
	$percentage = array();
	
	foreach($reports_per_factor as $factor_key => $report_per_factor) {
		$total_score[$factor_key] = 0;
		$raw_score[$factor_key] = 0;
		$percentage[$factor_key] = 0;
		$highest_score = 3;
		$question_per_disturbance = 0;
		
		foreach($report_per_factor as $answer) {
			$total_score[$factor_key] += ($highest_score * $answer['FactorsQuestion']['multiplier']);
			$raw_score[$factor_key] += ($answer['Answer']['rank'] * $answer['FactorsQuestion']['multiplier']);
			$question_count[$factor_key] = count($reports_per_factor[$factor_key]);
			
			$percentage[$factor_key] = ($raw_score[$factor_key]/$total_score[$factor_key]) * 100;
			$second_percentage_value[$factor_key] = ($raw_score[$factor_key] * 100)/($question_count[$factor_key] * 3);
			// $second_percentage_value[$factor_key] = ($raw_score[$factor_key]/$total_score[$factor_key]) * 100;
		}
		
		// echo $raw_score[$factor_key]." - ".$question_count[$factor_key];
		// echo "<br />";
		
	}
?>


<?php	
	$final_prescription_values = array();
	$groupBy_functionalDisturbance = array();
	foreach($second_percentage_value as $key => $percentage_final_score) {
		$factor_id = $key;
		$percentage_final_score = round($percentage_final_score);
		
		if(isset($grouped_prescriptions[$factor_id])) {
			foreach($grouped_prescriptions[$factor_id] as $prescription) {
				
				$dosage = "";
				
				if(($percentage_final_score >= 0) && ($percentage_final_score <= 20)) { $dosage = $prescription['Prescription']['1_20']; }
				if(($percentage_final_score >= 21) && ($percentage_final_score <= 40)) { $dosage = $prescription['Prescription']['21_40']; }
				if(($percentage_final_score >= 41) && ($percentage_final_score <= 60)) { $dosage = $prescription['Prescription']['41_60']; }
				if(($percentage_final_score >= 61) && ($percentage_final_score <= 80)) { $dosage = $prescription['Prescription']['61_80']; }
				if(($percentage_final_score >= 81)) {$dosage = $prescription['Prescription']['81_100']; }
			
				$final_prescription_values[$factors[$factor_id]][$prescription['Prescription']['functional_disturbance']]['score'] = $percentage_final_score;
				$final_prescription_values[$factors[$factor_id]][$prescription['Prescription']['functional_disturbance']]['dosage'] = $dosage;
				$final_prescription_values[$factors[$factor_id]][$prescription['Prescription']['functional_disturbance']]['maximum_dosage'] = $prescription['Prescription']['maximum_dosage'];
				
				$groupBy_functionalDisturbance[$prescription['Prescription']['functional_disturbance']][$factor_id] = $dosage;
			}
		}
	}
?>

<?php
	foreach($groupBy_functionalDisturbance as $key => $itemizedBy_functionalDisturbance) {
		rsort($itemizedBy_functionalDisturbance);
		$groupBy_functionalDisturbance[$key] = $itemizedBy_functionalDisturbance;
	}
?>

<div class="index">
	
	<?php 
		foreach($factors as $key => $factor) {
			$factors_list[$key] = '"'.$factor.'"';
		}
		
		$flatten_percentage = implode(",", $second_percentage_value);
		$flatten_factors = implode(",", $factors_list);
	?>
	
	<div>
		<table id="horGraphTable" width="100%">
			
			<tr>
				<td>
					<strong>Functional Disturbances</strong>
				</td>
				<td>
					<div class="left levelerHolder">20%</div>
					<div class="left levelerHolder">40%</div>
					<div class="left levelerHolder">60%</div>
					<div class="left levelerHolder">80%</div>
					<div class="left levelerHolder">100%</div>
				</td>
			</tr>
			
			<?php foreach($factors as $list_key => $factor) { ?>
				<tr>
					<td width="27%">
						<div class="hidden">
							<div id="nutriGuide_<?php echo $list_key; ?>"><?php echo $nutritional_guides[$list_key]; ?></div>
						</div>
						<div class="factorNames"><a class="fancybox" href="#nutriGuide_<?php echo $list_key; ?>"><?php echo $factor." (".round($second_percentage_value[$list_key])."%) "; ?></a></div>
					</td>
					<td>
						<?php
							$graphColor = "";
							
							$second_percentage_value[$list_key] = round($second_percentage_value[$list_key]);
							
							if($second_percentage_value[$list_key] <= 20) { $graphColor = "green"; }
							if($second_percentage_value[$list_key] >= 21 && $second_percentage_value[$list_key] <= 40) { $graphColor = "yellow"; }
							if($second_percentage_value[$list_key] >= 41 && $second_percentage_value[$list_key] <= 60) { $graphColor = "orange"; }
							if($second_percentage_value[$list_key] >= 61 && $second_percentage_value[$list_key] <= 80) { $graphColor = "red"; }
							if($second_percentage_value[$list_key] >= 81) { $graphColor = "red"; }
						?>
						
						<div class="graphContentHolder">
							<div class="left levelerHolder"></div>
							<div class="left levelerHolder"></div>
							<div class="left levelerHolder"></div>
							<div class="left levelerHolder"></div>
							<div class="left levelerHolder"></div>
							
							<div class="left horGraph" style="width: <?php echo $second_percentage_value[$list_key]; ?>%; background-color: <?php echo $graphColor; ?>;">
								<?php // echo round($second_percentage_value[$list_key]); ?>
							</div>
						</div>
					</td>
				</tr>
			<?php } ?>
			
			<tr>
				<td></td>
				<td>
					<div class="left levelerHolder">20%</div>
					<div class="left levelerHolder">40%</div>
					<div class="left levelerHolder">60%</div>
					<div class="left levelerHolder">80%</div>
					<div class="left levelerHolder">100%</div>
				</td>
			</tr>
			
		</table>
	</div>
	
	<!-- <canvas id="canvas" height="450" width="800"></canvas> -->
	
	<br />
	<h1>Summarised Nutrient Recommendation</h1>
	<div class="prescription_report left full">		
		<table style="margin-bottom: 50px;" class="full left table table-striped table-bordered">
			<tbody>
				<tr>
					<th>Nutrients</th>
					<th>Recommended Daily Dosage</th>
				</tr>
				<?php foreach($groupBy_functionalDisturbance as $name => $dosage) { ?>			
					<tr>
						<td><?php echo $name; ?></td>
						<td><?php 
							
							if(empty($dosage[0])) {
								$dosage[0] = "N/A";
							}
							
							echo $dosage[0]; ?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	
	<br />
	<h1>Detailed Nutrient Recommendation</h1>
	<div class="prescription_report left full">
		<?php foreach($final_prescription_values as $factor => $prescriptions) { ?>			
			<table style="margin-bottom: 50px;" class="full left table table-striped table-bordered">
				<tbody>
					<tr>
						<th>Factor</th>
						<th>Nutrient Disturbance</th>
						<th>Recommended Dosage</th>
					</tr>
					
					<?php foreach($prescriptions as $functional_disturbance => $prescription) { ?>
						<tr>
							<td><?php echo $factor; ?></td>
							<td><?php echo $functional_disturbance; ?></td>
							<td><?php echo $prescription['dosage'] ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php } ?>
	</div>	
</div>



<script>
	$(document).ready( function () {
		window.print();
	});	
</script>