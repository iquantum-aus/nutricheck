<?php if(!empty($this->Session->read('Auth.User.id'))) { ?>
	<div id="questionHolder" >
		<div class="questions index">
			<?php if(!empty($method)) { ?>
				<form method="POST">
					<label style="float: left; margin-right: 20px; padding-top: 10px;">Select Factors:</label>			
					<?php echo $this->Form->input('Factors.factor', array('name' => 'data[Factors][factors]', 'data-placeholder' => 'select factors here...', 'class' => 'chosen-select', 'style' => 'width: 350px;', 'options' => $factors, 'multiple' => 'multiple', 'label' => false, 'div' => false, 'selected' => $selected_factors)); ?>
					<input type="submit" class="btn btn-success" value="GO" name="data[Factors][submit]">
				</form>
			<?php } ?>
			
			<div style="margin: 0;" class="sectionTitle">Questions</div>
			
			<form action = "/questions/remote_nutrient_check" style="height: 556px; margin-bottom: 40px; float: left; width: 1080px;" method="POST">
				<?php
					$raw_questions = $questions;
					$question_data = array_chunk($questions, 10);
					$question_data_count = count($question_data);
					$q_inc = 1;
					
					foreach($question_data as $key => $questions) {
				?>
			
					<table style="float: left; width: 100;" class="questionModules" id="questionModule_<?php echo $key; ?>" cellpadding="0" cellspacing="0">
						<tbody style="float:left; width: 100%;">	
							<tr style="width: 100%; float: left;">
								<th style="float: left; width: 15%;"><span class="blue">Quest. #</span></th>
								<th style="float: left; width: 53%;">Question</th>
								<th style="float: left; width: 8%;" class="actions"><span class="blue">0<br />Never</span></th>
								<th style="float: left; width: 8%;" class="actions"><span class="blue">1<br />Occasional / Mild</span></th>
								<th style="float: left; width: 8%;" class="actions"><span class="blue">2<br />Moderate / Frequently</span></th>
								<th style="float: left; width: 8%;" class="actions"><span class="blue">3<br />Severe / Very Severe</span></th>
							</tr>
							
							<?php foreach ($questions as $question) { ?>
								<?php if(!empty($question)) { ?>
									<tr class="rankHolder" style="width:100%; float: left;">
										<td style="height: 50px; width: 15%; text-align: center; font-weight: bold;  float: left;"><span class="blue"><?php echo $q_inc++; ?>&nbsp;</span></td>
										<td style="height: 50px;  width: 53%;  float: left;"><?php echo h($question['Question']['question']); ?></td>
										<?php
											for($i = 0; $i<=3; $i++) {
												?>
													<td style="height: 50px; width:8%;  float: left;" class="actions">
														<input type="hidden" name="data[<?php echo $question['Question']['id']; ?>][TempAnswer][question_id]" id="TempAnswerQuestionId<?php echo $question['Question']['id']; ?>" value="<?php echo $question['Question']['id']; ?>">
														<input type="hidden" name="data[<?php echo $question['Question']['id']; ?>][TempAnswer][user_id]" id="TempAnswerQuestionId<?php echo $question['Question']['id']; ?>" value="<?php echo $this->Session->read('Auth.User.id'); ?>">
														<input class="css-checkbox" type="radio" name="data[<?php echo $question['Question']['id']; ?>][TempAnswer][rank]" id="TempAnswerRank<?php echo $question['Question']['id'].$i; ?>" value="<?php echo $i; ?>">
														<label for="TempAnswerRank<?php echo $question['Question']['id'].$i; ?>" value="<?php echo $i; ?>" class="css-label"></label>
													</td>
												<?php
											}
										?>
									</tr>
								<?php } ?>
							<?php } ?>
						</tbody>
					</table>
				<?php } ?>
				<input type="hidden" id="remoteLink" name="data[TempAnswer][remoteLink]">
				<input type="submit" value="SUBMIT" class="btn btn-danger save-answer" style="display:none;">
			</form>
				
			<div class="<?php if(count($raw_questions) <= 10) { echo "hidden"; } ?>" id="array_paginator">
				<form id="paginator_form">
					<input id="currentPaginatorstate" type="hidden" value="0">
					<a href="#" id="paginatorPrev" class="paginatorButton btn btn-primary disabled">PREV</a>
						<?php 
							/* for($i=0; $i<$question_data_count; $i++) {
								?>
									<input name="pageSelected" id="pageSelection_<?php echo $i; ?>" class="paginatorSelector" type="radio" value="<?php echo $i; ?>">
								<?php
							} */
						?>
					<a href="#" id="paginatorNext" class="paginatorButton btn btn-primary">NEXT</a>
				</form>
			</div>
		</div>
	</div>
	
	<script>
		$(document).ready(function() {		
			var maximum_page = "<?php echo  $question_data_count ?>";
			$( "#pageSelection_0" ).attr('checked', true);
			
			var question_data_count = <?php echo $question_data_count; ?>;
			
			$('.paginatorSelector').click( function () {
				var page_number = $(this).val();
				console.log(page_number);
				
				$('.questionModules').fadeOut(500);
				$('#questionModule_'+page_number).delay(500).fadeIn();
				$('#currentPaginatorstate').val(page_number);
			});
			
			$(document).on("click", '#paginatorNext', function () {
			
			/* --------------------------------------------------------- VERIFIER WHETHER ALL FIELDS WERE CHECKED --------------------------------------- */
				
				var question_module_id = "";
				$('.questionModules').each( function () {
					if($(this).is(':visible')) {
						question_module_id = $(this).attr('id');
					}
				});
				
				//total  question count
				var question_count = $('#'+question_module_id).children('tbody').children('.rankHolder').length;
				
				// variable to check how many of the questions were answered
				var checked_rank = 0;
				
				// check how many of the questions were anwered (incrmental count vor checked_rank variable)
				$('#'+question_module_id).children('tbody').children('.rankHolder').each( function () {
					
					// check per line if answered "variable"
					var checked_per_line = 0;
					
					// check per line if answered (if answered then increment the total answered questions)
					$(this).children('td').children('input[type=radio].css-checkbox').each( function () {
						if($(this).is(':checked')) { 
							checked_rank++;
							checked_per_line++;
						}	
					});
					
					if(checked_per_line == 0) {
						$(this).css("border", "1px solid red");
					} else {
						$(this).css("border", "none");
					}
					
				});
				
				if(checked_rank < question_count) {
					return false;
				}
				
				/* --------------------------------------------------------- VERIFIER WHETHER ALL FIELDS WERE CHECKED --------------------------------------- */
			
				var currentPaginatorstate = $('#currentPaginatorstate').val();
				currentPaginatorstate = parseInt(currentPaginatorstate);
				
				// console.log("current page = "+currentPaginatorstate)
				
				var next_page = currentPaginatorstate+1;
				// console.log('current_state = ' + next_page);
				
				if(next_page < maximum_page) {
					$( "#pageSelection_"+next_page ).attr('checked', true);
					$('.questionModules').fadeOut(500);
					$('#questionModule_'+next_page).delay(500).fadeIn();
					$('#currentPaginatorstate').val(next_page);	
				}
				
				$('#paginatorPrev').removeClass('disabled');
				
				if(next_page == (maximum_page-1)) {
					$('.save-answer').fadeIn();
					$(this).addClass('disabled');
				}
				
				return false;
			});
			
			$(document).on('click', '#paginatorPrev', function () {
				var currentPaginatorstate = $('#currentPaginatorstate').val();
				currentPaginatorstate = parseInt(currentPaginatorstate);
				
				var prev_page = currentPaginatorstate-1;
				console.log('current_state = ' + prev_page);
				
				$('.save-answer').hide();
				
				if(prev_page >= 0) {
					$( "#pageSelection_"+prev_page ).attr('checked', true);
					$('.questionModules').fadeOut(500);
					$('#questionModule_'+prev_page).delay(500).fadeIn();
					$('#currentPaginatorstate').val(prev_page);
					
					$('#paginatorNext').removeClass('disabled');
				} else {
					$(this).addClass('disabled');
				}
				
				return false;
			});
			
			if(question_data_count > 1) {
				$('.save-answer').hide();
			} else {
				$('.save-answer').show();
			}
		});
		
		$(window).ready( function () {
			var url = (window.location != window.parent.location) ? document.referrer: document.location;	
			$('#remoteLink').val(url);
		});
	</script>
<?php } ?>
