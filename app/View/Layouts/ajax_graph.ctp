<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<?php
	echo $this->Html->css('style');
	echo $this->Html->css('bootstrap.min');
	echo $this->Html->css('bootstrap-responsive.min');
	echo $this->Html->css('tufte-graph');
	echo $this->fetch('meta');
	echo $this->fetch('css');
?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<?php echo $this->fetch('content'); ?>

<?php
	echo $this->Html->script('libs/bootstrap.min');
	echo $this->Html->script('Chart.min');
	echo $this->Html->script('jquery.fancybox');
	echo $this->fetch('script');
?>