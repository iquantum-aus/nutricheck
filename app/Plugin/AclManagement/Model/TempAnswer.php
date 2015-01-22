<?php
App::uses('AppModel', 'Model');
/**
 * TempAnswer Model
 *
 * @property Questions $Questions
 * @property Factors $Factors
 * @property Choice $Choice
 */
class TempAnswer extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ip_address' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
		'Question' => array(
			'className' => 'Question',
			'foreignKey' => 'question_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Factor' => array(
			'className' => 'Factor',
			'foreignKey' => 'factor_id',
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
