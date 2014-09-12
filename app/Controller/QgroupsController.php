<?php
App::uses('AppController', 'Controller');
/**
 * Qgroups Controller
 *
 * @property Qgroup $Qgroup
 * @property PaginatorComponent $Paginator
 */
class QgroupsController extends AppController {
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('load_questions', 'load_preview');
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
		$user_info = $this->Session->read('Auth.User');
		$this->layout = "public_dashboard";
		$this->Qgroup->recursive = 0;
		
		if($this->request->is('post') && !empty($this->request->data['Qgroup']['id']) && !isset($this->request->data['Qgroup']['reset'])) {
			$this->set('qgroups', $this->Paginator->paginate(array('id' => $this->request->data['Qgroup']['id'])));
		} else {
			$this->set('qgroups', $this->Paginator->paginate(array('status' => 1, 'user_id' => $user_info['id'])));
		}
		
		$group_list = $this->Qgroup->find('list', array('conditions' => array('status' => 1, 'user_id' => $user_info['id']), 'fields' => array('id', 'name')));		
		$this->set('group_list', $group_list);
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
		if (!$this->Qgroup->exists($id)) {
			throw new NotFoundException(__('Invalid qgroup'));
		}
		$options = array('conditions' => array('Qgroup.' . $this->Qgroup->primaryKey => $id));
		$this->set('qgroup', $this->Qgroup->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$user_info = $this->Session->read('Auth.User');
		$this->layout = "public_dashboard";
		if ($this->request->is('post')) {		
			
			$this->request->data['Qgroup']['user_id'] = $user_info['id'];
			
			$this->Qgroup->create();
			if ($this->Qgroup->save($this->request->data)) {
				$this->Session->setFlash(__('The qgroup has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The qgroup could not be saved. Please, try again.'));
			}
		}
		$questions = $this->Qgroup->Question->find('list');
		$questions[0] = "All 110 Questions";
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
		$this->layout = "public_dashboard";
		if (!$this->Qgroup->exists($id)) {
			throw new NotFoundException(__('Invalid qgroup'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Qgroup->save($this->request->data)) {
				$this->Session->setFlash(__('The qgroup has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The qgroup could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Qgroup.' . $this->Qgroup->primaryKey => $id));
			$this->request->data = $this->Qgroup->find('first', $options);
		}
		$questions = $this->Qgroup->Question->find('list');
		$questions[0] = "All 110 Questions";
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
		$this->Qgroup->id = $id;
		if (!$this->Qgroup->exists()) {
			throw new NotFoundException(__('Invalid qgroup'));
		}
		$this->request->onlyAllow('post', 'delete');
		
		$this->request->data['Qgroup']['id'] = $id;
		$this->request->data['Qgroup']['status'] = 0;
		
		if ($this->Qgroup->save($this->request->data)) {
			$this->Session->setFlash(__('The qgroup has been deleted.'));
		} else {
			$this->Session->setFlash(__('The qgroup could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function save_group_assoc() {
		// data[Question][Question][]
		
		$this->layout = "iframe-layout";
		$selected_questions = $this->Session->read('selected_questions');
		$selected_qgroup = $this->Session->read('selected_qgroup');
		
		if ($this->request->is('post')) {
			$this->Session->read('selected_questions');
			if($this->Qgroup->save($this->request->data)) {
				$selected_questions = array();
				$this->Session->write('selected_questions', $selected_questions);
				echo 1;
				exit();
			}
		}
		
		$selected_question_ids = $selected_questions;
		
		$questions = $this->Qgroup->Question->find('list', array('conditions' => array('status' => 1)));
		$selected_questions = $this->Qgroup->Question->find('list', array('conditions' => array('id' => $selected_questions)));
		
		$selected_group_details = $this->Qgroup->findById($selected_qgroup) ;
		$this->set(compact('questions', 'selected_question_ids', 'selected_questions','selected_qgroup', 'selected_group_details'));
	}
	
	public function ajax_update() {
		if ($this->request->is(array('post', 'put'))) {
			if($this->Qgroup->save($this->request->data)) {
				echo "1";
			}
		}
		
		exit();
	}
	
	public function ajax_create() {
		if ($this->request->is(array('post', 'put'))) {
			$this->Qgroup->create();
			if($this->Qgroup->save($this->request->data)) {
				echo $this->Qgroup->id;
			}
		}
		
		exit();
	}
	
	public function load_questions($id = null) {
		$this->layout = "iframe-layout";
		
		$group_association = $this->Qgroup->find('all', array('conditions' => array('id' => $id)));
		
		if(empty($group_association[0]['Question'])) {
			$this->Qgroup->Question->unbindModelAll();
			$questions = $this->Qgroup->Question->find('all', array('conditions' => array('Question.status' => 1)));
		} else {		
			$questions = array();
			foreach($group_association[0]['Question'] as $key => $question) {
				$questions[$key]['Question'] = $question;
			}
		}
		
		$this->set('questions', $questions);
		$this->set('id', $id);
	}
	
	public function load_preview($id = null) {
		$this->layout = "ajax_plus_scripts";
		
		$group_association = $this->Qgroup->find('all', array('conditions' => array('id' => $id)));
		
		if(empty($group_association[0]['Question'])) {
			$this->Qgroup->Question->unbindModelAll();
			$questions = $this->Qgroup->Question->find('all', array('conditions' => array('Question.status' => 1)));
		} else {		
			$questions = array();
			foreach($group_association[0]['Question'] as $key => $question) {
				$questions[$key]['Question'] = $question;
			}
		}
		
		$this->set('questions', $questions);
	}
	
}
