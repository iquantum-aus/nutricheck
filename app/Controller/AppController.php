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
                    'fields' => array('username' => 'email'),
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
		$this->Auth->loginRedirect = array('plugin'=>false,
		'controller' => 'users', 'action' => 'dashboard');  
	}
	
	public function var_debug($variable) {
		echo "<pre>";
			print_r($variable);
		echo "</pre>";
	}
}