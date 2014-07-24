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
			$this->Auth->allow('login', 'logout', 'forgot_password', 'register', 'activate_password', 'confirm_register', 'confirm_email_update', 'edit_profile', 'remote_register');
		} else {
			$this->Auth->allow('login', 'logout', 'forgot_password', 'register', 'activate_password', 'confirm_register', 'confirm_email_update', 'edit_profile', 'toggle_can_answer', 'toggle', 'is_authorized_action', 'dashboard', 'nutricheck_activity', 'check_email_existence');
		}

        $this->User->bindModel(array('belongsTo'=>array(
            'Group' => array(
                'className' => 'AclManagement.Group',
                'foreignKey' => 'group_id',
                'dependent'=>true
            )
        )), false);
    }
    /**
     * Temp acl init db
     */
//    function initDB() {
//        $this->autoRender = false;
//
//        $group = $this->User->Group;
//        //Allow admins to everything
//        $group->id = 1;
//        $this->Acl->allow($group, 'controllers');
//
//        //allow managers to posts and widgets
//        $group->id = 2;
//        $this->Acl->deny($group, 'controllers');
//        //$this->Acl->allow($group, 'controllers/Posts'); //allow all action of controller posts
//        $this->Acl->allow($group, 'controllers/Posts/add');
//        $this->Acl->deny($group, 'controllers/Posts/edit');
//
//        //we add an exit to avoid an ugly "missing views" error message
//        echo "all done";
//        exit;
//    }
    /**
     * login method
     *
     * @return void
     */
	public function login() {
		
		$this->layout = "public_dashboard";
		
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				if(isset($_GET['source']) && ($_GET['source'] == "remote")) {					
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
					return $this->redirect($this->Auth->redirect());
				}
			}
			
			if(isset($_GET['source']) && ($_GET['source'] == "remote")) {
				echo "0";
			} else {
				$this->Session->setFlash(__('Invalid username or password, try again'));
			}
		}
	}
    /**
     * logout method
     *
     * @return void
     */
    function logout() {
        $this->Session->setFlash('Good-Bye', 'alert/success');
        $this->redirect($this->Auth->logout());
    }
    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $user_info = $this->Session->read('Auth.User');
		
		$this->set('title', __('Users'));
        $this->set('description', __('Manage Users'));

        $this->User->recursive = 1;
        
		$condition = array();
		// if not admin then will filter the viewing of users
		if($user_info['group_id'] != 1) {
			$condition = array('User.parent_id' => $user_info['id']);
		}
		
		$this->paginate = array(
            'limit' => 10
        );
		
        $this->set('users', $this->paginate($condition));
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'), 'alert/error');
        }
        $this->set('user', $this->User->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
   public function add() {
		
		$this->layout = "public_dashboard";
		
		$user_info = $this->Session->read('Auth.User');
		if ($this->request->is('post')) {
            
			$email = $this->request->data['User']['email'];
			$this->User->unbindModelAll();
			$user_existence = $this->User->findAllByEmail($email);
			
			if(count($user_existence) > 0) {
				$this->Session->setFlash(__('The email submitted already exist'), 'alert/error');
			} else {
				$this->loadModel('AclManagement.User');
				
				if($user_info['group_id'] != 1)  {
					$this->request->data['User']['status'] = 0;
					$this->request->data['User']['group_id'] = 3;
				}
				
				if(isset($this->request->data['create_and_answer'])) {
					$this->request->data['User']['status'] = 1;
				}
				
				$to_hash = time();
				$this->request->data['User']['hash_value'] = $this->Auth->password($to_hash);
				
				$raw_password = $this->request->data['User']['password'];
				
				$this->User->create();
				if ($this->User->save($this->request->data)) {
					
					$to = $this->request->data['User']['email'];
					$subject = "You've been added to the system";

					$headers = "From: nomail@nutricheck.com\r\n";
					$headers .= "Reply-To: noreply@nutricheck.com\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					
					$message = '<html><body>';
					
					$url = "http://".$_SERVER['SERVER_NAME']."/users/edit_profile?hash_value=".$this->request->data['User']['hash_value'];
					$message .= "You've been added to the system. Please complete all of your information by clicking <a href=". $url .">here</a><br><br><strong>Password:</strong> ".$raw_password;
					
					$message .= "</body></html>";
					
					mail($to, $subject, $message, $headers);
					
					$user_id = $this->User->id;
					$this->request->data['UserProfile']['user_id'] = $user_id;
					
					$this->User->UserProfile->create();
					$this->User->UserProfile->save($this->request->data);
					
					$this->Session->setFlash(__('The user has been saved'), 'alert/success');
					
					if(isset($this->request->data['create_and_answer'])) {
						$this->Session->write('behalfUserId', $user_id);
						$this->redirect('../../questions/nutrient_check');
					} else {
						$this->redirect(array('action' => 'index'));
					}
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'alert/error');
				}
			}
        }
		
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
	 
	 
	public function is_authorized_action($id = null) {
		
		// currently loggedin client/admin
		$user_info = $this->Session->read('Auth.User');
		
		//currently being edit user
		$user_data = $this->User->findById($id);
		
		// if not authorized then check the group the user belongs
		if($user_info['id'] != $user_data['User']['parent_id']) {
			
			// if not admin then unauthorized
			if($user_info['group_id'] != 1) {
				return false;
			
			//admin is always authorized
			} else {
				return true;
			}
		} else {
			// authorizes by default
			return true;
		}
	}
	 
    public function edit($id = null) {
		
		if(!$this->is_authorized_action($id)) {
			$this->Session->setFlash(__("You're not authorized to update that patient"), 'alert/error');
			$this->redirect(array('action' => 'index'));
		}
		
		$this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
			
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
        } else {
            $this->request->data = $this->User->read(null, $id);
            $this->request->data['User']['password'] = null;
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    /**
     * delete method
     *
     * @param string $id
     * @return void
     */
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

    /**
     *  Active/Inactive User
     *
     * @param <int> $user_id
     */
    public function toggle($user_id, $status) {
        $this->layout = "ajax";
        $status = ($status) ? 0 : 1;
        $this->set(compact('user_id', 'status'));
        if ($user_id) {
            $data['User'] = array('id'=>$user_id, 'status'=>$status);
            $allowed = $this->User->saveAll($data["User"], array('validate'=>false));
        }
    }
	
	 /* CUSTOM CODE for allowing/disallwing users to answer the nutrient check */
    public function toggle_can_answer($user_id, $can_answer) {
        
		Configure::load('general');
		
		$this->layout = "ajax";
        $can_answer = ($can_answer) ? 0 : 1;
        $this->set(compact('user_id', 'can_answer'));
		
		if($can_answer == 1) {
			$user_info = $this->User->findById($user_id);
			$email_message = Configure::read('User.nutricheck_activated_message');
			
			$to = $user_info['User']['email'];
			
			$subject = 'Reactivation of Nutrient Check ';

			$headers = "From: glenn@iquantum.com.au\r\n";
			$headers .= "Reply-To: noreply@iquantum.com.au\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
			$message = '<html><body>';
			$message .= $email_message;
			$message .= '</body></html>';
			
			mail($to, $subject, $message, $headers);
		}
		
        if ($user_id) {
            $data['User'] = array('id'=>$user_id, 'can_answer'=>$can_answer);
            $allowed = $this->User->saveAll($data["User"], array('validate'=>false));
        }
		
		if(isset($_GET['source'])) {
			echo "1";
			exit();
		}
    }

    /**
     * register method
     *
     * @return void
     */
    public function register() {
        if ($this->request->is('post')) {
            $this->loadModel('AclManagement.User');
            $this->User->create();
			
			$this->request->data['User']['name'] = $this->request->data['UserProfile']['first_name']." ".$this->request->data['UserProfile']['last_name'];
			
            $this->request->data['User']['group_id']    = 3;//member
            $this->request->data['User']['status']      = 1;//active user
			
            $token = md5(time());
            $this->request->data['User']['token']         = $token;//key
			
            if ($this->User->save($this->request->data)) {
               
/* 			   $ident = $this->User->getLastInsertID();
                $comfirm_link = Router::url("/acl_management/users/confirm_register/$ident/$token", true);

                $cake_email = new CakeEmail();
                $cake_email->from(array('no-reply@example.com' => 'Please Do Not Reply'));
                $cake_email->to($this->request->data['User']['email']);
                $cake_email->subject(''.__('Register Confirm Email'));
                $cake_email->viewVars(array('comfirm_link'=>$comfirm_link));
                $cake_email->emailFormat('html');
                $cake_email->template('AclManagement.register_confirm_email');
                $cake_email->send();


                $this->Session->setFlash(__('Thank you for sign up! Please check your email to complete registration.'), 'alert/success');
                $this->request->data = null;
                $this->redirect(array('action' => 'login')); */
				
				$user_id = $this->User->id;
				$this->request->data['UserProfile']['user_id'] = $user_id;
				
				$this->User->UserProfile->create();
				if($this->User->UserProfile->save($this->request->data)) {
					$user = $this->User->findById($user_id);
					
					$user = $user['User'];
					if($this->Auth->login($user)) {
						$this->redirect('/users/nutricheck_activity');
					} else {
						$this->Session->setFlash(__('Failed to auto-login'), 'alert/error');
					}
				}
				
				
            } else {
                $this->Session->setFlash(__('Register could not be completed. Please, try again.'), 'alert/error');
                $this->redirect(array('action' => 'login'));
            }
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }
    /**
    * confirm register
    * @return void
    */
    public function confirm_register($ident=null, $activate=null) {//echo $ident.'  '.$activate;
        $return = $this->User->confirmRegister($ident, $activate);
        if ($return) {
            $this->Session->setFlash(__('Congrats! Register Completed.'), 'alert/success');
            $this->redirect(array('action' => 'login'));
        } else {
            $this->Session->setFlash(__('Something went wrong. Please, check your information.'), 'alert/error');
        }
    }
    /**
    * forgot password
    * @return void
    */
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
    /**
    * active password
    * @return void
    */
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

    /**
     * edit profile method
     *
     * @return void
     */
    public function edit_profile() {
		
		$hash = "";
		$user_id = $this->Session->read('Auth.User.id');
		
		if(isset($_GET['hash_value'])) {
			$hash = $_GET['hash_value'];	
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
			
				$user_info['User']['status'] = 1;
				$this->User->save($user_info);
				
				$this->request->data['UserProfile']['user_id'] = $user_id;
				
				if(empty($this->request->data['UserProfile']['id'])) {
					$this->User->UserProfile->create();
				}
				
				$this->User->UserProfile->save($this->request->data);
				
				$user = $user_info['User'];
				if(!$this->Auth->login($user)) {
					$this->Session->setFlash(__('Failed to auto-login'), 'alert/error');
				}
			} else {
				if(empty($user_id)) {
					$this->Session->setFlash(__("Accessing this link is no longer permitted"), 'alert/error');
					$this->redirect(array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'login'));
				}
			}
		}
		
		
        if ($this->request->is('post') || $this->request->is('put')) {
            
			if(!empty($this->request->data['User']['password']) || !empty($this->request->data['User']['password2'])){
                //do nothing
            }else{
                //do not check password validate
                unset($this->request->data['User']['password']);
            }

            $this->User->set($this->request->data);
            if ($this->User->validates()) {
                //check email change
                if($this->request->data['User']['email'] != $this->Session->read('Auth.User.email')){
                    $this->Session->write('Auth.User.needverify_email', $this->request->data['User']['email']);
                    $id = $this->Session->read('Auth.User.id');
                    $email = base64_encode($this->request->data['User']['email']);
                    $expiredTime = strtotime(date('Y-m-d H:i', strtotime('+24 hours')));
                    $comfirm_link = Router::url("/acl_management/users/confirm_email_update/$id/$email/$expiredTime", true);
                    $cake_email = new CakeEmail();
                    $cake_email->from(array('no-reply@example.com' => 'Please Do Not Reply'));
                    $cake_email->to($this->request->data['User']['email']);
                    $cake_email->subject(''.__('Email Address Update'));
                    $cake_email->viewVars(array('comfirm_link'=>$comfirm_link, 'old_email'=> $this->Session->read('Auth.User.email'), 'new_email'=>$this->request->data['User']['email']));
                    $cake_email->emailFormat('html');
                    $cake_email->template('AclManagement.email_address_update');
                    $cake_email->send();

                    unset($this->request->data['User']['email']);
                }


                $this->request->data['User']['id'] = $this->Session->read('Auth.User.id');
                if($this->User->saveAll($this->request->data['User'], array('validate'=>false))){
					
					if(empty($this->request->data['UserProfile']['id'])) {
						$this->request->data['UserProfile']['user_id'] = $this->User->id;
						$this->User->UserProfile->create();
					}
					
					if($this->User->UserProfile->save($this->request->data)) {					
						$this->Session->setFlash(__('Congrats! Your profile has been updated successfully'), 'alert/success');
						$this->redirect(array('action' => 'edit_profile',));
					} else {
						$this->Session->setFlash(__('Something wen\'t wrong'), 'alert/error');
					}
                }
            }else{
                $errors = $this->User->validationErrors;
                $this->Session->setFlash(__('Something went wrong. Please, check your information.'), 'alert/error');
            }

        }else{
            $this->request->data = $this->User->read(null, $this->Auth->user('id'));
            $this->request->data['User']['password'] = '';
        }
    }
         /**
    * confirm register
    * @return void
    */
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
		$this->layout = 'admin_dashboard';
		
		$user_id = $this->Session->read('Auth.User.id');
		$group_id = $this->Session->read('Auth.User.group_id');
		
		$this->User->unBindModel(
			array(
				'hasMany' => array('Answer'),
				'hasAndBelongsToMany' => array('Vitamin')
			)
		);
		
		$user_info = $this->User->findById($user_id);
		if($group_id != 1) {
			if(empty($user_info['UserProfile']['first_name']) || empty($user_info['UserProfile']['middle_name']) || empty($user_info['UserProfile']['last_name']) || empty($user_info['UserProfile']['birthday']) || empty($user_info['UserProfile']['contact'])) {
				$this->Session->setFlash('Please complete your profile by clicking My Profile on the top right area of the screen', 'alert/error');
			}
		}
		
		
		// remove the unnecessary model from user so that it will be lighter for the query
		$this->User->unBindModel(
			array(
				'hasAndBelongsToMany' => array('Vitamin')
			)
		);
		
		// gell all users that belong to your domain
		if($group_id == 2) {
			$users_list = $this->User->find('all', array('fields' => array('UserProfile.gender'), 'conditions' => array('group_id' => 3, 'parent_id' => $user_id)));
		} else {
			$users_list = $this->User->find('all', array('fields' => array('UserProfile.gender'), 'conditions' => array('group_id' => 3)));
		}
		
		$questions_answers = array();
		
		$females = 0;
		$males = 0;
		
		
		//get total number of maes and females as well as getting the total scores that each question got
		foreach($users_list as $key => $user) {
			
			// getting scores per question
			foreach($user['Answer'] as $answer) {
				
				if(!isset($questions_answers[$answer['question_id']])) {
					$questions_answers[$answer['question_id']] = 0;
				} else {
					$questions_answers[$answer['question_id']] = $questions_answers[$answer['question_id']] + $answer['rank'];
				}
				
			}
			
			// getting total of each gender
			if($user['UserProfile']['gender'] == "male") {
				$males++;
			} else if($user['UserProfile']['gender'] == "female") {
				$females++;
			}
		}
		
		// remove unnecesary model from factor
		$this->User->Answer->Question->Factor->unBindModel(
			array(
				'belongsTo' => array('User'),
				'hasMany' => array('Prescription')
			)
		);
		
		if($group_id != 3) {
			// get all factors
			$factors = $this->User->Answer->Question->Factor->find('all', array('conditions' => array('status' => 1)));
			
			// pr($factors);
			
			// group questions by factor
			$questions_per_factors = array();
			$factors_list = array();
			foreach($factors as $factor_key => $factor) {
				
				$factors_list[$factor['Factor']['id']] = $factor['Factor']['name'];
				
				foreach($factor['Question'] as $question_key => $question) {
					// echo $questions_answers[$question['id']];
					$questions_per_factors[$factor['Factor']['id']][$question['id']] = $questions_answers[$question['id']];
				}
			}
			
			// add scores per factor and also get total scores of all factors (will be used for its percentage)
			$factor_per_percentage = array();
			$total_factors_score = 0;
			foreach($questions_per_factors as $factor_key => $questions_per_factor) {
				$factor_value_sum = array_sum($questions_per_factor);
				$factor_value_count = count($questions_per_factor);
				
				$perfect_score = 0;
				$perfect_score = (3 * $factor_value_count) * count($users_list);
		
				
				$factor_per_percentage[$factor_key] = ($factor_value_sum/$perfect_score)*100;
			}
			
			$videos = $this->User->Group->Video->find('all', array('conditions' => array('group_id' => $group_id)));
		
			arsort($factor_per_percentage);
			// array_splice($factor_per_percentage, 16);
			
			$genders = array();
			$genders['males'] = $males;
			$genders['females'] = $females;
			
			$this->set("videos", $videos);
			$this->set("factors_list", $factors_list);
			$this->set("users_list", $users_list);
			$this->set("factor_per_percentage", $factor_per_percentage);
			$this->set('genders', $genders);
		}
	}
	
	public function nutricheck_activity($user_id = null) {
		$this->layout = 'public_dashboard';
		
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
	
		$this->User->Answer->unbindModelAll();
		$answers_per_date = $this->User->Answer->find('all', array('group' => array('Answer.created'), 'order' => array('Answer.created' => 'DESC'), 'conditions' => array('Answer.user_id' => $user_id)));
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
}
?>