<?php
App::uses('AppController', 'Controller');
/**
 * FactorsQuestions Controller
 *
 * @property FactorsQuestion $FactorsQuestion
 * @property PaginatorComponent $Paginator
 */
class FactorsQuestionsController extends AppController {

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
		$this->FactorsQuestion->recursive = 0;
		$this->set('factorsQuestions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FactorsQuestion->exists($id)) {
			throw new NotFoundException(__('Invalid factors question'));
		}
		$options = array('conditions' => array('FactorsQuestion.' . $this->FactorsQuestion->primaryKey => $id));
		$this->set('factorsQuestion', $this->FactorsQuestion->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FactorsQuestion->create();
			if ($this->FactorsQuestion->save($this->request->data)) {
				$this->Session->setFlash(__('The factors question has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The factors question could not be saved. Please, try again.'));
			}
		}
		$factors = $this->FactorsQuestion->Factor->find('list');
		$questions = $this->FactorsQuestion->Question->find('list');
		$this->set(compact('factors', 'questions'));
	}
	
/**
 * add method
 *
 * @return void
 */
	public function question_add() {
		if ($this->request->is('post')) {
			
			$user_id = $this->Session->read('Auth.User.id');
			$this->request->data['Question']['users_id'] = $user_id;
			
			$this->FactorsQuestion->Question->create();
			$this->FactorsQuestion->Question->save($this->request->data);
			$this->request->data['FactorsQuestion']['questions_id'] = $this->FactorsQuestion->Question->id;
			
			if ($this->FactorsQuestion->save($this->request->data)) {
				$this->Session->setFlash(__('The question has been saved.'));
				return $this->redirect(array('controller' => 'questions', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The factors question could not be saved. Please, try again.'));
			}
		}
		$factors = $this->FactorsQuestion->Factor->find('list');
		$questions = $this->FactorsQuestion->Question->find('list');
		$this->set(compact('factors', 'questions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FactorsQuestion->exists($id)) {
			throw new NotFoundException(__('Invalid factors question'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FactorsQuestion->save($this->request->data)) {
				$this->Session->setFlash(__('The factors question has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The factors question could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FactorsQuestion.' . $this->FactorsQuestion->primaryKey => $id));
			$this->request->data = $this->FactorsQuestion->find('first', $options);
		}
		$factors = $this->FactorsQuestion->Factor->find('list');
		$questions = $this->FactorsQuestion->Question->find('list');
		
		$this->set(compact('factors', 'questions'));
	}
	
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function question_edit($id = null) {
		if (!$this->FactorsQuestion->exists($id)) {
			throw new NotFoundException(__('Invalid factors question'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->FactorsQuestion->Question->save($this->request->data);
			if ($this->FactorsQuestion->save($this->request->data)) {
				$this->Session->setFlash(__('The factors question has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The factors question could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FactorsQuestion.' . $this->FactorsQuestion->primaryKey => $id));
			$this->request->data = $this->FactorsQuestion->find('first', $options);
		}
		$factors = $this->FactorsQuestion->Factor->find('list');
		$questions = $this->FactorsQuestion->Question->find('list');
		$this->set(compact('factors', 'questions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FactorsQuestion->id = $id;
		if (!$this->FactorsQuestion->exists()) {
			throw new NotFoundException(__('Invalid factors question'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->FactorsQuestion->delete()) {
			$this->Session->setFlash(__('The factors question has been deleted.'));
		} else {
			$this->Session->setFlash(__('The factors question could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
