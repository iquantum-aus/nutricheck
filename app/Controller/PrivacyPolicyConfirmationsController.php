<?php
App::uses('AppController', 'Controller');
/**
 * PrivacyPolicyConfirmations Controller
 *
 * @property PrivacyPolicyConfirmation $PrivacyPolicyConfirmation
 * @property PaginatorComponent $Paginator
 */
class PrivacyPolicyConfirmationsController extends AppController {

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
		$this->PrivacyPolicyConfirmation->recursive = 0;
		$this->set('privacyPolicyConfirmations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PrivacyPolicyConfirmation->exists($id)) {
			throw new NotFoundException(__('Invalid privacy policy confirmation'));
		}
		$options = array('conditions' => array('PrivacyPolicyConfirmation.' . $this->PrivacyPolicyConfirmation->primaryKey => $id));
		$this->set('privacyPolicyConfirmation', $this->PrivacyPolicyConfirmation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PrivacyPolicyConfirmation->create();
			if ($this->PrivacyPolicyConfirmation->save($this->request->data)) {
				$this->Session->setFlash(__('The privacy policy confirmation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The privacy policy confirmation could not be saved. Please, try again.'));
			}
		}
		$users = $this->PrivacyPolicyConfirmation->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PrivacyPolicyConfirmation->exists($id)) {
			throw new NotFoundException(__('Invalid privacy policy confirmation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PrivacyPolicyConfirmation->save($this->request->data)) {
				$this->Session->setFlash(__('The privacy policy confirmation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The privacy policy confirmation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PrivacyPolicyConfirmation.' . $this->PrivacyPolicyConfirmation->primaryKey => $id));
			$this->request->data = $this->PrivacyPolicyConfirmation->find('first', $options);
		}
		$users = $this->PrivacyPolicyConfirmation->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PrivacyPolicyConfirmation->id = $id;
		if (!$this->PrivacyPolicyConfirmation->exists()) {
			throw new NotFoundException(__('Invalid privacy policy confirmation'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PrivacyPolicyConfirmation->delete()) {
			$this->Session->setFlash(__('The privacy policy confirmation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The privacy policy confirmation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
