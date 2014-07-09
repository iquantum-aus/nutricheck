<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();

		$user_id = $this->Session->read('Auth.User.id');
		
		if(empty($user_id)) {
			$this->Auth->allow('register', 'remote_register', 'login', 'logout');
		} else {
			$this->Auth->allow('register', 'remote_register', 'login', 'logout', 'dashboard', 'nutricheck_activity');
		}
	}
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
/**
 * index method
 *
 * @return void
 */
	public function index() {		
		$user_info = $this->Session->read('Auth.User');
		
		$this->layout = "public_dashboard";
		$this->User->recursive = 0;
		
		$condition = array();
		// if not admin then will filter the viewing of users
		if($user_info['group_id'] != 1) {
			$condition = array('User.parent_id' => $user_info['id']);
		}
		
		$this->set('users', $this->Paginator->paginate($condition));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = "public_dashboard";
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}




/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}	
	
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
		if($group_id != 2) {
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
				
				if(!isset($questions_answers[$answer['questions_id']])) {
					$questions_answers[$answer['questions_id']] = 0;
				} else {
					$questions_answers[$answer['questions_id']] = $questions_answers[$answer['questions_id']] + $answer['rank'];
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
		
		
			arsort($factor_per_percentage);
			// array_splice($factor_per_percentage, 16);
			
			$genders = array();
			$genders['males'] = $males;
			$genders['females'] = $females;
			
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
	
}