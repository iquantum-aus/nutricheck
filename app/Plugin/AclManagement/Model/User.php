<?php
/**
 * User Model
 */
App::uses('AclManagementAppModel', 'AclManagement.Model');
App::uses('CakeEmail', 'Network/Email');
class User extends AclManagementAppModel {
    public $name = 'User';
    public $useTable = "users";
    public $actsAs = array('Acl' => array('type' => 'requester'));
    public $validate = array(
		
/* 		'email' => array(
            'email' => array(
                'required' => true,
                'allowEmpty' => false,
                'rule' => 'email',
                'message' => 'Invalid email.',
                'last' => true
            ),
            'unique' => array(
                'required' => true,
                'allowEmpty' => false,
                'rule' => 'isUnique',
                'message' => 'Email already in use.'
            )
        ) */
		
//        'username' => array(
//            'alphanumeric' => array(
//                'rule' => 'alphaNumeric',
//                'message' => 'Only letters and numbers allowed.'
//            ),
//            'minlength' => array(
//                'rule' => array('minLength', '3'),
//                'message' => 'Minimum length of 3 characters.'
//            ),
//            'maxlength' => array(
//                'rule' => array('maxLength', '32'),
//                'message' => 'Maximum length of 32 characters.'
//            ),
//            'unique' => array(
//                'rule' => 'isUnique',
//                'message' => 'Username already in use.'
//            )
//        ),
       /*  'name' => array(
            'required' => true,
            'allowEmpty' => false,
            'rule' => 'notEmpty',
            'message' => 'You must enter your real name.'
        ),
        'email' => array(
            'email' => array(
                'required' => true,
                'allowEmpty' => false,
                'rule' => 'email',
                'message' => 'Invalid email.',
                'last' => true
            ),
            'unique' => array(
                'required' => true,
                'allowEmpty' => false,
                'rule' => 'isUnique',
                'message' => 'Email already in use.'
            )
        ),
        'password' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Password cannot be left blank'
            ),
            'comparePwd' => array(
                'required' => false,
                'allowEmpty' => false,
                'rule' => 'comparePwd',
                'message' => 'Password mismatch or less than 6 characters.'
            )
        ) */
    );
	
