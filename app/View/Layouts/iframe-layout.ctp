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

Configure::load('general');
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php echo $this->Html->charset(); ?>
	<title>Identify - Enhance - Supervise</title>
	<?php
		echo $this->Html->meta(array("name"=>"viewport","content"=>"width=device-width,  initial-scale=1.0"));
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-responsive.min');
		
		// docs.css is only for this exapmple, remove for app dev
		echo $this->Html->css('backend');
		echo $this->Html->css('slidebars.min');
		echo $this->Html->css('slidebars-theme');
		echo $this->Html->css('style');
		echo $this->Html->css('chosen');
		echo $this->Html->css('bootstrap-iframe-theme');
		echo $this->Html->css('iframe-layout');
		echo $this->Html->css('smoothness/jquery-ui-1.9.2.custom.min');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		
		echo $this->Html->script('libs/jquery');
	?>

	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	
	<link href="//vjs.zencdn.net/4.5/video-js.css" rel="stylesheet">
	<script src="//vjs.zencdn.net/4.5/video.js"></script>
	
</head>
<body>
	<div id="content">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->Session->flash('auth'); ?>
		<?php echo $this->fetch('content'); ?>
	
		<?php if($this->Session->read('Auth.User.id') == "") { ?>
			<div id="loginWidget_holder">
				<img id="logoLoginRemote" src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/img/nutricheck-logo.png" alt="Slidebars">
				<br /><br />
				
				<?php
					echo $this->Form->create('User', array('action' => 'login?source=remote', 'class'=>'form-horizontal', "id" => "UserLogin"));
						?>
						<fieldset>
							<legend><?php echo __('Login'); ?></legend>
							<?php echo $this->Form->input('email', array('div' => false, 'label' => false, 'placeholder' => "Email")); ?>
							<?php echo $this->Form->input('password', array('div' => false, 'label' => false, 'placeholder' => "Password")); ?>
							
							<div class="form-actions">
								<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>
								<?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
							</div>
						</fieldset>
						<?php
					echo $this->Form->end();
				?>
			</div>
		<?php } ?>
		
		<?php
			$user_id = $this->Session->read('Auth.User.id');
		?>
		
		<?php
			if(empty($user_id)) {
			if(!isset($_GET['action'])) { $_GET['action'] = "login"; }
		?>

		<?php } else { ?>
				
		<?php
			}
		?>
	</div>
	<footer class="container"></footer><!-- /container -->


	<?php // echo '<pre>'.$this->element('sql_dump').'</pre>'; ?>
	<?php
		echo $this->Html->script('libs/modernizr.min');
		echo $this->Html->script('libs/bootstrap.min');
		echo $this->Html->script('slidebars.min');
		echo $this->Html->script('masonry.pkgd.min');
		echo $this->Html->script('Chart.min');
		echo $this->fetch('script');
 	?>
	
	<div id="test"></div>


</body>
</html>

<script>
	$(document).ready(function() {
		
		var document_height = $(document).height();
		var $container = $('#mainContentWrapper');
		
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
		
		$('#UserLogin').submit( function () {
			$.ajax({
				async:true,
				data:$(this).serialize(),
				dataType:'html',
				success:function (data, textStatus) {
					if(data == 1) {
						$('#loginWidget_holder').fadeOut('500');
						window.location.href = "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/nutrient_check?source=remote&group_id=<?php echo $id; ?>";
					} else {
						if(data == 2) {
							alert('Authentication Failed');
						} else {
							$('#loginWidget_holder').fadeOut('500');
							alert('Not allowed to answer');
						}
					}
					
				},
				type:'post',
				url:"/users/login?source=remote"
			});
			return false;
		});
		
		// $(document).on('submit', '#resgisterForm', function () {
			// $.ajax({
				// async:true,
				// data:$(this).serialize(),
				// dataType:'html',
				// success:function (data, textStatus) {
					
					// console.log(data);
					
					// if(data == "1" || data == ".1") {
						// $('#selectedWidget_holder').html('<?php echo Configure::read('Authenticated.default_message'); ?>');
					// } else {
						// if(data == "2" || data == ".2") {
							// window.location.href = "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/save_remote_nutrient_check";
						// } else {
							// alert('Registration Failed');
						// }
					// }
				// },
				// type:'post',
				// url:"/users/remote_register"
			// });
			// return false;
		// });
	});		
</script>