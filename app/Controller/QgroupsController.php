<?php
App::uses('AppController', 'Controller');
/**
 * Qgroups Controller
 *
 * @property Qgroup $Qgroup
 * @property PaginatorComponent $Paginator
 */
class QgroupsController extends AppController {

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
		$this->Qgroup->recursive = 0;
		$this->set('qgroups', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
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
		if ($this->request->is('post')) {		
			$this->Qgroup->create();
			if ($this->Qgroup->save($this->request->data)) {
				$this->Session->setFlash(__('The qgroup has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The qgroup could not be saved. Please, try again.'));
			}
		}
		$questions = $this->Qgroup->Question->find('list');
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
		if ($this->Qgroup->delete()) {
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
}
