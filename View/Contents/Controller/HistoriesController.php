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
		$this->History->recursive = 0;
		$this->set('histories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
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
		if ($this->request->is('post')) {
			$this->History->create();
			if ($this->History->save($this->request->data)) {
				$this->Session->setFlash(__('The history has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The history could not be saved. Please, try again.'));
			}
		}
		$users = $this->History->User->find('list');
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
		$users = $this->History->User->find('list');
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
