<?php
App::uses('AppController', 'Controller');
/**
 * NutritionalGuides Controller
 *
 * @property NutritionalGuide $NutritionalGuide
 * @property PaginatorComponent $Paginator
 */
class NutritionalGuidesController extends AppController {

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
		$this->NutritionalGuide->recursive = 0;
		$this->set('nutritionalGuides', $this->Paginator->paginate());
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
		if (!$this->NutritionalGuide->exists($id)) {
			throw new NotFoundException(__('Invalid nutritional guide'));
		}
		$options = array('conditions' => array('NutritionalGuide.' . $this->NutritionalGuide->primaryKey => $id));
		$this->set('nutritionalGuide', $this->NutritionalGuide->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "public_dashboard";
		if ($this->request->is('post')) {
			$this->NutritionalGuide->create();
			if ($this->NutritionalGuide->save($this->request->data)) {
				$this->Session->setFlash(__('The nutritional guide has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The nutritional guide could not be saved. Please, try again.'));
			}
		}
		$users = $this->NutritionalGuide->User->find('list');
		$nutritional_guide_types = $this->NutritionalGuide->NutritionalGuideType->find('list', array('fields' => array('id', 'type')));
		$this->set(compact('users', 'nutritional_guide_types'));
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
		if (!$this->NutritionalGuide->exists($id)) {
			throw new NotFoundException(__('Invalid nutritional guide'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->NutritionalGuide->save($this->request->data)) {
				$this->Session->setFlash(__('The nutritional guide has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The nutritional guide could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('NutritionalGuide.' . $this->NutritionalGuide->primaryKey => $id));
			$this->request->data = $this->NutritionalGuide->find('first', $options);
		}
		$users = $this->NutritionalGuide->User->find('list');
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
		$this->NutritionalGuide->id = $id;
		if (!$this->NutritionalGuide->exists()) {
			throw new NotFoundException(__('Invalid nutritional guide'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->NutritionalGuide->delete()) {
			$this->Session->setFlash(__('The nutritional guide has been deleted.'));
		} else {
			$this->Session->setFlash(__('The nutritional guide could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
