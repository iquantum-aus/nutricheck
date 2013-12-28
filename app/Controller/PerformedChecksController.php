<?php
App::uses('AppController', 'Controller');
/**
 * PerformedChecks Controller
 *
 * @property PerformedCheck $PerformedCheck
 * @property PaginatorComponent $Paginator
 */
class PerformedChecksController extends AppController {

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
		$this->PerformedCheck->recursive = 0;
		$this->set('performedChecks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PerformedCheck->exists($id)) {
			throw new NotFoundException(__('Invalid performed check'));
		}
		$options = array('conditions' => array('PerformedCheck.' . $this->PerformedCheck->primaryKey => $id));
		$this->set('performedCheck', $this->PerformedCheck->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PerformedCheck->create();
			if ($this->PerformedCheck->save($this->request->data)) {
				$this->Session->setFlash(__('The performed check has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The performed check could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PerformedCheck->exists($id)) {
			throw new NotFoundException(__('Invalid performed check'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PerformedCheck->save($this->request->data)) {
				$this->Session->setFlash(__('The performed check has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The performed check could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PerformedCheck.' . $this->PerformedCheck->primaryKey => $id));
			$this->request->data = $this->PerformedCheck->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PerformedCheck->id = $id;
		if (!$this->PerformedCheck->exists()) {
			throw new NotFoundException(__('Invalid performed check'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PerformedCheck->delete()) {
			$this->Session->setFlash(__('The performed check has been deleted.'));
		} else {
			$this->Session->setFlash(__('The performed check could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
