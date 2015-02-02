<?php
App::uses('AppController', 'Controller');
/**
 * ClientGroups Controller
 *
 * @property ClientGroup $ClientGroup
 * @property PaginatorComponent $Paginator
 */
class ClientGroupsController extends AppController {

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
		$this->ClientGroup->recursive = 0;
		$this->set('clientGroups', $this->Paginator->paginate());
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
		if (!$this->ClientGroup->exists($id)) {
			throw new NotFoundException(__('Invalid client group'));
		}
		$options = array('conditions' => array('ClientGroup.' . $this->ClientGroup->primaryKey => $id));
		$this->set('clientGroup', $this->ClientGroup->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "public_dashboard";
		if ($this->request->is('post')) {
			$this->ClientGroup->create();
			if ($this->ClientGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The client group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The client group could not be saved. Please, try again.'));
			}
		}
		$groupAffiliations = $this->ClientGroup->GroupAffiliation->find('list');
		$this->set(compact('groupAffiliations'));
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
		if (!$this->ClientGroup->exists($id)) {
			throw new NotFoundException(__('Invalid client group'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ClientGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The client group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The client group could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ClientGroup.' . $this->ClientGroup->primaryKey => $id));
			$this->request->data = $this->ClientGroup->find('first', $options);
		}
		$groupAffiliations = $this->ClientGroup->GroupAffiliation->find('list');
		$this->set(compact('groupAffiliations'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ClientGroup->id = $id;
		if (!$this->ClientGroup->exists()) {
			throw new NotFoundException(__('Invalid client group'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ClientGroup->delete()) {
			$this->Session->setFlash(__('The client group has been deleted.'));
		} else {
			$this->Session->setFlash(__('The client group could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
