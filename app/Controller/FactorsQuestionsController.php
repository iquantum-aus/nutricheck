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
		$this->layout = "public_dashboard";
		$this->FactorsQuestion->recursive = 0;
		
		$search_value = $this->Session->read("FactorQuestion.search_value");
		if ($this->request->is('post')) {			
		
			/* ------------------------------------------------------------ IF SUBMIT BUTTON IS HIT ------------------------------------------------------------*/
			if(!empty($this->request->data['FactorQuestion']['search_value'])) {
				if(!isset($this->request->data['FactorQuestion']['reset'])) {
					$search_value = $this->request->data['FactorQuestion']['search_value'];
					$this->Session->write('FactorQuestion.search_value', $this->request->data['FactorQuestion']['search_value']);
				}
			}
			
			/* ------------------------------------------------------------ IF RESET BUTTON IS HIT ------------------------------------------------------------*/
			if(isset($this->request->data['FactorQuestion']['reset'])) {
				$this->Session->delete('FactorQuestion.search_value');
				unset($this->request->data['FactorQuestion']['search_value']);
				$search_value = "";
			}
		}
		
		if(!empty($search_value)) {
			$this->paginate = array(
				'conditions' => array(
					'or' => array (
						'Factor.name LIKE "%'.$search_value.'%"',
						'Question.question LIKE "%'.$search_value.'%"',
					),
					'and' => array (
						'Factor.status' => 1,
						'Question.status' => 1
					)
				),
			);
			
			$this->set("search_value", $search_value);
		}
		
		// echo $search_value;
		// exit();
		
		$associations = $this->paginate();
		$this->set('factorsQuestions', $associations);
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
		$this->layout = "public_dashboard";
		if ($this->request->is('post')) {
			
			$question_id = $this->request->data['FactorsQuestion']['question_id'];
			$factor_id = $this->request->data['FactorsQuestion']['factor_id'];
			
			$existing = $this->FactorsQuestion->find('count', array('conditions' => array('factor_id' => $factor_id, 'question_id' => $question_id)));
			
			if($existing) {
				$this->Session->setFlash(__('Invalid Association. This already exists.'));
			}  else {			
				$this->FactorsQuestion->create();
				if ($this->FactorsQuestion->save($this->request->data)) {
					$this->Session->setFlash(__('The factors question has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The factors question could not be saved. Please, try again.'));
				}
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
		$this->layout = "public_dashboard";
		if ($this->request->is('post')) {
			
			$user_id = $this->Session->read('Auth.User.id');
			$this->request->data['Question']['user_id'] = $user_id;
			
			$this->FactorsQuestion->Question->create();
			$this->FactorsQuestion->Question->save($this->request->data);
			$this->request->data['FactorsQuestion']['question_id'] = $this->FactorsQuestion->Question->id;
			
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
		$this->layout = "public_dashboard";
		if (!$this->FactorsQuestion->exists($id)) {
			throw new NotFoundException(__('Invalid factors question'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			$question_id = $this->request->data['FactorsQuestion']['question_id'];
			$factor_id = $this->request->data['FactorsQuestion']['factor_id'];
			
			$original_info = $this->FactorsQuestion->findById($id);
			
			if(($original_info['FactorsQuestion']['factor_id'] != $factor_id) && $original_info['FactorsQuestion']['question_id'] != $question_id) {
				$existing = $this->FactorsQuestion->find('count', array('conditions' => array('factor_id' => $factor_id, 'question_id' => $question_id)));
			} else {
				$existing = 0;
			}
			
			if($existing) {
				$this->Session->setFlash(__('Invalid Association. This already exists.'));
			}  else {		
				if ($this->FactorsQuestion->save($this->request->data)) {
					$this->Session->setFlash(__('The factors question has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The factors question could not be saved. Please, try again.'));
				}
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
		$this->layout = "public_dashboard";
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
	}
	
	
	
	
	public function nutrient_check() {
		$this->FactorsQuestion->recursive = 0;
		$this->layout = "public_dashboard";

		$this->Paginator->settings = array(
			'limit' => 200
		);
		
		if($this->request->is('post')) {
			$answers = $this->request->data;
			
			foreach($answers as $answer) {
				$this->FactorsQuestion->Question->Answer->create();
				$this->FactorsQuestion->Question->Answer->save($answer);
			}
			
			$this->Session->setFlash(__('You successfully saved your answers'));
			return $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
		}
		
		$paginate_data = $this->Paginator->paginate();
		$this->set('questions', $paginate_data);
	}
	
}
