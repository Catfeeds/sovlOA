<?php

class VipController extends Controller {
    public function filters() {
        return array(
                'accessControl', // perform access control for CRUD operations
        );
    }
    public function accessRules() {
        return array(
				array("allow",
                        "actions"=>array("alipaynotify","buysuccess"),
                        'users'=>array('@'),
                ),
               
        );
    }
    public function actionIndex() {
		$this->render('index', array(  
		
        )); 
    }
    
}