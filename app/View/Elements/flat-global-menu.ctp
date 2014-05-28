<style>
	#global-menu-holder { margin-top: 200px; position: fixed; right: 0; width: 250px; }
	
	ul#global-menu { margin: 0; width: 100%; float: left; }
	
	ul.sub-items { 
		position: absolute;
		right: 100%;
		width: 250px;
		margin: 0;
		display: none;
		list-style: none;
	}
	
	ul.sub-items li a {
		background: #16A085;
		color: #fff;
		text-shadow: 0px 0px 1px #000;
		text-shadow:0 -1px 0 rgba(0,0,0,0.25);
		
		border-top: 1px solid #e6e6e6;
		border-left: 1px solid #e6e6e6;
		border-right: 1px solid #e6e6e6;
		border-bottom: 1px solid #e6e6e6;
	}
	
	ul.sub-items a:hover {
		background: #1ABC9C;
	}
	
	.parent-link {
		background: #1ABC9C;
		color: #fff;
		text-shadow: 0px 0px 1px #000;
		text-shadow:0 -1px 0 rgba(0,0,0,0.25);
	}
	
	.parent-link:hover {
		color: #fff;
		background: #16A085;
	}
	
	ul#global-menu li {
		float: left; width: 100%;
		list-style: none;
	}
	
	ul#global-menu li a {
		float: left; 
		width: 100%;
		margin: 0;
		padding: 12px;
		font-size: 15px;
		text-align: left;
		border-top: 1px solid #e6e6e6;
		border-left: 1px solid #e6e6e6;
		border-right: 1px solid #e6e6e6;
		border-bottom: 1px solid #e6e6e6;
		cursor: pointer;
	}
	
	ul#global-menu li.parent-item:first-child a {
		border-bottom: none;
	}
	
	ul#global-menu li.parent-item:last-child a {
		border-top: none;
	}
</style>

<div id="global-menu-holder">
	<ul id="global-menu">
		<li class="parent-item">
			<a class="parent-link">Questions</a>
			<ul class="sub-items">
				<li>
					<a href="/questions">List Questions</a>
				</li>
				<li>
					<a href="/questions/add">Create Question</a>
				</li>
			</ul>
		</li>

		<li class="parent-item">
			<a class="parent-link">Factors</a>
			<ul class="sub-items">
				<li>
					<a href="/factors">List Factors</a>
				</li>
				<li>
					<a href="/factors/add">Create Factor</a>
				</li>
			</ul>
		</li>
		
		<li class="parent-item">
			<a class="parent-link">Associations</a>
			<ul class="sub-items">
				<li>
					<a a href="/FactorsQuestions/">List Question-Factor</a>
				</li>
				<li>
					<a a href="/FactorsQuestions/add">Create Question-Factor</a>
				</li>
				<li>
					<a href="/prescriptions/">List Factor-Prescription</a>
				</li>
				<li>
					<a href="/prescriptions/add">Create Factor-Prescription</a>
				</li>
			</ul>
		</li>
	</ul>
</div>

<script>
	$(document).ready( function () {
		$('.parent-item').mouseenter( function () {
			$(this).children('.sub-items').show();
		});
		
		$('.parent-item').mouseleave( function () {
			$(this).children('.sub-items').hide();
		});
	});
</script>