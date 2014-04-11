<div class="questions index">
	<div style="margin: 0;" class="sectionTitle">Questions</div>
	
	<form method="POST">
		
		<?php
			$question_data = array_chunk($questions, 10);
			foreach($question_data as $key => $questions) {
		?>
	
			<table class="questionModules" id="questionModule_<?php echo $key; ?>" cellpadding="0" cellspacing="0">
				<tr>
					<th width="15%"><span class="blue">Quest. #</span></th>
					<th>Question</th>
					<th width="22%" class="actions">
						<div class="actionItem"><span class="blue">0</span></div>
						<div class="actionItem"><span class="blue">1</span></div>
						<div class="actionItem"><span class="blue">2</span></div>
						<div class="actionItem"><span class="blue">3</span></div>
					</th>
				</tr>
				
				<?php foreach ($questions as $question) { ?>
					<tr>
						<td width="15%" style="text-align: center; font-weight: bold;"><span class="blue"><?php echo h($question['Question']['id']); ?>&nbsp;</span></td>
						<td><?php echo h($question['Question']['question']); ?>&nbsp;</td>
						<input type="hidden" name="data[<?php echo $question['Question']['id']; ?>][Answer][questions_id]" id="AnswerQuestionId<?php echo $question['Question']['id']; ?>" value="<?php echo $question['Question']['id']; ?>">
						<td width = "22%" class="actions">
							<?php
								for($i = 0; $i<=3; $i++){
									?>
										<input class="css-checkbox" required type="radio" name="data[<?php echo $question['Question']['id']; ?>][Answer][rank]" id="AnswerRank<?php echo $question['Question']['id'].$i; ?>" value="<?php echo $i; ?>">
										<label for="AnswerRank<?php echo $question['Question']['id'].$i; ?>" value="<?php echo $i; ?>" class="css-label"></label>
									<?php
								}
							?>
						</td>
					</tr>
				<?php } ?>
			</table>
		<?php } ?>
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
</script>