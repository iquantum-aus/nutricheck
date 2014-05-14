<?php
App::uses('AppController', 'Controller');
/**
 * Questions Controller
 *
 * @property Question $Question
 * @property PaginatorComponent $Paginator
 */
class QuestionsController extends AppController {
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('remote_nutrient_check', 'save_remote_nutrient_check');
	}
	
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
		$this->Question->recursive = 0;
		$this->set('questions', $this->Paginator->paginate());
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
		if (!$this->Question->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
		$this->set('question', $this->Question->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "public_dashboard";
		if ($this->request->is('post')) {
			$this->Question->create();
			if ($this->Question->save($this->request->data)) {
				
				$this->Session->setFlash(__('The question has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.'));
			}
		}
		$users = $this->Question->User->find('list');
		$factors = $this->Question->Factor->find('list');
		$this->set(compact('users', 'factors'));
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
		if (!$this->Question->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Question->save($this->request->data)) {
				
				$this->Session->setFlash(__('The question has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
			$this->request->data = $this->Question->find('first', $options);
		}
		$users = $this->Question->User->find('list');
		$factors = $this->Question->Factor->find('list');
		$this->set(compact('users', 'factors'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Question->id = $id;
		if (!$this->Question->exists()) {
			throw new NotFoundException(__('Invalid question'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Question->delete()) {
			$this->Session->setFlash(__('The question has been deleted.'));
		} else {
			$this->Session->setFlash(__('The question could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	
	public function nutrient_check( $method = null ) {
		$this->Question->recursive = 0;
		$this->layout = "public_dashboard";
		$selected_factors = array();
		
		$this->Paginator->settings = array(
			'limit' => 200
		);

		if($this->request->is('post')) {
			
			if(isset($this->request->data['Factors']['submit'])) {
				
				$factors_ids = implode(",", $this->request->data['Factors']['factors']);
				$selected_factors = $this->request->data['Factors']['factors'];
				$this->set('selected_factors', $selected_factors);
				
				$sql = "SELECT Question.id from questions as Question LEFT JOIN factors_questions ON Question.id = factors_questions.questions_id WHERE factors_id IN ($factors_ids)";
				$question_ids = $this->Question->query($sql);
				$flatten_qid = array();
				
				foreach($question_ids as $key => $question_id) {
					$flatten_qid[$key] = $question_id['Question']['id'];
				}
				
				 $this->Paginator->settings = array(
					'conditions' => array('Question.id IN' => $flatten_qid)
				);
				
			} else {			
				$answers = $this->request->data;
				
				foreach($answers as $answer) {
					$this->Question->Answer->create();
					$this->Question->Answer->save($answer);
				}
				
				$this->Session->setFlash(__('You successfully saved your answers'));
				return $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
			}
		}
		
		if(empty($method)) {
			$questions = $this->Paginator->paginate();
		} else {
			$questions = $this->Paginator->paginate();
			$factors = $this->Question->Factor->find('list');
			$this->set('factors', $factors);
		}
		
		$this->set('selected_factors', $selected_factors);
		$this->set('method', $method);
		$this->set('questions', $questions);
	}
	
	public function remote_nutrient_check() {
		
		$user_id = $this->Session->read('Auth.User.id');
		$this->Question->recursive = 0;
		$this->layout = "iframe-layout";
		$selected_factors = array();
		
		$this->Paginator->settings = array(
			'limit' => 200
		);
		
		if($this->request->is('post')) {		
			$answers = $this->request->data;
			
			// $this->Session->setFlash(__('You successfully saved your answers'));
			
			if(!empty($user_id)) {
				
				foreach($answers as $answer) {
					$answer['Answer']['ip_address'] = $_SERVER['REMOTE_ADDR'];
					$answer['Answer']['link'] = $answers['TempAnswer']['remoteLink'];
					
					$this->Question->Answer->create();
					$this->Question->Answer->save($answer);
				}
				
				$this->redirect(array('controller' => 'answers', 'action' => 'report?answered=true&status=saved'));
				
			} else {
				
				$temp_answer_array = array();
				foreach($answers as $key => $answer) {
				
					$answer['TempAnswer']['ip_address'] = $_SERVER['REMOTE_ADDR'];
					$answer['TempAnswer']['link'] = $answers['TempAnswer']['remoteLink'];
					
					$temp_answer_array[$key]['Answer'] = $answer['TempAnswer'];
					
					/* $this->Question->TempAnswer->create();
					$this->Question->TempAnswer->save($answer); */
				}
				
				$this->Session->write('temp_answers', $temp_answer_array);
				$temp_answer = $this->Session->read('temp_answers');
				
				$this->redirect(array('controller' => 'answers', 'action' => 'report?answered=true&status=temp&action=login'));
			}
		}
		
		$questions = $this->Paginator->paginate();
		
		$this->set('selected_factors', $selected_factors);
		$this->set('questions', $questions);
	}
	
	
	public function save_remote_nutrient_check() {
		
		$user_id = $this->Session->read('Auth.User.id');
		$temp_answer_array = array();
		$temp_answer = $this->Session->read('temp_answers');
		
		unset($temp_answer['TempAnswer']);		
		$answers = $temp_answer;
		
		foreach($answers as $answer) {
			$answer['Answer']['users_id'] = $user_id;
			$this->Question->Answer->create();
			$this->Question->Answer->save($answer);
		}

		$this->redirect(array('controller' => 'answers', 'action' => 'report?answered=true&status=saved'));
	}
}
