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
		
		$conditions = array('NutritionalGuideType.status' => 1);
		$selected_guide_type = $this->Session->read('NutritionalGuideType.selected_guide_type');
		if ($this->request->is('post')) {
			if(!empty($this->request->data['NutritionalGuideType']['id']) && !isset($this->request->data['NutritionalGuideType']['reset'])) {
				$selected_guide_type = $this->request->data['NutritionalGuideType']['id'];
				$this->Session->write('NutritionalGuideType.selected_guide_type', $selected_guide_type);
			}
			
			if(isset($this->request->data['NutritionalGuideType']['reset'])) {
				$this->Session->delete('NutritionalGuideType.selected_guide_type');	
				unset($this->request->data['NutritionalGuideType']['id']);
				$selected_guide_type = "";
			}
		}
		
		if(!empty($selected_guide_type)) {
			$this->paginate = array(
				'conditions' => array(
					'and' => array (
						"NutritionalGuideType.id" => $selected_guide_type,
						"NutritionalGuideType.status" => 1
					)
				)
			);
			
			$this->set("selected_guide_type", $selected_guide_type);
		}
		
		$nutrition_guide_type = $this->paginate($conditions);
		$this->set('nutritionalGuideTypes', $nutrition_guide_type);
		
		$nutritional_guide_type_list = $this->NutritionalGuideType->find('list', array("conditions" => array('NutritionalGuideType.status' => 1), 'fields' => array('id', 'type')));
		$this->set("nutritional_guide_type_list", $nutritional_guide_type_list);
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
