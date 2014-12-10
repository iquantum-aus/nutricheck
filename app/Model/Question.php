<?php
App::uses('AppModel', 'Model');
/**
 * Question Model
 *
 * @property Users $Users
 * @property Factor $Factor
 */
class Question extends AppModel {
	var $displayField = 'question';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'question' => array(
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	
	public $hasMany = array(
		'Answer' => array(
			'className' => 'Answer',
			'foreignKey' => 'question_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		
		'TempAnswer' => array(
			'className' => 'TempAnswer',
			'foreignKey' => 'question_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	
/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Factor' => array(
			'className' => 'Factor',
			'joinTable' => 'factors_questions',
			'foreignKey' => 'question_id',
			'associationForeignKey' => 'factor_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		
		'Qgroup' => array(
			'className' => 'Qgroup',
			'joinTable' => 'questions_qgroups',
			'foreignKey' => 'question_id',
			'associationForeignKey' => 'qgroup_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);
	
	function unbindModelAll($to_all = true) { 
		$unbind = array(); 
		foreach ($this->belongsTo as $model=>$info) 
		{ 
		$unbind['belongsTo'][] = $model; 
		} 
		foreach ($this->hasOne as $model=>$info) 
		{ 
		$unbind['hasOne'][] = $model; 
		} 
		foreach ($this->hasMany as $model=>$info) 
		{ 
		$unbind['hasMany'][] = $model; 
		} 
		foreach ($this->hasAndBelongsToMany as $model=>$info) 
		{ 
		$unbind['hasAndBelongsToMany'][] = $model; 
		} 
		parent::unbindModel($unbind, $to_all); 
	}

}
