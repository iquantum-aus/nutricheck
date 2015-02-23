<?php
App::uses('AppController', 'Controller');
/**
 * Answers Controller
 *
 * @property Answer $Answer
 * @property PaginatorComponent $Paginator
 */
class AnswersController extends AppController {
	
	var $uses = array('Answer', 'FactorsQuestion');
	
	function beforeFilter() {
		parent::beforeFilter();
		
		$user_id = $this->Session->read('Auth.User.id');
		if(empty($user_id)) {
			$this->Auth->allow('report');
		} else {
			$this->Auth->allow('report', 'load_date_report');
		}
	}

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
		$this->Answer->recursive = 0;
		$this->set('answers', $this->Paginator->paginate(array('Answer.status' => 1)));
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
		if (!$this->Answer->exists($id)) {
			throw new NotFoundException(__('Invalid answer'));
		}
		$options = array('conditions' => array('Answer.' . $this->Answer->primaryKey => $id));
		$this->set('answer', $this->Answer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "public_dashboard";
		if ($this->request->is('post')) {
			$this->Answer->create();
			if ($this->Answer->save($this->request->data)) {
				$this->Session->setFlash(__('The answer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The answer could not be saved. Please, try again.'));
			}
		}
		$users = $this->Answer->User->find('list');
		$questions = $this->Answer->Question->find('list');
		$choices = $this->Answer->Choice->find('list');
		$this->set(compact('users', 'questions', 'choices'));
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
		if (!$this->Answer->exists($id)) {
			throw new NotFoundException(__('Invalid answer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Answer->save($this->request->data)) {
				$this->Session->setFlash(__('The answer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The answer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Answer.' . $this->Answer->primaryKey => $id));
			$this->request->data = $this->Answer->find('first', $options);
		}
		$users = $this->Answer->User->find('list');
		$questions = $this->Answer->Question->find('list');
		$choices = $this->Answer->Choice->find('list');
		$this->set(compact('users', 'questions', 'choices'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Answer->id = $id;
		if (!$this->Answer->exists()) {
			throw new NotFoundException(__('Invalid answer'));
		}
		$this->request->onlyAllow('post', 'delete');
		
		$this->request->data['Answer']['id'] = $id;
		$this->request->data['Answer']['status'] = 0;
		
		if ($this->Answer->save($this->request->data)) {
			$this->Session->setFlash(__('The answer has been deleted.'));
		} else {
			$this->Session->setFlash(__('The answer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
/**
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function report($source = null) {
		
		if($source == "system") {
			$this->layout = "public_dashboard";
		} else {
			$this->layout = "iframe-layout";
		}
		
		$user_id = $this->Session->read('Auth.User.id');
		
		$factors = $this->Answer->Question->Factor->find('list', array('conditions' => array('Factor.status' => 0)));
		$latest_answer_date = $this->Answer->find('first', array('group' => array('Answer.created'), 'order' => array('Answer.created' => 'DESC'), 'conditions' => array('Answer.user_id' => $user_id)));
		
		$reports_per_factor = array();
		$previous_factor = 0;
		$current_factor = 0;
		$inc = 0;
		
		$temp_answer = $this->Session->read('temp_answers');
		
		if(empty($user_id) && !empty($temp_answer)) {
			$answers = $temp_answer;
			unset($temp_answer['TempAnswer']);
		} else {
			$this->Answer->unbindModelAll();
			$answers = $this->Answer->find('all', array('order' => array('Answer.factor_id ASC'), 'conditions' => array('Answer.user_id' => $user_id, 'Answer.created <=' => $latest_answer_date['Answer']['created'], 'Answer.created >=' => $latest_answer_date['Answer']['created'])));
		}
		
		foreach($answers as $key => $answer) {
			$question_id = $answer['Answer']['question_id'];
			
			$this->FactorsQuestion->unbindModelAll();
			$associations = $this->FactorsQuestion->find('all', array('conditions' => array('question_id' => $question_id)));
			
			foreach($associations as $association) {
				$answer['FactorsQuestion'] = $association['FactorsQuestion'];
				
				$factor_id = $answer['FactorsQuestion']['factor_id'];
				$inc++;
				
				$reports_per_factor[$factor_id][$inc] = $answer;
			}
		}
		
		ksort($reports_per_factor);
		
		$factors = $this->Answer->Question->Factor->find('list', array('conditions' => array('Factor.status' => 1)));
		
		$this->Answer->Question->Factor->Prescription->unbindModelAll();
		$prescriptions = $this->Answer->Question->Factor->Prescription->find('all', array('conditions' => array('Prescription.status' => 1)));
		
		
		/* ----------------------------------------------------------------- SCRIPT TO GROUP PRESCRIPTION BY FACTOR ------------------------------------------------------------- */
		
		$grouped_prescriptions = array();
		
		foreach($prescriptions as $key => $prescription) {
			if(!empty($prescription['Prescription']['factor_id'])) {
				$grouped_prescriptions[$prescription['Prescription']['factor_id']][$key] = $prescription;
			}
		}
		
		/* ----------------------------------------------------------------- SCRIPT TO GROUP PRESCRIPTION BY FACTOR ------------------------------------------------------------- */
		
		// pr($grouped_prescriptions);
		
		$this->set('factors', $factors);
		$this->set('grouped_prescriptions', $grouped_prescriptions);
		$this->set('reports_per_factor', $reports_per_factor);
	}
	
	
	
	###################################################### REPORT PER DATE FUNCTION HERE ##################################################
	
	public function load_date_report($completion_time, $user_id, $performed_check_id) {
		$this->layout = "public_dashboard";
		$this->loadModel('BaseNutrient');
		$this->loadModel('SelectedFactor');
		$this->loadModel('Prescription');
		
		// $user_id = $this->Session->read('Auth.User.id');
		
		// $factors = $this->Answer->Question->Factor->find('list', array('conditions' => array('Factor.status' => 0)));
		$user_info = $this->Answer->User->findById($user_id);
		
		$selected_factors = $this->SelectedFactor->find('list', array('conditions' => array('performed_check_id' => $performed_check_id), 'fields' => array('id', 'factor_id')));
		
		/* ---------------------------------------- this is for the purpose of blocking a null/zero value being returned when searching for a selected factor ---------------------------------*/
			$selected_factor_string = "";
			if(count($selected_factors) == 1) {
				$selected_factor_string = implode('', $selected_factors);
				if($selected_factor_string == "0" || $selected_factor_string == "") { $selected_factors = array(); }
			}
		/* ---------------------------------------- this is for the purpose of blocking a null/zero value being returned when searching for a selected factor ---------------------------------*/
		
		$reports_per_factor = array();
		$previous_factor = 0;
		$current_factor = 0;
		$inc = 0;
			
		$base_nutrients = array();
		if(!empty($selected_factors)) {
			$base_nutrients = $this->Prescription->find('list', array('fields' => array('id', 'base_nutrient_id'),'conditions' => array('factor_id' => $selected_factors)));
		}
		
		$temp_answer = $this->Session->read('temp_answers');
		
		if(empty($user_id) && !empty($temp_answer)) {
			unset($temp_answer['TempAnswer']);
			$answers = $temp_answer;
		} else {
			$this->Answer->unbindModelAll();
			$answers = $this->Answer->find('all', array('order' => array('Answer.factor_id ASC'), 'conditions' => array('Answer.user_id' => $user_id, 'Answer.completion_time' => $completion_time)));
		}
		
		
		foreach($answers as $key => $answer) {
			$question_id = $answer['Answer']['question_id'];
			
			$this->FactorsQuestion->unbindModelAll();
			$associations = $this->FactorsQuestion->find('all', array('conditions' => array('question_id' => $question_id)));
			
			foreach($associations as $association) {
				
				$answer['FactorsQuestion'] = $association['FactorsQuestion'];
				$factor_id = $answer['FactorsQuestion']['factor_id'];
				$inc++;
				
				if($selected_factors) {
					if(in_array($factor_id, $selected_factors)) {
						$reports_per_factor[$factor_id][$inc] = $answer;
					}
					
				} else {
					$reports_per_factor[$factor_id][$inc] = $answer;
				}
			}
		}
		
		ksort($reports_per_factor);
		
		$factors = $this->Answer->Question->Factor->find('list', array('conditions' => array('Factor.status' => 1)));
		$factor_types = $this->Answer->Question->Factor->FactorType->find('list', array('conditions' => array('FactorType.status' => 1)));
		$nutritional_guides = $this->Answer->Question->Factor->NutritionalGuide->find('list', array('fields' => array('factor_id', 'description'), 'conditions' => array('NutritionalGuide.factor_id <>' => 0, 'NutritionalGuide.status' => 1)));
		
		$this->Answer->Question->Factor->Prescription->unbindModel(
			array(
				"belongsTo" => array("Factor")
			)
		);
		
		if(!empty($base_nutrients)) {
			$prescriptions = $this->Answer->Question->Factor->Prescription->find('all', array('conditions' => array('Prescription.status' => 1, 'Prescription.base_nutrient_id' => $base_nutrients)));
		} else {
			$prescriptions = $this->Answer->Question->Factor->Prescription->find('all', array('conditions' => array('Prescription.status' => 1)));
		}
		
		/* ----------------------------------------------------------------- SCRIPT TO GROUP PRESCRIPTION BY FACTOR ------------------------------------------------------------- */
		
		$grouped_prescriptions = array();
		
		foreach($prescriptions as $key => $prescription) {
			if(!empty($prescription['Prescription']['factor_id'])) {
				$grouped_prescriptions[$prescription['Prescription']['factor_id']][$key] = $prescription;
			}
		}

		
		/* ----------------------------------------------------------------- SCRIPT TO GROUP PRESCRIPTION BY FACTOR ------------------------------------------------------------- */
		
		$factor_type_grouping = array();
		foreach($grouped_prescriptions as $grouped_key => $grouped_prescription_breakdown) {
			$factor_info = $this->Answer->Question->Factor->findById($grouped_key);
			$factor_type_grouping[$factor_info['FactorType']['id']][$grouped_key]['factor_type_id'] = $factor_info['FactorType']['id'];
			$factor_type_grouping[$factor_info['FactorType']['id']][$grouped_key]['factor_type'] = $factor_info['FactorType']['type'];
			$factor_type_grouping[$factor_info['FactorType']['id']][$grouped_key]['factor_id'] = $grouped_key;
		}
		
		$base_nutrient = $this->BaseNutrient->find('all', array('fields' => array('id', 'base_nutrient_formula', 'nutrient_group', 'maximum_dosage', 'order'), 'order' => 'nutrient_group ASC'));
		$this->set('base_nutrient', $base_nutrient);
		
		$this->set('selected_factors', $selected_factors);
		$this->set('factor_type_grouping', $factor_type_grouping);
		$this->set('factor_types', $factor_types);
		$this->set('factors', $factors);
		$this->set('nutritional_guides', $nutritional_guides);
		$this->set('grouped_prescriptions', $grouped_prescriptions);
		$this->set('reports_per_factor', $reports_per_factor);
		
		$this->set("base_nutrients", $base_nutrients);
		$this->set("completion_time", $completion_time);
		$this->set("user_info", $user_info);
		$this->set("user_id", $user_id);
		$this->set("performed_check_id", $performed_check_id);
	}
	
	###################################################### REPORT PER DATE FUNCTION HERE ##################################################
	
	public function report_print($completion_time, $user_id, $performed_check_id) {
		$this->layout = "ajax_plus_scripts";
		$this->loadModel('UserProfile');
		$this->loadModel('BaseNutrient');
		$this->loadModel('SelectedFactor');
		$this->loadModel('Prescription');
		
		$selected_factors = $this->SelectedFactor->find('list', array('conditions' => array('performed_check_id' => $performed_check_id), 'fields' => array('id', 'factor_id')));
		$factors = $this->Answer->Question->Factor->find('list', array('conditions' => array('Factor.status' => 0)));
		$user_info = $this->Answer->User->findById($user_id);
		
		/* ---------------------------------------- this is for the purpose of blocking a null/zero value being returned when searching for a selected factor ---------------------------------*/
			$selected_factor_string = "";
			if(count($selected_factors) == 1) {
				$selected_factor_string = implode('', $selected_factors);
				if($selected_factor_string == "0" || $selected_factor_string == "") { $selected_factors = array(); }
			}
		/* ---------------------------------------- this is for the purpose of blocking a null/zero value being returned when searching for a selected factor ---------------------------------*/
		
		$base_nutrients = array();
		if(!empty($selected_factors)) {
			$base_nutrients = $this->Prescription->find('list', array('fields' => array('id', 'base_nutrient_id'),'conditions' => array('factor_id' => $selected_factors)));
		}
		
		$reports_per_factor = array();
		$previous_factor = 0;
		$current_factor = 0;
		$inc = 0;
		
		$temp_answer = $this->Session->read('temp_answers');
		
		if(empty($user_id) && !empty($temp_answer)) {
			unset($temp_answer['TempAnswer']);
			$answers = $temp_answer;
		} else {
			$this->Answer->unbindModelAll();
			$answers = $this->Answer->find('all', array('order' => array('Answer.factor_id ASC'), 'conditions' => array('Answer.user_id' => $user_id, 'Answer.completion_time' => $completion_time)));
		}
		
		foreach($answers as $key => $answer) {
			$question_id = $answer['Answer']['question_id'];
			
			$this->FactorsQuestion->unbindModelAll();
			$associations = $this->FactorsQuestion->find('all', array('conditions' => array('question_id' => $question_id)));
			
			foreach($associations as $association) {
				
				$answer['FactorsQuestion'] = $association['FactorsQuestion'];
				$factor_id = $answer['FactorsQuestion']['factor_id'];
				$inc++;
				
				if($selected_factors) {
					if(in_array($factor_id, $selected_factors)) {
						$reports_per_factor[$factor_id][$inc] = $answer;
					}
					
				} else {
					$reports_per_factor[$factor_id][$inc] = $answer;
				}
			}
		}
		
		ksort($reports_per_factor);
		
		$factors = $this->Answer->Question->Factor->find('list', array('conditions' => array('Factor.status' => 1)));
		$factor_types = $this->Answer->Question->Factor->FactorType->find('list', array('conditions' => array('FactorType.status' => 1)));
		$nutritional_guides = $this->Answer->Question->Factor->NutritionalGuide->find('list', array('fields' => array('factor_id', 'description'), 'conditions' => array('NutritionalGuide.factor_id <>' => 0, 'NutritionalGuide.status' => 1)));
		
		$this->Answer->Question->Factor->Prescription->unbindModel(
			array(
				"belongsTo" => array("Factor")
			)
		);
		
		if(!empty($base_nutrients)) {
			$prescriptions = $this->Answer->Question->Factor->Prescription->find('all', array('conditions' => array('Prescription.status' => 1, 'Prescription.base_nutrient_id' => $base_nutrients)));
		} else {
			$prescriptions = $this->Answer->Question->Factor->Prescription->find('all', array('conditions' => array('Prescription.status' => 1)));
		}
		
		/* ----------------------------------------------------------------- SCRIPT TO GROUP PRESCRIPTION BY FACTOR ------------------------------------------------------------- */
		
		$grouped_prescriptions = array();
		
		foreach($prescriptions as $key => $prescription) {
			if(!empty($prescription['Prescription']['factor_id'])) {
				$grouped_prescriptions[$prescription['Prescription']['factor_id']][$key] = $prescription;
			}
		}
		
		/* ----------------------------------------------------------------- SCRIPT TO GROUP PRESCRIPTION BY FACTOR ------------------------------------------------------------- */
		
		$factor_type_grouping = array();
		foreach($grouped_prescriptions as $grouped_key => $grouped_prescription_breakdown) {
			$factor_info = $this->Answer->Question->Factor->findById($grouped_key);
			$factor_type_grouping[$factor_info['FactorType']['id']][$grouped_key]['factor_type_id'] = $factor_info['FactorType']['id'];
			$factor_type_grouping[$factor_info['FactorType']['id']][$grouped_key]['factor_type'] = $factor_info['FactorType']['type'];
			$factor_type_grouping[$factor_info['FactorType']['id']][$grouped_key]['factor_id'] = $grouped_key;
		}
		
		$user_info = $this->Answer->User->findById($user_id);
		$user_profile = $this->UserProfile->findByUserId($user_id);
		$user_info['UserProfile'] = $user_profile['UserProfile'];
		
		$base_nutrient = $this->BaseNutrient->find('all', array('fields' => array('id', 'base_nutrient_formula', 'nutrient_group', 'maximum_dosage', 'order'), 'order' => 'nutrient_group ASC'));
		$this->set('base_nutrient', $base_nutrient);
		
		$this->set('selected_factors', $selected_factors);
		$this->set('factor_type_grouping', $factor_type_grouping);
		$this->set('factor_types', $factor_types);
		$this->set('factors', $factors);
		$this->set('nutritional_guides', $nutritional_guides);
		$this->set('grouped_prescriptions', $grouped_prescriptions);
		$this->set('reports_per_factor', $reports_per_factor);
		
		$this->set("user_info", $user_info);
		$this->set("completion_time", $completion_time);
		$this->set("user_id", $user_id);
	}
}