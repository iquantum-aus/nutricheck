<?php
App::uses('AppController', 'Controller');
/**
 * Factors Controller
 *
 * @property Factor $Factor
 * @property PaginatorComponent $Paginator
 */
class FactorsController extends AppController {

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
		$this->Factor->recursive = 0;
		
		$search_value = $this->Session->read("Factor.search_value");
		if($this->request->is('post')) {
			/* ------------------------------------------------------------ IF SUBMIT BUTTON IS HIT ------------------------------------------------------------*/
			if(!empty($this->request->data['Factor']['search_value'])) {
				if(!isset($this->request->data['Factor']['reset'])) {
					$search_value = $this->request->data['Factor']['search_value'];
					$this->Session->write('Factor.search_value', $this->request->data['Factor']['search_value']);
				}
			}
			
			/* ------------------------------------------------------------ IF RESET BUTTON IS HIT ------------------------------------------------------------*/
			if(isset($this->request->data['Factor']['reset'])) {
				$this->Session->delete('Factor.search_value');
				unset($this->request->data['Factor']['search_value']);
				$search_value = "";
			}
		}
		
		if(!empty($search_value)) {
			$this->paginate = array(
				'conditions' => array(
					'or' => array (
						'Factor.name LIKE "%'.$search_value.'%"',
						'Factor.description LIKE "%'.$search_value.'%"',
						'FactorType.type LIKE "%'.$search_value.'%"'
					),
					'and' => array (
						'Factor.status' => 1,
						'FactorType.status' => 1
					)
				)
			);
			
			$this->set("search_value", $search_value);
		}
		
		$factors = $this->paginate();
		$this->set('factors', $factors);
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
		if (!$this->Factor->exists($id)) {
			throw new NotFoundException(__('Invalid factor'));
		}
		$options = array('conditions' => array('Factor.' . $this->Factor->primaryKey => $id));
		$this->set('factor', $this->Factor->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "public_dashboard";
		if ($this->request->is('post')) {
			$this->Factor->create();
			if ($this->Factor->save($this->request->data)) {
				$this->request->data['Factor']['user_id'] = $this->Session->read('Auth.User.id');
				$this->Session->setFlash(__('The factor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The factor could not be saved. Please, try again.'));
			}
		}
		
		$factorTypes = $this->Factor->FactorType->find('list');
		$users = $this->Factor->User->find('list');
		$questions = $this->Factor->Question->find('list');
		$this->set(compact('users', 'questions', 'factorTypes'));
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
		if (!$this->Factor->exists($id)) {
			throw new NotFoundException(__('Invalid factor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Factor->save($this->request->data)) {
				$this->Session->setFlash(__('The factor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The factor could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Factor.' . $this->Factor->primaryKey => $id));
			$this->request->data = $this->Factor->find('first', $options);
		}
		
		$factorTypes = $this->Factor->FactorType->find('list');
		$users = $this->Factor->User->find('list');
		$questions = $this->Factor->Question->find('list');
		$this->set(compact('users', 'questions', 'factorTypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Factor->id = $id;
		if (!$this->Factor->exists()) {
			throw new NotFoundException(__('Invalid factor'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Factor->delete()) {
			$this->Session->setFlash(__('The factor has been deleted.'));
		} else {
			$this->Session->setFlash(__('The factor could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}