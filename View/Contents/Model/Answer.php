<?php
App::uses('AppModel', 'Model');
/**
 * Answer Model
 *
 * @property Users $Users
 * @property Questions $Questions
 * @property PerformedChecks $PerformedChecks
 * @property Choice $Choice
 */
class Answer extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'status' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Users' => array(
			'className' => 'Users',
			'foreignKey' => 'users_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Questions' => array(
			'className' => 'Questions',
			'foreignKey' => 'questions_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PerformedChecks' => array(
			'className' => 'PerformedChecks',
			'foreignKey' => 'performed_checks_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Choice' => array(
			'className' => 'Choice',
			'foreignKey' => 'choice_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
