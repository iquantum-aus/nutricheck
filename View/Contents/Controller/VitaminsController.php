<?php
App::uses('AppController', 'Controller');
/**
 * Vitamins Controller
 *
 * @property Vitamin $Vitamin
 * @property PaginatorComponent $Paginator
 */
class VitaminsController extends AppController {

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
		$this->Vitamin->recursive = 0;
		$this->set('vitamins', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Vitamin->exists($id)) {
			throw new NotFoundException(__('Invalid vitamin'));
		}
		$options = array('conditions' => array('Vitamin.' . $this->Vitamin->primaryKey => $id));
		$this->set('vitamin', $this->Vitamin->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Vitamin->create();
			if ($this->Vitamin->save($this->request->data)) {
				$this->Session->setFlash(__('The vitamin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vitamin could not be saved. Please, try again.'));
			}
		}
		$users = $this->Vitamin->User->find('list');
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
		if (!$this->Vitamin->exists($id)) {
			throw new NotFoundException(__('Invalid vitamin'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Vitamin->save($this->request->data)) {
				$this->Session->setFlash(__('The vitamin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vitamin could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Vitamin.' . $this->Vitamin->primaryKey => $id));
			$this->request->data = $this->Vitamin->find('first', $options);
		}
		$users = $this->Vitamin->User->find('list');
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
		$this->Vitamin->id = $id;
		if (!$this->Vitamin->exists()) {
			throw new NotFoundException(__('Invalid vitamin'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Vitamin->delete()) {
			$this->Session->setFlash(__('The vitamin has been deleted.'));
		} else {
			$this->Session->setFlash(__('The vitamin could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
