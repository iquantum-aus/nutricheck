<?php
App::uses('AppController', 'Controller');
/**
 * Choices Controller
 *
 * @property Choice $Choice
 * @property PaginatorComponent $Paginator
 */
class ChoicesController extends AppController {

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
		$this->Choice->recursive = 0;
		$this->set('choices', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Choice->exists($id)) {
			throw new NotFoundException(__('Invalid choice'));
		}
		$options = array('conditions' => array('Choice.' . $this->Choice->primaryKey => $id));
		$this->set('choice', $this->Choice->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Choice->create();
			if ($this->Choice->save($this->request->data)) {
				$this->Session->setFlash(__('The choice has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The choice could not be saved. Please, try again.'));
			}
		}
		$questions = $this->Choice->Question->find('list');
		$this->set(compact('questions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Choice->exists($id)) {
			throw new NotFoundException(__('Invalid choice'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Choice->save($this->request->data)) {
				$this->Session->setFlash(__('The choice has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The choice could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Choice.' . $this->Choice->primaryKey => $id));
			$this->request->data = $this->Choice->find('first', $options);
		}
		$questions = $this->Choice->Question->find('list');
		$this->set(compact('questions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Choice->id = $id;
		if (!$this->Choice->exists()) {
			throw new NotFoundException(__('Invalid choice'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Choice->delete()) {
			$this->Session->setFlash(__('The choice has been deleted.'));
		} else {
			$this->Session->setFlash(__('The choice could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
