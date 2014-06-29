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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
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
		),
/* 		'PerformedCheck' => array(
			'className' => 'PerformedCheck',
			'foreignKey' => 'performed_checks_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		), */
		'Choice' => array(
			'className' => 'Choice',
			'foreignKey' => 'choice_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
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
