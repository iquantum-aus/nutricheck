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
/* 	pr($total_score);
	pr($raw_score);
	pr($percentage); */
?>

<div class="index">
	<canvas id="canvas" height="450" width="900"></canvas>
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