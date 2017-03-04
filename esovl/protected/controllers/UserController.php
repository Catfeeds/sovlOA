<?php

class UserController extends Controller
{	
	public $layout='user';
	 public function accessRules() {
        return array(
				array("allow",
                        "actions"=>array("alipaynotify","buysuccess"),
                        'users'=>array('@'),
                ),
               
        );
    }
	public function actionIndex()
	{	
		$ucid= Yii::app()->user->id;
		$umodel=Vip::model()->getUmodelByUcid($ucid);
		$this->render('index',array(
			"umodel"=>$umodel,
		));
	}


}