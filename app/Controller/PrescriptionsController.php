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
		
		$this->Paginator->settings = array('limit' => 1000);
		
		$search_value = $this->Session->read("Prescription.search_value");
		if($this->request->is('post')) {
			/* ------------------------------------------------------------ IF SUBMIT BUTTON IS HIT ------------------------------------------------------------*/
			if(!empty($this->request->data['Prescription']['search_value'])) {
				if(!isset($this->request->data['Prescription']['reset'])) {
					$search_value = $this->request->data['Prescription']['search_value'];
					$this->Session->write('Prescription.search_value', $this->request->data['Prescription']['search_value']);
				}
			}
			
			/* ------------------------------------------------------------ IF RESET BUTTON IS HIT ------------------------------------------------------------*/
			if(isset($this->request->data['Prescription']['reset'])) {
				$this->Session->delete('Prescription.search_value');
				unset($this->request->data['Prescription']['search_value']);
				$search_value = "";
			}
		}
		
		$conditions = array('Prescription.status' => 1);
		if(!empty($search_value)) {
			$this->paginate = array(
				'conditions' => array(
					'or' => array (
						'Prescription.functional_disturbance LIKE "%'.$search_value.'%"',
						'Factor.name LIKE "%'.$search_value.'%"'
					)
				),
				'limit' => 1000
			);
			
			$this->set("search_value", $search_value);
		}
		
		$prescriptions = $this->paginate($conditions);
		$this->set('prescriptions', $prescriptions);
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
		$base_nutrients = $this->Prescription->BaseNutrient->find('list', array('fields' => array('id', 'base_nutrient_formula')));				
		$this->set(compact('factors', 'base_nutrients'));
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
		$base_nutrients = $this->Prescription->BaseNutrient->find('list', array('fields' => array('id', 'base_nutrient_formula')));				
		$this->set(compact('factors', 'base_nutrients'));
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