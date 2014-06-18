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
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "public_dashboard";
		
		$user_info = $this->Session->read('Auth.User');
		if ($this->request->is('post')) {
			$this->loadModel('AclManagement.User');
			
			if($user_info['group_id'] != 1)  {
				$this->request->data['User']['status'] = 1;
				$this->request->data['User']['group_id'] = 3;
			}
			
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		
		$userGroups = $this->User->Group->find('list');		
		$vitamins = $this->User->Vitamin->find('list');
		$this->set(compact('userGroups', 'vitamins'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$user_info = $this->Session->read('Auth.User');
		
		$this->layout = "public_dashboard";
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		
		if($user_info['group_id'] != 1)  {
			$this->request->data['User']['status'] = 1;
			$this->request->data['User']['group_id'] = 3;
		}
		
		if ($this->request->is(array('post', 'put'))) {
			 $this->loadModel('AclManagement.User');
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$userGroups = $this->User->Group->find('list');
		$vitamins = $this->User->Vitamin->find('list');
		$this->set(compact('userGroups', 'vitamins'));
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

	public function login() {
		
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				if(isset($_GET['source']) && ($_GET['source'] == "remote")) {
					// return $this->redirect(array('controller' => 'questions', 'action' => 'save_remote_nutrient_check'));
					echo "authenticated";
					exit();
				} else {
					return $this->redirect($this->Auth->redirect());
				}
			} else {			
				if(isset($_GET['source']) && ($_GET['source'] == "remote")) {
					// $this->redirect($this->redirect($this->referer()));
					echo "not authenticated";
					exit();
				} else {
					$this->Session->setFlash(__('Invalid username or password, try again'));
				}
			}
		}
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
	
	public function dashboard() {
		$this->layout = 'admin_dashboard';
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
		$answers_per_date = $this->User->Answer->find('all', array('group' => array('Answer.created'), 'order' => array('Answer.created' => 'DESC'), 'conditions' => array('Answer.users_id' => $user_id)));
		$this->set('answers_per_date', $answers_per_date);
		$this->set('user_info', $user_info);
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
					$this->request->data['UserProfile']['users_id'] = $user_id;
					
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