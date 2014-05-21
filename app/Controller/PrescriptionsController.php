<?php
App::uses('AppController', 'Controller');
/**
 * Prescriptions Controller
 *
 * @property Prescription $Prescription
 * @property PaginatorComponent $Paginator
 */
class PrescriptionsController extends AppController {

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
		$this->Prescription->recursive = 0;
		$this->set('prescriptions', $this->Paginator->paginate(array('Prescription.status' => 1)));
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
		if (!$this->Prescription->exists($id)) {
			throw new NotFoundException(__('Invalid prescription'));
		}
		$options = array('conditions' => array('Prescription.' . $this->Prescription->primaryKey => $id));
		$this->set('prescription', $this->Prescription->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "public_dashboard";
		if ($this->request->is('post')) {
			$this->Prescription->create();
			if ($this->Prescription->save($this->request->data)) {
				$this->Session->setFlash(__('The prescription has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The prescription could not be saved. Please, try again.'));
			}
		}
		$factors = $this->Prescription->Factor->find('list');
		$this->set(compact('factors'));
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
		if (!$this->Prescription->exists($id)) {
			throw new NotFoundException(__('Invalid prescription'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Prescription->save($this->request->data)) {
				$this->Session->setFlash(__('The prescription has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The prescription could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Prescription.' . $this->Prescription->primaryKey => $id));
			$this->request->data = $this->Prescription->find('first', $options);
		}
		
		$factors = $this->Prescription->Factor->find('list');
		$this->set(compact('factors'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Prescription->id = $id;
		if (!$this->Prescription->exists()) {
			throw new NotFoundException(__('Invalid prescription'));
		}
		$this->request->onlyAllow('post', 'delete');
		
		$this->request->data['Prescription']['id'] = $id;
		$this->request->data['Prescription']['status'] = 0;
		
		if ($this->Prescription->save($this->request->data)) {
			$this->Session->setFlash(__('The prescription has been deleted.'));
		} else {
			$this->Session->setFlash(__('The prescription could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}