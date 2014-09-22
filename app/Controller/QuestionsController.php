<?php
App::uses('AppController', 'Controller');
/**
 * Questions Controller
 *
 * @property Question $Question
 * @property PaginatorComponent $Paginator
 */
class QuestionsController extends AppController {
	
	function beforeFilter() {
		parent::beforeFilter();
		
		$user_id = $this->Session->read('Auth.User.id');
		if(empty($user_id)) {
			$this->Auth->allow('remote_nutrient_check', 'save_remote_nutrient_check', 'nutrient_check');
		} else {
			$this->Auth->allow('remote_nutrient_check', 'save_remote_nutrient_check', 'nutrient_check', 'print_question_list', 'verify_password','nutricheckSender', 'quickentry_nutrient_check');
		}
	}
	
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	
	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	
	public function dashboard() {
		$this->layout = "public_dashboard";
		$user_info = $this->Session->read('Auth.User');
		
		$user_condition = array('User.parent_id' => $user_info['id']);
		
		$factor_list = $this->Question->Factor->find('list', array('fields' => array('id', 'name')));
		$email_list = $this->Question->User->find('list', array('fields' => array('hash_value', 'email'), 'conditions' => $user_condition));
		
		$this->set('factor_list', $factor_list);
		$this->set('email_list', $email_list);
	}


	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	
	public function index() {
		$this->layout = "public_dashboard";
		$this->Question->recursive = 0;
		
		$qgroups = $this->Question->Qgroup->find('list');
		$condition = array('Question.status' => 1);
		
		/* $selected_questions = $this->Session->read('selected_questions');
		$selected_qgroup = $this->Session->read('selected_qgroup');
		
		if(!empty($selected_qgroup)) {
			$selected_group_details = $this->Question->Qgroup->findById($selected_qgroup);
			$this->set('selected_group_details', $selected_group_details);
		} */
		
		$selected_qgroup = "";
		if ($this->request->is('post')) {
			$questions_from_group = $this->Question->Qgroup->find('all', array('conditions' => array('Qgroup.id' => $this->request->data['Qgroup']['id'])));
			
			if(isset($this->request->data['Question']['id']) && !empty($this->request->data['Question']['id']) && !isset($this->request->data['Question']['reset'])) {
				$condition = array('Question.status' => 1, 'Question.id' => $this->request->data['Question']['id']);
			} else {
				unset($this->request->data['Question']['id']);
			}
			
			if(!empty($this->request->data['Qgroup']['id']) && !isset($this->request->data['Qgroup']['qgroupReset'])) {
				$qgroup_id = $this->request->data['Qgroup']['id'];
				$this->Session->write('selected_qgroup', $qgroup_id);
			}
			
			if(isset($this->request->data['Qgroup']['qgroupReset'])) {
				$this->Session->delete('selected_qgroup');	
				unset($this->request->data['Qgroup']['id']);
			}
		}
		
		/* ----------------------------------------------------------------- this is the cause of creating a question group from the question list -------------------------------------------------------*/
			
			// this will basically auto select the newly created group from the question list
			if(isset($_GET['selected'])) {
				$this->Session->write('selected_qgroup', $_GET['selected']);
				$this->redirect(array('action' => 'index'));
			}
		/* ----------------------------------------------------------------- this is the cause of creating a question group from the question list -------------------------------------------------------*/
		
		$selected_qgroup = $this->Session->read('selected_qgroup');
		$selected_questions = array();
		
		
		if (!empty($selected_qgroup)) {
			$questions_from_group = $this->Question->Qgroup->find('all', array('conditions' => array('Qgroup.id' => $selected_qgroup)));
		}
		
		if(isset($questions_from_group)) {
			foreach($questions_from_group[0]['Question'] as $key => $question) {
				$selected_questions[$key] = $question['id'];
			}
		}
		
		$question_list = $this->Question->find('list', array('fields' => array('id', 'question'), 'conditions' => array('status' => 1)));
		$this->set('questions', $this->Paginator->paginate($condition));
		$this->set(compact('qgroups', 'selected_questions', 'selected_qgroup', 'question_list'));
	}


	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	
	public function view($id = null) {
		$this->layout = "public_dashboard";
		if (!$this->Question->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
		$this->set('question', $this->Question->find('first', $options));
	}

	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	
	public function add() {
		$this->layout = "public_dashboard";
		if ($this->request->is('post')) {
			$this->Question->create();
			if ($this->Question->save($this->request->data)) {
				
				$this->Session->setFlash(__('The question has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.'));
			}
		}
		$users = $this->Question->User->find('list');
		$factors = $this->Question->Factor->find('list');
		$this->set(compact('users', 'factors'));
	}

	
	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	
	public function edit($id = null) {
		$this->layout = "public_dashboard";
		if (!$this->Question->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Question->save($this->request->data)) {
				
				$this->Session->setFlash(__('The question has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
			$this->request->data = $this->Question->find('first', $options);
		}
		$users = $this->Question->User->find('list');
		$factors = $this->Question->Factor->find('list');
		$this->set(compact('users', 'factors'));
	}

	
	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	
	public function delete($id = null) {
		$this->Question->id = $id;
		if (!$this->Question->exists()) {
			throw new NotFoundException(__('Invalid question'));
		}
		$this->request->onlyAllow('post', 'delete');
		
		$this->request->data['Question']['id'] = $id;
		$this->request->data['Question']['status'] = 0;
		
		if ($this->Question->save($this->request->data)) {
			$this->Session->setFlash(__('The question has been deleted.'));
		} else {
			$this->Session->setFlash(__('The question could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	
	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	public function quickentry_nutrient_check() {
		$this->loadModel('PerformedCheck');
		$answers = $this->request->data;
		
		foreach($answers as $answer) {
			$answer['Answer']['user_id'] = $this->request->data['User']['id'];
			
			$answer['Answer']['ip_address'] = $_SERVER['REMOTE_ADDR'];
			$this->Question->Answer->create();
			$this->Question->Answer->save($answer);
		}
		
		/* ------------------------------------------------------------------------------------------------------- LOGGING OF QUESTIONNIARE ACCESS -----------------------------------------------------------------------------------------------------*/
		$performed_check_data = array();
		$performed_check_data['PerformedCheck']['date'] = date('Y-m-d');
		$performed_check_data['PerformedCheck']['isComplete'] = 1;
		$performed_check_data['PerformedCheck']['user_id'] = $this->request->data['User']['id'];

		$this->PerformedCheck->create();
		$this->PerformedCheck->save($performed_check_data);		
		
		echo "1";
		exit();
	}
	
	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	
	public function nutrient_check( $method = null ) {
		
		$this->loadModel('PerformedCheck');
		$this->loadModel('SelectedAnswerLog');
		$this->loadModel('SelectedFactorLog');
		
		if(isset($_GET['hash_value'])) {
			
			$hash_value = $_GET['hash_value'];
			// $this->Question->User->unbindModelAll();
			$url_user_info = $this->Question->User->findByHashValue($hash_value);
			
			if($this->Session->read('Auth.User.group_id') != 3) {
				$this->Session->write('behalfUserId', $url_user_info['User']['id']);
			} else {
				$user = $url_user_info['User'];
				if(!$this->Auth->login($user)) {
					$this->Session->setFlash(__('Failed to auto-login'));
					$this->redirect('/users/login');
				}
			}
		}
		
		$user_info = $this->Session->read('Auth.User');
		$behalfUserId = $this->Session->read('behalfUserId');
		$full_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];		
		
		// ------------------- layout changes depending if the source is directly to the system or if it's being accessed remotely -------------------------- //

			if(isset($_GET['source']) && $_GET['source'] == "remote") {
				$this->layout = "iframe-layout";
			} else {
				$this->layout = "public_dashboard";
			}
			
		// ------------------- layout changes depending if the source is directly to the system or if it's being accessed remotely -------------------------- //
		
		
		// --------------------------------- if the group_id of the questions is defined, then will filter them based on it -------------------------------------------- //
			$group_questions_id = array();
			if(isset($_GET['group_id'])) {
				$widget = $this->Question->Qgroup->findById($_GET['group_id']);
				
				foreach($widget['Question'] as $qkey => $group_question_item) {
					$group_questions_id[$qkey] = $group_question_item['id'];
				}
				
				sort($group_questions_id);
			}
		// --------------------------------- if the group_id of the questions is defined, then will filter them based on it -------------------------------------------- //
		
		
		$iscreateAnswer = 0;
		if($this->Session->read('isCreateAnswer') != "") {
			$iscreateAnswer = $this->Session->read('isCreateAnswer');
		}
		
		if(!empty($method)) {
			if($method != "factors") {
				echo "<h1>This is an invalid address</h1>";
				exit();
			}
		}
		
		if($user_info['can_answer'] != 1) {
			$this->Session->setFlash(__('Please wait for the notification through email that you can answer again.'));
			
			if(!isset($_GET['source'])) {
				$this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
			}
		}
		
		$this->Question->recursive = 0;
		$selected_factors = array();
		
		if($user_info['group_id'] != 1) {
			$condition = array('User.parent_id' => $user_info['id'], 'User.status' => 1, 'User.parent_id' => $user_info['id']);
		} else {
			$condition = array('User.status' => 1, 'User.parent_id' => $user_info['id']);
		}
		
		$users_list = $this->Question->User->find('list', array('fields' => array('id', 'email'), 'conditions' => $condition));
		
		/* ------------------------------------------------------------------------------------------------------- LOGGING OF QUESTIONNIARE ACCESS -----------------------------------------------------------------------------------------------------*/
			$performed_check_data = array();
			$performed_check_data['PerformedCheck']['date'] = date('Y-m-d');
			$performed_check_data['PerformedCheck']['isCOmplete'] = 0;
			
			$performed_check_data['PerformedCheck']['url'] = $full_url;
			
			if(($user_info['group_id'] == 2) && !empty($behalfUserId)) {
				$performed_check_data['PerformedCheck']['user_id'] = $behalfUserId;
				$log_existence = $this->PerformedCheck->find('all', array('conditions' => array('isComplete' => 0, 'user_id' => $behalfUserId, 'url' => $full_url)));
			} else {
				$performed_check_data['PerformedCheck']['user_id'] = $user_info['id'];
				$log_existence = $this->PerformedCheck->find('all', array('conditions' => array('isComplete' => 0, 'user_id' => $user_info['id'], 'url' => $full_url)));
			}
			
			
			if(($user_info['group_id'] == 2) && !empty($behalfUserId)) {
				// will only log instance of user id if the client is performing in behalf of a patient
				if(count($log_existence) == 0) {
					$this->PerformedCheck->create();
					$this->PerformedCheck->save($performed_check_data);
				}
			} else {
				// will only log instance of access of user_id if group is not equivalent to client
				if(($user_info['group_id'] != 2)) {
					if(!empty($user_info['id'])) {
						if(count($log_existence) == 0) {
							$this->PerformedCheck->create();
							$this->PerformedCheck->save($performed_check_data);
						}
					}
				}
			}
		/* ------------------------------------------------------------------------------------------------------- LOGGING OF QUESTIONNIARE ACCESS -----------------------------------------------------------------------------------------------------*/
		
		if(!empty($group_questions_id)) {
			$this->Paginator->settings = array(			
				'conditions' => array('Question.id' => $group_questions_id),
				'limit' => -1
			);
		} else {
			$this->Paginator->settings = array(
				'limit' => -1
			);
		}

		if($this->request->is('post')) {
			
			if(isset($this->request->data['Factors']['submit'])) {
				
				$behalfUserId = $this->Session->read('behalfUserId');
				if(empty($this->request->data['Factors']['factors'])) {
					$this->Session->setFlash(__("You didn't select a functional disturbance"));
				} else {
					$factor_ids = implode(",", $this->request->data['Factors']['factors']);
					$selected_factors = $this->request->data['Factors']['factors'];
					$this->set('selected_factors', $selected_factors);
					
					$sql = "SELECT Question.id from questions as Question LEFT JOIN factors_questions ON Question.id = factors_questions.question_id WHERE factor_id IN ($factor_ids)";
					$question_ids = $this->Question->query($sql);
					$flatten_qid = array();
					
					$this->SelectedFactorLog->query('DELETE FROM selected_factor_logs WHERE user_id = '.$this->request->data['Factors']['user_id']);
					
					$to_log_selected_factor = array();
					foreach($this->request->data['Factors']['factors'] as $key => $factor) {
						$to_log_selected_factor['SelectedFactorLog']['factor_id'] = $factor;
						$to_log_selected_factor['SelectedFactorLog']['user_id'] = $this->request->data['Factors']['user_id'];						
						
						$this->SelectedFactorLog->create();
						$this->SelectedFactorLog->save($to_log_selected_factor);
					}
					
					foreach($question_ids as $key => $question_id) {
						$flatten_qid[$key] = $question_id['Question']['id'];
					}
					
					 $this->Paginator->settings = array(
						'conditions' => array('Question.id' => $flatten_qid),
						'limit' => -1
					);
				}
				
			} else if(isset($this->request->data['User']['id'])) {				
				
				$this->Session->write('behalfUserId', $this->request->data['User']['id']);
				
				/* ------------------------------------------------------------------------------------------------------- LOGGING OF QUESTIONNIARE ACCESS -----------------------------------------------------------------------------------------------------*/
					$performed_check_data = array();
					$performed_check_data['PerformedCheck']['date'] = date('Y-m-d');
					$performed_check_data['PerformedCheck']['isCOmplete'] = 0;
					$performed_check_data['PerformedCheck']['url'] = $full_url;
					
					$performed_check_data['PerformedCheck']['user_id'] = $this->request->data['User']['id'];
					$log_existence = $this->PerformedCheck->find('all', array('conditions' => array('isComplete' => 0, 'user_id' => $this->request->data['User']['id'])));
				
					if(count($log_existence) == 0) {
						$this->PerformedCheck->create();
						$this->PerformedCheck->save($performed_check_data);
					}
					
				/* ------------------------------------------------------------------------------------------------------- LOGGING OF QUESTIONNIARE ACCESS -----------------------------------------------------------------------------------------------------*/
				
				$behalfUserId = $this->Session->read('behalfUserId');
				$this->set('user_id', $behalfUserId);
				
			} else {
				
				$return_user_id = "";
				$answers = $this->request->data;
				
				if(isset($this->request->data['User']['id'])) {
					$this->Session->write('behalfUserId', $this->request->data['User']['id']);
					$return_user_id = $this->request->data['User']['id'];
				}
				
				if(!isset($this->request->data['Question']['sourceForm'])) {
					unset($this->request->data['User']['id']);
				}
				
				foreach($answers as $answer) {					
					if(!empty($behalfUserId)) {
						$answer['Answer']['user_id'] = $behalfUserId;
					}
					
					if(isset($this->request->data['Question']['sourceForm'])) {
						$answer['Answer']['user_id'] = $this->request->data['User']['id'];
					}
					
					$answer['Answer']['ip_address'] = $_SERVER['REMOTE_ADDR'];
					$this->Question->Answer->create();
					$this->Question->Answer->save($answer);
				}
				
				// to remove the session when the create and answer button is clicked when creating a user
				$this->Session->delete('isCreateAnswer');
				
				if($user_info['group_id'] == 3) {
					
					$parent_id = $user_info['parent_id'];
					$parent_information = $this->Question->User->findById($parent_id);
					$to = $parent_information['User']['email'];
					
					/* ------------------------------------------------------ Emailing the pharmacist if ever a patient performed nutricheck ------------------------------------------------- */
						
						$subject = "A patient just performed NutriCheck";

						$headers = "From: nomail@nutricheck.com";
						$headers .= "Reply-To: noreply@nutricheck.com";
						$headers .= "MIME-Version: 1.0\r\n";
						$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
						
						$message = '<html><body>';
						
						$message .= "The user with email address ".$user_info['email']." that has the ID# ".$user_info['id']." performed nutricheck.";
						
						$message .= "</body></html>";
						
						mail($to, $subject, $message, $headers);
						
					/* ------------------------------------------------------ Emailing the pharmacist if ever a patient performed nutricheck ------------------------------------------------- */

					// to disallow user from answering again, not unless reactivated by the pharmacist
					$this->deactivate_user_answer($behalfUserId);
				}

						
				// means if the current user is a pharmacist - client
				if($user_info['group_id'] == 2) {
					if(!empty($behalfUserId)) {
						$latest_answer_date = $this->Question->Answer->find('first', array('fields' => array('Answer.created'), 'group' => array('Answer.created'), 'limit' => 1, 'order' => array('Answer.created' => 'DESC'), 'conditions' => array('Answer.user_id' => $behalfUserId)));
						$latest_answer_date = strtotime($latest_answer_date['Answer']['created']);
						
						$this->Session->setFlash(__('Thank you for completing this NutriCheck assessment. This assessment report has been saved and sent to your patient database'));
						$params = $latest_answer_date."/".$behalfUserId;
						$return_user_id = $behalfUserId;
					}
				}
				
				if($user_info['group_id'] == 3) {
					$this->Session->setFlash(__('You have successfully completed a NutriCheck as '.$user_info['email'].'. Your results will be delivered to your nominated pharmacy or health care professional within 48 hours.'));
					$return_user_id = $user_info['id'];
				}
			
				if(($user_info['group_id'] == 2) && !empty($behalfUserId)) {
					$logs_existence = $this->PerformedCheck->find('all', array('conditions' => array('isComplete' => 0, 'user_id' => $behalfUserId)));
					$return_user_id = $behalfUserId;
					
					foreach($logs_existence as $log_existence) {
						$log_existence['PerformedCheck']['isComplete'] = 1;
						$this->PerformedCheck->save($log_existence);
					}
				} else {
					if(!empty($user_info['id'])) {
						$logs_existence = $this->PerformedCheck->find('all', array('conditions' => array('isComplete' => 0, 'user_id' => $user_info['id'])));
						$return_user_id = $user_info['id'];
						
						foreach($logs_existence as $log_existence) {
							$log_existence['PerformedCheck']['isComplete'] = 1;
							$this->PerformedCheck->save($log_existence);
						}
					}
				}
				
				// if progress gets completed, then will remove the instances of previous logs so that it will make the questionnaire fresh in view
					
					$this->SelectedAnswerLog->query('DELETE FROM selected_answer_logs where user_id = '.$return_user_id);
					$this->SelectedFactorLog->query('DELETE FROM selected_factor_logs WHERE user_id = '.$return_user_id);
				
				/*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
				
				if(isset($_GET['source']) && $_GET['source'] == "remote") {
					$this->deactivate_user_answer();
					$this->redirect(array('controller' => 'answers', 'action' => 'report?answered=true&status=saved&source=remote'));
				}
				
				return $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
			}
		}
		
		if(empty($method)) {
			$questions = $this->Paginator->paginate();
		} else {
			$questions = $this->Paginator->paginate();
			$factors = $this->Question->Factor->find('list');
			$this->set('factors', $factors);
		}

		$return_user_id = "";
		if(($user_info['group_id'] == 2) && !empty($behalfUserId)) {
			$this->set('user_id', $behalfUserId);
			$return_user_id = $behalfUserId;
		} else {
			// will only log instance of access of user_id if group is not equivalent to client
			if(($user_info['group_id'] != 2)) {
				$this->set('user_id', $user_info['id']);
				$return_user_id = $user_info['id'];
			}
		}
		
		$this->SelectedAnswerLog->unbindModelAll();
		$returnee_answer_data = $this->SelectedAnswerLog->find('all', 
			array(
				'conditions' => 
					array(
						'SelectedAnswerLog.user_id' => $return_user_id
					),
				'order' => array('question_id' => 'ASC', 'created' => 'DESC'),
				'fields' => array('choice_value', 'question_id')
			)
		);
		
		/* -------------------------------------------------------------------- ALLOWING THE USER TO GO BACK TO THEIR PREVIOUOS PROGRESS ------------------------------------------------------------ */

			$return_progress = array();
			foreach($returnee_answer_data as $returnee_answer) {
				if(!isset($return_progress[$returnee_answer['SelectedAnswerLog']['question_id']])) {
					$return_progress[$returnee_answer['SelectedAnswerLog']['question_id']] = $returnee_answer['SelectedAnswerLog']['choice_value'];
				}
			}
			
			// if has previously perofrmed nutricheck but didn't finish it
			$this->set('return_progress', $return_progress);
			
		/* -------------------------------------------------------------------- ALLOWING THE USER TO GO BACK TO THEIR PREVIOUOS PROGRESS ------------------------------------------------------------ */
		
		
		$initial_selected_factors = $this->SelectedFactorLog->find('all', array('conditions' => array('SelectedFactorLog.user_id' => $return_user_id), 'fields' => array('factor_id')));
		
		if(!empty($initial_selected_factors)) {
			$flatten_selected_factors = array();
			foreach($selected_factors as $selected_factor_key => $factor) {
				$flatten_selected_factors[$selected_factor_key] = $factor['SelectedFactorLog']['factor_id'];
			}	
			$selected_factors = $flatten_selected_factors;
		}
		
		if(isset($_GET['factors'])) {
			$selected_factors = explode(",", $_GET['factors']);
		}
		
		if(!empty($method)) {
			if(!empty($selected_factors)) {				
				$factor_ids = implode(",", $selected_factors);
				
				$sql = "SELECT Question.id from questions as Question LEFT JOIN factors_questions ON Question.id = factors_questions.question_id WHERE factor_id IN ($factor_ids)";
				$question_ids = $this->Question->query($sql);			
				$flatten_qid = array();
				
				foreach($question_ids as $key => $question_id) {
					$flatten_qid[$key] = $question_id['Question']['id'];
				}
				
				$factored_qgroup = array_intersect($flatten_qid, $group_questions_id);
				
				if(empty($factored_qgroup)) {
					$this->Paginator->settings = array(
						'conditions' => array('Question.id' => $flatten_qid),
						'limit' => -1
					);
				} else {
					$this->Paginator->settings = array(
						'conditions' => array('Question.id' => $factored_qgroup),
						'limit' => -1
					);
				}
				
				
				$questions = $this->Paginator->paginate();
			}
		}
		
		$this->set('iscreateAnswer', $iscreateAnswer);
		$this->set('selected_factors', $selected_factors);
		$this->set('method', $method);
		$this->set('users_list', $users_list);
		$this->set('questions', $questions);
	}
	
	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	
	
	// public function remote_nutrient_check() {
		
		// $user_id = $this->Session->read('Auth.User.id');
		// $this->Question->recursive = 0;
		// $this->layout = "iframe-layout";
		// $selected_factors = array();
		
		// $this->Paginator->settings = array(
			// 'limit' => 200
		// );
		
		// if($this->request->is('post')) {		
			// $answers = $this->request->data;
			
			// /* $this->Session->setFlash(__('You successfully saved your answers')); */
			
			// if(!empty($user_id)) {
				
				// $answers_remote_link = $answers['TempAnswer']['remoteLink'];
				// unset($answers['TempAnswer']['remoteLink']);
				
				// foreach($answers as $answer) {
					// if(!empty($answer['TempAnswer'])) {
						// $answer['Answer'] = $answer['TempAnswer'];
						// $answer['Answer']['ip_address'] = $_SERVER['REMOTE_ADDR'];
						// $answer['Answer']['link'] = $answers_remote_link;
						
						// $answer['Answer']['user_id'] = $user_id;
						
						// unset($answers['TempAnswer']['remoteLink']);
						
						// $this->Question->Answer->create();
						// $this->Question->Answer->save($answer);
					// }
				// }
				
				// $this->deactivate_user_answer();
				// $this->redirect(array('controller' => 'answers', 'action' => 'report?answered=true&status=saved'));
				
			// } else {
				
				// $temp_answer_array = array();
				// foreach($answers as $key => $answer) {
				
					// $answer['TempAnswer']['ip_address'] = $_SERVER['REMOTE_ADDR'];
					// $answer['TempAnswer']['link'] = $answers['TempAnswer']['remoteLink'];
					
					// $temp_answer_array[$key]['Answer'] = $answer['TempAnswer'];
					
					// /* $this->Question->TempAnswer->create();
					// $this->Question->TempAnswer->save($answer); */
				// }
				
				// $this->Session->write('temp_answers', $temp_answer_array);
				// $temp_answer = $this->Session->read('temp_answers');
				
				// $this->redirect(array('controller' => 'answers', 'action' => 'report?answered=true&status=temp&action=login'));
			// }
		// }
		
		// $questions = $this->Paginator->paginate();
		
		// $this->set('selected_factors', $selected_factors);
		// $this->set('questions', $questions);
	// }
	
	
	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	
	
	public function save_remote_nutrient_check() {
		
		$user_id = $this->Session->read('Auth.User.id');
		$temp_answer_array = array();
		$temp_answer = $this->Session->read('temp_answers');
		
		unset($temp_answer['TempAnswer']);		
		$answers = $temp_answer;
		
		foreach($answers as $answer) {
			$answer['Answer']['user_id'] = $user_id;
			$this->Question->Answer->create();
			$this->Question->Answer->save($answer);
		}

		$this->Session->delete('temp_answers');
		$this->redirect(array('controller' => 'answers', 'action' => 'report?answered=true&status=saved'));
	}
	

	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	
	
	public function qgroup_cart($question_id = null) {
		
		$append = array();
		$selected_qgroup = $this->Session->read('selected_qgroup');
		
		$qgroup_associations = $this->Question->Qgroup->find('all', array('conditions' => array('Qgroup.id' =>$selected_qgroup)));
		
		$question_ids = array();
		foreach($qgroup_associations[0]['Question'] as $key => $question) {
			if(isset($question['id'])) {
				$question_ids[$key] = $question['id'];
			}
		}		
		
		array_push($question_ids, $question_id);
		
		$to_save = array();
		$to_save['Qgroup']['id'] = $selected_qgroup;
		$to_save['Question']['Question'] = $question_ids;
		
		if($this->Question->Qgroup->save($to_save)) {
			echo 1;
		}
		
		exit();
	}
	
	
	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	
	
	public function qgroup_cart_remove($question_id = null) {
		
		$append = array();
		$final_association = array();
		$selected_qgroup = $this->Session->read('selected_qgroup');
		
		$qgroup_associations = $this->Question->Qgroup->find('all', array('conditions' => array('Qgroup.id' =>$selected_qgroup)));
		
		$question_ids = array();
		foreach($qgroup_associations[0]['Question'] as $key => $question) {
			$question_ids[$key] = $question['id'];
		}
		
		$final_association = $this->array_delete($question_ids, $question_id); // returns [312, 1599, 3]
		
		$to_save = array();
		$to_save['Qgroup']['id'] = $selected_qgroup;
		$to_save['Question']['Question'] = $final_association;
		
		if($this->Question->Qgroup->save($to_save)) {
			echo 1;
		}
		
		exit();
	}
	
	
	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	
	
	function array_delete($array, $element) {
		$to_remove = array();
		array_push($to_remove, $element);
		return array_diff($array, $to_remove);
	}
	
	
	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	
	
	function deactivate_user_answer($user_id) {
		$user_info = $this->Session->read('Auth.User');
		
		$this->Session->write('Auth.User.can_answer', 0);
		
		$user_data = array();
		$user_data['User']['can_answer'] = 0;
		
		if(!empty($user_id)) {
			$user_data['User']['id'] = $user_id;
		} else {
			$user_data['User']['id'] = $user_info['id'];
		}
		
		$this->Question->User->save($user_data);
	}
	
	
	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	
	
	function activate_user_answer() {
		$user_info = $this->Session->read('Auth.User');
		
		$this->Session->write('Auth.User.can_answer', 1);
		
		$user_data = array();
		$user_data['User']['can_answer'] = 1;
		$user_data['User']['id'] = $user_info['id'];
		$this->Question->User->save($user_data);
	}
	
	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	
	public function print_question_list() {
		$this->layout = "ajax_plus_scripts";
		
		$this->loadModel('User');
		$this->loadModel('UserProfile');
		
		if(!empty($this->request->data['Factors']['factors'])) {
			$factor_ids = implode(",", $this->request->data['Factors']['factors']);
			$selected_factors = $factor_ids;
		}
		
		if(isset($_GET['factors'])) {
			$selected_factors = $_GET['factors'];
		}
		
		if(!empty($selected_factors)) {
			$this->set('selected_factors', $selected_factors);
			
			$sql = "SELECT Question.id from questions as Question LEFT JOIN factors_questions ON Question.id = factors_questions.question_id WHERE factor_id IN ($selected_factors)";
			$question_ids = $this->Question->query($sql);
			$flatten_qid = array();
			
			foreach($question_ids as $key => $question_id) {
				$flatten_qid[$key] = $question_id['Question']['id'];
			}
			
			$questions = $this->Question->find('list', array('fields' => array('id', 'question'), 'conditions' => array('Question.id' => $flatten_qid)));
		} else {
			$questions = $this->Question->find('list', array('fields' => array('id', 'question')));
		}
		
		
		if(isset($_GET['hash_value'])) {
			$user_info = $this->User->findByHashValue($_GET['hash_value']);
			$user_id = $user_info['User']['id'];
			$user_profile = $this->UserProfile->find('first', array('conditions' => array('user_id' => $user_id)));
			$user_full_name = $user_profile['UserProfile']['first_name']." ".$user_profile['UserProfile']['last_name'];
			
			$this->set('user_full_name',  $user_full_name);
		}
		
		$this->set(compact('questions'));
	}

	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	
	public function nutricheckSender() {
		App::import('Vendor', 'phpmailer', array('file' => 'phpmailer/class.phpmailer.php'));
		
		if($this->request->is('post')) {
			$hash_value = $_POST['hash_value'];
			$selected_factors = $_POST['factors'];
			
			$this->Question->User->unbindModelAll();
			$user_info = $this->Question->User->findByHashValue($hash_value);
			$email = $user_info['User']['email'];
			
			if(empty($selected_factors)) {
				$url = "http://".$_SERVER['SERVER_NAME']."/questions/nutrient_check?hash_value=".$hash_value;
			} else {
				$url = "http://".$_SERVER['SERVER_NAME']."/questions/nutrient_check/factors?hash_value=".$hash_value."&factors=".$selected_factors;
			}
			
			$mail = new PHPMailer(); 

			$mail->IsSMTP(); // we are going to use SMTP
			$mail->IsHTML(true);
			$mail->Host = 'email-smtp.us-east-1.amazonaws.com';  // Specify main and backup server
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = "AKIAIFE5UJ3F2OYW64CQ"; 
			$mail->Password = "AiMbFeTu00PxAlzDl2Cn60zDlPoYdVfZBvwChnbB3C50"; 
			$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

			$mail->From = "noman@iquantum.com.au"; 
			$mail->FromName = "noman@iquantum.com.au"; 
			$mail->AddAddress($email, $email);
			
			$mail->AddReplyTo("noman@iquantum.com.au", "noman@iquantum.com.au"); 

			$mail->CharSet  = 'UTF-8'; 
			$mail->WordWrap = 50;  // set word wrap to 50 characters

			$mail->IsHTML(true);  // set email format to HTML 
			
			$mail->Subject = "Nutricheck Invitation";
			$mail->Body    = "You have have been sent an invitation to perform Nutricheck click <a href='".$url."'>here</a> to perform test";
			
			
			if($mail->Send()) {
				echo "1";
				exit();
			} else {
				echo $mail->ErrorInfo; 
				exit();
			}
		}
		
		exit();
	}
	
	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	
	public function verify_password() {
		$user_id = $this->Session->read('Auth.User.id');
		$user_info = $this->Question->User->findById($user_id);
		
		if($user_info['User']['password'] == $this->Auth->password($this->request->data['User']['password'])) {
			if(isset($this->request->data['User']['logout'])) {
				$this->Session->delete('behalfUserId');
				$this->Session->delete('isCreateAnswer');
			}
			
			echo "1";
		} else {	
			echo "0";
		}
		
		exit();
	}
}