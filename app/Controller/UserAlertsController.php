<?php
App::uses('AppController', 'Controller');

class UserAlertsController extends AppController {


	public $components = array('Paginator');
	
	function beforeFilter() {
        parent::beforeFilter();
		$this->Auth->allow('nutricheck_alert_sender', 'pull_schedule');
    }

	
	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	
	
	public function index() {
		$user_info = $this->Session->read('Auth.User');
		
		if($user_info['group_id'] != 1) {
			if($user_info['group_id'] == 4 || $user_info['group_id'] == 5) {			
				$flatten_clients = $this->requestAction('/acl_management/users/get_clients', array('pass' => array($user_info['id'])));					
				$condition = array('User.parent_id' => $flatten_clients);
			} else {
				$condition = array('User.parent_id' => $user_info['id']);
			}
			
			$user_ids = $this->UserAlert->User->find('list', array('conditions' => $condition, 'fields' => array('User.id', 'User.id')));
		}
		
		$this->layout = "public_dashboard";
		$this->UserAlert->recursive = 0;
		
		$user_condition = array();
		if($user_info['group_id'] != 1) {
			$user_condition = array('UserAlert.user_id' => $user_ids);
		}
		
		$user_alerts = $this->Paginator->paginate($user_condition);
		$this->set('userAlerts', $user_alerts);
	}

	
	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	
	
	public function view($id = null) {
		$this->layout = "public_dashboard";
		if (!$this->UserAlert->exists($id)) {
			throw new NotFoundException(__('Invalid user alert'));
		}
		$options = array('conditions' => array('UserAlert.' . $this->UserAlert->primaryKey => $id));
		$this->set('userAlert', $this->UserAlert->find('first', $options));
	}

	
	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */	
	
	
	public function add($id) {
		$user_info = $this->Session->read('Auth.User');
		$this->layout = "public_dashboard";
		$this->UserAlert->recursive = 0;
		
		$this->layout = "public_dashboard";
		if ($this->request->is('post')) {
			
			$existence = $this->UserAlert->find('count', array('conditions' => array('UserAlert.status' => 1, 'UserAlert.user_id' => $this->request->data['UserAlert']['user_id'], 'UserAlert.alert_date' => $this->request->data['UserAlert']['alert_date'])));
			
			if($existence == 0) {
				$this->UserAlert->create();
				if ($this->UserAlert->save($this->request->data)) {
					$this->Session->setFlash(__('The user alert has been saved.'));
					return $this->redirect(array('action' => 'alert_list', $this->request->data['UserAlert']['user_id']));
				} else {
					$this->Session->setFlash(__('The user alert could not be saved. Please, try again.'));
				}
			} else {
				$this->Session->setFlash(__('The user alert already exists. This operation is not allowed.'));
			}
		}
		
		if($user_info['group_id'] != 1) {
			if($user_info['group_id'] == 4 || $user_info['group_id'] == 5) {			
				$flatten_clients = $this->requestAction('/acl_management/users/get_clients', array('pass' => array($user_info['id'])));					
				$condition = array('User.parent_id' => $flatten_clients);
			} else {
				$condition = array('User.parent_id' => $user_info['id']);
			}
			
			$user_ids = $this->UserAlert->User->find('list', array('conditions' => $condition, 'fields' => array('User.id', 'User.id')));
		}
		
		
		
		if($user_info['group_id'] != 1) {
			$users = $this->UserAlert->User->find('list',
				array(
					'fields' => array('User.id', 'User.email'), 
					'conditions' => array(
						'User.email <>' => "",
						'User.id' => $user_ids
					)
				)
			);
		} else {
			$users = $this->UserAlert->User->find('list',
				array(
					'fields' => array('User.id', 'User.email'), 
					'conditions' => array(
						'User.email <>' => ""
					)
				)
			);
		}
		
		$this->set(compact('users'));
		$this->set("id", $id);
	}

	
	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	

