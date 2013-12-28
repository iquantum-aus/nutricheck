<?php
App::uses('AppController', 'Controller');
/**
 * AnalysisResults Controller
 *
 * @property AnalysisResult $AnalysisResult
 * @property PaginatorComponent $Paginator
 */
class AnalysisResultsController extends AppController {

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
		$this->AnalysisResult->recursive = 0;
		$this->set('analysisResults', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AnalysisResult->exists($id)) {
			throw new NotFoundException(__('Invalid analysis result'));
		}
		$options = array('conditions' => array('AnalysisResult.' . $this->AnalysisResult->primaryKey => $id));
		$this->set('analysisResult', $this->AnalysisResult->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AnalysisResult->create();
			if ($this->AnalysisResult->save($this->request->data)) {
				$this->Session->setFlash(__('The analysis result has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The analysis result could not be saved. Please, try again.'));
			}
		}
		$factors = $this->AnalysisResult->Factor->find('list');
		$users = $this->AnalysisResult->User->find('list');
		$this->set(compact('factors', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AnalysisResult->exists($id)) {
			throw new NotFoundException(__('Invalid analysis result'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AnalysisResult->save($this->request->data)) {
				$this->Session->setFlash(__('The analysis result has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The analysis result could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AnalysisResult.' . $this->AnalysisResult->primaryKey => $id));
			$this->request->data = $this->AnalysisResult->find('first', $options);
		}
		$factors = $this->AnalysisResult->Factor->find('list');
		$users = $this->AnalysisResult->User->find('list');
		$this->set(compact('factors', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AnalysisResult->id = $id;
		if (!$this->AnalysisResult->exists()) {
			throw new NotFoundException(__('Invalid analysis result'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AnalysisResult->delete()) {
			$this->Session->setFlash(__('The analysis result has been deleted.'));
		} else {
			$this->Session->setFlash(__('The analysis result could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
