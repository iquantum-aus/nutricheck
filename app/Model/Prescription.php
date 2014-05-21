<?php
App::uses('AppModel', 'Model');
/**
 * Prescription Model
 *
 * @property Factor $Factor
 */
class Prescription extends AppModel {

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
		'Factor' => array(
			'className' => 'Factor',
			'foreignKey' => 'factor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
