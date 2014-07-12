<?php
	// The same as require('Controller/UsersController.php');
	App::import('Controller', 'Questions');

	// We need to load the class
	$Questions = new QuestionsController();

	// If we want the model associations, components, etc to be loaded
	$Questions->constructClasses();
	
	$Questions->Question->unbindModelAll();
	$qe_questions = $Questions->Question->find('all');	
	
	$qe_questions = array_chunk($qe_questions, 30, true);
?>


<div style="width: 420px;">
	<h3>Quick Entry Form</h3>
	<form style="margin: 0;" class="left span12" method="POST" action="/questions/nutrient_check">
		<?php
			foreach($qe_questions as $qe_key => $question_group) {
				?>
					<div class="qe_questionModules" id="qe_questionModule_<?php echo $qe_key; ?>">
						<?php
							foreach($question_group as $question_item) {
								?>
									<input type="hidden" name="data[<?php echo $question_item['Question']['id']; ?>][Answer][questions_id]" id="AnswerQuestionId<?php echo $question_item['Question']['id']; ?>" value="<?php echo $question_item['Question']['id']; ?>">
									<input type="hidden" name="data[<?php echo $question_item['Question']['id']; ?>][Answer][user_id]" id="AnswerQuestionId<?php echo $question_item['Question']['id']; ?>" value="<?php echo $this->Session->read('Auth.User.id'); ?>">
									
									<input class="qe_itemInstance" name="data[<?php echo $question_item['Question']['id']; ?>][Answer][rank]" type="number" id="qe_question_<?php echo $question_item['Question']['id']; ?>" placeholder="Q. #<?php echo $question_item['Question']['id']; ?>">
								<?php
							}
						?>
					</div>
				<?php
			}
		?>
		
		<input type="submit" class="btn btn-danger qe_save-answer" value="Submit">
	</form>
	
	<?php
		$qe_question_data_count = count($qe_questions);
	?>
	
	<div id="quickEntry_description" class="left span12">0 - Never, 1 - Mild/Occasionally, 2 - Moderate/Frequently, 3 - Severe/Very Severely</div>
	
	<div id="array_paginator">
		<input id="qe_currentPaginatorstate" type="hidden" value="0">
		<a href="#" id="qe_paginatorPrev" class="qe_paginatorButton btn btn-primary disabled">PREV</a>
		<a href="#" id="qe_paginatorNext" class="qe_paginatorButton btn btn-primary">NEXT</a>
	</div>
</div>

<script>
	$(document).ready(function() {		
		var qe_maximum_page = "<?php echo  $qe_question_data_count ?>";
		var qe_question_data_count = <?php echo $qe_question_data_count; ?>;
		
		$(document).on("click", '#qe_paginatorNext', function () {	
			
			var qe_currentPaginatorstate = $('#qe_currentPaginatorstate').val();
			qe_currentPaginatorstate = parseInt(qe_currentPaginatorstate);
			
			// console.log("current page = "+currentPaginatorstate)
			
			var qe_next_page = qe_currentPaginatorstate+1;
			// console.log('current_state = ' + next_page);
			
			/* ------------------------------------------------- VERIFIER IF ALL QUESTIONS ARE ANSWERED ----------------------------------------*/
			
			var qe_unanswered_items = 0;
			$('#qe_questionModule_'+(qe_next_page - 1)).children('.qe_itemInstance').each( function () {	
				var qe_item_id = $(this).attr('id');
				
				if($(this).val() == "" || $(this).val() > "3") {
					qe_unanswered_items++;
					$(this).css("border", "1px solid red");
				} else {
					$(this).css("border", "1px solid #ccc");
				}
			});
			
			// console.log(qe_unanswered_items);
			
			if(qe_unanswered_items > 0) {
				return false;
			}
			
			if(qe_next_page < qe_maximum_page) {
				$('.qe_questionModules').fadeOut(500);
				$('#qe_questionModule_'+qe_next_page).delay(500).fadeIn();
				$('#qe_currentPaginatorstate').val(qe_next_page);	
				
				if(qe_next_page == qe_maximum_page) {
					$('#qe_paginatorNext').removeClass('disabled');
				}
			}
			/* ------------------------------------------------- VERIFIER IF ALL QUESTIONS ARE ANSWERED ----------------------------------------*/
			
			$('#qe_paginatorPrev').removeClass('disabled');
			
			if(qe_next_page == (qe_maximum_page-1)) {
				$('.qe_save-answer').fadeIn();
				$(this).addClass('disabled');
			}
			
			return false;
		});
		
		$(document).on('click', '#qe_paginatorPrev', function () {
			var qe_currentPaginatorstate = $('#qe_currentPaginatorstate').val();
			qe_currentPaginatorstate = parseInt(qe_currentPaginatorstate);
			
			var qe_prev_page = qe_currentPaginatorstate-1;
			console.log('current_state = ' + qe_prev_page);
			
			$('.qe_save-answer').hide();
			
			if(qe_prev_page >= 0) {
				$( "#qe_pageSelection_"+qe_prev_page ).attr('checked', true);
				$('.qe_questionModules').fadeOut(500);
				$('#qe_questionModule_'+qe_prev_page).delay(500).fadeIn();
				$('#qe_currentPaginatorstate').val(qe_prev_page);
				
				$('#qe_paginatorNext').removeClass('disabled');
				
				if(qe_prev_page == 0) {
					$(this).addClass('disabled');
				}
			}
			
			return false;
		});
		
		if(qe_question_data_count > 1) {
			$('.qe_save-answer').hide();
		} else {
			$('.qe_save-answer').show();
		}
	});
</script>