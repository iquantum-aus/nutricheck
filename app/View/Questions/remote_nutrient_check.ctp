<div class="questions index">
	
	<?php if(!empty($method)) { ?>
		<form method="POST">
			<label style="float: left; margin-right: 20px; padding-top: 10px;">Select Factors:</label>			
			<?php echo $this->Form->input('Factors.factor', array('name' => 'data[Factors][factors]', 'data-placeholder' => 'select factors here...', 'class' => 'chosen-select', 'style' => 'width: 350px;', 'options' => $factors, 'multiple' => 'multiple', 'label' => false, 'div' => false, 'selected' => $selected_factors)); ?>
			<input type="submit" class="btn btn-success" value="GO" name="data[Factors][submit]">
		</form>
	<?php } ?>
	
	<div style="margin: 0;" class="sectionTitle">Questions</div>
	
	<form style="height: 556px; margin-bottom: 40px; float: left; width: 1080px;" method="POST">
		<?php
			$question_data = array_chunk($questions, 10);
			foreach($question_data as $key => $questions) {
		?>
	
			<table style="float: left; width: 100;" class="questionModules" id="questionModule_<?php echo $key; ?>" cellpadding="0" cellspacing="0">
				<tbody style="float:left; width: 100%;">	
					<tr style="width: 100%; float: left;">
						<th style="float: left; width: 15%;"><span class="blue">Quest. #</span></th>
						<th style="float: left; width: 65%;">Question</th>
						<th style="width: 5%;" class="actions"><span class="blue">1</span></th>
						<th style="width: 5%;" class="actions"><span class="blue">2</span></th>
						<th style="width: 5%;" class="actions"><span class="blue">3</span></th>
						<th style="width: 5%;" class="actions"><span class="blue">4</span></th>
					</tr>
					
					<?php foreach ($questions as $question) { ?>
						<tr style="width:100%; float: left;">
							<td style="height: 50px; width: 15%; text-align: center; font-weight: bold;  float: left;"><span class="blue"><?php echo h($question['Question']['id']); ?>&nbsp;</span></td>
							<td style="height: 50px;  width: 65%;  float: left;"><?php echo h($question['Question']['question']); ?></td>
							<?php
								for($i = 1; $i<=4; $i++) {
									?>
										<td style="height: 50px; width:5%;  float: left;" class="actions">
											<input type="hidden" name="data[<?php echo $question['Question']['id']; ?>][TempAnswer][questions_id]" id="TempAnswerQuestionId<?php echo $question['Question']['id']; ?>" value="<?php echo $question['Question']['id']; ?>">
											<input type="hidden" name="data[<?php echo $question['Question']['id']; ?>][TempAnswer][users_id]" id="TempAnswerQuestionId<?php echo $question['Question']['id']; ?>" value="<?php echo $this->Session->read('Auth.User.id'); ?>">
											<input class="css-checkbox" type="radio" name="data[<?php echo $question['Question']['id']; ?>][TempAnswer][rank]" id="TempAnswerRank<?php echo $question['Question']['id'].$i; ?>" value="<?php echo $i; ?>">
											<label for="TempAnswerRank<?php echo $question['Question']['id'].$i; ?>" value="<?php echo $i; ?>" class="css-label"></label>
										</td>
									<?php
								}
							?>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php } ?>
		<input type="hidden" id="remoteLink" name="data[TempAnswer][remoteLink]">
		<input type="submit" value="SUBMIT" class="btn btn-danger">
	</form>
		
	<div id="array_paginator">
		<?php $question_data_count = count($question_data); ?>
		<form id="paginator_form">
			<input id="currentPaginatorstate" type="hidden" value="0">
			<a href="#" id="paginatorPrev" class="paginatorButton btn btn-primary">PREV</a>
				<?php 
					for($i=0; $i<$question_data_count; $i++) {
						?>
							<input name="pageSelected" id="pageSelection_<?php echo $i; ?>" class="paginatorSelector" type="radio" value="<?php echo $i; ?>">
						<?php
					}
				?>
			<a href="#" id="paginatorNext" class="paginatorButton btn btn-primary">NEXT</a>
		</form>
	</div>
</div>


<?php /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Question'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List User'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
*/ ?>

<style>
	* {
		outline: none;
	}
	.actions input {
		float: left;
		clear: none;
		margin-left: 11px;
	}
	
	.actions input:first-child {
		margin-left: 0;
	}
</style>

<script>
	$(document).ready(function() {		
		var maximum_page = "<?php echo  $question_data_count ?>";
		$( "#pageSelection_0" ).attr('checked', true);
		
		$('.paginatorSelector').click( function () {
			var page_number = $(this).val();
			console.log(page_number);
			
			$('.questionModules').fadeOut(500);
			$('#questionModule_'+page_number).delay(500).fadeIn();
			$('#currentPaginatorstate').val(page_number);
		});
		
		$(document).on("click", '#paginatorNext', function () {
			var currentPaginatorstate = $('#currentPaginatorstate').val();
			currentPaginatorstate = parseInt(currentPaginatorstate);
			
			console.log("current page = "+currentPaginatorstate)
			
			var next_page = currentPaginatorstate+1;
			console.log('current_state = ' + next_page);
			
			if(next_page < maximum_page) {
				$( "#pageSelection_"+next_page ).attr('checked', true);
				$('.questionModules').fadeOut(500);
				$('#questionModule_'+next_page).delay(500).fadeIn();
				$('#currentPaginatorstate').val(next_page);
			}
			
			return false;
		});
		
		$(document).on('click', '#paginatorPrev', function () {
			var currentPaginatorstate = $('#currentPaginatorstate').val();
			currentPaginatorstate = parseInt(currentPaginatorstate);
			
			var prev_page = currentPaginatorstate-1;
			console.log('current_state = ' + prev_page);
			
			if(prev_page >= 0) {
				$( "#pageSelection_"+prev_page ).attr('checked', true);
				$('.questionModules').fadeOut(500);
				$('#questionModule_'+prev_page).delay(500).fadeIn();
				$('#currentPaginatorstate').val(prev_page);
			}
			
			return false;
		});
	});
	
	$(window).ready( function () {
		var url = (window.location != window.parent.location) ? document.referrer: document.location;	
		$('#remoteLink').val(url);
	});
</script>

