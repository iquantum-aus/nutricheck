<?php
App::uses('AppController', 'Controller');
/**
 * PerformedChecks Controller
 *
 * @property PerformedCheck $PerformedCheck
 * @property PaginatorComponent $Paginator
 */
class PerformedChecksController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	function beforeFilter() {
        parent::beforeFilter();
		$this->Auth->allow('performed_checks');
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = "public_dashboard";
		$this->PerformedCheck->recursive = 0;
		$user_id = $this->Session->read('Auth.User.id');
		$group_id = $this->Session->read('Auth.User.group_id');
		
		if($group_id != 1) {
			$this->Paginator->settings = array(
				'conditions' => array('PerformedCheck.isComplete' => 1, 'User.parent_id' => $user_id, 'PerformedCheck.completion_time <>' => ""),
				'limit' => 30,
				'order' => array('completion_time' => 'DESC')
			);
		} else {
			$this->Paginator->settings = array(
				'conditions' => array('PerformedCheck.isComplete' => 1, 'PerformedCheck.completion_time <>' => ""),
				'limit' => 30,
				'order' => array('completion_time' => 'DESC')
			);
		}
		
		$performed_checks = $this->Paginator->paginate();		
		
		foreach($performed_checks as $key => $performed_check) {
			$user_profile = $this->PerformedCheck->User->UserProfile->findByUserId($performed_check['User']['id']);
			$performed_checks[$key]['UserProfile'] = $user_profile['UserProfile'];
		}
		
		$this->set('performedChecks', $performed_checks);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PerformedCheck->exists($id)) {
			throw new NotFoundException(__('Invalid performed check'));
		}
		$options = array('conditions' => array('PerformedCheck.' . $this->PerformedCheck->primaryKey => $id));
		$this->set('performedCheck', $this->PerformedCheck->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PerformedCheck->create();
			if ($this->PerformedCheck->save($this->request->data)) {
				$this->Session->setFlash(__('The performed check has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The performed check could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PerformedCheck->exists($id)) {
			throw new NotFoundException(__('Invalid performed check'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PerformedCheck->save($this->request->data)) {
				$this->Session->setFlash(__('The performed check has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The performed check could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PerformedCheck.' . $this->PerformedCheck->primaryKey => $id));
			$this->request->data = $this->PerformedCheck->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PerformedCheck->id = $id;
		if (!$this->PerformedCheck->exists()) {
			throw new NotFoundException(__('Invalid performed check'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PerformedCheck->delete()) {
			$this->Session->setFlash(__('The performed check has been deleted.'));
		} else {
			$this->Session->setFlash(__('The performed check could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
		
	public function performed_checks() {
		App::uses('CakeEmail', 'Network/Email');
		
		$this->loadModel('User');	
		
		$today = date("Y-m-d H:i:s");
		
		$user_to_send_email = $this->PerformedCheck->find('all', array('fields' => array('created', 'user_id', 'url'), 'conditions' => array('isComplete' => 0)));
		
		$emails_to_send_alert = array();
		foreach($user_to_send_email as $instance_key => $instance_info) {
			
			$user_id = $instance_info['PerformedCheck']['user_id'];
			$created_date = $instance_info['PerformedCheck']['created'];
			$url = $instance_info['PerformedCheck']['url'];
			
			$difference = strtotime($today) - strtotime($created_date);
			
			$days_difference =  floor($difference/(60*60*24));
			$hours_difference =  floor($difference/(60*60));
			$minutes_difference =  floor($difference/60);
			
			if($days_difference >= 7) {
			// if($minutes_difference >= 1) {
				
				echo $user_id."<br />";
				
				$this->User->unbindModel(
					array(
						'hasMany' => array('Answer'),
						'belongsTo' => array('Group'),
						'belongsTo' => array('Group'),
						'hasAndBelongsToMany' => array('Vitamin'),
					)
				);
				
				$user_info = $this->User->find('first', array('conditions' => array('User.id' => $user_id), 'fields' => array('User.*', 'UserProfile.first_name', 'UserProfile.last_name')));
				
				$name = "<strong>".$user_info['UserProfile']['first_name']."</strong>";
				$email = $user_info['User']['email'];
				
				$parent_info = array();
				$parent_info = $this->User->findById($user_info['User']['parent_id']);
				
				$company = "<strong>".$parent_info['UserProfile']['company']."</strong>";
				$company_email = "<strong>".$parent_info['User']['email']."</strong>";
				
				if(empty($user_info['User']['email'])) {
					$this->User->unbindModelAll();
					$user_info = $this->User->findById($user_info['User']['parent_id']);
				}
				
				$send_alert = true;
				$per_user_difference = strtotime($today) - strtotime($user_info['User']['last_alerted']);
				
				$per_user_days_difference =  floor($per_user_difference/(60*60*24));
				$per_user_hours_difference =  floor($per_user_difference/(60*60));
				$per_user_minutes_difference =  floor($per_user_difference/60);
			
				// if in the list of alerted, script will check whether the user has been alerted before and will check if the previous alert was 7 days ago
				if($per_user_days_difference < 7 && !empty($user_info['User']['last_alerted'])) {
					$send_alert = false;
				};
				
				if($send_alert) {
					$data_modification = array();
					$datetime = date("Y-m-d H:i:s");
					$data_modification['User']['id'] = $user_id;
					$data_modification['User']['last_alerted'] = $datetime;
					
					$result = $this->send($email, $name, $url, $company, $company_email);
					if($result) {
						$this->User->save($data_modification);
						echo $email." = 1<br />";
					}
				}
			}
		}
		
		exit();
	}
	
	
	function send($email, $name, $url, $company, $company_email) { 
		// endor('phpmailer'.DS.'class.phpmailer'); 
		App::import('Vendor', 'phpmailer', array('file' => 'phpmailer/class.phpmailer.php'));

		$mail = new PHPMailer(); 
		$mail->IsSMTP(); // we are going to use SMTP
		$mail->IsHTML(true);
		$mail->Host = 'smtp.mandrillapp.com';  // Specify main and backup server
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Port = 587;
		$mail->Username = "greg@iquantum.com.au";
		$mail->Password = "z_Cb_u7etC2ZUJnziGME-w";
		$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

		$mail->From = "NutriCheck Info <info@nutritionmedicine.org>";
		$mail->AddReplyTo("info@nutritionmedicine.org", "info@nutritionmedicine.org");
		$mail->AddAddress($email, $email);
		

		$mail->CharSet  = 'UTF-8'; 
		$mail->WordWrap = 50;  // set word wrap to 50 characters

		$mail->IsHTML(true);  // set email format to HTML 
		
		$mail->Subject = "Incomplete NutriCheck Assessment";
		$mail->Body    = "				
			Hi ".$name."
			<br /><br />
			We would like to advise that you have an incomplete NutriCheck assessment.
			<br /><br />
			Please click <strong><a href='".$url."'>here</a></strong> to sign back in to the system and complete the questionnaire.
			<br /><br />
			Once completed, your Practitioner will be notified of your results.
			<br /><br />
			Kind Regards,<br />
			<strong>".$company."</strong><br />
			<strong>Email: ".$company_email."</strong>
		"; 

		if($mail->Send()) {
			return true;
		} else {
			return $mail->ErrorInfo; 
		}
    }
}
