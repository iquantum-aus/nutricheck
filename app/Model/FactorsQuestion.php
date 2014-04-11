<?php
App::uses('AppModel', 'Model');
/**
 * FactorsQuestion Model
 *
 * @property Factors $Factors
 * @property Questions $Questions
 */
class FactorsQuestion extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Factor' => array(
			'className' => 'Factor',
			'foreignKey' => 'factors_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Question' => array(
			'className' => 'Question',
			'foreignKey' => 'questions_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
