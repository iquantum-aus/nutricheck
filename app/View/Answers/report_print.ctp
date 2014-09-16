<style>
	h1 { font-size: 18px; font-weight: bold; }
	h1 span { font-size: 16px; font-weight: bold; color: green;  }
	table tr td { padding: 3px; }
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
				
				
				$final_prescription_values[$factor_id][$prescription['Prescription']['functional_disturbance']]['score'] = $percentage_final_score;
				$final_prescription_values[$factor_id][$prescription['Prescription']['functional_disturbance']]['dosage'] = $dosage;
				$final_prescription_values[$factor_id][$prescription['Prescription']['functional_disturbance']]['maximum_dosage'] = $prescription['Prescription']['maximum_dosage'];
				
				$groupBy_functionalDisturbance[$prescription['Prescription']['functional_disturbance']][$factor_id] = $dosage;
			}
		}
	}
	
	
	$final_factor_grouped_by_type = array();
	foreach($factor_type_grouping as $factor_group_key => $factors_type) {
		
		foreach($factors_type as $factor_in_type_key => $factor_in_type_item) {
			$final_factor_grouped_by_type[$factor_group_key][$factor_in_type_key] = $final_prescription_values[$factor_in_type_key];
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
	
	<h1>Performed By: <?php echo $user_info['UserProfile']['first_name']." ".$user_info['UserProfile']['last_name']; ?> &nbsp;<span>(Date: <?php echo date("M. d, Y", $date); ?>)</span></h1> 
	
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
							<div style="width: 1080px; padding: 0px 50px 0px 20px; height: 750px;" id="nutriGuide_<?php echo $list_key; ?>"><?php echo $nutritional_guides[$list_key]; ?></div>
						</div>
						<div style="margin-top: 0;" class="factorNames"><a style="font-size: 12px;" class="fancybox" href="#nutriGuide_<?php echo $list_key; ?>"><?php echo $factor." (".round($second_percentage_value[$list_key])."%) "; ?></a></div>
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
						
						<div class="graphContentHolder" style="height: 10px;">
							<div class="left levelerHolder"></div>
							<div class="left levelerHolder"></div>
							<div class="left levelerHolder"></div>
							<div class="left levelerHolder"></div>
							<div class="left levelerHolder"></div>
							
							<div class="left horGraph" style="padding-left: 0; height: 15px; width: <?php echo $second_percentage_value[$list_key]; ?>%; background-color: <?php echo $graphColor; ?>;">
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
	
	<?php if($_GET['mode'] == 2) { ?>
		
		<div style="float: left; width: 100%; height: 120px;" class="clearfix"></div>
		
		<h1>Detailed Nutrient Recommendation</h1>
		<div class="prescription_report left full">
			
			<?php foreach($final_factor_grouped_by_type as $factor_type_id => $final_prescription_values) { ?>
				
				<h2><?php echo $factor_types[$factor_type_id]; ?></h2>
				
				<?php foreach($final_prescription_values as $factor_id => $prescriptions) { ?>			
					
					<h4><?php echo $factors[$factor_id]; ?></h4>
					<table style="margin-bottom: 50px;" class="full left table table-striped table-bordered">
						<tbody>
							<tr>
								<th>Nutrient Disturbance</th>
								<th>Recommended Dosage</th>
							</tr>
							
							<?php foreach($prescriptions as $functional_disturbance => $prescription) { ?>
								<tr>
									<td width="50%"><?php echo $functional_disturbance; ?></td>
									<td width="50%"><?php echo $prescription['dosage'] ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				<?php } ?>
				
				<br /><br /><br />
				
			<?php } ?>
		</div>
	<?php } ?>
	
</div>

<script>
	$(document).ready( function () {
		// window.print();
	});	
</script>