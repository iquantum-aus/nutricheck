<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<head>
		
		<title>NutriCheck</title>		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
		<?php echo $this->Html->script('jquery'); ?>
		<?php echo $this->Html->script('jquery-ui-1.10.4.min'); ?>
		
		<?php echo $this->Html->css('style'); ?>
		<?php echo $this->Html->css('bootstrap'); ?>
	</head>

	<body>

		<?php echo $this->Form->create('User', array('class'=>'form-horizontal')); ?>
			<div class="login-container">
				
				<div class="page-header">
					<h3>Forgot Password</h1>
				</div>
	
				<div id="output">
					<?php echo $this->Session->flash(); ?>
					<?php echo $this->Session->flash('auth'); ?>
				</div>
				
				<p>
					<img style="width:100%;" src="/img/nutricheck-logo.png">
				</p>
				
				<div class="form-box">
					<?php
						echo $this->Form->input('password', array('type' => 'password', 'div' => false, 'label' => false, 'placeholder' => "Password", 'required' => true));
						
						echo "&nbsp;";
						
						echo $this->Form->input('password2', array('type' => 'password', 'div' => false, 'label' => false, 'placeholder' => "Repeat Password", 'required' => true));
					?>
					
					<?php echo $this->Form->hidden('ident', array('value' => $ident)); ?>
					<?php echo $this->Form->hidden('activate', array('value' => $activate)); ?>   
					
					<br /><br />
					
					<?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-primary', 'type'=>'submit', 'div'=>false));?>
					<?php echo $this->Form->button(__('Cancel'), array('class'=>'btn', 'type'=>'reset', 'div'=>false));?>
					<br />
				</div>
			</div>

		<?php echo $this->Form->end(); ?>
	
	</body>
</html>



<style>
	body{
		background: #eee url(http://subtlepatterns.com/patterns/halftone.png);
	}

	form {
		width: 100%; 
		float: left;
	}
	
	.login-container{
		position: relative;
		width: 400px;
		margin: 80px auto;
		padding: 20px 40px 40px;
		text-align: center;
		background: #fff;
		border: 1px solid #ccc;
	}

	#output {
		width: 100%;
		top: -75px;
		left: 0;
		color: #fff;
	}

	#output.alert-success{
		background: rgb(25, 204, 25);
	}

	#output.alert-danger{
		background: rgb(228, 105, 105);
	}


	.login-container::before,.login-container::after{
		content: "";
		position: absolute;
		width: 100%;height: 100%;
		top: 3.5px;left: 0;
		background: #fff;
		z-index: -1;
		-webkit-transform: rotateZ(4deg);
		-moz-transform: rotateZ(4deg);
		-ms-transform: rotateZ(4deg);
		border: 1px solid #ccc;

	}

	.login-container::after{
		top: 5px;
		z-index: -2;
		-webkit-transform: rotateZ(-2deg);
		 -moz-transform: rotateZ(-2deg);
		  -ms-transform: rotateZ(-2deg);

	}

	.avatar{
		width: 100px;height: 100px;
		margin: 10px auto 30px;
		border-radius: 100%;
		border: 2px solid #aaa;
		background-size: cover;
	}

	.form-box input{
		width: 100%;
		padding: 10px;
		text-align: center;
		height:40px;
		border: 1px solid #ccc;;
		background: #fafafa;
		transition:0.2s ease-in-out;

	}

	.form-box input:focus{
		outline: 0;
		background: #eee;
	}

	.form-box input[type="text"]{
		border-radius: 5px 5px 0 0;
	}

	.form-box button.login{
		margin-top:40px;
		padding: 10px 20px;
	}

	.animated {
	  -webkit-animation-duration: 1s;
	  animation-duration: 1s;
	  -webkit-animation-fill-mode: both;
	  animation-fill-mode: both;
	}

	@-webkit-keyframes fadeInUp {
	  0% {
		opacity: 0;
		-webkit-transform: translateY(20px);
		transform: translateY(20px);
	  }

	  100% {
		opacity: 1;
		-webkit-transform: translateY(0);
		transform: translateY(0);
	  }
	}

	@keyframes fadeInUp {
	  0% {
		opacity: 0;
		-webkit-transform: translateY(20px);
		-ms-transform: translateY(20px);
		transform: translateY(20px);
	  }

	  100% {
		opacity: 1;
		-webkit-transform: translateY(0);
		-ms-transform: translateY(0);
		transform: translateY(0);
	  }
	}

	.fadeInUp {
	  -webkit-animation-name: fadeInUp;
	  animation-name: fadeInUp;
	}
</style>

