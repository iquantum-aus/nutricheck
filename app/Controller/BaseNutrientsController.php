<?php
App::uses('AppController', 'Controller');
/**
 * BaseNutrients Controller
 *
 * @property BaseNutrient $BaseNutrient
 * @property PaginatorComponent $Paginator
 */
class BaseNutrientsController extends AppController {

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
		$this->BaseNutrient->recursive = 0;
		
		$selected_ids = $this->Session->read("BaseNutrient.search_value");
		if ($this->request->is('post')) {
			
			if(isset($this->request->data['BaseNutrient']['id'])) {
				if(!empty($this->request->data['BaseNutrient']['id'])) {
					$selected_ids = $this->request->data['BaseNutrient']['id'];
				}
			}
			
			if(isset($this->request->data['base_nutrient_list']['reset'])) {
				$this->Session->delete("BaseNutrient.search_value");
				$selected_ids = array();
			}
		}
		
		if(!empty($selected_ids)) {
			$condition = array('BaseNutrient.id' => $selected_ids);
			$this->Session->write("BaseNutrient.search_value", $selected_ids);
		}
		
		$this->Paginator->settings = array('limit' => 200);
		$base_nutrient_list = $this->BaseNutrient->find('list', array('fields' => array('id', 'base_nutrient_formula')));
		$this->set("base_nutrient_list", $base_nutrient_list);
		
		$this->paginate = array(
			'order' => 'nutrient_group ASC'
		);
		
		$this->set('selected_ids', $selected_ids);
		$this->set('baseNutrients', $this->Paginator->paginate($condition));
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
		if (!$this->BaseNutrient->exists($id)) {
			throw new NotFoundException(__('Invalid base nutrient'));
		}
		$options = array('conditions' => array('BaseNutrient.' . $this->BaseNutrient->primaryKey => $id));
		$this->set('baseNutrient', $this->BaseNutrient->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "public_dashboard";
		if ($this->request->is('post')) {
			$this->BaseNutrient->create();
			if ($this->BaseNutrient->save($this->request->data)) {
				$this->Session->setFlash(__('The base nutrient has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The base nutrient could not be saved. Please, try again.'));
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
		if (!$this->BaseNutrient->exists($id)) {
			throw new NotFoundException(__('Invalid base nutrient'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BaseNutrient->save($this->request->data)) {
				$this->Session->setFlash(__('The base nutrient has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The base nutrient could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BaseNutrient.' . $this->BaseNutrient->primaryKey => $id));
			$this->request->data = $this->BaseNutrient->find('first', $options);
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
		$this->BaseNutrient->id = $id;
		if (!$this->BaseNutrient->exists()) {
			throw new NotFoundException(__('Invalid base nutrient'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BaseNutrient->delete()) {
			$this->Session->setFlash(__('The base nutrient has been deleted.'));
		} else {
			$this->Session->setFlash(__('The base nutrient could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}