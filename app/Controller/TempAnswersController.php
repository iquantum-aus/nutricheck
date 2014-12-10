<?php
App::uses('AppController', 'Controller');
/**
 * TempAnswers Controller
 *
 * @property TempAnswer $TempAnswer
 * @property PaginatorComponent $Paginator
 */
class TempAnswersController extends AppController {

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
		$this->TempAnswer->recursive = 0;
		$this->set('tempAnswers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TempAnswer->exists($id)) {
			throw new NotFoundException(__('Invalid temp answer'));
		}
		$options = array('conditions' => array('TempAnswer.' . $this->TempAnswer->primaryKey => $id));
		$this->set('tempAnswer', $this->TempAnswer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TempAnswer->create();
			if ($this->TempAnswer->save($this->request->data)) {
				$this->Session->setFlash(__('The temp answer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The temp answer could not be saved. Please, try again.'));
			}
		}
		$questions = $this->TempAnswer->Question->find('list');
		$factors = $this->TempAnswer->Factor->find('list');
		$choices = $this->TempAnswer->Choice->find('list');
		$this->set(compact('questions', 'factors', 'choices'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TempAnswer->exists($id)) {
			throw new NotFoundException(__('Invalid temp answer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TempAnswer->save($this->request->data)) {
				$this->Session->setFlash(__('The temp answer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The temp answer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TempAnswer.' . $this->TempAnswer->primaryKey => $id));
			$this->request->data = $this->TempAnswer->find('first', $options);
		}
		$questions = $this->TempAnswer->Question->find('list');
		$factors = $this->TempAnswer->Factor->find('list');
		$choices = $this->TempAnswer->Choice->find('list');
		$this->set(compact('questions', 'factors', 'choices'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TempAnswer->id = $id;
		if (!$this->TempAnswer->exists()) {
			throw new NotFoundException(__('Invalid temp answer'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TempAnswer->delete()) {
			$this->Session->setFlash(__('The temp answer has been deleted.'));
		} else {
			$this->Session->setFlash(__('The temp answer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
