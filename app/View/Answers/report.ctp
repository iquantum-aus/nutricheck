<?php
	$total_score = array();
	$raw_score = array();
	$percentage = array();
	foreach($reports_per_factor as $factor_key => $report_per_factor) {
		$total_score[$factor_key] = 0;
		$raw_score[$factor_key] = 0;
		$percentage[$factor_key] = 0;
		foreach($report_per_factor as $answer) {
			$total_score[$factor_key] += (4*$answer['FactorsQuestion']['multiplier']);
			$raw_score[$factor_key] += ($answer['Answer']['rank'] * $answer['FactorsQuestion']['multiplier']);
			$percentage[$factor_key] = ($raw_score[$factor_key]/$total_score[$factor_key]) * 100;
		}
	}
?>


<?php
	pr($total_score);
	pr($raw_score);
	pr($percentage);
?>