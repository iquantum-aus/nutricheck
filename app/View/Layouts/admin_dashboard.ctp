<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php echo $this->Html->charset(); ?>
	
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
	
	<title>Identify - Enhance - Supervise</title>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	
	<?php
		echo $this->Html->meta(array("name"=>"viewport","content"=>"width=device-width,  initial-scale=1.0"));
		echo $this->Html->meta('icon');

		// echo $this->Html->script('libs/jquery');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-responsive.min');
		// docs.css is only for this exapmple, remove for app dev
		echo $this->Html->css('backend');
		echo $this->Html->css('slidebars.min');
		echo $this->Html->css('slidebars-theme');
		echo $this->Html->css('jquery.fancybox');
		echo $this->Html->css('style');
		echo $this->Html->css('datepicker');
		echo $this->Html->css('pace');
		echo $this->Html->css('chosen');
		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>

	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	
	<link href="//vjs.zencdn.net/4.5/video-js.css" rel="stylesheet">
	<script src="//vjs.zencdn.net/4.5/video.js"></script>
	
</head>
<?php

// style="zoom:1;-moz-transform:scale(1);"
?>
<body data-spy="scroll" data-target=".subnav" data-offset="50">
	<header>
		<?php echo $this->element("menu/admin_top_menu"); ?>
	</header>
	<div id="content">		
		<div class="dashboardtopimg">
			<div class="sectionTitle">Dashboard</div>
			<img src="/img/dashboardtop.jpg" style="max-height:300px;">
		</div>
		<div id="contentWrapper">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->Session->flash('auth'); ?>
			<?php echo $this->element('sidebar'); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<div class="footerbottom">
		Copyrighted (c) 2014 NutriCheck
		<a href="#">Terms of Use</a>
		<a href="#">Privacy</a>
	</div>
	<!-- /container -->


	<?php // echo '<pre>'.$this->element('sql_dump').'</pre>'; ?>
	<?php
		echo $this->Html->script('libs/modernizr.min');
		echo $this->Html->script('libs/bootstrap.min');
		echo $this->Html->script('slidebars.min');
		echo $this->Html->script('masonry.pkgd.min');
		echo $this->Html->script('Chart.min');
		echo $this->Html->script('jquery.fancybox');
		echo $this->Html->script('bootstrap-datepicker');
		echo $this->Html->script('chosen.jquery.min');
		echo $this->Html->script('pace');
		echo $this->fetch('script');
 	?>
</body>
</html>

<script>
	(function($) {
		$(document).ready(function() {
			
			var config = {
			  '.chosen-select'           : {},
			  '.chosen-select-deselect'  : {allow_single_deselect:true},
			  '.chosen-select-no-single' : {disable_search_threshold:10},
			  '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
			  '.chosen-select-width'     : {width:"95%"}
			}
			
			for (var selector in config) {
			  $(selector).chosen(config[selector]);
			}

			
			$('.fancybox').fancybox();
			$.slidebars();
			
			// Slidebars Submenus
			$('.sb-toggle-submenu').off('click').on('click', function() {
				$submenu = $(this).parent().children('.sb-submenu');
				$(this).add($submenu).toggleClass('sb-submenu-active'); // Toggle active class.
				
				if ($submenu.hasClass('sb-submenu-active')) {
					$submenu.slideDown(200);
				} else {
					$submenu.slideUp(200);
				}
			});
			
			var document_height = $(document).height();
			
			var $container = $('#mainContentWrapper');
			
			// initialize
			$container.masonry({
				columnWidth: 20,
				itemSelector: '.item'
			});
		
			$('#sidebar-main-menu li a').bind({
				mouseenter: function() {
					$(this).children('.sideIco').toggleClass('active');
					$(this).children('.active-sidebar-menu').toggleClass('active');
				},
				mouseleave: function() {
					$(this).children('.sideIco').toggleClass('active');
					$(this).children('.active-sidebar-menu').toggleClass('active');
				}
			});

			$container.masonry( 'on', 'layoutComplete', function( msnryInstance, laidOutItems ) { 
				var minimum_height = $('#content').height();
				minimum_height = minimum_height+65;
				$('#sb-site').css('min-height', minimum_height);
			});
			
			
			var minimum_height = $('#content').height();
			minimum_height = minimum_height+65;
			//$('#sb-site').css('min-height', minimum_height);
			
		});
		
		$(window).resize( function () {
			var minimum_height = $('#content').height();
			minimum_height = minimum_height+65;
			$('#sb-site').css('min-height', minimum_height);		
		});
		
	}) (jQuery);
</script>