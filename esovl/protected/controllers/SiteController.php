<?php

class SiteController extends Controller {
    public $layout='home';

	public function actions() {
        return array(
                'captcha'=>array(
                        'class'=>'CCaptchaAction',
                        'backColor'=>0xFFFFFF,
                        'maxLength'=>'6',
                        'minLength'=>'4',
                        'testLimit'=>'3',//三次之后更新验证码
                ),
        );
    }
	public function actionCleanCache(){
        Yii::app()->cache->flush();
        echo "success";exit;
    }
	
    public function actionIndex() {
		//首页客服
		$kefu=Customerservice::model()->getAllKefu();
		//首页推荐新闻
		$TjNews=Nnews::model()->getTjNews();
		//推荐学校
		$TjSchool=MbStep::model()->getTjSchool();
		//其他学校
		$NotTjSchool=Mbstep::model()->getNotTjSchool();
		//考试日历
		$excalModel=Excal::model()->getRecentlyRl();
		//推荐逛
		$Tjguang=Mxtj::model()->getTjguang();
		//热推荐
		$TjrHot=Mxtj::model()->getTjrHot();
		//广告
		$Guanggao=Guanggao::model()->getGuanggao();
		//幻灯片
		$HomeSlide=Slide::model()->getHomeSlide(0);
		// print_r($Tjguang);exit;
        $this->render('index',array(
			'kefu'=>$kefu,
			'TjNews'=>$TjNews,
			'TjSchool'=>$TjSchool,
			'NotTjSchool'=>$NotTjSchool,
			'excalModel'=>$excalModel,
			'Tjguang'=>$Tjguang,
			'TjrHot'=>$TjrHot,
			'Guanggao'=>$Guanggao,
			'HomeSlide'=>$HomeSlide,
		));
    }
	public function actionError() {
        if($error=Yii::app()->errorHandler->error) {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

	public function actionLogin(){ 
		if(!Yii::app()->user->isGuest) {
            $this->redirect(array('user/index'));
        }
        $model=new LoginForm; 
        // if it is ajax validation request  
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')  
        {  
            echo CActiveForm::validate($model);  
            Yii::app()->end();  
        }  
        if(isset($_POST['LoginForm'])){
			$post=$_POST['LoginForm'];
			$model->attributes=$post;
            if($model->validate() && $model->login())  
            {  
				include_once 'ucenter.php';  
				$newpm = uc_user_login($model->username,$model->password);
				$script=uc_user_synlogin($newpm['0']);
				if(isset($_POST["loginType"])) {
                    echo "登录成功";
					echo $script;
                    exit;
                }
				$this->render('loginsuc', array(  
                    'script' => $script,  
                )); 
				
				Yii::app()->end();  
            }else{
				if(isset($_POST["loginType"])) {
                    echo "账户名或密码错误";
                    exit;
                }
			}  
        }  
        $this->render('login',array('model'=>$model));  
    }
	public function actionLogout(){
        // Yii::app()->user->logout();  
        //ucenter  
        include_once 'ucenter.php';  
		$script = uc_user_synlogout();  
        $this->render('logoutsuc', array(  
            'script' => $script,  
        )); 
        Yii::app()->end();  
    }
	public function actionReger(){
		$model=new RegisterForm; 
		if(!Yii::app()->user->isGuest) {
            $this->redirect(array('user/index'));
        }
		  
		  
		if(isset($_POST['RegisterForm'])) {
			$model->attributes=$_POST['RegisterForm'];
			if($model->validate()) {
				include_once 'ucenter.php';  
				$uid = uc_user_register($model->username, $model->password, $model->email);  
				if($uid>0){
					$Vmodel = new Vip;  
					$Vmodel->v_ucid=$uid;	
					$Vmodel->v_name=$model->username;
					$Vmodel->v_email=$model->email;
					$Vmodel->v_pass=md5($model->password);
					$Vmodel->province = $_POST['province'];  
					$Vmodel->city = $_POST['city']; 
					$Vmodel->v_date=date("Y-m-d",time());
				   if($Vmodel->save()){
						$Loginmodel=new LoginForm; 
						$Loginmodel->username=$model->username;
						$Loginmodel->password=$model->password;
						if($Loginmodel->login()){
							$script=uc_user_synlogin($uid);
							$this->render('regerover', array(  
								'script' => $script,  
								'model'=>$model,
							)); 	
						}
						exit;
				   }else{
						uc_user_delete($uid);
				   }
				
					
				}  
				
			}
		}
        $this->render('reger', array(  
            'model' => $model,  
        ));  
    }
	public function actionAjaxRegisterUserName() {
        $name =  strtolower(trim($_GET["name"]));
		include_once 'ucenter.php';  
        $flag = uc_user_checkname($name);  
        $return=1;
        switch($flag)  
        {  
            case -1:  
                $return='用户名不合法'; 
                break;  
            case -2:  
				$return='包含不允许注册的词语';
                break;  
            case -3:  
				$return='用户名已经存在';
                break;  
        } 
		
        echo $return;
		exit;
    }
	 public function actionAjaxRegisterEmail() {
        $email = strtolower($_GET["email"]);
		$return = 1;
		include_once 'ucenter.php';  
        $flag = uc_user_checkemail($email);  
        switch($flag)  
        {  
            case -4:  
                $return='Email 格式有误';
                break;  
            case -5:  
               $return='Email 不允许注册';
                break;  
            case -6:  
                $return='该 Email 已经被注册';
                break;  
        } 
		echo $return;
        exit;
    }
}