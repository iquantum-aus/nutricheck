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
			$this->Auth->allow('login', 'logout', 'forgot_password', 'register', 'activate_password', 'confirm_register', 'confirm_email_update', 'edit_profile', 'toggle_can_answer', 'toggle', 'is_authorized_action', 'dashboard', 'nutricheck_activity', 'check_email_existence', 'delete_report');
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
		
		session_destroy();
		unset($_COOKIE);
		
		$this->layout = "ajax";
		if ($this->request->is('post')) {
			
			// ----------------------------------------------------- hack for loging in using username --------------------------------------------------- //
				
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
			}
			
			if(isset($_GET['source']) && ($_GET['source'] == "remote")) {
				echo "2";
				exit();
			} else {
				$this->Session->setFlash(__('Invalid username or password, try again'), 'alert/error');
			}
		}
	}
    /**
     * logout method
     *
     * @return void
     */
    function logout() {
		$this->Session->destroy();
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
						'and' => array('User.status' => 1, 'User.parent_id' => $user_info['id'])
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
						'and' => array('User.status' => 1)
					), 
					'order' => array('User.first_name' => 'ASC'),
					'limit' => 10
				);
			}
		
		/* ------------------------------------------------------------------------------------------- DEFAULT PAGINATION HERE ----------------------------------------------------------------------------------*/
		} else {		
			if($user_info['group_id'] != 1) {
				$condition = array('User.parent_id' => $user_info['id']);
			}
			
			$this->paginate = array(
				'limit' => 10
			);
		}
		
		$users = $this->paginate($condition);
        $this->set('search_value', $search_value);
        $this->set('users', $users);
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
		App::import('Vendor', 'phpmailer', array('file' => 'phpmailer/class.phpmailer.php'));
		$this->layout = "public_dashboard";
		
		$user_info = $this->Session->read('Auth.User');
		if ($this->request->is('post')) {
			
			$suffix = $this->randomNumber(4);
			$username = str_replace(" ", "", $this->request->data['UserProfile']['first_name']).str_replace(" ", "", $this->request->data['UserProfile']['last_name']).$suffix;
			
			if($this->request->data['User']['group_id'] == 2) {
				$username = $this->request->data['UserProfile']['company'].$suffix;
				$this->request->data['User']['username'] = $username;
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
				
				if($user_info['group_id'] != 1)  {
					$this->request->data['User']['status'] = 0;
					$this->request->data['User']['group_id'] = 3;
				}
				
				if(isset($this->request->data['create_and_answer'])) {
					$this->Session->write('isCreateAnswer', 1);
					$this->request->data['User']['status'] = 1;
				}
				
				$to_hash = time();
				$this->request->data['User']['hash_value'] = $this->Auth->password($to_hash);
				
				if(isset($this->request->data['create_and_answer'])) {
					$this->request->data['User']['password'] = "nutriPass";
				}
				
				$raw_password = $this->request->data['User']['password'];
				
				$this->User->create();
				if ($this->User->save($this->request->data)) {
					
					if(!isset($this->request->data['create_and_answer'])) {
						
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
							
							$mail = new PHPMailer(); 
							$mail->IsSMTP(); // we are going to use SMTP
							$mail->IsHTML(true);
							$mail->Host = 'smtp.mandrillapp.com';  // Specify main and backup server
							$mail->SMTPAuth = true;                               // Enable SMTP authentication
							$mail->Username = "greg@iquantum.com.au"; 
							$mail->Password = "eB67Z9BR9JWLCUCjsNstjg"; 
							$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

							$mail->From = "nomail@nutricheck.com.au"; 
							// $mail->FromName = "nomail@nutricheck.com.au"; 
							// $mail->AddReplyTo("noman@iquantum.com.au", "noman@iquantum.com.au"); 
							$mail->AddAddress($email, $email);
							
							$mail->CharSet  = 'UTF-8'; 
							$mail->WordWrap = 50;  // set word wrap to 50 characters

							$mail->IsHTML(true);  // set email format to HTML 
							
							$mail->Subject = "You've been added to the system";
							$url = "http://".$_SERVER['SERVER_NAME']."/users/edit_profile?hash_value=".$this->request->data['User']['hash_value'];
							$message .= "You've been added to the system. Please complete all of your information by clicking <a href=". $url .">here</a><br><br><strong>Username:</strong> ".$username."<br><strong>Password:</strong> ".$raw_password;
							$mail->Body    = $message; 
							
							if($mail->Send()) {
								// nothing to do here...
							} else {
								return $mail->ErrorInfo; 
							}
						}
					}
					
					$user_id = $this->User->id;
					$this->request->data['UserProfile']['user_id'] = $user_id;
					
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
        $groups = $this->User->Group->find('list', array('conditions' => array('id !=' => 1)));
        $this->set(compact('groups', 'pharmacists'));
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
			
			$email = $this->request->data['User']['email'];
			$old_email = $this->request->data['User']['old_email'];
			
			$user_existence = array();
			if($email != $old_email) {					
				$this->User->unbindModelAll();
				$user_existence = $this->User->findAllByEmail($email);
			}
			
			if(count($user_existence) > 0) {
				$this->Session->setFlash(__('The email submitted already exist'), 'alert/error');
			} else {
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
        $groups = $this->User->Group->find('list', array('conditions' => array('id !=' => 1)));
        $this->set(compact('groups', 'pharmacists'));
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
        App::import('Vendor', 'phpmailer', array('file' => 'phpmailer/class.phpmailer.php'));
		Configure::load('general');
		
		$this->layout = "ajax";
        $can_answer = ($can_answer) ? 0 : 1;
        $this->set(compact('user_id', 'can_answer'));
		
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

			$mail->From = "nomail@nutricheck.com.au"; 
			// $mail->FromName = "nomail@nutricheck.com.au"; 
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
				
				$mail->From = "nomail@nutricheck.com.au"; 
				// $mail->FromName = "nomail@nutricheck.com.au"; 
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
            
			if(!empty($this->request->data['User']['password']) || !empty($this->request->data['User']['password2'])){
                //do nothing
            }else{
                //do not check password validate
                unset($this->request->data['User']['password']);
            }
			
            if ($this->User->validates()) {
               
			   //check email change
				/*  if($this->request->data['User']['email'] != $this->Session->read('Auth.User.email')) {
                    
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
                } */
				
                // $this->request->data['User']['id'] = $this->Session->read('Auth.User.id');
				
				// $this->var_debug($this->request->data);
				// exit();
				
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
		
		$this->User->set($this->request->data);
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
		$this->loadModel('Factor');
		$this->loadModel('PerformedCheck');
		$this->layout = "public_dashboard";
		$user_info = $this->Session->read('Auth.User');
		
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
		
		$this->set('factor_list', $factor_list);
		$this->set('user_list', $user_list);
	}
	
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
	
	public function delete_report($user_id, $completion_time) {
		
		$performed_check_data = $this->User->PerformedCheck->deleteAll(array('PerformedCheck.user_id' => $user_id, 'PerformedCheck.completion_time' => $completion_time));
		$answer_data = $this->User->Answer->deleteAll(array('Answer.user_id' => $user_id, 'Answer.completion_time' => $completion_time));
		
		$this->Session->setFlash('You have successfully deleted the report', 'alert/success');
		$redirection = "http://".$_SERVER['SERVER_NAME']."/users/nutricheck_activity/".$user_id;
        $this->redirect($redirection);
	}
}
?>