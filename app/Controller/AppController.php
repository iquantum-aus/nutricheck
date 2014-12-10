<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $theme = "Bootstrap";
	public $components = array(
        'Acl',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'username'),
                    'scope'  => array('User.status' => 1)
                )
            ),
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session'
    );

	public function beforeFilter() {
		parent::beforeFilter();
		
		$this->loadModel('PageAccessFlag');
		$params = $this->params;
		$user_info = $this->Session->read('Auth.User');
		
		$today = date('Y-m-d')." 00:00:00.000000";
		$tomorrow = date("Y-m-d", strtotime($today." + 1 day"))." 00:00:00.000000";
		
		
		if(isset($user_info['id']) && !empty($user_info['id'])) {
			if($user_info['group_id'] == 3) {
				$page_access_log = array();
				$page_access_log['PageAccessFlag']['plugin'] = $params->params['plugin'];
				$page_access_log['PageAccessFlag']['controller'] = $params->params['controller'];
				$page_access_log['PageAccessFlag']['action'] = $params->params['action'];
				$page_access_log['PageAccessFlag']['user_id'] = $user_info['id'];
				$page_access_log['PageAccessFlag']['group_id'] = $user_info['group_id'];
				
				// $log_validity_existence = $this->PageAccessFlag->find('first', array('conditions' => array('PageAccessFlag.created >=' => $today, 'PageAccessFlag.created <' => $tomorrow)));
				
				$this->PageAccessFlag->create();
				$this->PageAccessFlag->save($page_access_log);
			}
		}
		 
		
		
		// $this->Auth->allow();//must comment after generate action
 
		//Configure AuthComponent
		$this->Auth->loginAction = '/users/login';
		$this->Auth->logoutRedirect = '/users/login';
		$this->Auth->loginRedirect = array('plugin'=>false,'controller' => 'users', 'action' => 'dashboard');  
		$this->Auth->userScope = array('User.status' => 1);
	}
	
	public function var_debug($variable) {
		echo "<pre>";
			print_r($variable);
		echo "</pre>";
	}
	
	public function pharmacists() {
        $pharmacists = $this->User->find('list', array('conditions' => array('group_id' => '2'), 'fields' => array('id', 'id')));
		$this->User->UserProfile->unbindModelAll();
		
		$pharmacists_name = array();
		foreach($pharmacists as $pharmacist_id => $pharmacist) {
			$user_profile = $this->User->UserProfile->find('first', array('conditions' => array('user_id' => $pharmacist), 'fields' => array('company', 'first_name', 'last_name')));
			
			if(!empty($user_profile)) {
				if(!empty($user_profile['UserProfile']['company'])) {
					$pharmacists_name[$pharmacist_id] = $user_profile['UserProfile']['company'];
				} else {
					$pharmacists_name[$pharmacist_id] = $user_profile['UserProfile']['first_name']." ".$user_profile['UserProfile']['first_name'];
				}
			}
		}
		
		return $pharmacists_name;
	}

	public function user_type($user_type) {
        $userTypes = $this->User->find('list', array('conditions' => array('group_id' => $user_type), 'fields' => array('id', 'id')));
		$this->User->UserProfile->unbindModelAll();
		
		$userTypes_name = array();
		foreach($userTypes as $userType_id => $userType) {
			$user_profile = $this->User->UserProfile->find('first', array('conditions' => array('user_id' => $userType), 'fields' => array('company', 'first_name', 'last_name')));
			
			if(!empty($user_profile)) {
				if(!empty($user_profile['UserProfile']['company'])) {
					$userTypes_name[$userType_id] = $user_profile['UserProfile']['company'];
				} else {
					$userTypes_name[$pharmacist_id] = $user_profile['UserProfile']['first_name']." ".$user_profile['UserProfile']['first_name'];
				}
			}
		}
		
		return $userTypes_name;
	}
	
	public function randomNumber($length) {
		$result = '';

		for($i = 0; $i < $length; $i++) {
			$result .= mt_rand(0, 9);
		}

		return $result;
	}
}