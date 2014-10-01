<?php
App::uses('AppModel', 'Model');
/**
 * NutritionalGuide Model
 *
 * @property User $User
 * @property Factor $Factor
 * @property NutritionalGuideType $NutritionalGuideType
 */
class NutritionalGuide extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';


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
		'Factor' => array(
			'className' => 'Factor',
			'foreignKey' => 'factor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'NutritionalGuideType' => array(
			'className' => 'NutritionalGuideType',
			'foreignKey' => 'nutritional_guide_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
