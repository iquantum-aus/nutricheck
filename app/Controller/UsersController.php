.<?php
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

		// For CakePHP 2.1 and up
		$this->Auth->allow();
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
		$this->layout = "public_dashboard";
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
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
		if ($this->request->is('post')) {
			
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
		$this->layout = "public_dashboard";
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
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
		
		echo $_GET['source'];
		exit();
		
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				if(isset($_GET['source']) && ($_GET['source'] == "remote")) {
					return $this->redirect(array('controller' => 'questions', 'action' => 'save_remote_nutrient_check'));
				} else {
					return $this->redirect($this->Auth->redirect());
				}
			}
			
			$this->Session->setFlash(__('Invalid username or password, try again'));
			if(isset($_GET['source']) && ($_GET['source'] == "remote")) {
				$this->redirect($this->redirect($this->referer()));
			}
		}
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
	
	public function dashboard() {
		$this->layout = 'admin_dashboard';
		
		pr($this->Session->read('Auth'));
	}
	
	/* ------------------------------------------------------------------------------------------ ALL ACTION BEING PROCESSED FROM AN IFRAME ----------------------------------------------------------------------------*/
	
	public function remote_register() {
		$this->layout = "iframe-layout";
		if ($this->request->is('post')) {
			
			if($this->request->data['User']['password'] == $this->request->data['User']['repeat_password']) {
				
				$this->request->data['User']['group_id'] = 2;
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
							$this->redirect(array('controller' => 'questions', 'action' => 'save_remote_nutrient_check'));
						}
					}
				}
			}
		}
	}
	
	
	/* ------------------------------------------------------------------------------------------ ALL ACTION BEING PROCESSED FROM AN IFRAME ----------------------------------------------------------------------------*/
	
}