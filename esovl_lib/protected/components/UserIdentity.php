<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		include_once 'ucenter.php';  
        list($uid, $username, $password, $email) = uc_user_login($this->username, $this->password);  
		if($uid > 0)  
        {  
			// $user=Vip::model()->find('LOWER(v_name)=?',array(strtolower($this->username)));
			$user=Vip::model()->find('LOWER(v_ucid)=?',array(strtolower($uid)));
			
			if($user===null){
				    Yii::import('application.vendors.*');  
					include_once 'ucenter.php';  
					$user = new Vip;  
					$user->v_name = $username; 
					$user->v_nickname = $username;
					$user->v_pass = md5(rand(10000,99999));  
					$user->v_email = $email;  
					$user->v_ucid = $uid;  
					$user->v_date = date("Y-m-d",time());  
					$user->save(); 
					$user->refresh();  
					
			}
			$this->_id=$user->v_ucid;
			$this->username=$user->v_name;
			$this->setState('role',$user->v_role);
			$auth=Yii::app()->authManager;
			$user->v_loginnum = $user->v_loginnum+1;
			$user->v_logintime = time();
			$user->update();
			$this->errorCode=self::ERROR_NONE;
			
		}elseif($uid == -1)  
        {  
            $this->errorCode=self::ERROR_USERNAME_INVALID;  
        }  
        elseif($uid == -2)  
        {  
            $this->errorCode=self::ERROR_PASSWORD_INVALID;  
        }  
		return $this->errorCode;
	}

	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
		return $this->_id;
	}
}