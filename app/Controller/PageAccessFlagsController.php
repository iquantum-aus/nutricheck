<?php
App::uses('AppController', 'Controller');
/**
 * PageAccessFlags Controller
 *
 * @property PageAccessFlag $PageAccessFlag
 * @property PaginatorComponent $Paginator
 */
class PageAccessFlagsController extends AppController {

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
		$this->PageAccessFlag->recursive = 0;
		$this->set('pageAccessFlags', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PageAccessFlag->exists($id)) {
			throw new NotFoundException(__('Invalid page access flag'));
		}
		$options = array('conditions' => array('PageAccessFlag.' . $this->PageAccessFlag->primaryKey => $id));
		$this->set('pageAccessFlag', $this->PageAccessFlag->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PageAccessFlag->create();
			if ($this->PageAccessFlag->save($this->request->data)) {
				$this->Session->setFlash(__('The page access flag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The page access flag could not be saved. Please, try again.'));
			}
		}
		$users = $this->PageAccessFlag->User->find('list');
		$groups = $this->PageAccessFlag->Group->find('list');
		$this->set(compact('users', 'groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PageAccessFlag->exists($id)) {
			throw new NotFoundException(__('Invalid page access flag'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PageAccessFlag->save($this->request->data)) {
				$this->Session->setFlash(__('The page access flag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The page access flag could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PageAccessFlag.' . $this->PageAccessFlag->primaryKey => $id));
			$this->request->data = $this->PageAccessFlag->find('first', $options);
		}
		$users = $this->PageAccessFlag->User->find('list');
		$groups = $this->PageAccessFlag->Group->find('list');
		$this->set(compact('users', 'groups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PageAccessFlag->id = $id;
		if (!$this->PageAccessFlag->exists()) {
			throw new NotFoundException(__('Invalid page access flag'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PageAccessFlag->delete()) {
			$this->Session->setFlash(__('The page access flag has been deleted.'));
		} else {
			$this->Session->setFlash(__('The page access flag could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
