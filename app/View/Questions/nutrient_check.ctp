<?php if($this->Session->read('Auth.User.id') != "") { ?>
	<?php if($this->Session->read('Auth.User.can_answer') == 0) { ?>
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
							<input type="submit" class="btn btn-success" value="GO" name="data[Factors][submit]">
						</form>
					</div>
				<?php } ?>
			</div>
			
			<?php if(!empty($user_id)) { ?>
				<div style="margin: 0;" class="span12 left sectionTitle">Questions</div>
				
				<form style="margin-bottom: 40px; float: left; max-width: 1080px;width:100%;" method="POST" id="nutricheckAnalysis">
					<?php
						$raw_questions = $questions;
						$question_data = array_chunk($questions, 10);
						$question_data_count = count($question_data);
						$pcount = 0;
						$ptotal = count($question_data);
						//echo count($question_data);
						foreach($question_data as $key => $questions) {
						$pcount++;
					?>
				
						<table style="float: left; width: 100;" class="questionModules" id="questionModule_<?php echo $key; ?>" cellpadding="0" cellspacing="0">
							<tbody style="width: 100%;">	
								<tr class="headerHolder" style="width: 100%;">
									<th style="width: 15%;text-align:center;"><span class="blue">Quest.  #</span></th>
									<th style="width: 53%;">Question</th>
									<th style="width: 8%;" class="actions"><span class="blue">0<br />Never</span></th>
									<th style="width: 8%;" class="actions"><span class="blue">1<br />Occasional / Mild</span></th>
									<th style="width: 8%;" class="actions"><span class="blue">2<br />Moderate / Frequently</span></th>
									<th style="width: 8%;" class="actions"><span class="blue">3<br />Severe / Very Severe</span></th>
								</tr>
								
								<?php foreach ($questions as $question) {
												$setstyle = "";
												if (isset($return_progress[$question['Question']['id']])) {
													$setstyle = "background:".$colorRowChecked.";";
												}
								?>
									
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
													<td style="width:8%;" class="actions">
														<input type="hidden" name="data[<?php echo $question['Question']['id']; ?>][Answer][question_id]" class="AnswerQuestionId" id="AnswerQuestionId<?php echo $question['Question']['id']; ?>" value="<?php echo $question['Question']['id']; ?>">
														<input type="hidden" name="data[<?php echo $question['Question']['id']; ?>][Answer][user_id]" class="AnswerUserId" id="AnswerQuestionId<?php echo $question['Question']['id']; ?>" value="<?php echo $user_id; ?>">
														<input <?php echo $radio_selected; ?> class="css-checkbox" type="radio" name="data[<?php echo $question['Question']['id']; ?>][Answer][rank]" id="AnswerRank<?php echo $question['Question']['id'].$i; ?>" value="<?php echo $i; ?>">
														<label for="AnswerRank<?php echo $question['Question']['id'].$i; ?>" value="<?php echo $i; ?>" class="css-label"></label>
													</td>
												<?php
											}
										?>
									</tr>
									
								<?php } ?>
								<tr>
										<td colspan="6" style="min-height:40px;line-height:40px;font-weight: bold;color: #555555;text-align:left;">
										Page <?php echo $pcount; ?> of <?php echo $ptotal; ?>
										<span style="float:right;min-height:40px;line-height:40px;margin-top:4px;" id="nextprev">
										<a href="#" id="paginatorPrev" class="paginatorPrev paginatorButton btn btn-primary <?php if ($pcount==1){ echo 'disabled'; } ?>">PREV</a>
										<a href="#" id="paginatorNext" class="paginatorNext paginatorButton btn btn-primary <?php if ($pcount==$ptotal){ echo 'disabled'; } ?>">NEXT</a>
										</span>
										</td>								
								</tr>
							</tbody>
						</table>
					<?php } ?>			
					
					<?php if($iscreateAnswer == 1) { ?>
						<input type="button" value="SUBMIT" class="btn btn-danger save-answer" style="display:none;">
						<input type="button" value="LOGOUT" class="btn btn-warning logout-answer">
					<?php } else { ?>
						<input type="submit" value="SUBMIT" class="btn btn-danger save-answer" style="display:none;">
					<?php } ?>
					
					<input type="hidden" id="remoteLink" name="data[TempAnswer][remoteLink]">
				</form>
					
				<div class="<?php if(count($raw_questions) <= 10) { echo "hidden"; } ?>" id="array_paginator">
					<form id="paginator_form" style="display:none;">
						<input id="currentPaginatorstate" type="hidden" value="0">
						
						<a href="#" id="paginatorPrev" class="paginatorPrev paginatorButton btn btn-primary disabled">PREV</a>
							
							<?php 
								/* for($i=0; $i<$question_data_count; $i++) {
									?>
										<input name="pageSelected" id="pageSelection_<?php echo $i; ?>" class="paginatorSelector" type="radio" value="<?php echo $i; ?>">
									<?php
								} */
							?>
						
						<a href="#" id="paginatorNext" class="paginatorNext paginatorButton btn btn-primary">NEXT</a>
					</form>
				</div>
				
			<?php } else { ?>
				<div style="margin: 0; color: red;" class="span12 left sectionTitle">You need to select a patient before you can continue</div>		
			<?php } ?>
		</div>

		<?php if($iscreateAnswer == 1) { ?>
			<a href="#verifyAdminPass" class="hidden fancybox" id="verifyTrigger"></a>
			<div class="hidden">
				<div id="verifyAdminPass" style="width: 320px;">
					<form style="width: 310px;" id="verifyPassword">
						<h4>Moderator Password</h4>
						<input type="password" name="data[User][password]" id="passwordValue" style="float: left; clear: none; width: 225px;">
						<input type="button" value="Verify" id="verifyPassword" class="btn btn-success" style="float: left; clear: none; margin-left: 15px;">
					</form>
				</div>
			</div>
		<?php } ?>

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
			function MoveNextPrev(){
				//var geth = $('#paginator_form').html();
				//$('#paginator_form').hide();
				//$('#paginator_form').html('');
				//$('.questionModules:visible #nextprev').html(geth);
				//$('.questionModules #nextprev').html(geth);
			}

			$(document).ready(function() {
				
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
										$("#nutricheckAnalysis").submit();
									} else {
										alert('Password is invalid');
									}
									
									$('#logoutToggle').remove();
								},
								type:'post',
								url:"../questions/verify_password/"
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
					}			
					return false;
				});	
				
				if(question_data_count > 1) {
					$('.save-answer').hide();
				} else {
					$('.save-answer').show();
				}
			});
			
		</script>
		<?php
	}
}
?>