	public $hasOne = array(
		'UserProfile' => array(
			'className' => 'UserProfile',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public $hasMany = array(
		'Answer' => array(
			'className' => 'Answer',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		
		'PerformedCheck' => array(
			'className' => 'PerformedCheck',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		
		'UserAlert' => array(
			'className' => 'UserAlert',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }
    /**
     * Group-only ACL
     * This method will tell ACL to skip checking User Aro’s and to check only Group Aro’s.
     * Every user has to have assigned group_id for this to work.
     *
     * @param <type> $user
     * @return array
     */
    function bindNode($user) {
        return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
    }

	/* public function beforeValidate() {
        if (isset($this->data['User']['id'])) {
            $this->validate['password']['allowEmpty'] = true;
        }

        return true;
    }*/

    public function get_last_access_time($ip_address) {
		$existence_attempt_query = "SELECT datetime FROM nonexisting_user_login_logs WHERE ip_address = '".$ip_address."' ORDER BY id DESC LIMIT 1";
		$result = $this->query($existence_attempt_query);
		return $result[0]['nonexisting_user_login_logs']['datetime'];
	}
	
    public function existence_attempt($data) {
		$existence_attempt_query = "SELECT * FROM existing_user_login_logs WHERE user_id = '".$data['user_id']."'";
		$result = $this->query($existence_attempt_query);
		
		return count($result);
	}
	
    public function nonExistence_attempt($data) {
		$non_existence_attempt_query = "SELECT * FROM nonexisting_user_login_logs WHERE ip_address = '".$data['ip_address']."'";
		$result = $this->query($non_existence_attempt_query);
		
		return count($result);
	}
	
    public function nonexisting_user_login_logs($data) {
		$columns = "";
		$values = "";
		
		$dataCount = count($data);
		$inc = 1;
		foreach($data as $column => $value) {
			
			if($inc < $dataCount) {
				$columns .= $column.", ";
				$values .= "'".$value."', ";
			} else {
				$columns .= $column;
				$values .= "'".$value."'";
			}
			
			$inc++;
		}
		
		$insertNonexistence = "INSERT INTO nonexisting_user_login_logs (".$columns.") VALUES (".$values.")";
		$this->query($insertNonexistence);
	}
	
    public function existing_user_login_logs($data) {
		$columns = "";
		$values = "";
		
		$dataCount = count($data);
		$inc = 1;
		foreach($data as $column => $value) {
			
			if($inc < $dataCount) {
				$columns .= $column.", ";
				$values .= "'".$value."', ";
			} else {
				$columns .= $column;
				$values .= "'".$value."'";
			}
			
			$inc++;
		}
		
		$insertNonexistence = "INSERT INTO existing_user_login_logs (".$columns.") VALUES (".$values.")";
		$this->query($insertNonexistence);
	}
	
    public function remove_existence_attempt_logs($user_id) {
		$query = "DELETE FROM existing_user_login_logs WHERE user_id = '".$user_id."'";
		$this->query($query);
	}
	
    public function remove_nonexistence_attempt_logs($ip_address) {
		$query = "DELETE FROM nonexisting_user_login_logs WHERE ip_address = '".$ip_address."'";
		$this->query($query);
	}
	
    public function get_id($username) {
		$query_existence = "SELECT * FROM users WHERE username= '".$username."' OR email= '".$username."'";
		$user_existence = $this->query($query_existence);
		return $user_existence[0]['users']['id'];
	}
	
    public function user_exist($username) {
		$query_existence = "SELECT * FROM users WHERE username= '".$username."' OR email= '".$username."'";
		$user_existence = $this->query($query_existence);
		
		if(!empty($user_existence)) {
			return true;
		} else {
			return false;
		}
	}
	
    public function beforeSave($options = array()) {
        App::uses('Security', 'Utility');
        App::uses('String', 'Utility');

        if (empty($this->data['User']['password'])) { # empty password -> do not update
            unset($this->data['User']['password']);
        } else {
            $this->data['User']['password'] = Security::hash($this->data['User']['password'], null, true);
        }

        //$this->data['User']['key'] = String::uuid();

        return true;
    }

    public function comparePwd($check) {
        $check['password'] = trim($check['password']);

        if (!isset($this->data['User']['id']) && strlen($check['password']) < 6) {
            return false;
        }

        if (isset($this->data['User']['id']) && empty($check['password'])) {
            return true;
        }

        $r = ($check['password'] == $this->data['User']['password2'] && strlen($check['password']) >= 6);

        if (!$r) {
            $this->invalidate('password2', __d('user', 'Password missmatch.'));
        }

        return $r;
    }

    function forgotPassword($email) {
        App::import('Vendor', 'phpmailer', array('file' => 'phpmailer/class.phpmailer.php'));
		$user = $this->find('first', array("conditions" => array("User.email"=> $email)));
        
		
		if ($user) {
            $id = $user['User']['id'];
            $password = $user['User']['password'];

            $salt = Configure::read("Security.salt");
            $activate_key = md5($password . $salt);
            $expiredTime = strtotime(date('Y-m-d H:i', strtotime('+24 hours')));

            $link = Router::url("/users/activate_password/$id/$activate_key/$expiredTime", true);
            $url = "<a href='".$link."' target='_blank'>".$link."</a>";
            $firstname = $user['UserProfile']['first_name'];
            
			// alerting the created user about the creation of his/her account - only if email address exists
			$mail = new PHPMailer();
			$mail->IsSMTP(); // we are going to use SMTP
			$mail->IsHTML(true);
			$mail->Host = 'smtp.mandrillapp.com';  // Specify main and backup server
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Port = 587;     
			$mail->Username = "greg@iquantum.com.au";
			$mail->Password = "z_Cb_u7etC2ZUJnziGME-w";
			$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

			$mail->From = "Nutricheck Info <info@nutritionmedicine.org>";
			// $mail->FromName('info@nutricheck.com.au', 'NutriCheck Info'); 
			$mail->AddReplyTo("noreply@iquantum.com.au", "noreply@iquantum.com.au");
			$mail->AddAddress($email, $email);
			
			$mail->CharSet  = 'UTF-8'; 
			$mail->WordWrap = 50;  // set word wrap to 50 characters

			$mail->IsHTML(true);  // set email format to HTML 
			
			$mail->Subject = "Forgot Password";
			$message = "
				Hi ".$firstname."
				<br /><br />
				We have received a request to reset the password for your NutriCheck account.
				<br /><br />
				If you would like to reset your password, please click on the link below (or copy and paste the URL into your browser).
				<br /><br />
				
				".$link."
				
				<br /><br />
				This link takes you to a secure page where you can change your password.
				<br /><br />
				If you did not make this request, please contact your Practitioner.
				<br /><br />
				Kind regards
				<br />
				The NutriCheck Team
			";
			
			$mail->Body    = $message;
			$mail->Send();
			
			
			
			
            return true;
        } else {
            return false;
        }
    }

    function confirmRegister($id, $token) {
        $user = $this->find('count', array('conditions'=>array('User.id' => $id, 'User.token' => $token)));
        if ($user) {
           $this->saveAll(array('User'=>array('id'=>$id, 'status'=>1, 'token'=>'')), array('validate'=>false));
           return true;
        }
        return false;
    }

    function activatePassword($data) {
        $user = $this->read(null, $data['User']['ident']);
        if ($user) {
            $password = $user['User']['password'];
            $salt = Configure::read("Security.salt");
            $thekey = md5($password . $salt);

            if ($thekey == $data['User']['activate']) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
	
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