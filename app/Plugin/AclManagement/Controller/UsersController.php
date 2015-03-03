<?php

App::uses('AclManagementAppController', 'AclManagement.Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AclManagementAppController {

    public $uses = array('AclManagement.User');

    function beforeFilter() {
        parent::beforeFilter();

        $this->layout = "public_dashboard";
		
		$user_id = $this->Session->read('Auth.User.id');
		
		if(empty($user_id)) {
			$this->Auth->allow('login', 'logout', 'forgot_password', 'register', 'activate_password', 'confirm_register', 'confirm_email_update', 'edit_profile', 'remote_register', 'get_clients', 'get_client_groups');
		} else {
			$this->Auth->allow('login', 'logout', 'forgot_password', 'register', 'activate_password', 'confirm_register', 'confirm_email_update', 'edit_profile', 'toggle_can_answer', 'toggle', 'is_authorized_action', 'dashboard', 'nutricheck_activity', 'check_email_existence', 'delete_report', 'privacy_policy', 'get_performedChecks_dateConstraints', 'get_draftChecks_dateConstraints', 'get_scheduledChecks_dateConstraints');
		}

        $this->User->bindModel(array('belongsTo'=>array(
            'Group' => array(
                'className' => 'AclManagement.Group',
                'foreignKey' => 'group_id',
                'dependent'=>true
            )
        )), false);
    }
    

   /* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
   
	public function privacy_policy() {
		$this->layout = "public_dashboard";
		$behalfUserId = $this->Session->read('behalfUserId');
		$user_group = $this->Session->read('Auth.User.group_id');
		$user_id = 0;
		
		if($user_group == 2) {
			$user_id = $behalfUserId;
		} else {
			$user_id = $this->Session->read('Auth.User.id');
		}
		
		$patient_info = $this->User->findById($user_id);
		$phamacist_info = $this->User->findById($patient_info['User']['parent_id']);
		
		if ($this->request->is('post')) {			
			if(isset($this->request->data['privacyPolicy_confirmation'])) {
				$privacy_confirmation = array();
				$privacy_confirmation['User']['id'] = $user_id;
				
				$privacy_confirmation['User']['confirmed_PrivacyPolicy'] = 1;
				$this->User->save($privacy_confirmation);
				
				//default redirection
				$url_redirection = "http://".$_SERVER['SERVER_NAME']."/questions/nutrient_check";
				
				if(isset($_GET['factors']) && $_GET['factors'] == "true") {
					if(isset($_GET['selected_factors']) && !empty($_GET['selected_factors'])) {
						$url_redirection = "http://".$_SERVER['SERVER_NAME']."/questions/nutrient_check/factors?factors=".$_GET['selected_factors'];
					} else {
						$url_redirection = "http://".$_SERVER['SERVER_NAME']."/questions/nutrient_check/factors";
					}
				} else {
					$url_redirection = "http://".$_SERVER['SERVER_NAME']."/questions/nutrient_check";
				}
				
				$this->redirect($url_redirection);
			} else {
				$this->Session->setFlash('You need to confirm the Privacy Policy to Continue');
			}
		}
		
		$patient_info = $this->User->findById($user_id);
		$phamacist_info = $this->User->findById($patient_info['User']['parent_id']);
		
		$this->set("patient_info", $patient_info);
		$this->set("pharmacist_info", $phamacist_info);
	}
	
	
	/* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
	public function login() {
		App::import('Vendor', 'phpmailer', array('file' => 'phpmailer/class.phpmailer.php'));
		$deactivation = false;
		Configure::load('general');
		session_destroy();
		unset($_COOKIE);
		
		$maximum_attempt = 3;
		$allowed_interval = 15;
		$valid_maximum_attempt = 20;
		
		$this->layout = "ajax";
		if ($this->request->is('post')) {
			
			// ----------------------------------------------------- hack for loging in using username --------------------------------------------------- //
				
				$user_existence = $this->User->user_exist($this->request->data['User']['username']);
				$user_existence_id = $this->User->get_id($this->request->data['User']['username']);
				$user_existence_info = $this->User->findById($user_existence_id);
				
				$data = array(
					"user_id" => $user_existence_id,
					"ip_address" => $_SERVER['REMOTE_ADDR'],
					"datetime" => date("Y-m-d H:i:s")
				);
				
				$existence_performedCheckCount = 0;
				$nonExistence_performedCheckCount = 0;
				
				
				############################################ HANDLING OF LOGIN MULTIPLE ATTEMTPS ######################################
				
					if(!empty($user_existence_id)) {
						$existence_performedCheckCount = $this->User->existence_attempt($data);
					} else {
						$nonExistence_performedCheckCount = $this->User->nonExistence_attempt($data);
					}
					
					
					// ------------------------------------- if account is valid but credentials is incorrect + when t reached the 20x allowed attemps ---------------------------------------- //
					// $existence_performedCheckCount = $valid_maximum_attempt;
					if($existence_performedCheckCount >= $valid_maximum_attempt) {
						$message = "The user with the ID# ".$user_existence_id." has been deactivated due to multiple attemps to login the account";
						
						//disabling of user
						$user_deactivation = array();
						$user_deactivation['User']['status'] = 0;
						$user_deactivation['User']['isDeactivated'] = 1;
						$user_deactivation['User']['id'] = $user_existence_id;
						$this->User->save($user_deactivation);
						
						$to = Configure::read('Admin.email');
						$subject = 'The user has been deactivated';			
						
						$mail = new PHPMailer(); 
						$mail->IsSMTP(); // we are going to use SMTP
						$mail->IsHTML(true);
						$mail->Host = 'smtp.mandrillapp.com';  // Specify main and backup server
						$mail->SMTPAuth = true;                               // Enable SMTP authentication
						$mail->Username = "greg@iquantum.com.au"; 
						$mail->Password = "eB67Z9BR9JWLCUCjsNstjg"; 
						$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

						$mail->From = 'NutriCheck Info <info@nutricheck.com.au>'; 
						// $mail->FromName('info@nutricheck.com.au', 'NutriCheck Info'); 
						// $mail->AddReplyTo("noman@iquantum.com.au", "noman@iquantum.com.au"); 
						$mail->AddAddress($to, $to);
						
						$mail->CharSet  = 'UTF-8'; 
						$mail->WordWrap = 50;  // set word wrap to 50 characters

						$mail->IsHTML(true);  // set email format to HTML 
						
						$mail->Subject = $subject;
						$mail->Body = $message; 
						$mail->Send();
						
						$this->User->remove_existence_attempt_logs($user_existence_id);
						$deactivation = true;
					}
					// ------------------------------------- if account is valid but credentials is incorrect + when t reached the 20x allowed attemps ---------------------------------------- //
					
					
					// ------------------------------------------------------ if account is non existing and it already reaches the 3x attempts -------------------------------------------------------- //
					if($nonExistence_performedCheckCount == $maximum_attempt) {
						$last_access_time = strtotime($this->User->get_last_access_time($_SERVER['REMOTE_ADDR']));
						$current_datetime = strtotime(date("Y-m-d H:i:s"));
						
						$time_difference = round(($current_datetime - $last_access_time)/60);
						$remaining = $allowed_interval - $time_difference;
						
						if($remaining <= 0) {
							$this->User->remove_nonexistence_attempt_logs($_SERVER['REMOTE_ADDR']);
						} else {
							$remaining_errorMessage =  "Please try again after ".$remaining." minute(s)";
						}
					}
					// ------------------------------------------------------ if account is non existing and it already reaches the 3x attempts -------------------------------------------------------- //
					
				
				############################################ HANDLING OF LOGIN MULTIPLE ATTEMTPS ######################################
				

				$this->User->unbindModelAll();
				// $user_existence_username = $this->User->find('first', array('conditions' => array('username' => $this->request->data['User']['email'], 'password' => $this->Auth->password($this->request->data['User']['password']))));
				$user_existence_email = $this->User->find('first', array('conditions' => array('email' => $this->request->data['User']['username'], 'password' => $this->Auth->password($this->request->data['User']['password']))));
				
				// if(!empty($user_existence_username)) {
					// $this->request->data['User']['username'] = $user_existence_username['User']['username'];
				// }
				
				if(!empty($user_existence_email)) {
					$this->request->data['User']['username'] = $user_existence_email['User']['username'];
				}
				
			// ----------------------------------------------------- hack for loging in using username --------------------------------------------------- //
			
			if ($this->Auth->login()) {
				if(isset($_GET['source']) && ($_GET['source'] == "remote")) {					
					echo $this->Session->read('Auth.User.can_answer');
					exit();
				} else {
					return $this->redirect($this->Auth->redirect());
				}
			} else {
				########################################### THIS WILL ONLY HAPPEN IF IT FAILS TO LOGIN ######################################
				
				// if login fails and account is valid
				if($user_existence) {
					if($user_existence_info['User']['status'] == 1) {
						$this->User->existing_user_login_logs($data);
					}
					// if login fails and account is invalid or doesnt exist - will only log 3x times/ the last will be the determining factor to alow attempt again
				} else {
					if($nonExistence_performedCheckCount != $maximum_attempt) {
						$this->User->nonexisting_user_login_logs($data);
					}
				}
				
				########################################### THIS WILL ONLY HAPPEN IF IT FAILS TO LOGIN ######################################
			}
			
			if(isset($_GET['source']) && ($_GET['source'] == "remote")) {
				echo "2";
				exit();
			} else {
				if($deactivation) {
					$this->Session->setFlash(__("This account has been deactivated due to multiple failed attemps. Please contact your administrator"));
				} else {				
					if(isset($remaining_errorMessage)) {
						$this->Session->setFlash(__($remaining_errorMessage));
					} else {
						if(($user_existence_info['User']['isDeactivated'] == 1) && ($user_existence_info['User']['status'] == 0)) {
							$this->Session->setFlash(__("This account has been deactivated due to multiple failed attemps. Please contact your administrator"));
						} else {
							$this->Session->setFlash(__('Invalid username or password, try again'));
						}
					}
				}
			}
		}
	}
	
	
    /* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
    function logout() {
		$this->Session->destroy();
        $this->Session->setFlash('Good-Bye', 'alert/success');
        $this->redirect($this->Auth->logout());
    }
    
	
	/* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
    public function index() {
        $user_info = $this->Session->read('Auth.User');
		
		$this->set('title', __('Users'));
        $this->set('description', __('Manage Users'));

        $this->User->recursive = 1;
        
		$condition = array();
		// if not admin then will filter the viewing of users
		
		if($this->request->is('post')) {
			
			/* ------------------------------------------------------------ IF SUBMIT BUTTON IS HIT ------------------------------------------------------------*/
			if(!empty($this->request->data['User']['value'])) {
				if(!isset($this->request->data['User']['reset'])) {
					$this->Session->write('User.search', $this->request->data['User']['value']);
				}
			}
			
			/* ------------------------------------------------------------ IF RESET BUTTON IS HIT ------------------------------------------------------------*/
			if(isset($this->request->data['User']['reset'])) {
				$this->Session->delete('User.search');
			}
		}
		
		/* ----------------------------------------------------------------------------------------- PAGINATION WITH SEARCH VALUE ------------------------------------------------------------------------*/
		
		$search_value = $this->Session->read('User.search');
		
		if(!empty($search_value)) {
			
			if($user_info['group_id'] != 1) {
				
				if($user_info['group_id'] == 5) {
					
					if($_GET['mode'] == "client_group") {
						
						if(isset($_GET['parent_id']) && !empty($_GET['parent_id'])) {
							$and_condition = array('User.group_affiliation_id' => $_GET['parent_id'], 'User.group_id' => 4);
						} else {	
							$and_condition = array('User.group_affiliation_id' => $user_info['id'], 'User.group_id' => 4);
						}
						
					} else if($_GET['mode'] == "client") {
						
						$flatten_client_groups = $this->get_client_groups($user_info['id']);					
						
						if(isset($_GET['parent_id']) && !empty($_GET['parent_id'])) {
							$and_condition = array('User.client_group_id' => $_GET['parent_id'], 'User.group_id' => 2);
						} else {
							if($flatten_client_groups) {
								$and_condition = array('User.client_group_id' => $flatten_client_groups, 'User.group_id' => 2);
							} else {
								$and_condition = array('User.client_group_id' => 0, 'User.group_id' => 2);
							}
						}
						
					} else {
						$flatten_clients = $this->get_clients($user_info['id'], null);
						
						if(isset($_GET['parent_id']) && !empty($_GET['parent_id'])) {
							$and_condition = array('User.parent_id' => $_GET['parent_id'], 'User.group_id' => 3);
						} else {
							if($flatten_clients) {
								$and_condition = array('User.parent_id' => $flatten_clients, 'User.group_id' => 3);
							} else {
								$and_condition = array('User.parent_id' => 0, 'User.group_id' => 3);
							}
						}
					}
					
					$this->paginate = array(
						'conditions' => array(
							'or' => array (
								'User.email LIKE "%'.$search_value.'%"',
								'User.username LIKE "%'.$search_value.'%"',
								'UserProfile.first_name LIKE "%'.$search_value.'%"',
								'UserProfile.last_name LIKE "%'.$search_value.'%"',
								'UserProfile.address LIKE "%'.$search_value.'%"',
								'UserProfile.suburb LIKE "%'.$search_value.'%"',
								'UserProfile.company LIKE "%'.$search_value.'%"',
								'UserProfile.nationality LIKE "%'.$search_value.'%"',
								'UserProfile.zip LIKE "%'.$search_value.'%"',
								'UserProfile.gender LIKE "%'.$search_value.'%"'
							),
							'and' => $and_condition
						), 
						'order' => array('User.first_name' => 'ASC'),
						'limit' => 10
					);
					
				} else if($user_info['group_id'] == 4) {
					
					if(isset($_GET['parent_id']) && !empty($_GET['parent_id'])) {
						if($_GET['mode'] == "client") {
							$and_condition = array('User.client_group_id' => $_GET['parent_id'], 'User.group_id' => 2);
						}
					} else {
						if($_GET['mode'] == "client") {
							$and_condition = array('User.client_group_id' => $user_info['id'], 'User.group_id' => 2);
						} else {
							$flatten_clients = $this->get_clients($user_info['id'], null);
							$and_condition = array('User.parent_id' => $flatten_clients, 'User.group_id' => 3);
						}
					}
					
					$this->paginate = array(
						'conditions' => array(
							'or' => array (
								'User.email LIKE "%'.$search_value.'%"',
								'User.username LIKE "%'.$search_value.'%"',
								'UserProfile.first_name LIKE "%'.$search_value.'%"',
								'UserProfile.last_name LIKE "%'.$search_value.'%"',
								'UserProfile.address LIKE "%'.$search_value.'%"',
								'UserProfile.suburb LIKE "%'.$search_value.'%"',
								'UserProfile.company LIKE "%'.$search_value.'%"',
								'UserProfile.nationality LIKE "%'.$search_value.'%"',
								'UserProfile.zip LIKE "%'.$search_value.'%"',
								'UserProfile.gender LIKE "%'.$search_value.'%"'
							),
							'and' => $and_condition
						), 
						'order' => array('User.first_name' => 'ASC'),
						'limit' => 10
					);
					
				} else {
					
					$this->paginate = array(
						'conditions' => array(
							'or' => array (
								'User.email LIKE "%'.$search_value.'%"',
								'User.username LIKE "%'.$search_value.'%"',
								'UserProfile.first_name LIKE "%'.$search_value.'%"',
								'UserProfile.last_name LIKE "%'.$search_value.'%"',
								'UserProfile.address LIKE "%'.$search_value.'%"',
								'UserProfile.suburb LIKE "%'.$search_value.'%"',
								'UserProfile.company LIKE "%'.$search_value.'%"',
								'UserProfile.nationality LIKE "%'.$search_value.'%"',
								'UserProfile.zip LIKE "%'.$search_value.'%"',
								'UserProfile.gender LIKE "%'.$search_value.'%"'
							),
							'and' => array('User.parent_id' => $user_info['id'])
						), 
						'order' => array('User.first_name' => 'ASC'),
						'limit' => 10
					);
				}
				
			} else {
				if($user_info['group_id'] == 1) {
					if($_GET['mode'] == "client_group") {
						if(isset($_GET['parent_id']) && !empty($_GET['parent_id'])) {
							$and_condition = array('User.group_affiliation_id' => $_GET['parent_id'], 'User.group_id' => 4);
						}
					} else if($_GET['mode'] == "client") {
						if(isset($_GET['parent_id']) && !empty($_GET['parent_id'])) {
							$and_condition = array('User.client_group_id' => $_GET['parent_id'], 'User.group_id' => 2);
						}
					} else {
						if(isset($_GET['parent_id']) && !empty($_GET['parent_id'])) {
							$and_condition = array('User.parent_id' => $_GET['parent_id'], 'User.group_id' => 2);
						}
					}
				}
				
				$this->paginate = array(
					'conditions' => array(
						'or' => array (
							'User.email LIKE "%'.$search_value.'%"',
							'User.username LIKE "%'.$search_value.'%"',
							'UserProfile.first_name LIKE "%'.$search_value.'%"',
							'UserProfile.last_name LIKE "%'.$search_value.'%"',
							'UserProfile.address LIKE "%'.$search_value.'%"',
							'UserProfile.suburb LIKE "%'.$search_value.'%"',
							'UserProfile.company LIKE "%'.$search_value.'%"',
							'UserProfile.nationality LIKE "%'.$search_value.'%"',
							'UserProfile.zip LIKE "%'.$search_value.'%"',
							'UserProfile.gender LIKE "%'.$search_value.'%"'
						),
						'and' => $and_condition
					), 
					'order' => array('User.first_name' => 'ASC'),
					'limit' => 10
				);
			}
		
		/* ------------------------------------------------------------------------------------------- DEFAULT PAGINATION HERE ----------------------------------------------------------------------------------*/
		
		} else {		
			if($user_info['group_id'] != 1) {
				if(isset($_GET['parent_id']) && !empty($_GET['parent_id'])) {
					$condition = array('User.parent_id' => $_GET['parent_id'], 'User.group_id' => 3);
				} else {
					$condition = array('User.parent_id' => $user_info['id'], 'User.group_id' => 3);
				}
			} else {
				if($user_info['group_id'] == 1) {
					if($_GET['mode'] == "client_group") {
						if(isset($_GET['parent_id']) && !empty($_GET['parent_id'])) {
							$condition = array('User.group_affiliation_id' => $_GET['parent_id'], 'User.group_id' => 4);
						}
					} else if($_GET['mode'] == "client") {
						if(isset($_GET['parent_id']) && !empty($_GET['parent_id'])) {
							$condition = array('User.client_group_id' => $_GET['parent_id'], 'User.group_id' => 2);
						}
					} else {
						if(isset($_GET['parent_id']) && !empty($_GET['parent_id'])) {
							$condition = array('User.parent_id' => $_GET['parent_id'], 'User.group_id' => 3);
						}
					}
				}
			}
			
			if($user_info['group_id'] == 5) {
				
				if($_GET['mode'] == "client_group") {
					
					if(isset($_GET['parent_id']) && !empty($_GET['parent_id'])) {
						$condition = array('User.group_affiliation_id' => $_GET['parent_id'], 'User.group_id' => 4);
					} else {
						$condition = array('User.group_affiliation_id' => $user_info['id'], 'User.group_id' => 4);
					}
					
				} else if($_GET['mode'] == "client") {
					
					$flatten_client_groups = $this->get_client_groups($user_info['id']);					
					
					if(isset($_GET['parent_id']) && !empty($_GET['parent_id'])) {
						$condition = array('User.client_group_id' => $_GET['parent_id'], 'User.group_id' => 2);
					} else {
						if($flatten_client_groups) {
							$condition = array('User.client_group_id' => $flatten_client_groups, 'User.group_id' => 2);
						} else {
							$condition = array('User.client_group_id' => 0, 'User.group_id' => 2);
						}
					}
				} else {
					$flatten_clients = $this->get_clients($user_info['id'], null);
					if(isset($_GET['parent_id']) && !empty($_GET['parent_id'])) {
						$condition = array('User.parent_id' => $_GET['parent_id'], 'User.group_id' => 3);
					} else {
						if($flatten_clients) {
							$condition = array('User.parent_id' => $flatten_clients, 'User.group_id' => 3);
						} else {
							$condition = array('User.parent_id' => 0, 'User.group_id' => 3);
						}
					}
				}
			}
			
			
			if($user_info['group_id'] == 4) {
				
				if($_GET['mode'] == "client") {
					if(isset($_GET['parent_id']) && !empty($_GET['parent_id'])) {
						$condition = array('User.client_group_id' => $_GET['parent_id'], 'User.group_id' => 2);
					} else {
						$condition = array('User.client_group_id' => $user_info['id'], 'User.group_id' => 2);
					}
				} else {
					if(isset($_GET['parent_id']) && !empty($_GET['parent_id'])) {
						$condition = array('User.parent_id' => $_GET['parent_id'], 'User.group_id' => 3);
					} else {
						$flatten_clients = $this->get_clients($user_info['id'], null);
						
						if($flatten_clients) {
							$condition = array('User.parent_id' => $flatten_clients, 'User.group_id' => 3);
						} else {
							$condition = array('User.parent_id' => 0, 'User.group_id' => 3);
						}
					}
				}
			}
			
			$this->paginate = array(
				'limit' => 10
			);
		}
		
		if(isset($_GET['parent_id']) && !empty($_GET['parent_id'])) {
			$parent_info = $this->User->findById($_GET['parent_id']);
			$this->set('parent_info', $parent_info);
		}
		
		$users = $this->paginate($condition);
        $this->set('search_value', $search_value);
        $this->set('users', $users);
    }
	
	
	/* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
	function get_clients($id) {
		$user_group_id = $this->Session->read('Auth.User.group_id');
		
		// if group_affiliation
		if($user_group_id == 5) {
			// pulling of all client_groups under group_affiliation - currently logged in
			$this->User->unbindModelAll();
			$client_groups = $this->User->find('all', 
				array(
					'fields' => array('id'), 
					'conditions' => array('User.group_affiliation_id' => $id)
				)
			);
			
			$flatten_client_groups = array();
			foreach($client_groups as $key => $client_group) {
				$flatten_client_groups[$key] = $client_group['User']['id'];
			}
			
			
			if($flatten_client_groups) {
				// pulling of clients under 					
				$clients = $this->User->find('all', 
					array(
						'fields' => array('id'), 
						'conditions' => array('User.client_group_id' => $flatten_client_groups)
					)
				);
				
				$flatten_clients = array();
				foreach($clients as $key => $client) {
					$flatten_clients[$key] = $client['User']['id'];
				}
			} else {
				$flatten_clients = array();
			}
		}
		
		// if client groups
		if($user_group_id == 4) {
			// pulling of clients under 					
			$clients = $this->User->find('all', 
				array(
					'fields' => array('id'), 
					'conditions' => array('User.client_group_id' => $id)
				)
			);
			
			if($clients) {
				$flatten_clients = array();
				foreach($clients as $key => $client) {
					$flatten_clients[$key] = $client['User']['id'];
				}
			} else {
				$flatten_clients = array();
			}
		}	
			
		return $flatten_clients;
	}	
	
	/* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
	function get_scheduledChecks_dateConstraints($month = false) {
		$this->loadModel('UserAlert');
		
		$post = $_POST;
		
		$user_id = $this->Session->read('Auth.User.id');
		$group_id = $this->Session->read('Auth.User.group_id');
		
		$total_month_days = date("t");
		$first_day_if_the_month = date('Y-m-1');
		$last_day_if_the_month = date('Y-m')."-".$total_month_days;
		
		if($group_id != 1) {
			$members = $this->get_members($user_id);
		}
		
		if($month) {
			if(!empty($members)) {				
				if($group_id != 1) {
					$scheduled_checks = $this->UserAlert->find('count', array('conditions' => array('UserAlert.alert_date >=' => $first_day_if_the_month, 'UserAlert.alert_date <=' => $last_day_if_the_month, 'UserAlert.user_id' => $members)));
				} else {
					$scheduled_checks = $this->UserAlert->find('count', array('conditions' => array('UserAlert.alert_date >=' => $first_day_if_the_month, 'UserAlert.alert_date <=' => $last_day_if_the_month)));
				}
				return $scheduled_checks;
			} else {
				if($group_id == 1) {
					$scheduled_checks = $this->UserAlert->find('count', array('conditions' => array('UserAlert.alert_date >=' => $first_day_if_the_month, 'UserAlert.alert_date <=' => $last_day_if_the_month)));
					return $scheduled_checks;
				} else {
					return "0";
				}
			}
		} else {		
			if(!empty($members)) {
				if($group_id != 1) {
					$scheduled_checks = $this->UserAlert->find('count', array('conditions' => array('UserAlert.alert_date >=' => $post['start_date'], 'UserAlert.alert_date <=' => $post['end_date'], 'UserAlert.user_id' => $members)));
				} else {
					$scheduled_checks = $this->UserAlert->find('count', array('conditions' => array('UserAlert.alert_date >=' => $post['start_date'], 'UserAlert.alert_date <=' => $post['end_date'])));
				}
				echo $scheduled_checks;
			} else {
				if($group_id == 1) {
					$scheduled_checks = $this->UserAlert->find('count', array('conditions' => array('UserAlert.alert_date >=' => $post['start_date'], 'UserAlert.alert_date <=' => $post['end_date'])));
					echo $scheduled_checks;
				} else {
					echo "0";
				}
			}
		}
		
		exit();
	}
	
	/* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
	function get_draftChecks_dateConstraints($month = false) {
		$this->loadModel('PerformedCheck');
		
		$post = $_POST;
		
		$user_id = $this->Session->read('Auth.User.id');
		$group_id = $this->Session->read('Auth.User.group_id');
		
		$total_month_days = date("t");
		$first_day_if_the_month = date('Y-m-1');
		$last_day_if_the_month = date('Y-m')."-".$total_month_days;
		
		if($group_id != 1) {
			$members = $this->get_members($user_id);
		}
		
		if($month) {
			if(!empty($members)) {
				if($group_id != 1) {
					$performed_checks = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 0, 'PerformedCheck.status' => 1, 'PerformedCheck.date >=' => $first_day_if_the_month, 'PerformedCheck.date <=' => $last_day_if_the_month, 'PerformedCheck.user_id' => $members)));
				} else {
					$performed_checks = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 0, 'PerformedCheck.status' => 1, 'PerformedCheck.date >=' => $first_day_if_the_month, 'PerformedCheck.date <=' => $last_day_if_the_month)));
				}
				return $performed_checks;
			} else {
				if($group_id == 1) {
					$performed_checks = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 0, 'PerformedCheck.status' => 1, 'PerformedCheck.date >=' => $first_day_if_the_month, 'PerformedCheck.date <=' => $last_day_if_the_month)));
					
					return $performed_checks;
				} else {
					return "0";
				}
			}
		} else {
			if(!empty($members)) {
				if($group_id != 1) {
					$performed_checks = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 0, 'PerformedCheck.status' => 1, 'PerformedCheck.date >=' => $post['start_date'], 'PerformedCheck.date <=' => $post['end_date'], 'PerformedCheck.user_id' => $members)));
				} else {
					$performed_checks = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 0, 'PerformedCheck.status' => 1, 'PerformedCheck.date >=' => $post['start_date'], 'PerformedCheck.date <=' => $post['end_date'])));
				}
				echo $performed_checks;
			} else {
				if($group_id == 1) {
					$performed_checks = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 0, 'PerformedCheck.status' => 1, 'PerformedCheck.date >=' => $post['start_date'], 'PerformedCheck.date <=' => $post['end_date'])));
					echo $performed_checks;
				} else {
					echo "0";
				}
			}
		}
		exit();

	}
	
	/* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
	function get_performedChecks_dateConstraints($month = false) {
		$this->loadModel('PerformedCheck');
		
		$post = $_POST;
		
		$user_id = $this->Session->read('Auth.User.id');
		$group_id = $this->Session->read('Auth.User.group_id');
		
		$total_month_days = date("t");
		$first_day_if_the_month = date('Y-m-1');
		$last_day_if_the_month = date('Y-m')."-".$total_month_days;
		
		if($group_id != 1) {
			$members = $this->get_members($user_id);
		}
		
		$first_day_if_the_month = date('Y-m-1');
		$last_day_if_the_month = date('Y-m')."-".$total_month_days;
		
		if($month) {
			if(!empty($members)) {				
				if($group_id != 1) {
					$performed_checks = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.status' => 1, 'PerformedCheck.completion_time >=' => strtotime($first_day_if_the_month), 'PerformedCheck.completion_time <=' => strtotime($last_day_if_the_month), 'PerformedCheck.user_id' => $members)));
				} else {
					$performed_checks = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.status' => 1, 'PerformedCheck.completion_time >=' => strtotime($first_day_if_the_month), 'PerformedCheck.completion_time <=' => strtotime($last_day_if_the_month))));
				}
				
				return $performed_checks;
			} else {
				
				if($group_id == 1) {
					$performed_checks = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.status' => 1, 'PerformedCheck.completion_time >=' => strtotime($first_day_if_the_month), 'PerformedCheck.completion_time <=' => strtotime($last_day_if_the_month))));
					return $performed_checks;
				} else {
					return "0";
				}
			}
		} else {
			if(!empty($members)) {
				if($group_id != 1) {
					$performed_checks = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.status' => 1, 'PerformedCheck.completion_time >=' => strtotime($post['start_date']), 'PerformedCheck.completion_time <=' => strtotime($post['end_date']), 'PerformedCheck.user_id' => $members)));
				} else {
					$performed_checks = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.status' => 1, 'PerformedCheck.completion_time >=' => strtotime($post['start_date']), 'PerformedCheck.completion_time <=' => strtotime($post['end_date']))));
				}
				echo $performed_checks;
			} else {
				if($group_id == 1) {
					$performed_checks = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.status' => 1, 'PerformedCheck.completion_time >=' => strtotime($post['start_date']), 'PerformedCheck.completion_time <=' => strtotime($post['end_date']))));
					echo $performed_checks;
				} else {
					echo "0";
				}
			}
		}
		
		exit();
	}
	
	/* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
	function get_members($id) {
		$user_id = $this->Session->read('Auth.User.id');
		$group_id = $this->Session->read('Auth.User.group_id');
		
		
		$this->User->unbindModelAll();
		
		if($group_id != 2) {
			$flatten_clients = $this->get_clients($user_id);
			$condition = array('User.parent_id' => $flatten_clients);
		} else {
			$condition = array('User.parent_id' => $user_id);
		}
		
		$members = $this->User->find('all', array('fields' => array('id', 'id'), 'conditions' => $condition));
		
		$flatten_members = array();
		foreach($members as $member_key => $member) {
			$flatten_members[$member_key] = $member['User']['id'];
		}
		
		return $flatten_members;
	}
	
	/* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
	function get_client_groups($id) {
		// pulling of all client_groups under group_affiliation - currently logged in
		$this->User->unbindModelAll();
		$client_groups = $this->User->find('all', 
			array(
				'fields' => array('id'), 
				'conditions' => array('User.group_affiliation_id' => $id)
			)
		);
		
		
		if($client_groups) {
			$flatten_client_groups = array();
			foreach($client_groups as $key => $client_group) {
				$flatten_client_groups[$key] = $client_group['User']['id'];
			}
		} else {
			$flatten_client_groups = array();
		}
		
		return $flatten_client_groups;
	}


    /* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'), 'alert/error');
        }
        $this->set('user', $this->User->read(null, $id));
    }

	
    /* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
   public function add() {
		App::import('Vendor', 'phpmailer', array('file' => 'phpmailer/class.phpmailer.php'));
		$this->layout = "public_dashboard";
		$message = "";
		
		$user_info = $this->Session->read('Auth.User');
		$user_data_info = $this->Question->User->findById($user_id);
		
		$company = $user_data_info['UserProfile']['company'];
		$source_email = $user_data_info['UserProfile']['company'];
		
		if ($this->request->is('post')) {
			
			$birthday = $this->request->data['UserProfile']['birthday']['year']."-".$this->request->data['UserProfile']['birthday']['month']."-".$this->request->data['UserProfile']['birthday']['day'];
			$age = round(abs(time() - strtotime($birthday))/31536000);
			
			if($age <= 12) {
				return $this->Session->setFlash("Ages 12 and below isn't allowed in the system");
			}
			
			$suffix = $this->randomNumber(4);
			$username = str_replace(" ", "", $this->request->data['UserProfile']['first_name']).str_replace(" ", "", $this->request->data['UserProfile']['last_name']).$suffix;
			
			if($this->request->data['User']['group_id'] == 2) {
				$username = $this->request->data['UserProfile']['company'].$suffix;
				$this->request->data['User']['username'] = $username;
			
			} else if($this->request->data['User']['group_id'] == 4) {
				$username = $this->request->data['UserProfile']['company-client'].$suffix;
				$this->request->data['User']['username'] = $username;
				$this->request->data['UserProfile']['company'] = $this->request->data['UserProfile']['company-client'];
			
			} else if($this->request->data['User']['group_id'] == 5) {
				$username = $this->request->data['UserProfile']['company-group'].$suffix;
				$this->request->data['User']['username'] = $username;
				$this->request->data['UserProfile']['company'] = $this->request->data['UserProfile']['company-group'];
			
			} else {
				$this->request->data['User']['username'] = $username;
			}
			
			if(!empty($this->request->data['User']['email'])) {
				$email = $this->request->data['User']['email'];
				$this->User->unbindModelAll();
				$user_existence = $this->User->find('first', 
					array(
						'conditions' => array(
							'email' => $email
							// , 'status' => 1
						)
					)
				);
			}
			
			if(isset($user_existence) && !empty($user_existence)) {
				$this->Session->setFlash(__('The email submitted already exist'), 'alert/error');
			} else {
				$this->loadModel('AclManagement.User');
				
				if($user_info['group_id'] != 1 && $user_info['group_id'] != 4 && $user_info['group_id'] != 5)  {
					$this->request->data['User']['status'] = 0;
					$this->request->data['User']['group_id'] = 3;
				}
				
				if(isset($this->request->data['create_and_answer'])) {
					$this->Session->write('isCreateAnswer', 1);
					$this->request->data['User']['status'] = 1;
				}
				
				$to_hash = time();
				$this->request->data['User']['hash_value'] = $this->Auth->password($to_hash);
				
				// default password if the create and answer was pressed
				if(isset($this->request->data['create_and_answer'])) {
					$this->request->data['User']['password'] = "nutriPass";
				}
				
				$raw_password = $this->request->data['User']['password'];
				
				$this->User->create();
				if ($this->User->save($this->request->data)) {
					
					if(!isset($this->request->data['create_and_answer'])) {
						
						// if the member email is present then will send it to his/her email address - else it will be sent over to the pharmacists email address
						if(empty($this->request->data['User']['email'])) {
							if($this->Session->read('Auth.User.group_id') == 2) {
								$to = $this->Session->read('Auth.User.email');
							} else {
								$parent_id = $this->request->data['User']['parent_id'];
								$parent_info = $this->User->findById($parent_id);
								$email = $parent_info['User']['email'];
							}
							
						} else {
							$email = $this->request->data['User']['email'];
						}
						
						if(!empty($email)) {
							
							// alerting the created user about the creation of his/her account - only if email address exists
							$mail = new PHPMailer(); 
							$mail->IsSMTP(); // we are going to use SMTP
							$mail->IsHTML(true);
							$mail->Host = 'smtp.mandrillapp.com';  // Specify main and backup server
							$mail->SMTPAuth = true;                               // Enable SMTP authentication
							$mail->Username = "greg@iquantum.com.au"; 
							$mail->Password = "eB67Z9BR9JWLCUCjsNstjg"; 
							$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

							$mail->From = "Nutricheck Info <noreply@nutricheck.com.au>";
							// $mail->FromName('info@nutricheck.com.au', 'NutriCheck Info'); 
							$mail->AddReplyTo("noreply@iquantum.com.au", "noreply@iquantum.com.au");
							$mail->AddAddress($email, $email);
							
							$mail->CharSet  = 'UTF-8'; 
							$mail->WordWrap = 50;  // set word wrap to 50 characters

							$mail->IsHTML(true);  // set email format to HTML 
							
							$sender_details = "<br /><br /><h4>Sender Details</h4><br /><strong>Company: </strong>".$company"<br />Email: ".$email;
							$mail->Subject = "You've been added to the system";
							$url = "http://".$_SERVER['SERVER_NAME']."/users/edit_profile?hash_value=".$this->request->data['User']['hash_value'];
							$message .= "You've been added to the system. Please complete all of your information by clicking <a href=". $url .">here</a><br><br><strong>Username:</strong> ".$username."<br><strong>Password:</strong> ".$raw_password.$sender_details;
							$mail->Body    = $message; 
							
							$mail->Send();
						}
					}
					
					$user_id = $this->User->id;
					$this->request->data['UserProfile']['user_id'] = $user_id;
					
					// saving user profile side by side with user creation
					$this->User->UserProfile->create();
					$this->User->UserProfile->save($this->request->data);
					
					if(isset($this->request->data['create_and_answer'])) {
						$this->Session->write('behalfUserId', $user_id);
						$this->redirect('../../questions/nutrient_check');
					} else {
						$this->Session->setFlash(__('The user has been saved'), 'alert/success');
						$this->redirect(array('action' => 'index'));
					}
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'alert/error');
				}
			}
        }
		
		$pharmacists = $this->pharmacists();
		$client_groups = $this->user_type(4);
		$group_affiliations = $this->user_type(5);
		
		if($user_info['group_id'] != 1) {
			if($user_info['group_id'] == 5) {
				$groups = $this->User->Group->find('list', array('conditions' => array('id !=' => array('1', '5'))));
			}
			
			if($user_info['group_id'] == 4) {
				$groups = $this->User->Group->find('list', array('conditions' => array('id !=' => array('1', '4', '5'))));
			}
		} else {
			$groups = $this->User->Group->find('list', array('conditions' => array('id !=' => 1)));
		}
		
        $this->set("user_info", $user_info);
        $this->set(compact('groups', 'pharmacists', 'client_groups', 'group_affiliations'));
    }

	
	/* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
    public function edit($id = null) {
		$group_id = $this->Session->read('Auth.User.id');
		$user_info = $this->Session->read('Auth.User');
		
		if($group_id != 1) {
			if(!$this->is_authorized_parent($id)) {
				$this->Session->setFlash(__("You're not authorized to update that user"), 'alert/error');
				$this->redirect(array('action' => 'index'));
			}
		}
		
		$this->User->id = $id;
		if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
		
        if ($this->request->is('post') || $this->request->is('put')) {
			
			$birthday = $this->request->data['UserProfile']['birthday']['year']."-".$this->request->data['UserProfile']['birthday']['month']."-".$this->request->data['UserProfile']['birthday']['day'];
			$age = round(abs(time() - strtotime($birthday))/31536000);
			
			if($age <= 12) {
				return $this->Session->setFlash("Ages 12 and below isn't allowed in the system");
			}
			
			$email = $this->request->data['User']['email'];
			$old_email = $this->request->data['User']['old_email'];
			
			$user_existence = array();
			if($email != $old_email) {					
				if(!empty($email)) {
					$this->User->unbindModelAll();
					$user_existence = $this->User->findAllByEmail($email);
				}
			}
			
			if(count($user_existence) > 0) {
				$this->Session->setFlash(__('The email submitted already exist'), 'alert/error');
			} else {
				
				if($this->request->data['User']['group_id'] == 4) {
					$this->request->data['UserProfile']['company'] = $this->request->data['UserProfile']['company-client'];
				} else if($this->request->data['User']['group_id'] == 5) {
					$this->request->data['UserProfile']['company'] = $this->request->data['UserProfile']['company-group'];
				}

				if ($this->User->save($this->request->data)) {
				
					$this->request->data['UserProfile']['user_id'] = $this->request->data['User']['id'];
					
					if(empty($this->request->data['UserProfile']['id'])) {
						$this->User->UserProfile->create();
					}
					
					if($this->User->UserProfile->save($this->request->data)) {
						$this->Session->setFlash(__('The user has been updated'), 'alert/success');
					} else {
						$this->Session->setFlash(__("Something went wront"), 'alert/error');
					}
					
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'alert/error');
				}
			}
        } 
		
		$this->request->data = $this->User->read(null, $id);
		$this->request->data['User']['password'] = null;
		
		if(!empty($id) && isset($id)) {
			$userprofile_info = $this->User->UserProfile->findByUserId($id);
			$this->request->data['UserProfile'] = $userprofile_info['UserProfile'];
			// $this->Session->write('Auth.User.UserProfile', $userprofile_info['UserProfile']);
		}
		
		$pharmacists = $this->pharmacists();
		$client_groups = $this->user_type(4);
		$group_affiliations = $this->user_type(5);

		if($user_info['group_id'] != 1) {
			if($user_info['group_id'] == 5) {
				$groups = $this->User->Group->find('list', array('conditions' => array('id !=' => array('1', '5'))));
			}
			
			if($user_info['group_id'] == 4) {
				$groups = $this->User->Group->find('list', array('conditions' => array('id !=' => array('1', '4', '5'))));
			}
		} else {
			$groups = $this->User->Group->find('list', array('conditions' => array('id !=' => 1)));
		}
		
        $this->set(compact('groups', 'pharmacists', 'client_groups', 'group_affiliations'));
		$this->set('user_info', $user_info);
    }

	
	/* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'), 'alert/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'), 'alert/error');
        $this->redirect(array('action' => 'index'));
    }

	
	/* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
    public function toggle($user_id, $status) {
        $this->layout = "ajax";
        $status = ($status) ? 0 : 1;
        $this->set(compact('user_id', 'status'));
		
		if ($user_id) {
            if($status == 1) {
				$data = array();
				$data['User']['id'] = $user_id;
				$data['User']['isDeactivated'] = 0;
				$this->User->query("UPDATE users SET isDeactivated = 0 WHERE id = '".$user_id."'");
			}
        }
		
        if ($user_id) {
            $data['User'] = array('id'=>$user_id, 'status'=>$status);
            $allowed = $this->User->saveAll($data["User"], array('validate'=>false));
        }
    }
	
	/* CUSTOM CODE for allowing/disallwing users to answer the nutrient check */
    public function toggle_can_answer($user_id, $can_answer) {
        App::import('Vendor', 'phpmailer', array('file' => 'phpmailer/class.phpmailer.php'));
		Configure::load('general');
		
		$this->layout = "ajax";
        $can_answer = ($can_answer) ? 0 : 1;
        $this->set(compact('user_id', 'can_answer'));
		
        if ($user_id) {
            $data = array();
			$data['User']['id'] = $user_id;
			$data['User']['can_answer'] = $can_answer;
			$data['User']['confirmed_PrivacyPolicy'] = 0;			
			$this->User->query("UPDATE users SET can_answer = '".$can_answer."', confirmed_PrivacyPolicy = '0' WHERE id = '".$user_id."'");
        }
		
		if($can_answer == 1) {
			$user_info = $this->User->findById($user_id);
			$email_message = Configure::read('User.nutricheck_activated_message');
			
			$email = $user_info['User']['email'];
			
			$mail = new PHPMailer(); 
			$mail->IsSMTP(); // we are going to use SMTP
			$mail->IsHTML(true);
			$mail->Host = 'smtp.mandrillapp.com';  // Specify main and backup server
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = "greg@iquantum.com.au"; 
			$mail->Password = "eB67Z9BR9JWLCUCjsNstjg"; 
			$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

			$mail->From = 'NutriCheck Info <info@nutricheck.com.au>'; 
			// $mail->FromName('info@nutricheck.com.au', 'NutriCheck Info'); 
			// $mail->AddReplyTo("noman@iquantum.com.au", "noman@iquantum.com.au"); 
			$mail->AddAddress($email, $email);
			
			$mail->CharSet  = 'UTF-8'; 
			$mail->WordWrap = 50;  // set word wrap to 50 characters

			$mail->IsHTML(true);  // set email format to HTML 
			
			$mail->Subject = "Reactivation of NutriCheck";
			$mail->Body    = $email_message; 
			
			if($mail->Send()) {
				// echo "1"
			} else {
				return $mail->ErrorInfo; 
			}
		}
		
		if(isset($_GET['source'])) {
			echo "1";
			exit();
		}
    }


	/* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
    public function register() {
		App::import('Vendor', 'phpmailer', array('file' => 'phpmailer/class.phpmailer.php'));
        if ($this->request->is('post')) {
            $this->loadModel('AclManagement.User');
            $this->User->create();
			
			$this->request->data['User']['name'] = $this->request->data['UserProfile']['first_name']." ".$this->request->data['UserProfile']['last_name'];
            $this->request->data['User']['group_id']    = 3;//member
			$this->request->data['User']['can_answer']      = 0;//can't answer
            $this->request->data['User']['status']      = 0;//inactive user
			
			$user_profile_info = array();
			$user_profile_info['UserProfile'] = $this->request->data['UserProfile'];
			$raw_password = $this->request->data['User']['password2'];
			
            $token = md5(time());
            $this->request->data['User']['hash_value'] = $token;//key
			
            if ($this->User->save($this->request->data)) {
		   
				$email = $this->request->data['User']['email'];
				$subject = "You've been added to the system";
				
				$mail = new PHPMailer(); 
				$mail->IsSMTP(); // we are going to use SMTP
				$mail->IsHTML(true);
				$mail->Host = 'smtp.mandrillapp.com';  // Specify main and backup server
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = "greg@iquantum.com.au"; 
				$mail->Password = "eB67Z9BR9JWLCUCjsNstjg"; 
				$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
				
				$mail->From = 'NutriCheck Info <info@nutricheck.com.au>'; 
				// $mail->FromName('info@nutricheck.com.au', 'NutriCheck Info'); 
				// $mail->AddReplyTo("noman@iquantum.com.au", "noman@iquantum.com.au"); 
				$mail->AddAddress($email, $email);
				
				$mail->CharSet  = 'UTF-8'; 
				$mail->WordWrap = 50;  // set word wrap to 50 characters

				$mail->IsHTML(true);  // set email format to HTML 
				
				$mail->Subject = $subject;
				
				$url = "http://".$_SERVER['SERVER_NAME']."/users/edit_profile?hash_value=".$this->request->data['User']['hash_value'];
				$message .= "You've been added to the system. Please complete all of your information by clicking <a href=". $url .">here</a><br><br><strong>Password:</strong> ".$raw_password;
				$mail->Body    = $message; 
				
				if($mail->Send()) {
					// return true;
				} else {
					return $mail->ErrorInfo; 
				}
				
                $this->Session->setFlash(__("An Activation email has been sent to your nominated email address. If you're having trouble locating it please check your Spam or Junk folders as the notification email might have been moved due to your Spam Settings"), 'alert/success');
                $this->request->data = null;
				
				
				$user_id = $this->User->id;
				$user_profile_info['UserProfile']['user_id'] = $user_id;
				
				
				$this->User->UserProfile->create();
				if($this->User->UserProfile->save($user_profile_info)) {
					$this->redirect(array('action' => 'login'));
					
					/* $user = $this->User->findById($user_id);
					$user = $user['User'];
					if($this->Auth->login($user)) {
						$this->redirect('/users/nutricheck_activity');
					} else {
						$this->Session->setFlash(__('Failed to auto-login'), 'alert/error');
					} */
					
				}
				
				
            } else {
                $this->Session->setFlash(__('Register could not be completed. Please, try again.'), 'alert/error');
                $this->redirect(array('action' => 'login'));
            }
        }
		
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

	/* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
    public function confirm_register($ident=null, $activate=null) {//echo $ident.'  '.$activate;
        $return = $this->User->confirmRegister($ident, $activate);
        if ($return) {
            $this->Session->setFlash(__('Congrats! Register Completed.'), 'alert/success');
            $this->redirect(array('action' => 'login'));
        } else {
            $this->Session->setFlash(__('Something went wrong. Please, check your information.'), 'alert/error');
        }
    }
    
	
	/* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
    public function forgot_password() {
        if ($this->request->is('post')) {
            //$this->autoRender = false;
            $email = $this->request->data["User"]["email"];
            if ($this->User->forgotPassword($email)) {
                $this->Session->setFlash(__('Please check your email for instructions on resetting your password.'), 'alert/success');
                $this->redirect(array('action' => 'login'));
            } else {
                $this->Session->setFlash(__('Your email is invalid or not registered.'), 'alert/error');
            }
        }
    }
    
	
	/* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
    public function activate_password($ident=null, $activate=null, $expiredTime) {//echo $ident.'  '.$activate;
        $nowTime = strtotime(date('Y-m-d H:i'));
        if(empty($expiredTime) || $nowTime > $expiredTime){
            $this->Session->setFlash(__('Your link had been expired.'), 'alert/error');
            $this->redirect(array('action' => 'login'));
        }

        if ($this->request->is('post')) {
            if (!empty($this->request->data['User']['ident']) && !empty($this->request->data['User']['activate'])) {
                $this->set('ident', $this->request->data['User']['ident']);
                $this->set('activate', $this->request->data['User']['activate']);

                $return = $this->User->activatePassword($this->request->data);
                if ($return) {
                    $this->User->set($this->request->data);
                    if ($this->User->validates()) {
                        $this->request->data['User']['id'] = $this->request->data['User']['ident'];
                        if($this->User->saveAll($this->request->data['User'], array('validate'=>false))){
                            $this->Session->setFlash(__('New password is saved.'), 'alert/success');
                            $this->redirect(array('action' => 'login'));
                        }
                    }else{
                        $errors = $this->User->validationErrors;
                        $this->Session->setFlash(__('Error Occur!'), 'alert/error');
                    }
                } else {
                    $this->Session->setFlash(__('Sorry password could not be saved. Please check your email and click the password reset link again.'), 'alert/error');
                }
            }
        }
        $this->set(compact('ident', 'activate'));
    }

	
    /* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
    public function edit_profile() {
		
		$hash = "";
		$user_id = $this->Session->read('Auth.User.id');
		$alert_password = false;
		
		if(isset($_GET['hash_value'])) {
			$hash = $_GET['hash_value'];
			
			if($hash != $this->Session->read('Auth.User.hash_value')) {
				session_destroy();
			}
		} else {
			// if hash vale is empty and the not logged in (you're unauthorized)
			if(empty($user_id)) {
				$this->Session->setFlash(__("You're not allowed to access that location"), 'alert/error');
				$this->redirect(array('action' => 'login'));
			}
		}		
		
		if(!empty($hash)) {
			$user_info = $this->User->findByHashValue($hash);		
			
			if($user_info['User']['status'] == 0) {	
				$user = $user_info['User'];
				
				unset($user_info['User']['password']);
				$user_info['User']['status'] = 1;
				$this->User->save($user_info);
				
				if(!$this->Auth->login($user)) {
					$this->Session->setFlash(__('Failed to auto-login'), 'alert/error');
				} else {
					$alert_password = true;
					$user_id = $user['id'];
				}
			} else {
				if(empty($user_id)) {
					$this->Session->setFlash(__("Accessing this link is no longer permitted"), 'alert/error');
					$this->redirect(array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'login'));
				}
			}
		}
		
		
        if ($this->request->is('post') || $this->request->is('put')) {
		
			$birthday = $this->request->data['UserProfile']['birthday']['year']."-".$this->request->data['UserProfile']['birthday']['month']."-".$this->request->data['UserProfile']['birthday']['day'];
			$age = round(abs(time() - strtotime($birthday))/31536000);
			
			if($age <= 12) {
				return $this->Session->setFlash("Ages 12 and below isn't allowed in the system");
			}
            
			if(!empty($this->request->data['User']['password']) || !empty($this->request->data['User']['password2'])){
                //do nothing
            }else{
                //do not check password validate
                unset($this->request->data['User']['password']);
            }
			
            if ($this->User->validates()) {
				
                if($this->User->save($this->request->data)) {
					if(empty($this->request->data['UserProfile']['id'])) {
						$this->request->data['UserProfile']['user_id'] = $this->User->id;
						$this->User->UserProfile->create();
					}
					
					if($this->User->UserProfile->save($this->request->data)) {					
						$this->Session->setFlash(__('Congrats! Your profile has been updated successfully'), 'alert/success');
						$this->redirect(array('action' => 'dashboard'));
					} else {
						$this->Session->setFlash(__('Something wen\'t wrong'), 'alert/error');
					}
                }
            } else{
                $errors = $this->User->validationErrors;
                $this->Session->setFlash(__('Something went wrong. Please, check your information.'), 'alert/error');
            }

        }else{
            $this->request->data = $this->User->read(null, $user_id);
            $this->request->data['User']['password'] = '';
        }
		
		if(!empty($user_id) && isset($user_id)) {
			$userprofile_info = $this->User->UserProfile->findByUserId($user_id);
			$this->request->data['UserProfile'] = $userprofile_info['UserProfile'];
			$this->Session->write('Auth.User.UserProfile', $userprofile_info['UserProfile']);
		}
		
		$this->set("alert_password", $alert_password);
		$this->User->set($this->request->data);
    }
	
	
	/* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
    public function confirm_email_update($id=null, $email=null, $expiredTime=null) {
        $nowTime = strtotime(date('Y-m-d H:i'));
        if(empty($expiredTime) || $nowTime > $expiredTime){
            $this->Session->setFlash(__('Your link had been expired.'), 'alert/error');
            $this->redirect(array('action' => 'login'));
        }

        $email = base64_decode($email);
        if(Validation::email($email)){
            $checkExistId = $this->User->find('count', array('conditions'=>array('User.id' => $id)));
            $checkExistEmail = $this->User->find('count', array('conditions'=>array('User.email' => $email)));

            if ($checkExistId > 0 && $checkExistEmail <= 0) {
                $this->request->data['User']['id'] = $id;
                $this->request->data['User']['email'] = $email;
                $this->User->saveAll($this->request->data, array('validate'=>false));
                $this->Auth->logout();
                $this->Session->setFlash(__('Email updated. Now, you can login with new email.'), 'alert/success');
                $this->redirect(array('action' => 'login'));
            }
        }

        $this->Session->setFlash(__('Something went wrong. Sorry for any inconvenience.'), 'alert/error');
        $this->redirect(array('action' => 'login'));
    }
	
	
	
	##############################################################################################################################################
	
	 /*
		CUSTOM FUNCTION HERE - THIS CAME FROM THE CORE USERS CONTROLLER FILE
	 */
	
	##############################################################################################################################################
	
	public function dashboard() {
		$this->loadModel('Factor');
		$this->loadModel('Video');
		$this->loadModel('PerformedCheck');
		$this->layout = "public_dashboard";
		$user_info = $this->Session->read('Auth.User');
		
		$user_id = $this->Session->read('Auth.User.id');
		$group_id = $this->Session->read('Auth.User.group_id'); 
		
		$members = array();
		
		if($group_id == 2) {
			$members = $this->User->find('list', array('fields' => array('id', 'id'), 'conditions' => array('parent_id' => $user_id)));
		} else {
			if($group_id == 4 || $group_id == 4) {
				$clients = $this->get_clients($user_id);
				$members = $this->User->find('list', array('fields' => array('id', 'id'), 'conditions' => array('parent_id' => $clients)));
			}
		}
		
		#################################################### GETTING THE NUMBER OF COMPLETED NUTRICHECK LAST WEEK ##########################################

		$previous_year_toggle = false;
		
		$today_m = date('m');
		$today_d = date('d');
		$today_y = date('Y');
			
		$date_current = mktime(0, 0, 0, $today_m, $today_d, $today_y); 
		$week_current = (int)date('W', $date_current);

		$previous_week = $week_current - 1;

		// to handle previous year's last week - if will not do this, then it will return 1970-01-01
		if($previous_week == 0) {
			$previous_week = 53;
			$previous_year_toggle = true;
		}

		# added 0 for week numbers less than 10 to compute correctly
		if($previous_week < 10) {
			$previous_week = "0".$previous_week;
		}
		
		// 0, 6 = Sunday, Saturday
		$start_day_of_the_prev_week = strtotime($today_y."-W".$previous_week."-0");
		$end_day_of_the_prev_week = strtotime($today_y."-W".$previous_week."-6");

		if($previous_year_toggle) {
			$start_day_of_the_prev_week = strtotime($start_day_of_the_prev_week." -1 year");
			$end_day_of_the_prev_week = strtotime($end_day_of_the_prev_week." -1 year");
		}
		
		$first_day = $start_day_of_the_prev_week;
		$second_day = strtotime(date('Y-m-d', $start_day_of_the_prev_week)." +2 day");
		$third_day = strtotime(date('Y-m-d', $start_day_of_the_prev_week)." +3 day");
		$fourth_day = strtotime(date('Y-m-d', $start_day_of_the_prev_week)." +4 day");
		$fifth_day = strtotime(date('Y-m-d', $start_day_of_the_prev_week)." +5 day");
		$sixth_day = strtotime(date('Y-m-d', $start_day_of_the_prev_week)." +6 day");
		$seventh_day = $end_day_of_the_prev_week;
		$eight_day = strtotime(date('Y-m-d', $end_day_of_the_prev_week)." +1 day");
	
		$report_stats_last_week = array();
	
		$this->PerformedCheck->unbindModelAll();
		$total_report_stats_last_week = 0;
		
		if($group_id == 1) {
			$total_report_stats_last_week = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $first_day, 'PerformedCheck.completion_time <' => $eight_day)));

			$report_stats_last_week[1]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $first_day, 'PerformedCheck.completion_time <' => $second_day)));
			$report_stats_last_week[1]['percentage'] = ($report_stats_last_week[1]['count']/$total_report_stats_last_week) * 100;
			$report_stats_last_week[1]['date'] = date("d/m", $first_day);
			
			$report_stats_last_week[2]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $second_day, 'PerformedCheck.completion_time <' => $third_day)));
			$report_stats_last_week[2]['percentage'] = ($report_stats_last_week[2]['count']/$total_report_stats_last_week) * 100;
			$report_stats_last_week[2]['date'] = date("d/m", $second_day);
			
			$report_stats_last_week[3]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $third_day, 'PerformedCheck.completion_time <' => $fourth_day)));
			$report_stats_last_week[3]['percentage'] = ($report_stats_last_week[3]['count']/$total_report_stats_last_week) * 100;
			$report_stats_last_week[3]['date'] = date("d/m", $third_day);
			
			$report_stats_last_week[4]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $fourth_day, 'PerformedCheck.completion_time <' => $fifth_day)));
			$report_stats_last_week[4]['percentage'] = ($report_stats_last_week[4]['count']/$total_report_stats_last_week) * 100;
			$report_stats_last_week[4]['date'] = date("d/m", $fourth_day);
			
			$report_stats_last_week[5]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $fifth_day, 'PerformedCheck.completion_time <' => $sixth_day)));
			$report_stats_last_week[5]['percentage'] = ($report_stats_last_week[5]['count']/$total_report_stats_last_week) * 100;
			$report_stats_last_week[5]['date'] = date("d/m", $fifth_day);
			
			$report_stats_last_week[6]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $sixth_day, 'PerformedCheck.completion_time <' => $seventh_day)));
			$report_stats_last_week[6]['percentage'] = ($report_stats_last_week[6]['count']/$total_report_stats_last_week) * 100;
			$report_stats_last_week[6]['date'] = date("d/m", $sixth_day);
			
			$report_stats_last_week[7]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $seventh_day, 'PerformedCheck.completion_time <' => $eight_day)));
			$report_stats_last_week[7]['percentage'] = ($report_stats_last_week[7]['count']/$total_report_stats_last_week) * 100;
			$report_stats_last_week[7]['date'] = date("d/m", $seventh_day);
		
		} else {
			if($group_id != 3) {
				$total_report_stats_last_week = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $first_day, 'PerformedCheck.completion_time <' => $eight_day)));

				$report_stats_last_week[1]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $first_day, 'PerformedCheck.completion_time <' => $second_day)));
				$report_stats_last_week[1]['percentage'] = ($report_stats_last_week[1]['count']/$total_report_stats_last_week) * 100;
				$report_stats_last_week[1]['date'] = date("d/m", $first_day);
				
				$report_stats_last_week[2]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $second_day, 'PerformedCheck.completion_time <' => $third_day)));
				$report_stats_last_week[2]['percentage'] = ($report_stats_last_week[2]['count']/$total_report_stats_last_week) * 100;
				$report_stats_last_week[2]['date'] = date("d/m", $second_day);
				
				$report_stats_last_week[3]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $third_day, 'PerformedCheck.completion_time <' => $fourth_day)));
				$report_stats_last_week[3]['percentage'] = ($report_stats_last_week[3]['count']/$total_report_stats_last_week) * 100;
				$report_stats_last_week[3]['date'] = date("d/m", $third_day);
				
				$report_stats_last_week[4]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $fourth_day, 'PerformedCheck.completion_time <' => $fifth_day)));
				$report_stats_last_week[4]['percentage'] = ($report_stats_last_week[4]['count']/$total_report_stats_last_week) * 100;
				$report_stats_last_week[4]['date'] = date("d/m", $fourth_day);
				
				$report_stats_last_week[5]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $fifth_day, 'PerformedCheck.completion_time <' => $sixth_day)));
				$report_stats_last_week[5]['percentage'] = ($report_stats_last_week[5]['count']/$total_report_stats_last_week) * 100;
				$report_stats_last_week[5]['date'] = date("d/m", $fifth_day);
				
				$report_stats_last_week[6]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $sixth_day, 'PerformedCheck.completion_time <' => $seventh_day)));
				$report_stats_last_week[6]['percentage'] = ($report_stats_last_week[6]['count']/$total_report_stats_last_week) * 100;
				$report_stats_last_week[6]['date'] = date("d/m", $sixth_day);
				
				$report_stats_last_week[7]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $seventh_day, 'PerformedCheck.completion_time <' => $eight_day)));
				$report_stats_last_week[7]['percentage'] = ($report_stats_last_week[7]['count']/$total_report_stats_last_week) * 100;
				$report_stats_last_week[7]['date'] = date("d/m", $seventh_day);
			}
		}
		
		
		#################################################### GETTING THE NUMBER OF COMPLETED NUTRICHECK LAST WEEK ##########################################




		#################################################### GETTING THE NUMBER OF COMPLETED NUTRICHECK LAST 30 DAYS ##########################################

		$current_day = date('Y-m-d');
		$tomorrow = strtotime(date('Y-m-d'), " +1 day");
		$date = new DateTime($current_day);
		$date->sub(new DateInterval('P30D'));
		$thirty_days_ago = strtotime($date->format('Y-m-d'));

		$thr_first_day = $thirty_days_ago;
		$thr_second_day = strtotime(date('Y-m-d', $thirty_days_ago)." +2 day");
		$thr_third_day = strtotime(date('Y-m-d', $thirty_days_ago)." +3 day");
		$thr_fourth_day = strtotime(date('Y-m-d', $thirty_days_ago)." +4 day");
		$thr_fifth_day = strtotime(date('Y-m-d', $thirty_days_ago)." +5 day");
		$thr_sixth_day = strtotime(date('Y-m-d', $thirty_days_ago)." +6 day");
		$thr_seventh_day = strtotime(date('Y-m-d', $thirty_days_ago)." +7 day");
		$thr_eight_day = strtotime(date('Y-m-d', $thirty_days_ago)." +8 day");
		$thr_nineth_day = strtotime(date('Y-m-d', $thirty_days_ago)." +9 day");
		$thr_tenth_day = strtotime(date('Y-m-d', $thirty_days_ago)." +10 day");
		$thr_eleventh_day = strtotime(date('Y-m-d', $thirty_days_ago)." +11 day");
		$thr_twelfth_day = strtotime(date('Y-m-d', $thirty_days_ago)." +12 day");
		$thr_thirteenth_day = strtotime(date('Y-m-d', $thirty_days_ago)." +13 day");
		$thr_fourteenth_day = strtotime(date('Y-m-d', $thirty_days_ago)." +14 day");
		$thr_fifteenth_day = strtotime(date('Y-m-d', $thirty_days_ago)." +15 day");
		$thr_sixteenth_day = strtotime(date('Y-m-d', $thirty_days_ago)." +16 day");
		$thr_seventeenth_day = strtotime(date('Y-m-d', $thirty_days_ago)." +17 day");
		$thr_eighteenth_day = strtotime(date('Y-m-d', $thirty_days_ago)." +18 day");
		$thr_nineteenth_day = strtotime(date('Y-m-d', $thirty_days_ago)." +19 day");
		$thr_twentieth_day = strtotime(date('Y-m-d', $thirty_days_ago)." +20 day");
		$thr_twenty_first_day = strtotime(date('Y-m-d', $thirty_days_ago)." +21 day");
		$thr_twenty_second_day = strtotime(date('Y-m-d', $thirty_days_ago)." +22 day");
		$thr_twenty_third_day = strtotime(date('Y-m-d', $thirty_days_ago)." +23 day");
		$thr_twenty_fourth_day = strtotime(date('Y-m-d', $thirty_days_ago)." +24 day");
		$thr_twenty_fifth_day = strtotime(date('Y-m-d', $thirty_days_ago)." +25 day");
		$thr_twenty_sixth_day = strtotime(date('Y-m-d', $thirty_days_ago)." +26 day");
		$thr_twenty_seventh_day = strtotime(date('Y-m-d', $thirty_days_ago)." +27 day");
		$thr_twenty_eight_day = strtotime(date('Y-m-d', $thirty_days_ago)." +28 day");
		$thr_twenty_nineth_day = strtotime(date('Y-m-d', $thirty_days_ago)." +29 day");
		$thr_thirtieth_day = strtotime(date('Y-m-d', $thirty_days_ago)." +30 day");
		$thr_thirty_first_day = strtotime(date('Y-m-d', $thirty_days_ago)." +31 day");

		$total_report_stats_last_thirty_days = 0;
		
		if($group_id == 1) {
			$total_report_stats_last_thirty_days = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_first_day, 'PerformedCheck.completion_time <' => $thr_thirty_first_day)));

			$report_stats_last_thirty_days[1]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_first_day, 'PerformedCheck.completion_time <' => $thr_second_day)));
			$report_stats_last_thirty_days[1]['percentage'] = ($report_stats_last_thirty_days[1]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[1]['date'] = date("d/m", $thr_first_day);
			
			$report_stats_last_thirty_days[2]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_second_day, 'PerformedCheck.completion_time <' => $thr_third_day)));
			$report_stats_last_thirty_days[2]['percentage'] = ($report_stats_last_thirty_days[2]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[2]['date'] = date("d/m", $thr_second_day);

			$report_stats_last_thirty_days[3]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_third_day, 'PerformedCheck.completion_time <' => $thr_fourth_day)));
			$report_stats_last_thirty_days[3]['percentage'] = ($report_stats_last_thirty_days[3]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[3]['date'] = date("d/m", $thr_third_day);

			$report_stats_last_thirty_days[4]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_fourth_day, 'PerformedCheck.completion_time <' => $thr_fifth_day)));
			$report_stats_last_thirty_days[4]['percentage'] = ($report_stats_last_thirty_days[4]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[4]['date'] = date("d/m", $thr_fourth_day);

			$report_stats_last_thirty_days[5]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_fifth_day, 'PerformedCheck.completion_time <' => $thr_sixth_day)));
			$report_stats_last_thirty_days[5]['percentage'] = ($report_stats_last_thirty_days[5]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[5]['date'] = date("d/m", $thr_fifth_day);

			$report_stats_last_thirty_days[6]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_sixth_day, 'PerformedCheck.completion_time <' => $thr_seventh_day)));
			$report_stats_last_thirty_days[6]['percentage'] = ($report_stats_last_thirty_days[6]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[6]['date'] = date("d/m", $thr_sixth_day);

			$report_stats_last_thirty_days[7]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_seventh_day, 'PerformedCheck.completion_time <' => $thr_eight_day)));
			$report_stats_last_thirty_days[7]['percentage'] = ($report_stats_last_thirty_days[7]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[7]['date'] = date("d/m", $thr_seventh_day);

			$report_stats_last_thirty_days[8]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_eight_day, 'PerformedCheck.completion_time <' => $thr_nineth_day)));
			$report_stats_last_thirty_days[8]['percentage'] = ($report_stats_last_thirty_days[8]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[8]['date'] = date("d/m", $thr_eight_day);

			$report_stats_last_thirty_days[9]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_nineth_day, 'PerformedCheck.completion_time <' => $thr_tenth_day)));
			$report_stats_last_thirty_days[9]['percentage'] = ($report_stats_last_thirty_days[9]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[9]['date'] = date("d/m", $thr_nineth_day);

			$report_stats_last_thirty_days[10]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_tenth_day, 'PerformedCheck.completion_time <' => $thr_eleventh_day)));
			$report_stats_last_thirty_days[10]['percentage'] = ($report_stats_last_thirty_days[10]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[10]['date'] = date("d/m", $thr_tenth_day);

			$report_stats_last_thirty_days[11]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_eleventh_day, 'PerformedCheck.completion_time <' => $thr_twelfth_day)));
			$report_stats_last_thirty_days[11]['percentage'] = ($report_stats_last_thirty_days[11]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[11]['date'] = date("d/m", $thr_eleventh_day);

			$report_stats_last_thirty_days[12]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_twelfth_day, 'PerformedCheck.completion_time <' => $thr_thirteenth_day)));		
			$report_stats_last_thirty_days[12]['percentage'] = ($report_stats_last_thirty_days[12]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[12]['date'] = date("d/m", $thr_twelfth_day);

			$report_stats_last_thirty_days[13]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_thirteenth_day, 'PerformedCheck.completion_time <' => $thr_fourteenth_day)));
			$report_stats_last_thirty_days[13]['percentage'] = ($report_stats_last_thirty_days[12]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[13]['date'] = date("d/m", $thr_thirteenth_day);

			$report_stats_last_thirty_days[14]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_fourteenth_day, 'PerformedCheck.completion_time <' => $thr_fifteenth_day)));
			$report_stats_last_thirty_days[14]['percentage'] = ($report_stats_last_thirty_days[14]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[14]['date'] = date("d/m", $thr_fourteenth_day);

			$report_stats_last_thirty_days[15]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_fifteenth_day, 'PerformedCheck.completion_time <' => $thr_sixteenth_day)));
			$report_stats_last_thirty_days[15]['percentage'] = ($report_stats_last_thirty_days[15]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[15]['date'] = date("d/m", $thr_fifteenth_day);

			$report_stats_last_thirty_days[16]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_sixteenth_day, 'PerformedCheck.completion_time <' => $thr_seventeenth_day)));
			$report_stats_last_thirty_days[16]['percentage'] = ($report_stats_last_thirty_days[16]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[16]['date'] = date("d/m", $thr_sixteenth_day);

			$report_stats_last_thirty_days[17]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_seventeenth_day, 'PerformedCheck.completion_time <' => $thr_eighteenth_day)));
			$report_stats_last_thirty_days[17]['percentage'] = ($report_stats_last_thirty_days[17]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[17]['date'] = date("d/m", $thr_seventeenth_day);

			$report_stats_last_thirty_days[18]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_eighteenth_day, 'PerformedCheck.completion_time <' => $thr_nineteenth_day)));
			$report_stats_last_thirty_days[18]['percentage'] = ($report_stats_last_thirty_days[18]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[18]['date'] = date("d/m", $thr_eighteenth_day);

			$report_stats_last_thirty_days[19]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_nineteenth_day, 'PerformedCheck.completion_time <' => $thr_twentieth_day)));
			$report_stats_last_thirty_days[19]['percentage'] = ($report_stats_last_thirty_days[19]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[19]['date'] = date("d/m", $thr_nineteenth_day);

			$report_stats_last_thirty_days[20]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_twentieth_day, 'PerformedCheck.completion_time <' => $thr_twenty_first_day)));
			$report_stats_last_thirty_days[20]['percentage'] = ($report_stats_last_thirty_days[20]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[20]['date'] = date("d/m", $thr_twentieth_day);

			$report_stats_last_thirty_days[21]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_twenty_first_day, 'PerformedCheck.completion_time <' => $thr_twenty_second_day)));
			$report_stats_last_thirty_days[21]['percentage'] = ($report_stats_last_thirty_days[21]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[21]['date'] = date("d/m", $thr_twenty_first_day);

			$report_stats_last_thirty_days[22]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_twenty_second_day, 'PerformedCheck.completion_time <' => $thr_twenty_third_day)));
			$report_stats_last_thirty_days[22]['percentage'] = ($report_stats_last_thirty_days[22]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[22]['date'] = date("d/m", $thr_twenty_second_day);

			$report_stats_last_thirty_days[23]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_twenty_third_day, 'PerformedCheck.completion_time <' => $thr_twenty_fourth_day)));
			$report_stats_last_thirty_days[23]['percentage'] = ($report_stats_last_thirty_days[23]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[23]['date'] = date("d/m", $thr_twenty_third_day);

			$report_stats_last_thirty_days[24]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_twenty_fourth_day, 'PerformedCheck.completion_time <' => $thr_twenty_fifth_day)));
			$report_stats_last_thirty_days[24]['percentage'] = ($report_stats_last_thirty_days[24]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[24]['date'] = date("d/m", $thr_twenty_fourth_day);

			$report_stats_last_thirty_days[25]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_twenty_fifth_day, 'PerformedCheck.completion_time <' => $thr_twenty_sixth_day)));
			$report_stats_last_thirty_days[25]['percentage'] = ($report_stats_last_thirty_days[25]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[25]['date'] = date("d/m", $thr_twenty_fifth_day);

			$report_stats_last_thirty_days[26]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_twenty_sixth_day, 'PerformedCheck.completion_time <' => $thr_twenty_seventh_day)));
			$report_stats_last_thirty_days[26]['percentage'] = ($report_stats_last_thirty_days[26]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[26]['date'] = date("d/m", $thr_twenty_sixth_day);

			$report_stats_last_thirty_days[27]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_twenty_seventh_day, 'PerformedCheck.completion_time <' => $thr_twenty_eight_day)));
			$report_stats_last_thirty_days[27]['percentage'] = ($report_stats_last_thirty_days[27]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[27]['date'] = date("d/m", $thr_twenty_seventh_day);

			$report_stats_last_thirty_days[28]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_twenty_eight_day, 'PerformedCheck.completion_time <' => $thr_twenty_nineth_day)));
			$report_stats_last_thirty_days[28]['percentage'] = ($report_stats_last_thirty_days[28]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[28]['date'] = date("d/m", $thr_twenty_eight_day);

			$report_stats_last_thirty_days[29]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_twenty_nineth_day, 'PerformedCheck.completion_time <' => $thr_thirtieth_day)));
			$report_stats_last_thirty_days[29]['percentage'] = ($report_stats_last_thirty_days[29]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[29]['date'] = date("d/m", $thr_twenty_nineth_day);

			$report_stats_last_thirty_days[30]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1,'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_thirtieth_day, 'PerformedCheck.completion_time <' => $thr_thirty_first_day)));
			$report_stats_last_thirty_days[30]['percentage'] = ($report_stats_last_thirty_days[30]['count']/$total_report_stats_last_thirty_days) * 100;
			$report_stats_last_thirty_days[30]['date'] = date("d/m", $thr_thirtieth_day);
		
		} else {
			if($group_id != 3) {
				$total_report_stats_last_thirty_days = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_first_day, 'PerformedCheck.completion_time <' => $thr_thirty_first_day)));

				$report_stats_last_thirty_days[1]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_first_day, 'PerformedCheck.completion_time <' => $thr_second_day)));
				$report_stats_last_thirty_days[1]['percentage'] = ($report_stats_last_thirty_days[1]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[1]['date'] = date("d/m", $thr_first_day);

				$report_stats_last_thirty_days[2]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_second_day, 'PerformedCheck.completion_time <' => $thr_third_day)));
				$report_stats_last_thirty_days[2]['percentage'] = ($report_stats_last_thirty_days[2]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[2]['date'] = date("d/m", $thr_second_day);

				$report_stats_last_thirty_days[3]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_third_day, 'PerformedCheck.completion_time <' => $thr_fourth_day)));
				$report_stats_last_thirty_days[3]['percentage'] = ($report_stats_last_thirty_days[3]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[3]['date'] = date("d/m", $thr_third_day);

				$report_stats_last_thirty_days[4]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_fourth_day, 'PerformedCheck.completion_time <' => $thr_fifth_day)));
				$report_stats_last_thirty_days[4]['percentage'] = ($report_stats_last_thirty_days[4]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[4]['date'] = date("d/m", $thr_fourth_day);

				$report_stats_last_thirty_days[5]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_fifth_day, 'PerformedCheck.completion_time <' => $thr_sixth_day)));
				$report_stats_last_thirty_days[5]['percentage'] = ($report_stats_last_thirty_days[5]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[5]['date'] = date("d/m", $thr_fifth_day);

				$report_stats_last_thirty_days[6]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_sixth_day, 'PerformedCheck.completion_time <' => $thr_seventh_day)));
				$report_stats_last_thirty_days[6]['percentage'] = ($report_stats_last_thirty_days[6]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[6]['date'] = date("d/m", $thr_sixth_day);

				$report_stats_last_thirty_days[7]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_seventh_day, 'PerformedCheck.completion_time <' => $thr_eight_day)));
				$report_stats_last_thirty_days[7]['percentage'] = ($report_stats_last_thirty_days[7]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[7]['date'] = date("d/m", $thr_seventh_day);

				$report_stats_last_thirty_days[8]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_eight_day, 'PerformedCheck.completion_time <' => $thr_nineth_day)));
				$report_stats_last_thirty_days[8]['percentage'] = ($report_stats_last_thirty_days[8]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[8]['date'] = date("d/m", $thr_eight_day);

				$report_stats_last_thirty_days[9]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_nineth_day, 'PerformedCheck.completion_time <' => $thr_tenth_day)));
				$report_stats_last_thirty_days[9]['percentage'] = ($report_stats_last_thirty_days[9]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[9]['date'] = date("d/m", $thr_nineth_day);

				$report_stats_last_thirty_days[10]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_tenth_day, 'PerformedCheck.completion_time <' => $thr_eleventh_day)));
				$report_stats_last_thirty_days[10]['percentage'] = ($report_stats_last_thirty_days[10]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[10]['date'] = date("d/m", $thr_tenth_day);

				$report_stats_last_thirty_days[11]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_eleventh_day, 'PerformedCheck.completion_time <' => $thr_twelfth_day)));
				$report_stats_last_thirty_days[11]['percentage'] = ($report_stats_last_thirty_days[11]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[11]['date'] = date("d/m", $thr_eleventh_day);

				$report_stats_last_thirty_days[12]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_twelfth_day, 'PerformedCheck.completion_time <' => $thr_thirteenth_day)));		
				$report_stats_last_thirty_days[12]['percentage'] = ($report_stats_last_thirty_days[12]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[12]['date'] = date("d/m", $thr_twelfth_day);

				$report_stats_last_thirty_days[13]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_thirteenth_day, 'PerformedCheck.completion_time <' => $thr_fourteenth_day)));
				$report_stats_last_thirty_days[13]['percentage'] = ($report_stats_last_thirty_days[12]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[13]['date'] = date("d/m", $thr_thirteenth_day);

				$report_stats_last_thirty_days[14]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_fourteenth_day, 'PerformedCheck.completion_time <' => $thr_fifteenth_day)));
				$report_stats_last_thirty_days[14]['percentage'] = ($report_stats_last_thirty_days[14]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[14]['date'] = date("d/m", $thr_fourteenth_day);

				$report_stats_last_thirty_days[15]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_fifteenth_day, 'PerformedCheck.completion_time <' => $thr_sixteenth_day)));
				$report_stats_last_thirty_days[15]['percentage'] = ($report_stats_last_thirty_days[15]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[15]['date'] = date("d/m", $thr_fifteenth_day);

				$report_stats_last_thirty_days[16]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_sixteenth_day, 'PerformedCheck.completion_time <' => $thr_seventeenth_day)));
				$report_stats_last_thirty_days[16]['percentage'] = ($report_stats_last_thirty_days[16]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[16]['date'] = date("d/m", $thr_sixteenth_day);

				$report_stats_last_thirty_days[17]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_seventeenth_day, 'PerformedCheck.completion_time <' => $thr_eighteenth_day)));
				$report_stats_last_thirty_days[17]['percentage'] = ($report_stats_last_thirty_days[17]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[17]['date'] = date("d/m", $thr_seventeenth_day);

				$report_stats_last_thirty_days[18]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_eighteenth_day, 'PerformedCheck.completion_time <' => $thr_nineteenth_day)));
				$report_stats_last_thirty_days[18]['percentage'] = ($report_stats_last_thirty_days[18]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[18]['date'] = date("d/m", $thr_eighteenth_day);

				$report_stats_last_thirty_days[19]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_nineteenth_day, 'PerformedCheck.completion_time <' => $thr_twentieth_day)));
				$report_stats_last_thirty_days[19]['percentage'] = ($report_stats_last_thirty_days[19]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[19]['date'] = date("d/m", $thr_nineteenth_day);

				$report_stats_last_thirty_days[20]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_twentieth_day, 'PerformedCheck.completion_time <' => $thr_twenty_first_day)));
				$report_stats_last_thirty_days[20]['percentage'] = ($report_stats_last_thirty_days[20]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[20]['date'] = date("d/m", $thr_twentieth_day);

				$report_stats_last_thirty_days[21]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_twenty_first_day, 'PerformedCheck.completion_time <' => $thr_twenty_second_day)));
				$report_stats_last_thirty_days[21]['percentage'] = ($report_stats_last_thirty_days[21]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[21]['date'] = date("d/m", $thr_twenty_first_day);

				$report_stats_last_thirty_days[22]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_twenty_second_day, 'PerformedCheck.completion_time <' => $thr_twenty_third_day)));
				$report_stats_last_thirty_days[22]['percentage'] = ($report_stats_last_thirty_days[22]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[22]['date'] = date("d/m", $thr_twenty_second_day);

				$report_stats_last_thirty_days[23]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_twenty_third_day, 'PerformedCheck.completion_time <' => $thr_twenty_fourth_day)));
				$report_stats_last_thirty_days[23]['percentage'] = ($report_stats_last_thirty_days[23]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[23]['date'] = date("d/m", $thr_twenty_third_day);

				$report_stats_last_thirty_days[24]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_twenty_fourth_day, 'PerformedCheck.completion_time <' => $thr_twenty_fifth_day)));
				$report_stats_last_thirty_days[24]['percentage'] = ($report_stats_last_thirty_days[24]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[24]['date'] = date("d/m", $thr_twenty_fourth_day);

				$report_stats_last_thirty_days[25]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_twenty_fifth_day, 'PerformedCheck.completion_time <' => $thr_twenty_sixth_day)));
				$report_stats_last_thirty_days[25]['percentage'] = ($report_stats_last_thirty_days[25]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[25]['date'] = date("d/m", $thr_twenty_fifth_day);

				$report_stats_last_thirty_days[26]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_twenty_sixth_day, 'PerformedCheck.completion_time <' => $thr_twenty_seventh_day)));
				$report_stats_last_thirty_days[26]['percentage'] = ($report_stats_last_thirty_days[26]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[26]['date'] = date("d/m", $thr_twenty_sixth_day);

				$report_stats_last_thirty_days[27]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_twenty_seventh_day, 'PerformedCheck.completion_time <' => $thr_twenty_eight_day)));
				$report_stats_last_thirty_days[27]['percentage'] = ($report_stats_last_thirty_days[27]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[27]['date'] = date("d/m", $thr_twenty_seventh_day);

				$report_stats_last_thirty_days[28]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_twenty_eight_day, 'PerformedCheck.completion_time <' => $thr_twenty_nineth_day)));
				$report_stats_last_thirty_days[28]['percentage'] = ($report_stats_last_thirty_days[28]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[28]['date'] = date("d/m", $thr_twenty_eight_day);

				$report_stats_last_thirty_days[29]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_twenty_nineth_day, 'PerformedCheck.completion_time <' => $thr_thirtieth_day)));
				$report_stats_last_thirty_days[29]['percentage'] = ($report_stats_last_thirty_days[29]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[29]['date'] = date("d/m", $thr_twenty_nineth_day);

				$report_stats_last_thirty_days[30]['count'] = $this->PerformedCheck->find('count', array('conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $members, 'PerformedCheck.completion_time !=' => "", 'PerformedCheck.completion_time >=' => $thr_thirtieth_day, 'PerformedCheck.completion_time <' => $thr_thirty_first_day)));
				$report_stats_last_thirty_days[30]['percentage'] = ($report_stats_last_thirty_days[30]['count']/$total_report_stats_last_thirty_days) * 100;
				$report_stats_last_thirty_days[30]['date'] = date("d/m", $thr_thirtieth_day);
			}
		}
		
		#################################################### GETTING THE NUMBER OF COMPLETED NUTRICHECK LAST 30 DAYS ##########################################

		$behalfUserId = $this->Session->read('behalfUserId');
		$selected_user = $this->User->findById($behalfUserId);
		
		if($user_info['group_id'] == 2) {
			$user_condition = array('User.parent_id' => $user_info['id'], 'User.hash_value !=' => "", 'User.status' => 1);
		} else {
			$user_condition = array('User.group_id' => 3, 'User.hash_value !=' => "", 'User.status' => 1);
		}
		
		$factor_list = $this->Factor->find('list', array('fields' => array('id', 'name')));
		$user_list = $this->User->find('list', array('fields' => array('hash_value', 'id'), 'conditions' => $user_condition));
		
		foreach($user_list as $key => $user_id) {
			$user_profile = $this->User->UserProfile->find('first', array('conditions' => array('user_id' => $user_id), 'fields' => array('first_name', 'last_name')));
			if(empty($user_profile['UserProfile']['first_name']) && empty($user_profile['UserProfile']['last_name'])) {
				unset($user_list[$key]);
			} else {
				$user_list[$key] = $user_profile['UserProfile']['first_name']." ".$user_profile['UserProfile']['last_name'];
			}
		}
		
		$group_video = $this->Video->findByGroupId($group_id);
		
		$performedChecks_dateConstraints = $this->get_performedChecks_dateConstraints(true);
		$draftChecks_dateConstraints = $this->get_draftChecks_dateConstraints(true);
		$scheduledChecks_dateConstraints = $this->get_scheduledChecks_dateConstraints(true);
		
		$this->set('performedChecks_dateConstraints', $performedChecks_dateConstraints);
		$this->set('draftChecks_dateConstraints', $draftChecks_dateConstraints);
		$this->set('scheduledChecks_dateConstraints', $scheduledChecks_dateConstraints);
		
		$this->set('group_video', $group_video);
		$this->set('members', $members);
		$this->set('factor_list', $factor_list);
		$this->set('user_list', $user_list);
		$this->set('behalfUserId', $selected_user['User']['hash_value']);
		
		$this->set('report_stats_last_week', $report_stats_last_week);
		$this->set('total_report_stats_last_week', $total_report_stats_last_week);
		$this->set('report_stats_last_thirty_days', $report_stats_last_thirty_days);
		$this->set('total_report_stats_last_thirty_days', $total_report_stats_last_thirty_days);
	}
	
	
	/* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
	public function nutricheck_activity($user_id = null) {
		$this->layout = 'public_dashboard';
		$this->loadModel('PerformedCheck');
		
		if(isset($_GET['hash_value'])) {
			$hash_value = $_GET['hash_value'];
			$this->User->unbindModelAll();
			$url_user_info = $this->User->findByHashValue($hash_value);
			
			$user_id = $url_user_info['User']['id'];
		}
		
		$user_info = $this->Session->read('Auth.User');
		
		// if admin/client
		if($user_info['group_id'] != 3) {
			
			// if user_id parameter is not set
			if(empty($user_id)) {
				$user_id = $this->Session->read('Auth.User.id');
			} else {
				$user_data = $this->User->findById($user_id);
				$user_info = $user_data['User'];
				$user_info['UserProfile'] = $user_data['UserProfile'];
			}
			
		// if ordinary user(member)
		} else {
			$user_id = $this->Session->read('Auth.User.id');
		}
	
		$this->PerformedCheck->unbindModelAll();
		$answers_per_date = $this->PerformedCheck->find('all', array('fields' => array('PerformedCheck.*'), 'order' => array('PerformedCheck.created' => 'DESC'), 'conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.user_id' => $user_id, 'PerformedCheck.completion_time !=' => "")));
		
		$this->set('answers_per_date', $answers_per_date);
		$this->set('user_info', $user_info);
		$this->set('user_id', $user_id);
	}
	
		
	/* ------------------------------------------------------------------------------------------ ALL ACTION BEING PROCESSED FROM AN IFRAME ----------------------------------------------------------------------------*/
		
	public function remote_register() {
		$this->layout = "ajax";
		if ($this->request->is('post')) {
			$this->loadModel('AclManagement.User');
			if($this->request->data['User']['password'] == $this->request->data['User']['repeat_password']) {
				
				$token = md5(time());
				$this->request->data['User']['token'] = $token;//key
				
				$this->request->data['User']['name'] = $this->request->data['UserProfile']['first_name']." ".$this->request->data['UserProfile']['last_name'];
				$this->request->data['User']['group_id'] = 3;
				$this->request->data['User']['status'] = 1;
				
				$this->User->create();
				if($this->User->save($this->request->data)) {
					$user_id = $this->User->id;
					$this->request->data['UserProfile']['user_id'] = $user_id;
					
					$this->User->UserProfile->create();
					if($this->User->UserProfile->save($this->request->data)) {
						$user = $this->User->findById($user_id);
						$user = $user['User'];
						if($this->Auth->login($user)) {
							$temp_answer = $this->Session->read('temp_answers');
							if(!empty($temp_answer)) {
								// 2 means to redirect to answer's controller to save the session based answer
								echo "2";
								exit();
							} else {					
								echo "1";
								exit();
							}
						} else {
							echo "0";
						}
					}
				}
			} else {
				echo "0";
			}
		}
		exit();
	}
	
	
	/* ------------------------------------------------------------------------------------------ ALL ACTION BEING PROCESSED FROM AN IFRAME ----------------------------------------------------------------------------*/
	
	public function check_email_existence() {
		$email = $_GET['email'];
		$checkExistEmail = $this->User->find('count', array('conditions'=>array('User.email' => $email)));
		echo $checkExistEmail;
		exit();
	}
	
	/* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
	public function manual_insert() {
		$this->loadModel('AclManagement.User');
		$users = array(
			array('id' => '477','group_id' => '0','parent_id' => '407','client_group_id' => NULL,'group_affiliation_id' => NULL,'hash_value' => '1af18200b8f238b0657adbbaed38714a7ba91d63','ip_address' => NULL,'username' => 'CharlesWalter2317','name' => NULL,'password' => '0f3fccc1d0b0523647184b0baebcc8808694fcf9','email' => '','avatar' => NULL,'language' => NULL,'timezone' => NULL,'key' => NULL,'can_answer' => '1','last_alerted' => NULL,'confirmed_PrivacyPolicy' => '1','isDeactivated' => '0','status' => '1','created' => '2015-02-03 02:52:37','modified' => '2015-02-03 02:52:44','last_login' => '0000-00-00 00:00:00')
		);
		
		foreach($users as $user) {	
			$to_insert = array();
			$to_insert['User']['id'] = $user['id'];
			$to_insert['User']['group_id'] = $user['group_id'];
			$to_insert['User']['parent_id'] = $user['parent_id'];
			$to_insert['User']['client_group_id'] = $user['client_group_id'];
			$to_insert['User']['group_affiliation_id'] = $user['group_affiliation_id'];
			$to_insert['User']['hash_value'] = $user['hash_value'];
			$to_insert['User']['ip_address'] = $user['ip_address'];
			$to_insert['User']['username'] = $user['username'];
			$to_insert['User']['name'] = $user['name'];
			$to_insert['User']['password'] = $user['password'];
			$to_insert['User']['email'] = $user['email'];
			$to_insert['User']['avatar'] = $user['avatar'];
			$to_insert['User']['language'] = $user['language'];
			$to_insert['User']['timezone'] = $user['timezone'];
			$to_insert['User']['key'] = $user['key'];
			$to_insert['User']['can_answer'] = $user['can_answer'];
			$to_insert['User']['last_alerted'] = $user['last_alerted'];
			$to_insert['User']['confirmed_PrivacyPolicy'] = $user['confirmed_PrivacyPolicy'];
			$to_insert['User']['isDeactivated'] = $user['isDeactivated'];
			$to_insert['User']['status'] = $user['status'];
			$to_insert['User']['created'] = $user['created'];
			$to_insert['User']['modified'] = $user['modified'];
			$to_insert['User']['last_login'] = $user['last_login'];
			
			$this->User->create();
			$this->User->save($to_insert);
		}
			
		exit();
	}
	
	/* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
	public function delete_report($user_id, $completion_time) {
		
		$performed_check_data = $this->User->PerformedCheck->deleteAll(array('PerformedCheck.user_id' => $user_id, 'PerformedCheck.completion_time' => $completion_time));
		$answer_data = $this->User->Answer->deleteAll(array('Answer.user_id' => $user_id, 'Answer.completion_time' => $completion_time));
		
		$this->Session->setFlash('You have successfully deleted the report', 'alert/success');
		$redirection = "http://".$_SERVER['SERVER_NAME']."/users/nutricheck_activity/".$user_id;
        $this->redirect($redirection);
	}
	
	/* ----------------------------------------------------------------------------------------------------------- SECTION SEPARATOR -----------------------------------------------------------------------------------------------*/
	
	public function is_authorized_parent($child_id) {
		$this->User->unbindModelAll();
		$group_id = $this->Session->read('Auth.User.group_id');
		$user_id = $this->Session->read('Auth.User.id');
		$child_information = $this->User->findById($child_id);
		
		// Client
		if($child_information['User']['group_id'] == 2 && $group_id == 5) {
			$client_group = $child_information['User']['client_group_id'];
			$client_group_info = $this->User->findById($client_group);
			if($client_group_info['User']['group_affiliation_id'] == $user_id) {
				return true;
			} else {
				return false;
			}
		}
		
		// Member
		if($child_information['User']['group_id'] == 3 && $group_id == 5) {
			$client = $child_information['User']['parent_id'];
			$client_info = $this->User->findById($client);
			$client_group = $client_info['User']['client_group_id'];
			$client_group_info = $this->User->findById($client_group);
			if($client_group_info['User']['group_affiliation_id'] == $user_id) {
				return true;
			} else {
				return false;
			}
		}
		
		// Client Group
		if($child_information['User']['group_id'] == 4 && $group_id == 5) {			
			if($child_information['User']['group_affiliation_id'] == $user_id) {
				return true;
			} else {
				return false;
			}
		}
		
		
		// Client
		if($child_information['User']['group_id'] == 2 && $group_id == 4) {
			if($child_information['User']['client_group_id'] == $user_id) {
				return true;
			} else {
				return false;
			}
		}
		
		// Member
		if($child_information['User']['group_id'] == 3 && $group_id == 4) {
			$client = $child_information['User']['parent_id'];
			$client_info = $this->User->findById($client);
			if($client_info['User']['client_group_id'] == $user_id) {
				return true;
			} else {
				return false;
			}
		}
		
		// If client is editing a member
		if($child_information['User']['group_id'] == 3 && $group_id == 2) {
		
			if($child_information['User']['parent_id'] == $user_id) {
				return true;
			} else {
				return false;
			}
		}
	}
}
?>