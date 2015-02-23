<?php
//list user
Router::connect('/admin/users', array('plugin' => 'acl_management', 'controller' => 'users', 'action'=>'index'));
//register
Router::connect('/users/privacy_policy', array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'privacy_policy'));
Router::connect('/users/delete_report/*', array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'delete_report'));
Router::connect('/users/register', array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'register'));
Router::connect('/users/confirm_register', array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'confirm_register'));
Router::connect('/users/edit_profile', array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'edit_profile'));
Router::connect('/users/forgot_password', array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'forgot_password'));
Router::connect('/users/activate_password/*', array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'activate_password'));
//login

// custom
Router::connect('/users/get_performedChecks_dateConstraints/*', array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'get_performedChecks_dateConstraints'));
Router::connect('/users/get_draftChecks_dateConstraints/*', array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'get_draftChecks_dateConstraints'));
Router::connect('/users/get_scheduledChecks_dateConstraints/*', array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'get_scheduledChecks_dateConstraints'));

Router::connect('/users/login', array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'login'));
Router::connect('/admin/users/login', array('admin'=>true, 'plugin' => 'acl_management', 'controller' => 'users', 'action' => 'login'));

Router::connect('/users/dashboard', array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'dashboard'));
Router::connect('/users/nutricheck_activity/*', array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'nutricheck_activity'));
Router::connect('/users/remote_register', array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'remote_register'));
Router::connect('/users/check_email_existence', array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'check_email_existence'));
Router::connect('/users/return_existence', array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'return_existence'));

//logout
Router::connect('/users/logout', array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'logout'));
Router::connect('/admin/users/logout', array('admin'=>true, 'plugin' => 'acl_management', 'controller' => 'users', 'action' => 'logout'));
//user action
Router::connect('/admin/users/add', array('plugin' => 'acl_management', 'controller' => 'users', 'action'=>'add'));
Router::connect('/admin/users/view/*', array('plugin' => 'acl_management', 'controller' => 'users', 'action'=>'view'));
Router::connect('/admin/users/edit/*', array('plugin' => 'acl_management', 'controller' => 'users', 'action'=>'edit'));
Router::connect('/admin/users/delete/*', array('plugin' => 'acl_management', 'controller' => 'users', 'action'=>'delete'));
Router::connect('/admin/users/toggle/*', array('plugin' => 'acl_management', 'controller' => 'users', 'action'=>'toggle'));

//list group
Router::connect('/admin/groups', array('plugin' => 'acl_management', 'controller' => 'groups', 'action'=>'index'));
//groups action
Router::connect('/admin/groups/add', array('plugin' => 'acl_management', 'controller' => 'groups', 'action'=>'add'));
Router::connect('/admin/groups/edit/*', array('plugin' => 'acl_management', 'controller' => 'groups', 'action'=>'edit'));
Router::connect('/admin/groups/delete/*', array('plugin' => 'acl_management', 'controller' => 'groups', 'action'=>'delete'));

//list permissions
Router::connect('/admin/user_permissions', array('plugin' => 'acl_management', 'controller' => 'user_permissions', 'action'=>'index'));
?>
