<?php
App::uses('AppController', 'Controller');
/**
 * UserAccessLogs Controller
 *
 * @property UserAccessLog $UserAccessLog
 * @property PaginatorComponent $Paginator
 */
class UserAccessLogsController extends AppController {

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
		$this->UserAccessLog->recursive = 0;
		$this->set('userAccessLogs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserAccessLog->exists($id)) {
			throw new NotFoundException(__('Invalid user access log'));
		}
		$options = array('conditions' => array('UserAccessLog.' . $this->UserAccessLog->primaryKey => $id));
		$this->set('userAccessLog', $this->UserAccessLog->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserAccessLog->create();
			if ($this->UserAccessLog->save($this->request->data)) {
				$this->Session->setFlash(__('The user access log has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user access log could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserAccessLog->User->find('list');
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
		if (!$this->UserAccessLog->exists($id)) {
			throw new NotFoundException(__('Invalid user access log'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserAccessLog->save($this->request->data)) {
				$this->Session->setFlash(__('The user access log has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user access log could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserAccessLog.' . $this->UserAccessLog->primaryKey => $id));
			$this->request->data = $this->UserAccessLog->find('first', $options);
		}
		$users = $this->UserAccessLog->User->find('list');
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
		$this->UserAccessLog->id = $id;
		if (!$this->UserAccessLog->exists()) {
			throw new NotFoundException(__('Invalid user access log'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserAccessLog->delete()) {
			$this->Session->setFlash(__('The user access log has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user access log could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
