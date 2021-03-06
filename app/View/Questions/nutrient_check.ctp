<?php if($logged_in_user_info['User']['can_answer'] != "") { ?>
	<?php if($logged_in_user_info['User']['can_answer'] == 0) { ?>
		<h1 style="float: left; width: 100%; font-size: 50px; text-align: center;">You can't Answer</h1>
	<?php } else { ?>
		<?php 
			$time = time();
			
			// color of row that has been checked
			$colorRowChecked = "#F1F1F1";
		?>

		<div class="questions index">
			<div style="margin: 0;" class="span12">
				<?php if($this->Session->read('Auth.User.group_id') == 2) { ?>
					<?php if($iscreateAnswer != 1) { ?>
						<div class="left">
							<form style="min-width: 420px;" method="POST" id="UserSelect">
								<label style="float: left; margin-right: 20px; padding-top: 10px;">Perform As:</label>
								<?php echo $this->Form->input('User.id', array('options' => $users_list, 'empty' => 'Select patient to continue', 'label' => false, 'div' => false, 'class' => 'chosen-select', 'selected' => $this->Session->read('behalfUserId'))); ?>
								<!-- <input type="submit" class="btn btn-success" value="SELECT" name="data[User][submit]"> -->
							</form>
						</div>
					<?php } else { ?>
						<style>
							.navbar { display: none; }
							#signedAsHolder { position: absolute; top: 25px; font-size: 18px; color: #a2d52b; }
						</style>
						
						<div id="signedAsHolder">
							<strong style="color: #30aa39; text-transform: uppercase;">Welcome:</strong> <?php echo $users_list[$this->Session->read('behalfUserId')]; ?>
						</div>
						
					<?php } ?>
				<?php } ?>
				
				<?php if(!empty($method)) { ?>
					<div class="left">
						<form style="min-width: 680px;" method="POST" action="<?php echo strtok($_SERVER["REQUEST_URI"],'?'); ?>">
							<label style="float: left; margin-right: 20px; padding-top: 10px;">Select Functional Disturbance:</label>
							<input type="hidden" name="data[Factors][user_id]"  value="<?php echo $user_id; ?>">
							<?php echo $this->Form->input('Factors.factor', array('name' => 'data[Factors][factors]', 'data-placeholder' => 'select factors here...', 'class' => 'chosen-select', 'style' => 'width: 350px;', 'options' => $factors, 'multiple' => 'multiple', 'label' => false, 'div' => false, 'selected' => $selected_factors)); ?>
							<input type="submit" class="btn btn-success" value="GO" name="data[Factors][submit]" style="min-width: 70px;">
						</form>
					</div>
				<?php } ?>
			</div>
			
			<?php if(!empty($user_id)) { ?>
				
				<?php if($iscreateAnswer) { ?>
					<?php echo $this->Form->input("modeSelector", array('id' => "modeSelector", "type" => "select", "options" => array("Questionnaire","Quick Entry"))); ?>
				<?php } ?>
				
				
				<div style="margin: 0;" class="span12 left sectionTitle">Questions</div>
				
				<?php if($iscreateAnswer == 1) { ?>
					<div class="quickentry_question">
						<p>&nbsp;</p>
						<h4>Score Guide: 0 = Never, 1 = Occasional / Mild, 2 = Moderate / Frequently, 3 = Severe / Very Severe</h4>
						
						<?php
							$qe_raw_questions = $questions;
							$qe_raw_count = count($qe_raw_questions);
							$qe_question_data = $qe_raw_questions;
							$qe_question_data_count = count($qe_question_data);
							$qe_pcount = 0;
							$qe_ptotal = count($qe_question_data);
							$qe_button_width = 100/$qe_question_data_count;
							
						?>
						
						<form style="margin: 0;" class="left span12" method="POST" action="/questions/quickentry_nutrient_check?source=system" id="qe_nutricheckAnalysis">
							<input name="data[PerformedCheck][url]" type="hidden" value="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" />
							
							<div class="quickentry_question">
								<div class="left full">					
									<?php
										$pcount = 0;
										foreach($qe_question_data as $qe_key => $qe_question) {
										$pcount++;
									?>
										<input type="hidden" name="data[<?php echo $qe_question['Question']['id']; ?>][Answer][question_id]" class="AnswerQuestionId" id="AnswerQuestionId<?php echo $qe_question['Question']['id']; ?>" value="<?php echo $qe_question['Question']['id']; ?>">
										<input type="hidden" name="data[<?php echo $qe_question['Question']['id']; ?>][Answer][user_id]" class="AnswerUserId" id="AnswerQuestionId<?php echo $qe_question['Question']['id']; ?>" value="<?php echo $user_id; ?>">
										
										<select class="qe_itemInstance $brkDown_key" name="data[<?php echo $qe_question['Question']['id']; ?>][Answer][rank]" id="qe_question_<?php echo $qe_question['Question']['id']; ?>">
											<option value="">Q. #<?php echo $qe_question['Question']['id']; ?></option>
											<option value="0">0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
										</select>
									<?php } ?>			
								</div>
							</div>
							
							<input type="button" value="SUBMIT" class="left btn btn-danger qe_save-answer" style="margin-right: 10px;">
							<input type="button" value="LOGOUT" class="btn btn-warning logout-answer">
							
							<input type="hidden" id="remoteLink" name="data[TempAnswer][remoteLink]">
						</form>
					</div>
				<?php } ?>
				

		<div class="full_question">
			<?php if(!$method) { ?>
				<div class="span9" style="border-right: 1px solid #ccc; padding-right: 35px;">
			<?php } else { ?>
				<div>
			<?php } ?>
					
				<?php
					$raw_questions = $questions;
					$raw_count = count($raw_questions);
					$question_data = array_chunk($questions, 23);
					$question_data_count = count($question_data);
					$pcount = 0;
					$ptotal = count($question_data);
					$button_width = 100/$question_data_count;
				?>
						
						<div class="left full" style="margin-top: 20px; margin-bottom: 10px;">
							<?php for($binc = 0; $binc < $question_data_count; $binc++) { ?>	
									<div class="questionPaginator left"style="width: <?php echo $button_width; ?>%;">
										<?php 
											$to_display_end = ($binc+1)*23;
											$final_end_display = 0;
											$final_start_display = 0;
											
											if($to_display_end <= $raw_count) {
												$final_end_display = $to_display_end;
											} else {
												$final_end_display = $raw_count;
											}
											
											$final_start_display = $to_display_end-22;
											echo $final_start_display." - ".$final_end_display;
										?>
									</div>
							<?php } ?>
						</div>				
						
						
						
						<form style="margin-bottom: 40px; float: left; width:100%;" method="POST" id="nutricheckAnalysis">
							<input name="data[PerformedCheck][url]" type="hidden" value="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" />
							
							<?php foreach($selected_factors as $selected_factor) { ?>
								<input type="hidden" value="<?php echo $selected_factor; ?>" name="data[SelectedFactor][factor_id][]" />
							<?php } ?>
							
							<div class="full_question">
								<div class="left full">					
									<?php
										$pcount = 0;
										foreach($question_data as $key => $questions) {
										$pcount++;
									?>
										
										<table style="float: left; width: 100;" class="questionModules" id="questionModule_<?php echo $key; ?>" cellpadding="0" cellspacing="0">
											<tbody style="width: 100%;">	
												<tr class="headerHolder" style="width: 100%;">
													<th style="width: 15%;text-align:center;"><span class="blue">Quest.  #</span></th>
													<th style="width: 53%;">Question</th>
													<th style="width: 8%;" class="actions"><span class="greenLabel">0<br />Never</span></th>
													<th style="width: 8%;" class="actions"><span class="peachLabel">1<br />Occasional / Mild</span></th>
													<th style="width: 8%;" class="actions"><span class="orangeLabel">2<br />Moderate / Frequently</span></th>
													<th style="width: 8%;" class="actions"><span class="redLabel">3<br />Severe / Very Severe</span></th>
												</tr>
												
												<?php 
													foreach ($questions as $question) {
													$setstyle = "";
													if (isset($return_progress[$question['Question']['id']])) {
														$setstyle = "background:".$colorRowChecked.";";
													}
												?>
													
													<!-- Instances of radio buttons and their labels + holders -->
													<tr class="rankHolder" style="width:100%;<?php echo $setstyle; ?>" id="q<?php echo h($question['Question']['id']); ?>">
														<td style="width: 15%; text-align: center; font-weight: bold;"><span class="blue"><?php echo h($question['Question']['id']); ?></span></td>
														<td style="width: 53%;"><p><?php echo h($question['Question']['question']); ?></p></td>
														<?php
															for($i = 0; $i<=3; $i++) {
																
																$radio_selected = "";
																if(($i == $return_progress[$question['Question']['id']]) && isset($return_progress[$question['Question']['id']])) {
																	$radio_selected = "checked=checked";
																}
																
																?>
																	
																	<!-- RADIO BUTTONS -->
																	<td style="width:8%;" class="actions">
																		<input type="hidden" name="data[<?php echo $question['Question']['id']; ?>][Answer][question_id]" class="AnswerQuestionId" id="AnswerQuestionId<?php echo $question['Question']['id']; ?>" value="<?php echo $question['Question']['id']; ?>">
																		<input type="hidden" name="data[<?php echo $question['Question']['id']; ?>][Answer][user_id]" class="AnswerUserId" id="AnswerQuestionId<?php echo $question['Question']['id']; ?>" value="<?php echo $user_id; ?>">
																		<input <?php echo $radio_selected; ?> class="css-checkbox" type="radio" name="data[<?php echo $question['Question']['id']; ?>][Answer][rank]" id="AnswerRank<?php echo $question['Question']['id'].$i; ?>" value="<?php echo $i; ?>">
																		<label for="AnswerRank<?php echo $question['Question']['id'].$i; ?>" value="<?php echo $i; ?>" class="css-label css-label_<?php echo $i; ?>"></label>
																	</td>
																<?php
															}
														?>
													</tr>
													
												<?php } ?>
												
												<!-- Navigation on each page that will appear while answering the questions - DYNAMIC BEHAVIOUR -->
												<tr>
													<td colspan="6" style="min-height:40px;line-height:40px;font-weight: bold;color: #555555;text-align:left;">
														<a href="#" id="paginatorPrev" class="left paginatorPrev btn btn-primary <?php if ($pcount==1){ echo 'disabled'; } ?>">< PREV</a>
														<a style="margin-left: 15px;" href="/users/dashboard">Save & Exit</a>
														
														<?php if ($pcount!=$ptotal) { ?>
															<a href="#" id="paginatorNext" class="right paginatorNext btn btn-primary">NEXT ></a>
														<?php } ?>
														
														<?php if ($pcount==$ptotal) { ?>
															<?php if($iscreateAnswer == 1) { ?>
																<input type="button" value="SUBMIT" class="right btn btn-danger save-answer" style="margin-top: -30px;">
															<?php } else { ?>
																<input type="submit" value="SUBMIT" class="right btn btn-danger save-answer" style="margin-top: -30px;">
															<?php } ?>
														<?php } ?>
													</td>								
												</tr>
											</tbody>
										</table>
									<?php } ?>			
								</div>
							</div>
							
							<?php if($iscreateAnswer == 1) { ?>
								<input type="button" value="LOGOUT" class="btn btn-warning logout-answer">
							<?php } ?>
							
							<input type="hidden" id="remoteLink" name="data[TempAnswer][remoteLink]">
						</form>
						
						<!-- Navigation for pages -->
						<div class="full_question">
							<div class="<?php if(count($raw_questions) <= 10) { echo "hidden"; } ?>" id="array_paginator">
								<form id="paginator_form" style="display:none;">
									<input id="currentPaginatorstate" type="hidden" value="0">
									
									<a href="#" id="paginatorPrev" class="paginatorPrev paginatorButton btn btn-primary disabled">PREV</a>									
									<a href="#" id="paginatorNext" class="paginatorNext paginatorButton btn btn-primary">NEXT</a>
								</form>
							</div>
						</div>
					</div>
					
					<!-- Page header statuses -->
					<?php if(!$method) { ?>
						<div class="span3 left" style="padding-left: 25px; margin-top: 75px; font-weight: bold; line-height: 25px; font-size: 15px; color: #999; font-style:italic;">
							<div class="activeProgressMessage progressMessage span12">Welcome to your NutriCheck Assessment, Thank you for taking this important step to better well being. Be sure to answer every question, it will take approximately 5-10 minutes</div>
							<div class="progressMessage span12">You are doing really well. You are 1/2 way through</div>
							<div class="progressMessage span12">Great! You're almost there!</div>
							<div class="progressMessage span12">Great! You're almost there!</div>
							<div class="progressMessage span12">You're all done matey</div>
						</div>
					<?php } ?>
					
				</div>
		</div>
		
		<?php } else { ?>
			<div style="margin: 0; color: red;" class="span12 left sectionTitle">You need to select a patient before you can continue</div>		
		<?php } ?>

		<?php if($iscreateAnswer == 1) { ?>
			<a href="#verifyAdminPass" class="hidden fancybox" id="verifyTrigger"></a>
			<div class="hidden">
				<div id="verifyAdminPass" style="width: 320px;">
					<form style="width: 310px;" id="verifyPassword">
						<h4>Moderator Password</h4>
						<input type="password" name="data[User][password]" id="passwordValue" style="float: left; clear: none; width: 225px;">
						<input type="button" value="Verify" id="verifyPassword" class="btn btn-success" style="float: left; clear: none; margin-left: 15px; min-width: 50px;">
					</form>
				</div>
			</div>
		<?php } ?>

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
				
				$('.questionPaginator:first-child').addClass('activePage');
				$('#modeSelector').change( function () {
					if($(this).val() == 1) {
						$('.full_question').fadeOut(500);
						$('.quickentry_question').delay(500).fadeIn();
					} else{
						$('.quickentry_question').fadeOut(500);
						$('.full_question').delay(500).fadeIn();
					}
				});
				
				$('#nutricheckAnalysis').submit( function () {
					
					var question_count = "<?php echo count($raw_questions); ?>";
					var checked_per_line = 0;	
					
					$('.rankHolder').each( function () {
						// check per line if answered "variable"
						// check per line if answered (if answered then increment the total answered questions)
						$(this).children('td').children('input[type=radio].css-checkbox').each( function () {
							if($(this).is(':checked')) { 
								checked_per_line++;
							}	
						});
						
						if(checked_per_line == 0) {
							$(this).css("border", "1px solid red");
						} else {
							$(this).css("border", "none");
						}
					});
					
					console.log(question_count+" - "+checked_per_line);
					
					if(question_count != checked_per_line) {
						alert('There are unanswered items in the form. Please address them before you continue');
						return false;
					}
				});
				
				<?php if($iscreateAnswer == 1) { ?>
					$('.save-answer').click( function () {
						
						var question_count = "<?php echo count($raw_questions); ?>";
						var checked_per_line = 0;	
						
						$('.rankHolder').each( function () {
							// check per line if answered "variable"
							// check per line if answered (if answered then increment the total answered questions)
							$(this).children('td').children('input[type=radio].css-checkbox').each( function () {
								if($(this).is(':checked')) { 
									checked_per_line++;
								}	
							});
							
							if(checked_per_line == 0) {
								$(this).css("border", "1px solid red");
							} else {
								$(this).css("border", "none");
							}
						});
						
						console.log(question_count+" - "+checked_per_line);
						
						if(question_count != checked_per_line) {
							alert('There are unanswered items in the form. Please address them before you continue');
							return false;
						} else {
							$('#verifyTrigger').click();
						}
					});
					
					$('.logout-answer').click( function () {
						$('#verifyPassword').append('<input type="hidden" id="logoutToggle" value="logout" name="data[User][logout]" value=1>');
						$('#verifyTrigger').click();
					});
					
					$('input#verifyPassword').click( function () {
						var passwordValue = $('#passwordValue').val();
						if(passwordValue == "") {
							alert('Password can not be empty');
						} else {
							
							$.ajax({
								async:true,
								data:$('#verifyPassword').serialize(),
								dataType:'html',
								success:function (data, textStatus) {						
									if(data == 1) {
										if($('#logoutToggle').length > 0) {
											window.location.href = "http://<?php echo $_SERVER['SERVER_NAME']; ?>/users/dashboard";
										} else {
											if($('#qe_nutricheckAnalysis').is(':visible')) {
												$("#qe_nutricheckAnalysis").submit();
											} else {
												$("#nutricheckAnalysis").submit();
											}
										}
									} else {
										alert('Password is invalid');
									}
									
									$('#logoutToggle').remove();
								},
								type:'post',
								url:"http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/verify_password/"
							});
							
						}
						
						return false;
					});
					
				<?php } ?>
				
				// KEYBOARD NEXT prev
				$("body").keydown(function(e) {
					if(e.keyCode == 37) { // left
						$('#paginatorPrev').click();
					}
					else if(e.keyCode == 39) { // right
						$('#paginatorNext').click();
					}
				});
				
				$("#UserSelect .chosen-select").change( function () {
					$(this).parent('form').submit();
				});
			
				var maximum_page = "<?php echo  $question_data_count ?>";
				$( "#pageSelection_0" ).attr('checked', true);		
				var question_data_count = "<?php echo $question_data_count; ?>";
				
				$('.paginatorSelector').click( function () {
					var page_number = $(this).val();
					console.log(page_number);			
					$('.questionModules').fadeOut(500);
					$('#questionModule_'+page_number).delay(500).fadeIn();
					$('#currentPaginatorstate').val(page_number);
				});		
				
				// CHECKBOX CLICK
				$('.css-label').click( function () {
					var choice_value = $(this).attr('value');
					var question_id = $(this).siblings('.AnswerQuestionId').val();
					var perform_user_id = $(this).siblings('.AnswerUserId').val();
					var performed_time = "<?php echo $time; ?>";
					
					$.ajax({
						async:true,
						dataType:'html',
						success:function (data, textStatus) {
							console.log(data);
						},
						type:'get',
						url:"/selected_answer_logs/add?source=remote&choice_value="+choice_value+"&question_id="+question_id+"&user_id="+perform_user_id+"&performed_time="+performed_time
					});			
					SwitchBG(question_id);			
				});
				
				function SwitchBG(question_id){
					var curbg = $('#q'+question_id).css('background');
					console.log("curbg : " + curbg);
					// is gray
					if (curbg.indexOf("241") > -1){
						//$('#q'+question_id).css('background','rgba(0, 0, 0, 0)');
					}
					// not gray
					else{
						$('#q'+question_id).css('background','<?php echo $colorRowChecked; ?>');
					}
					
				}
				
				
				/* --------------------------------------------------------- VERIFIER WHETHER ALL FIELDS WERE CHECKED --------------------------------------- */
				// NEXT CLICK
				$(document).on("click", '#paginatorNext', function () {
					
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
						alert('There are unanswered items in the form. Please address them before you continue');
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
						$('.activePage').next().addClass('activePage');
						
						$('.activeProgressMessage').next().addClass('activeProgressMessage');
						$('.activeProgressMessage').last().prev().removeClass('activeProgressMessage');
						
						$("html, body").animate({ scrollTop: 0 }, "slow");
					}			
					if(next_page == (maximum_page-1)) {
						$('.save-answer').fadeIn();				
					}			
					return false;
				});		
				
				// PREV CLICK
				$(document).on('click', '#paginatorPrev', function () {
					var currentPaginatorstate = $('#currentPaginatorstate').val();
					currentPaginatorstate = parseInt(currentPaginatorstate);			
					var prev_page = currentPaginatorstate-1;
					console.log('current_state = ' + prev_page);			
					$('.save-answer').hide();			
					if(prev_page >= 0) {
						$( "#pageSelection_"+prev_page ).attr('checked', true);
						$('.questionModules').fadeOut(500);
						$('#questionModule_'+prev_page).delay(500).fadeIn(500,function(){
							//MoveNextPrev();
						});
						$('#currentPaginatorstate').val(prev_page);
						$('.activePage').last().removeClass('activePage');
						
						$('.activeProgressMessage').last().prev().addClass('activeProgressMessage');
						$('.activeProgressMessage').last().removeClass('activeProgressMessage');
						
						$("html, body").animate({ scrollTop: 0 }, "slow");
					}			
					return false;
				});	
				
				if(question_data_count > 1) {
					$('.save-answer').hide();
				} else {
					$('.save-answer').show();
				}
				
				
				/* ---------------------------------------------------------------------------------- QUICKENTRY -------------------------------------------------------------------------------- */
					
					$(".qe_save-answer").click( function () {	
						var qe_unanswered_items = 0;
						
						$('.qe_itemInstance').each( function () {
							if($(this).val() == "") {
								$(this).css("border", "1px solid red");
								qe_unanswered_items++;
							} else {
								$(this).css("border", "1px solid #ccc");
							}
						});
						
						if(qe_unanswered_items > 0) {
							alert('There are unanswered items in the form. Please address them before you continue');
						} else {
							$('#verifyTrigger').click();
						}
						
						return false;
					});
					
				/* ---------------------------------------------------------------------------------- QUICKENTRY -------------------------------------------------------------------------------- */
				
			});
			
		</script>
		<?php
	}
}
?>