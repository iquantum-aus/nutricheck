<style>
	h1 { font-size: 20px; font-weight: bold; }
</style>

<?php
	$total_score = array();
	$raw_score = array();
	$percentage = array();
	
	// grouped answers by factor
	foreach($reports_per_factor as $factor_key => $report_per_factor) {
		$total_score[$factor_key] = 0;
		$raw_score[$factor_key] = 0;
		$percentage[$factor_key] = 0;
		$highest_score = 3;
		$question_per_disturbance = 0;
		
		// total percentage per factor
		foreach($report_per_factor as $answer) {
			$total_score[$factor_key] += ($highest_score * $answer['FactorsQuestion']['multiplier']);
			$raw_score[$factor_key] += ($answer['Answer']['rank'] * $answer['FactorsQuestion']['multiplier']);
			$question_count[$factor_key] = count($reports_per_factor[$factor_key]);
			
			$percentage[$factor_key] = ($raw_score[$factor_key]/$total_score[$factor_key]) * 100;
			$second_percentage_value[$factor_key] = ($raw_score[$factor_key] * 100)/($question_count[$factor_key] * $highest_score);
		}
	}
?>


<?php	
	$final_prescription_values = array();
	$groupBy_functionalDisturbance = array();
	$groupBy_functionalDisturbance_maximumDosage = array();
	
	$plain_baseNutrient_result = array();
	
	// group by factor (computed percentage of raw score vs. total score)
	foreach($second_percentage_value as $key => $percentage_final_score) {
		$factor_id = $key;
		$percentage_final_score = round($percentage_final_score);
		
		if(isset($grouped_prescriptions[$factor_id])) {
			
			foreach($grouped_prescriptions[$factor_id] as $prescription) {
				
				$dosage = "";
				
				// defining the dosage [er factor depending on the score percentage (raw_score / total_score * 100)
				if(($percentage_final_score >= 0) && ($percentage_final_score <= 20)) { $dosage = $prescription['Prescription']['1_20']; }
				if(($percentage_final_score >= 21) && ($percentage_final_score <= 40)) { $dosage = $prescription['Prescription']['21_40']; }
				if(($percentage_final_score >= 41) && ($percentage_final_score <= 60)) { $dosage = $prescription['Prescription']['41_60']; }
				if(($percentage_final_score >= 61) && ($percentage_final_score <= 80)) { $dosage = $prescription['Prescription']['61_80']; }
				if(($percentage_final_score >= 81)) {$dosage = $prescription['Prescription']['81_100']; }
				
				// values for the detailed prescription
				$final_prescription_values[$factor_id][$prescription['BaseNutrient']['base_nutrient_formula']]['score'] = $percentage_final_score;
				$final_prescription_values[$factor_id][$prescription['BaseNutrient']['base_nutrient_formula']]['dosage'] = $dosage;
				$final_prescription_values[$factor_id][$prescription['BaseNutrient']['base_nutrient_formula']]['maximum_dosage'] = $prescription['BaseNutrient']['maximum_dosage'];
				
				$plain_baseNutrient_result[$prescription['BaseNutrient']['id']] = $prescription['BaseNutrient']['maximum_dosage'];
				
				// values for the grouped prescription
				$groupBy_functionalDisturbance[$prescription['BaseNutrient']['base_nutrient_formula']][$factor_id] = $dosage;
				$groupBy_functionalDisturbance_maximumDosage[$prescription['BaseNutrient']['base_nutrient_formula']] = $prescription['BaseNutrient']['maximum_dosage'];
			}
		}
	}
	
	// grouped base_nutrients with prescription based on given specifics
	$grouped_base_nutrient = array();
	foreach($base_nutrient as $key => $nutrient) {
		$base_nutrient[$key]['BaseNutrient']['prescription'] = array_sum($groupBy_functionalDisturbance[$nutrient['BaseNutrient']['base_nutrient_formula']]);
		
		if($base_nutrient[$key]['BaseNutrient']['nutrient_group'] == "") {
			$base_nutrient[$key]['BaseNutrient']['nutrient_group'] = "XX";
		}
		
		if($base_nutrient[$key]['BaseNutrient']['nutrient_group'] == "0") {
			$base_nutrient[$key]['BaseNutrient']['nutrient_group'] = "AL";
		}
		
		$grouped_base_nutrient[$base_nutrient[$key]['BaseNutrient']['nutrient_group']][$base_nutrient[$key]['BaseNutrient']['order']] = $base_nutrient[$key];
	}
	
	foreach($grouped_base_nutrient as $key => $nutrient) {
		ksort($grouped_base_nutrient[$key]);
	}
	
	$final_factor_grouped_by_type = array();
	foreach($factor_type_grouping as $factor_group_key => $factors_type) {
		foreach($factors_type as $factor_in_type_key => $factor_in_type_item) {
			$final_factor_grouped_by_type[$factor_group_key][$factor_in_type_key] = $final_prescription_values[$factor_in_type_key];
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
	
	<a class="btn btn-success" href="/admin/users">Back to User List</a>
	<a class="btn btn-warning" target="_blank" href="/answers/report_print/<?php echo $completion_time; ?>/<?php echo $user_id; ?>?mode=1">Print Graph and Summary</a>
	<a class="btn btn-primary" target="_blank" href="/answers/report_print/<?php echo $completion_time; ?>/<?php echo $user_id; ?>?mode=2">Print Full Report</a>
	<br /><br />
	
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
						<td>
							<?php
								if(empty($dosage[0])) {
									$dosage[0] = "N/A";
								}
								
								$total_dosage = array_sum($dosage);
								$prescription_maximum_dosage = $groupBy_functionalDisturbance_maximumDosage[$name];
								
								if($prescription_maximum_dosage > 0) {
									if($total_dosage > $prescription_maximum_dosage) {
										echo $prescription_maximum_dosage;
									} else {
										echo $total_dosage;
									}
								} else {
									echo $total_dosage;
								}
							?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	
	<h1>Detailed Nutrient Recommendation</h1>
	<div class="prescription_report left full">
		
		<?php unset($grouped_base_nutrient['XX']) ?>
		<?php foreach($grouped_base_nutrient as $group_key => $nutrient) { ?>
			
			<h2>
				<?php
				switch($group_key) {
					case "XX":
						echo "Various";
						break;
						
					case "AL":
						echo "Allergy";
						break;
					
					case 1:
						echo "Digestion";
						break;
					
					case 2:
						echo "Git Dysbiosis";
						break;
					
					case 3:
						echo "Vitamins";
						break;
						
					case 4:
						echo "Minerals";
						break;
						
					case 5:
						echo "Neurotransmitter Precursors";
						break;
				}
			?>&nbsp;
			</h2>
			
			<table style="margin-bottom: 50px;" class="full left table table-striped table-bordered">
				<tbody>
					<tr>
						<th>Nutrient Disturbance</th>
						<th>Recommended Dosage</th>
					</tr>
					
					<?php foreach($nutrient as $item) { ?>
						<tr>
							<td width="50%"><?php echo $item['BaseNutrient']['base_nutrient_formula']; ?></td>
							<td width="50%">
								<?php
									if(!empty($item['BaseNutrient']['maximum_dosage'])) {										
										if(($item['BaseNutrient']['prescription'] <= $item['BaseNutrient']['maximum_dosage'])) {
											echo $item['BaseNutrient']['prescription'];
										} else {
											echo $item['BaseNutrient']['maximum_dosage'];
										}
									} else {
										echo $item['BaseNutrient']['prescription'];
									}
								?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			
			<br /><br /><br />
			
		<?php } ?>
	</div>
</div>

<style>
	.fancybox-inner { overflow-x: hidden !important;  }
	.fancybox-outer { padding: 20px 0px; }
</style>

<script>
	$(document).ready( function () {
		$('.fancybox').fancybox();
	});	
</script>