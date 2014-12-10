<h2>
	Full Question List <?php if (isset($user_full_name) && !empty($user_full_name)) { ?><span style="font-size: 15px; color: green;">(<?php echo $user_full_name; ?>)</span><?php } ?>
</h2>

<table>
	<?php
		foreach($questions as $id => $question) {
			echo "<tr><td width='80%'>Q. #".$id.". ".$question."</td><td width='20%'>[ 0 ] [ 1 ] [ 2 ] [ 3 ]</td></tr>";
		}
	?>
</table>

<style>
	table tr td { font-size: 12px; float: left; }
	table, table tr { float: left; width: 100%; }
</style>

<script>
	$(document).ready( function () {
		window.print();
	});	
</script>