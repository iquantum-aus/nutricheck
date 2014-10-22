<?php
App::uses('AppController', 'Controller');
/**
 * UserProfiles Controller
 *
 * @property UserProfile $UserProfile
 * @property PaginatorComponent $Paginator
 */
class UserProfilesController extends AppController {

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
		$this->UserProfile->recursive = 0;
		$this->set('userProfiles', $this->Paginator->paginate());
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
		if (!$this->UserProfile->exists($id)) {
			throw new NotFoundException(__('Invalid user profile'));
		}
		$options = array('conditions' => array('UserProfile.' . $this->UserProfile->primaryKey => $id));
		$this->set('userProfile', $this->UserProfile->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "public_dashboard";
		if ($this->request->is('post')) {
			$this->UserProfile->create();
			if ($this->UserProfile->save($this->request->data)) {
				$this->Session->setFlash(__('The user profile has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user profile could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserProfile->User->find('list');
		$this->set(compact('users'));
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
		if (!$this->UserProfile->exists($id)) {
			throw new NotFoundException(__('Invalid user profile'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserProfile->save($this->request->data)) {
				$this->Session->setFlash(__('The user profile has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user profile could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserProfile.' . $this->UserProfile->primaryKey => $id));
			$this->request->data = $this->UserProfile->find('first', $options);
		}
		$users = $this->UserProfile->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->layout = "public_dashboard";
		$this->UserProfile->id = $id;
		if (!$this->UserProfile->exists()) {
			throw new NotFoundException(__('Invalid user profile'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserProfile->delete()) {
			$this->Session->setFlash(__('The user profile has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user profile could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
