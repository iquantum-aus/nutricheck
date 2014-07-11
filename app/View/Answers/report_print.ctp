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
			// $second_percentage_value[$factor_key] = ($raw_score[$factor_key] * 100)/($question_count[$factor_key] * 3);
			$second_percentage_value[$factor_key] = ($raw_score[$factor_key]/$total_score[$factor_key]) * 100;
		}
		
	}
?>


<?php	
	$final_prescription_values = array();
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
				if(($percentage_final_score >= 81) && ($percentage_final_score <= 1000)) {$dosage = $prescription['Prescription']['81_100']; }
			
				$final_prescription_values[$factors[$factor_id]][$prescription['Prescription']['functional_disturbance']]['score'] = $percentage_final_score;
				$final_prescription_values[$factors[$factor_id]][$prescription['Prescription']['functional_disturbance']]['dosage'] = $dosage;
				$final_prescription_values[$factors[$factor_id]][$prescription['Prescription']['functional_disturbance']]['maximum_dosage'] = $prescription['Prescription']['maximum_dosage'];
			}
		}
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
		<table style="margin-bottom: 50px;" class="full left table table-striped table-bordered">
			
			<tr>
				<td>
					<strong>Functional Disturbances</strong>
				</td>
				<td></td>
			</tr>
			
			<?php foreach($factors as $list_key => $factor) { ?>
				<tr>
					<td width="27%">
						<?php echo $factor." (".round($second_percentage_value[$list_key])."%) "; ?>
					</td>
					<td>
						<?php
							$graphColor = "";
							
							$second_percentage_value[$list_key] = round($second_percentage_value[$list_key]);
							
							if($second_percentage_value[$list_key] <= 20) { $graphColor = "#0000ff"; }
							if($second_percentage_value[$list_key] >= 21 && $second_percentage_value[$list_key] <= 40) { $graphColor = "#00ff00"; }
							if($second_percentage_value[$list_key] >= 41 && $second_percentage_value[$list_key] <= 60) { $graphColor = "#00ffff"; }
							if($second_percentage_value[$list_key] >= 61 && $second_percentage_value[$list_key] <= 80) { $graphColor = "#ff00ff"; }
							if($second_percentage_value[$list_key] >= 81 && $second_percentage_value[$list_key] <= 100) { $graphColor = "#ff0000"; }
						?>
						
						<div class="left horGraph" style="width: <?php echo $second_percentage_value[$list_key]; ?>%; background: <?php echo $graphColor; ?>;">
							<?php echo $second_percentage_value[$list_key]; ?>%
						</div>
					</td>
				</tr>
			<?php } ?>
			
		</table>
	</div>
	
	<!-- <canvas id="canvas" height="450" width="800"></canvas> -->
	
	<div style="margin-top: 80px;" id="prescription_report left full">
		<?php foreach($final_prescription_values as $factor => $prescriptions) { ?>			
			<table style="margin-bottom: 50px;" class="full left table table-striped table-bordered">
				<tbody>
					<tr>
						<th>Functional Disturbance</th>
						<th>Nutrients</th>
						<th>Score</th>
						<th>Prescription</th>
						<th>Maximum Daily Dose</th>
					</tr>
					
					<?php foreach($prescriptions as $functional_disturbance => $prescription) { ?>
						<tr>
							<td><?php echo $factor; ?></td>
							<td><?php echo $functional_disturbance; ?></td>
							<td><?php echo $prescription['score'] ?></td>
							<td><?php echo $prescription['dosage'] ?></td>
							<td><?php echo $prescription['maximum_dosage']; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php } ?>
	</div>
</div>