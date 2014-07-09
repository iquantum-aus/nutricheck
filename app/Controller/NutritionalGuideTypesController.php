<?php
App::uses('AppController', 'Controller');
/**
 * NutritionalGuideTypes Controller
 *
 * @property NutritionalGuideType $NutritionalGuideType
 * @property PaginatorComponent $Paginator
 */
class NutritionalGuideTypesController extends AppController {

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
		$this->NutritionalGuideType->recursive = 0;
		$this->set('nutritionalGuideTypes', $this->Paginator->paginate());
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
		if (!$this->NutritionalGuideType->exists($id)) {
			throw new NotFoundException(__('Invalid nutritional guide type'));
		}
		$options = array('conditions' => array('NutritionalGuideType.' . $this->NutritionalGuideType->primaryKey => $id));
		$this->set('nutritionalGuideType', $this->NutritionalGuideType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "public_dashboard";
		if ($this->request->is('post')) {
			
			$user_id = $this->Session->read('Auth.User.id');
			$this->request->data['NutritionalGuideType']['user_id'] = $user_id;
			
			$this->NutritionalGuideType->create();
			if ($this->NutritionalGuideType->save($this->request->data)) {
				$this->Session->setFlash(__('The nutritional guide type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The nutritional guide type could not be saved. Please, try again.'));
			}
		}
		$users = $this->NutritionalGuideType->User->find('list');
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
		$this->layout = "public_dashboard";
		if (!$this->NutritionalGuideType->exists($id)) {
			throw new NotFoundException(__('Invalid nutritional guide type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->NutritionalGuideType->save($this->request->data)) {
				$this->Session->setFlash(__('The nutritional guide type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The nutritional guide type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('NutritionalGuideType.' . $this->NutritionalGuideType->primaryKey => $id));
			$this->request->data = $this->NutritionalGuideType->find('first', $options);
		}
		$users = $this->NutritionalGuideType->User->find('list');
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
		$this->NutritionalGuideType->id = $id;
		if (!$this->NutritionalGuideType->exists()) {
			throw new NotFoundException(__('Invalid nutritional guide type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->NutritionalGuideType->delete()) {
			$this->Session->setFlash(__('The nutritional guide type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The nutritional guide type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
