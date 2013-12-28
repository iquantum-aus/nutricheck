<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property UserGroups $UserGroups
 * @property Vitamin $Vitamin
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
 
	public function beforeFilter() {
		parent::beforeFilter();

		// For CakePHP 2.1 and up
		$this->Auth->allow();
	}
	
	public $validate = array(
		'username' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_groups_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		'UserGroup' => array(
			'className' => 'UserGroup',
			'foreignKey' => 'user_groups_id',
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
		'Vitamin' => array(
			'className' => 'Vitamin',
			'joinTable' => 'users_vitamins',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'vitamin_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);
	
	public function beforeSave($options = array()) {
        $this->data['User']['password'] = AuthComponent::password(
          $this->data['User']['password']
        );
        return true;
    }
	
    public $actsAs = array('Acl' => array('type' => 'requester'));

    function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['user_groups_id'])) {
			$groupId = $this->data['User']['user_groups_id'];
        } else {
            $groupId = $this->field('user_groups_id');
        }
        if (!$groupId) {
			return null;
        } else {
            return array('UserGroup' => array('id' => $groupId));
        }
    }
	
	function bindNode($user) {
		return array('model' => 'UserGroup', 'foreign_key' => $user['User']['user_groups_id']);
	}
}
