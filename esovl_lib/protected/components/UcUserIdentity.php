<?php  
  
/** 
 * UserIdentity represents the data needed to identity a user. 
 * It contains the authentication method that checks if the provided 
 * data can identity the user. 
 */  
class UcUserIdentity extends CUserIdentity  
{     
    public $id;  
      
    /** 
     * Constructor. 
     * @param string $username username 
     */  
    public function __construct($username)  
    {  
        $this->username=$username;  
        $this->password='';  
    }  
    /** 
     * Authenticates a user. 
     * The example implementation makes sure if the username and password 
     * are both 'demo'. 
     * In practical applications, this should be changed to authenticate 
     * against some persistent user identity storage (e.g. database). 
     * @return boolean whether authentication succeeds. 
     */  
    public function authenticate()  
    {  
        $user = Vip::model()->findByAttributes(array('v_name'=>$this->username));  
          
        if($user == null)//说明网站数据库中没有，而ucenter中有这个用户，添加用户  
        {  
            //ucenter  
            Yii::import('application.vendors.*');  
            include_once 'ucenter.php';  
            list($uid, $username, $email) = uc_get_user($this->username);  
            if($uid)  
            {  
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
        }  
          
        $this->id = $user->v_ucid;  
          
        // $user->last_login_time = $user->this_login_time;  
        $user->v_logintime = time();  
		$user->v_loginnum=$user->v_loginnum+1;
        // $user->last_login_ip = $user->this_login_ip;  
        // $user->this_login_ip = Yii::app()->getRequest()->userHostAddress;  
        $user->save();   
          
        $this->errorCode=self::ERROR_NONE;  
          
        return !$this->errorCode;  
    }  
      
    public function getId()  
    {  
        return $this->id;  
    }  
}  