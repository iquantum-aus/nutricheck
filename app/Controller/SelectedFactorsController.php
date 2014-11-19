<?php
App::uses('AppController', 'Controller');
/**
 * SelectedFactors Controller
 *
 * @property SelectedFactor $SelectedFactor
 * @property PaginatorComponent $Paginator
 */
class SelectedFactorsController extends AppController {

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow();
		$this->layout = "public_dashboard";
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
		$this->SelectedFactor->recursive = 0;
		$this->set('selectedFactors', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SelectedFactor->exists($id)) {
			throw new NotFoundException(__('Invalid selected factor'));
		}
		$options = array('conditions' => array('SelectedFactor.' . $this->SelectedFactor->primaryKey => $id));
		$this->set('selectedFactor', $this->SelectedFactor->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SelectedFactor->create();
			if ($this->SelectedFactor->save($this->request->data)) {
				$this->Session->setFlash(__('The selected factor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The selected factor could not be saved. Please, try again.'));
			}
		}
		$performedChecks = $this->SelectedFactor->PerformedCheck->find('list');
		$factors = $this->SelectedFactor->Factor->find('list');
		$this->set(compact('performedChecks', 'factors'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SelectedFactor->exists($id)) {
			throw new NotFoundException(__('Invalid selected factor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SelectedFactor->save($this->request->data)) {
				$this->Session->setFlash(__('The selected factor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The selected factor could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SelectedFactor.' . $this->SelectedFactor->primaryKey => $id));
			$this->request->data = $this->SelectedFactor->find('first', $options);
		}
		$performedChecks = $this->SelectedFactor->PerformedCheck->find('list');
		$factors = $this->SelectedFactor->Factor->find('list');
		$this->set(compact('performedChecks', 'factors'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->SelectedFactor->id = $id;
		if (!$this->SelectedFactor->exists()) {
			throw new NotFoundException(__('Invalid selected factor'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SelectedFactor->delete()) {
			$this->Session->setFlash(__('The selected factor has been deleted.'));
		} else {
			$this->Session->setFlash(__('The selected factor could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