	public function edit($id = null) {
		$this->layout = "public_dashboard";
		$user_info = $this->Session->read('Auth.User');
		
		if (!$this->UserAlert->exists($id)) {
			throw new NotFoundException(__('Invalid user alert'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			$original_data = $this->UserAlert->findById($this->request->data['UserAlert']['id']);
			$original_alert_date = $original_data['UserAlert']['alert_date'];
			
			if(strtotime($original_alert_date) == strtotime($this->request->data['UserAlert']['alert_date'])) {
				$existence = 0;
			} else {
				$existence = $this->UserAlert->find('count', array('conditions' => array('UserAlert.status' => 0, 'UserAlert.user_id' => $this->request->data['UserAlert']['user_id'], 'UserAlert.alert_date' => $this->request->data['UserAlert']['alert_date'])));
			}
			
			if($existence > 0) {
				$this->Session->setFlash(__('The user alert already exists. This operation is not allowed.'));
			} else {
				if ($this->UserAlert->save($this->request->data)) {
					$this->Session->setFlash(__('The user alert has been saved.'));
					return $this->redirect(array('action' => 'alert_list', $this->request->data['UserAlert']['user_id']));
				} else {
					$this->Session->setFlash(__('The user alert could not be saved. Please, try again.'));
					return $this->redirect(array('action' => 'alert_list', $this->request->data['UserAlert']['user_id']));
				}				
			}
		} else {
			$options = array('conditions' => array('UserAlert.' . $this->UserAlert->primaryKey => $id));
			$this->request->data = $this->UserAlert->find('first', $options);
		}
		
		if($user_info['group_id'] != 1) {
			if($user_info['group_id'] == 4 || $user_info['group_id'] == 5) {			
				$flatten_clients = $this->requestAction('/acl_management/users/get_clients', array('pass' => array($user_info['id'])));					
				$condition = array('User.parent_id' => $flatten_clients);
			} else {
				$condition = array('User.parent_id' => $user_info['id']);
			}
			
			$user_ids = $this->UserAlert->User->find('list', array('conditions' => $condition, 'fields' => array('User.id', 'User.id')));
		}
		
		if($user_info['group_id'] != 1) {
			$users = $this->UserAlert->User->find('list',
				array(
					'fields' => array('User.id', 'User.email'), 
					'conditions' => array(
						'User.email <>' => "",
						'User.id' => $user_ids
					)
				)
			);
		} else {
			$users = $this->UserAlert->User->find('list',
				array(
					'fields' => array('User.id', 'User.email'), 
					'conditions' => array(
						'User.email <>' => ""
					)
				)
			);
		}
		
		$this->set(compact('users'));
	}

	
	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	
	
	public function delete($id = null) {
		$this->UserAlert->id = $id;
		if (!$this->UserAlert->exists()) {
			throw new NotFoundException(__('Invalid user alert'));
		}
		$this->request->onlyAllow('post', 'delete');
		
		$user_alert_data = $this->UserAlert->find();

		if ($this->UserAlert->delete()) {
			$this->Session->setFlash(__('The user alert has been deleted.'));
			return $this->redirect(array('action' => 'alert_list', $user_alert_data['User']['id']));
		} else {
			$this->Session->setFlash(__('The user alert could not be deleted. Please, try again.'));
		}
	}
	
	public function pull_schedule() {
		$current_date = date('Y-m-d');
		echo $current_date;
		$alert_list = $this->UserAlert->find('all', 
			array(
				'conditions' => array('UserAlert.alert_date' => $current_date, 'UserAlert.status' => 1, 'User.email <>' => ""),
				'fields' => array('User.id', 'UserAlert.id')
			)
		);
		
		$this->var_debug($alert_list);
		
		foreach($alert_list as $onQueue) {
			$this->nutricheck_alert_sender($onQueue['User']['id'], $onQueue['UserAlert']['id']);
			
			$alerted = array();
			$alerted['UserAlert']['status'] = 0;
			$alerted['UserAlert']['id'] = $onQueue['UserAlert']['id'];
			
			$this->UserAlert->save($alerted);
		}
		
		exit();
	}
	
	
	
	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	
	
	public function nutricheck_alert_sender($user_id, $alert_id) {
		App::import('Vendor', 'phpmailer', array('file' => 'phpmailer/class.phpmailer.php'));
		
		$this->UserAlert->User->unbindModelAll();
		$user_info = $this->UserAlert->User->findById($user_id);
		$email = $user_info['User']['email'];
		
		$url = "http://".$_SERVER['SERVER_NAME']."/questions/nutrient_check?hash_value=".$hash_value."&invitation=true";
		
		$mail = new PHPMailer();
		$mail->IsSMTP(); // we are going to use SMTP
		$mail->IsHTML(true);
		$mail->Host = 'smtp.mandrillapp.com';  // Specify main and backup server
		$mail->SMTPAuth = true; // Enable SMTP authentication
		$mail->Username = "greg@iquantum.com.au";
		$mail->Password = "eB67Z9BR9JWLCUCjsNstjg";
		$mail->SMTPSecure = 'tls'; // Enable encryption, 'ssl' also accepted

		$mail->From = "Nutricheck Info <info@nutricheck.com.au>";
		// $mail->FromName = "nomail@nutricheck.com.au";
		// $mail->AddReplyTo("noman@iquantum.com.au", "noman@iquantum.com.au");
		$mail->AddAddress($email, $email);
		
		$mail->CharSet  = 'UTF-8'; 
		$mail->WordWrap = 50;  // set word wrap to 50 characters

		$mail->IsHTML(true);  // set email format to HTML 
		
		$mail->Subject = "Nutricheck Invitation";
		$mail->Body    = "You have been sent with an invitation to perform Nutricheck click <a href='".$url."'>here</a> to perform test"; 
		
		if($mail->Send()) {
			echo "1";
		}
	}
	
	/* -------------------------------------------------------------------------------------------- SECTION SEPARATOR -------------------------------------------------------------------------------------- */
	
	
	public function alert_list($id) {
		$user_info = $this->Session->read('Auth.User');
		
		$this->layout = "public_dashboard";
		$this->UserAlert->recursive = 0;
		
		$user_condition = array('user_id' => $id);
		$user_alerts = $this->Paginator->paginate($user_condition);
		$this->set('userAlerts', $user_alerts);
		$this->set('user_id', $id);
	}
}
