<?php
App::uses('AppController', 'Controller');
/**
 * FactorTypes Controller
 *
 * @property FactorType $FactorType
 * @property PaginatorComponent $Paginator
 */
class FactorTypesController extends AppController {

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
		$this->FactorType->recursive = 0;
		$this->set('factorTypes', $this->Paginator->paginate());
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
		if (!$this->FactorType->exists($id)) {
			throw new NotFoundException(__('Invalid factor type'));
		}
		$options = array('conditions' => array('FactorType.' . $this->FactorType->primaryKey => $id));
		$this->set('factorType', $this->FactorType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "public_dashboard";
		if ($this->request->is('post')) {
			$this->FactorType->create();
			if ($this->FactorType->save($this->request->data)) {
				$this->Session->setFlash(__('The factor type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The factor type could not be saved. Please, try again.'));
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
		$this->layout = "public_dashboard";
		if (!$this->FactorType->exists($id)) {
			throw new NotFoundException(__('Invalid factor type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FactorType->save($this->request->data)) {
				$this->Session->setFlash(__('The factor type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The factor type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FactorType.' . $this->FactorType->primaryKey => $id));
			$this->request->data = $this->FactorType->find('first', $options);
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
		$this->FactorType->id = $id;
		if (!$this->FactorType->exists()) {
			throw new NotFoundException(__('Invalid factor type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->FactorType->delete()) {
			$this->Session->setFlash(__('The factor type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The factor type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
