<?php
App::uses('AppModel', 'Model');
/**
 * SelectedFactor Model
 *
 * @property PerformedCheck $PerformedCheck
 * @property Factor $Factor
 */
class SelectedFactor extends AppModel {

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
		'PerformedCheck' => array(
			'className' => 'PerformedCheck',
			'foreignKey' => 'performed_check_id',
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
		)
	);
}
