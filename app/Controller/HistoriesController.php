<?php
App::uses('AppController', 'Controller');
/**
 * Histories Controller
 *
 * @property History $History
 * @property PaginatorComponent $Paginator
 */
class HistoriesController extends AppController {

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
		$this->History->recursive = 0;
		$histories = $this->Paginator->paginate();
		
		foreach($histories as $key => $history) {
			$user_profile = $this->History->User->UserProfile->findByUserId($history['User']['id']);
			$histories[$key]['UserProfile'] = $user_profile['UserProfile'];
		}
		
		$this->set('histories', $histories);
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
		if (!$this->History->exists($id)) {
			throw new NotFoundException(__('Invalid history'));
		}
		$options = array('conditions' => array('History.' . $this->History->primaryKey => $id));
		$this->set('history', $this->History->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "public_dashboard";
		if ($this->request->is('post')) {
			$this->History->create();
			if ($this->History->save($this->request->data)) {
				$this->Session->setFlash(__('The history has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The history could not be saved. Please, try again.'));
			}
		}
		
		$this->History->User->unbindModel(
			array(
				'hasMany' => array('Answer', 'PerformedCheck'),
				'hasAndBelongsToMany' => array('Vitamin')
			)
		);

		$users = $this->History->User->find('all', array('fields' => array('User.username', 'User.id', 'User.hash_value', 'User.email', 'UserProfile.first_name', 'UserProfile.last_name')));
		 
		$user_list = array();
		foreach($users as $key => $user) {
			if(empty($user['UserProfile']['first_name']) && empty($user['UserProfile']['last_name'])) {
				
				if(!empty($user['User']['username'])) {
					$user_list[$user['User']['id']] = $user['User']['username'];
				} else {
					$user_list[$user['User']['id']] = $user['User']['email'];
				}
				
			} else {
				$user_list[$user['User']['id']] = $user['UserProfile']['first_name']." ".$user['UserProfile']['last_name'];
			}
		}
		 
		$this->set('users', $user_list);
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
		if (!$this->History->exists($id)) {
			throw new NotFoundException(__('Invalid history'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->History->save($this->request->data)) {
				$this->Session->setFlash(__('The history has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The history could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('History.' . $this->History->primaryKey => $id));
			$this->request->data = $this->History->find('first', $options);
		}
				$this->History->User->unbindModel(
			array(
				'hasMany' => array('Answer', 'PerformedCheck'),
				'hasAndBelongsToMany' => array('Vitamin')
			)
		);

		$users = $this->History->User->find('all', array('fields' => array('User.username', 'User.id', 'User.hash_value', 'User.email', 'UserProfile.first_name', 'UserProfile.last_name')));
		 
		$user_list = array();
		foreach($users as $key => $user) {
			if(empty($user['UserProfile']['first_name']) && empty($user['UserProfile']['last_name'])) {
				
				if(!empty($user['User']['username'])) {
					$user_list[$user['User']['id']] = $user['User']['username'];
				} else {
					$user_list[$user['User']['id']] = $user['User']['email'];
				}
				
			} else {
				$user_list[$user['User']['id']] = $user['UserProfile']['first_name']." ".$user['UserProfile']['last_name'];
			}
		}
		 
		$this->set('users', $user_list);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->History->id = $id;
		if (!$this->History->exists()) {
			throw new NotFoundException(__('Invalid history'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->History->delete()) {
			$this->Session->setFlash(__('The history has been deleted.'));
		} else {
			$this->Session->setFlash(__('The history could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
