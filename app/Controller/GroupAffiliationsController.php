<?php
App::uses('AppController', 'Controller');
/**
 * GroupAffiliations Controller
 *
 * @property GroupAffiliation $GroupAffiliation
 * @property PaginatorComponent $Paginator
 */
class GroupAffiliationsController extends AppController {

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
		$this->GroupAffiliation->recursive = 0;
		$this->set('groupAffiliations', $this->Paginator->paginate());
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
		if (!$this->GroupAffiliation->exists($id)) {
			throw new NotFoundException(__('Invalid group affiliation'));
		}
		$options = array('conditions' => array('GroupAffiliation.' . $this->GroupAffiliation->primaryKey => $id));
		$this->set('groupAffiliation', $this->GroupAffiliation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "public_dashboard";
		if ($this->request->is('post')) {
			$this->GroupAffiliation->create();
			if ($this->GroupAffiliation->save($this->request->data)) {
				$this->Session->setFlash(__('The group affiliation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group affiliation could not be saved. Please, try again.'));
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
		if (!$this->GroupAffiliation->exists($id)) {
			throw new NotFoundException(__('Invalid group affiliation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->GroupAffiliation->save($this->request->data)) {
				$this->Session->setFlash(__('The group affiliation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group affiliation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('GroupAffiliation.' . $this->GroupAffiliation->primaryKey => $id));
			$this->request->data = $this->GroupAffiliation->find('first', $options);
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
		$this->GroupAffiliation->id = $id;
		if (!$this->GroupAffiliation->exists()) {
			throw new NotFoundException(__('Invalid group affiliation'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->GroupAffiliation->delete()) {
			$this->Session->setFlash(__('The group affiliation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The group affiliation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
