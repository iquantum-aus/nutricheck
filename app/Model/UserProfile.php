<?php
App::uses('AppModel', 'Model');
/**
 * UserProfile Model
 *
 * @property Users $Users
 */
class UserProfile extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
/* 	public $validate = array(
		'first_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'last_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	); */

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
