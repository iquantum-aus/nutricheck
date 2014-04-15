<?php
App::uses('AppController', 'Controller');
/**
 * Answers Controller
 *
 * @property Answer $Answer
 * @property PaginatorComponent $Paginator
 */
class AnswersController extends AppController {
	
	var $uses = array('Answer', 'FactorsQuestion');

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
		$this->Answer->recursive = 0;
		$this->set('answers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Answer->exists($id)) {
			throw new NotFoundException(__('Invalid answer'));
		}
		$options = array('conditions' => array('Answer.' . $this->Answer->primaryKey => $id));
		$this->set('answer', $this->Answer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Answer->create();
			if ($this->Answer->save($this->request->data)) {
				$this->Session->setFlash(__('The answer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The answer could not be saved. Please, try again.'));
			}
		}
		$users = $this->Answer->User->find('list');
		$questions = $this->Answer->Question->find('list');
		$choices = $this->Answer->Choice->find('list');
		$this->set(compact('users', 'questions', 'choices'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Answer->exists($id)) {
			throw new NotFoundException(__('Invalid answer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Answer->save($this->request->data)) {
				$this->Session->setFlash(__('The answer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The answer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Answer.' . $this->Answer->primaryKey => $id));
			$this->request->data = $this->Answer->find('first', $options);
		}
		$users = $this->Answer->User->find('list');
		$questions = $this->Answer->Question->find('list');
		$choices = $this->Answer->Choice->find('list');
		$this->set(compact('users', 'questions', 'choices'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Answer->id = $id;
		if (!$this->Answer->exists()) {
			throw new NotFoundException(__('Invalid answer'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Answer->delete()) {
			$this->Session->setFlash(__('The answer has been deleted.'));
		} else {
			$this->Session->setFlash(__('The answer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
/**
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function report() {
		$user_id = $this->Session->read('Auth.User.id');
		$this->Answer->unbindModelAll();
		$answers = $this->Answer->find('all', array('order' => array('Answer.factors_id ASC'), 'conditions' => array('Answer.users_id' => $user_id)));
		
		$reports_per_factor = array();
		$previous_factor = 0;
		$current_factor = 0;
		$inc = 0;
		
		foreach($answers as $key => $answer) {
			$question_id = $answer['Answer']['questions_id'];
			
			$this->FactorsQuestion->unbindModelAll();
			$associations = $this->FactorsQuestion->find('all', array('conditions' => array('questions_id' => $question_id)));
			
			foreach($associations as $association) {
				$answer['FactorsQuestion'] = $association['FactorsQuestion'];
				
				$factor_id = $answer['FactorsQuestion']['factors_id'];
				$inc++;
				
				$reports_per_factor[$factor_id][$inc] = $answer;
			}
		}
		
		ksort($reports_per_factor);
		
		$this->set('reports_per_factor', $reports_per_factor);
	}
	
}
