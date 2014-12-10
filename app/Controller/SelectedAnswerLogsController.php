<?php
App::uses('AppController', 'Controller');
/**
 * SelectedAnswerLogs Controller
 *
 * @property SelectedAnswerLog $SelectedAnswerLog
 * @property PaginatorComponent $Paginator
 */
class SelectedAnswerLogsController extends AppController {

	function beforeFilter() {
		parent::beforeFilter();	
		
		$user_id = $this->Session->read('Auth.User.id');
		if(!empty($user_id)) {
			$this->Auth->allow('add');
		}
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
		$this->SelectedAnswerLog->recursive = 0;
		$this->set('selectedAnswerLogs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SelectedAnswerLog->exists($id)) {
			throw new NotFoundException(__('Invalid selected answer log'));
		}
		$options = array('conditions' => array('SelectedAnswerLog.' . $this->SelectedAnswerLog->primaryKey => $id));
		$this->set('selectedAnswerLog', $this->SelectedAnswerLog->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SelectedAnswerLog->create();
			if ($this->SelectedAnswerLog->save($this->request->data)) {
				$this->Session->setFlash(__('The selected answer log has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The selected answer log could not be saved. Please, try again.'));
			}
		} else {
			if(!empty($_GET)) {
				$data_to_insert = array();
				
				foreach($_GET as $key => $value) {
					$data_to_insert['SelectedAnswerLog'][$key] = $value;
				}
				
				$this->SelectedAnswerLog->create();
				if($this->SelectedAnswerLog->save($data_to_insert)) {
					echo "<pre>";
						print_r($data_to_insert);
					echo "</pre>";
				}
				
				exit();
			}
		}
		
		$questions = $this->SelectedAnswerLog->Question->find('list');
		$users = $this->SelectedAnswerLog->User->find('list');
		$this->set(compact('questions', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SelectedAnswerLog->exists($id)) {
			throw new NotFoundException(__('Invalid selected answer log'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SelectedAnswerLog->save($this->request->data)) {
				$this->Session->setFlash(__('The selected answer log has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The selected answer log could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SelectedAnswerLog.' . $this->SelectedAnswerLog->primaryKey => $id));
			$this->request->data = $this->SelectedAnswerLog->find('first', $options);
		}
		$questions = $this->SelectedAnswerLog->Question->find('list');
		$users = $this->SelectedAnswerLog->User->find('list');
		$this->set(compact('questions', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->SelectedAnswerLog->id = $id;
		if (!$this->SelectedAnswerLog->exists()) {
			throw new NotFoundException(__('Invalid selected answer log'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SelectedAnswerLog->delete()) {
			$this->Session->setFlash(__('The selected answer log has been deleted.'));
		} else {
			$this->Session->setFlash(__('The selected answer log could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}	
}
