<?php
App::uses('AppController', 'Controller');
/**
 * UserAlerts Controller
 *
 * @property UserAlert $UserAlert
 * @property PaginatorComponent $Paginator
 */
class UserAlertsController extends AppController {

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
		$this->UserAlert->recursive = 0;
		$this->set('userAlerts', $this->Paginator->paginate());
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
		if (!$this->UserAlert->exists($id)) {
			throw new NotFoundException(__('Invalid user alert'));
		}
		$options = array('conditions' => array('UserAlert.' . $this->UserAlert->primaryKey => $id));
		$this->set('userAlert', $this->UserAlert->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id) {
		$this->layout = "public_dashboard";
		if ($this->request->is('post')) {
			$this->UserAlert->create();
			if ($this->UserAlert->save($this->request->data)) {
				$this->Session->setFlash(__('The user alert has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user alert could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserAlert->User->find('list');
		$this->set(compact('users'));
		$this->set("id", $id);
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
		if (!$this->UserAlert->exists($id)) {
			throw new NotFoundException(__('Invalid user alert'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserAlert->save($this->request->data)) {
				$this->Session->setFlash(__('The user alert has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user alert could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserAlert.' . $this->UserAlert->primaryKey => $id));
			$this->request->data = $this->UserAlert->find('first', $options);
		}
		$users = $this->UserAlert->User->find('list');
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
		$this->UserAlert->id = $id;
		if (!$this->UserAlert->exists()) {
			throw new NotFoundException(__('Invalid user alert'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserAlert->delete()) {
			$this->Session->setFlash(__('The user alert has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user alert could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
