<?php

class EducationController extends Controller {
    public $layout='education';

	// public function filters()
	// {
		// //return the filter configuration for this controller, e.g.:
		// return array(
			// array (
				// 'COutputCache',  //缓存策略
				// 'duration'=> 600,  //缓存时间 秒
				// 'varyBySession' => true,  //缓存模式
				// 'varyByRoute '=>true
			// )
		// );
	// }
	// public function filters() {
		// return array (
			// array (
				// 'COutputCache',
				// 'duration' => 600,
				// 'varyByParam' => array('id')
				// )
		// );
	// }
	public function actionCleanCache(){
        Yii::app()->cache->flush();
        echo "success";exit;
    }
	//学历教育
    public function actionIndex() {
		//招生学校
		$xlschoolGG=XlSH::model()->getAllByType(1,4);
		
		
		$web=WebStep::model()->findByPk(1);
        $this->render('index',array(
			'web'=>$web,
			'xlschoolGG'=>$xlschoolGG,
		));
    }
	//自学考试
	public function actionZxksIndex() {
		$web=WebStep::model()->findByPk(2);
		$zxschoolGG=XlSH::model()->getAllByType(2,4);
        $this->render('zxksindex',array(
			'web'=>$web,
			"zxschoolGG"=>$zxschoolGG,
		));
    }
	//网络院校
	public function actionWlyxIndex() {
		$web=WebStep::model()->findByPk(3);
		$wlyxschoolGG=XlSH::model()->getAllByType(3,4);
		//幻灯片
		$HomeSlide=Slide::model()->getHomeSlide();
        $this->render('wlyxindex',array(
			'web'=>$web,
			"wlyxschoolGG"=>$wlyxschoolGG,
			"HomeSlide"=>$HomeSlide,
		));
    }
	//成人高考
	public function actionCrgkIndex() {
		$web=WebStep::model()->findByPk(4);
		$crgkschoolGG=XlSH::model()->getAllByType(4,4);
		//幻灯片
		$HomeSlide=Slide::model()->getHomeSlide();
        $this->render('crgkindex',array(
			'web'=>$web,
			"crgkschoolGG"=>$crgkschoolGG,
			"HomeSlide"=>$HomeSlide,
		));
    }
	//国际办学
	public function actionGjbxIndex() {
		$web=WebStep::model()->findByPk(5);
		$gjbxschoolGG=XlSH::model()->getAllByType(5,4);
		//幻灯片
		$HomeSlide=Slide::model()->getHomeSlide();
        $this->render('gjbxindex',array(
			'web'=>$web,
			"gjbxschoolGG"=>$gjbxschoolGG,
			"HomeSlide"=>$HomeSlide,
		));
    }
	//高校简章
	public function actionGxjzIndex() {
		$web=WebStep::model()->findByPk(1);
		$gxjzschoolGG=XlSH::model()->getAllByType(1,4);
		//幻灯片
		$HomeSlide=Slide::model()->getHomeSlide();
        $this->render('gxjzindex',array(
			'web'=>$web,
			"gxjzschoolGG"=>$gxjzschoolGG,
			"HomeSlide"=>$HomeSlide,
		));
    }
	//简章搜索
	public function actionJzsearch() {
		$web=WebStep::model()->findByPk(1);
		$gxjzschoolGG=XlSH::model()->getAllByType(1,4);
		$kefu=Customerservice::model()->getAllKefu();
		//幻灯片
		$HomeSlide=Slide::model()->getHomeSlide();
		$xfeiArr=array("t1"=>"20000元以下","t2"=>"20000元至25000元","t3"=>"25000元以上");
		$xfeiconditionArr=array("t1"=>"0-20000","t2"=>"20000-25000元","t3"=>"25000-9999999");
		$criteria=new CDbCriteria;
		$ordertype=array("xfu"=>"xfei ","xfd"=>"xfei desc");
		foreach($_GET as $key=>$val){
			if($key=="sschool"&&$val)$criteria->addCondition("s_id='{$val}'");
			if($key=="szyclass"&&$val)$criteria->addCondition(" zyclass  regexp '{$val}'");
			if($key=="szyname"&&$val)$criteria->addCondition(" zyname regexp'{$val}'");
			if($key=="skey"&&$val)$criteria->addCondition(" ktitle regexp '{$val}' or zycon regexp '{$val}'");
			if($key=="xfei"&&isset($xfeiconditionArr[$val])){
				$Carr=explode("-",$xfeiconditionArr[$val]);
				$criteria->addCondition(" xfei >= '{$Carr[0]}' and xfei <= '{$Carr[1]}'");
			}
			if($key=="order"&&$val){
				$criteria->order="{$ordertype[$val]}";
			}
		}
		$criteria->with="schoolinfo";
		$dataProvider =  new CActiveDataProvider("Kkinfo", array(
						'criteria'=>$criteria,
						'pagination'=>array(
								'pageSize'=>10,
						),
		));
		
        $this->render('jzsearch',array(
			'web'=>$web,
			"gxjzschoolGG"=>$gxjzschoolGG,
			'dataProvider'=>$dataProvider,
			"HomeSlide"=>$HomeSlide,
			"xfeiArr"=>$xfeiArr,
			'kefu'=>$kefu,
		));
    }
	//高复班
	public function actionGfbIndex() {
		$web=WebStep::model()->findByPk(6);
		$gfbschoolGG=XlSH::model()->getAllByType(6,4);
		//幻灯片
		$HomeSlide=Slide::model()->getHomeSlide();
        $this->render('gfbindex',array(
			'web'=>$web,
			"gfbschoolGG"=>$gfbschoolGG,
			"HomeSlide"=>$HomeSlide,
		));
    }
	//学历新闻展示页
	public function actionNewslist() {
		if (empty($_GET['id']))  {
			throw new CHttpException(404,'Not found');  
		}
		$Nclass=Icolumn::model()->find("ic_id ='{$_GET['id']}'");
		$criteria=new CDbCriteria;
		if($Nclass){
			if($Nclass['ic_type']=="menu"){
				if($Nclass['ic_pid']=="0"){
					$idArr=Icolumn::model()->getAllByPid($_GET['id']);
					$criteria->addCondition("i_class in(".join(",",$idArr).")");
				}else{
					$criteria->addCondition("i_class ='{$Nclass['ic_id']}'");
				}
			}elseif($Nclass['ic_type']=="tags"){
				$criteria->addCondition("i_class ='{$Nclass['ic_pid']}'");
				$criteria->addCondition("i_label ='{$Nclass['ic_id']}'");
			}
		}else{
			throw new CHttpException(404,'Not found');  
		}
		$orderCondition=isset($_GET['order'])&&$_GET['order']=="hot"?"i_click desc":"i_submitdate desc";
		$criteria->order=$orderCondition;
		$dataProvider =  new CActiveDataProvider("Information", array(
						'criteria'=>$criteria,
						'pagination'=>array(
								'pageSize'=>10,
						),
		));
		$web=WebStep::model()->findByPk(1);
		$schoolGG=XlSH::model()->getAllByType(1,4);
		$kefu=Customerservice::model()->getAllKefu();
		// 幻灯片
		$HomeSlide=Slide::model()->getHomeSlide();
        $this->render('newslist',array(
			'web'=>$web,
			"schoolGG"=>$schoolGG,
			"HomeSlide"=>$HomeSlide,
			"dataProvider"=>$dataProvider,
			"Nclass"=>$Nclass,
			"kefu"=>$kefu,
		));
    }
	//学历新闻详情
	public function actionNewsview() {
		if (empty($_GET['id']))  {
			throw new CHttpException(404,'Not found');  
		}
		Information::model()->updateCounters(array('i_click'=>1),"i_id='{$_GET['id']}'");
		$newsModel=Information::model()->find("i_id =".$_GET['id']);
		$NclassModel=Icolumn::model()->find("ic_id =".$newsModel['i_class']);
		if(!$newsModel&&$NclassModel){
			throw new CHttpException(404,'Not found');  
		}
		$kefu=Customerservice::model()->getAllKefu();
		$web=WebStep::model()->findByPk(1);
		$schoolGG=XlSH::model()->getAllByType(1,4);
		// 幻灯片
		$HomeSlide=Slide::model()->getHomeSlide();
        $this->render('newsview',array(
			'web'=>$web,
			'kefu'=>$kefu,
			"schoolGG"=>$schoolGG,
			"HomeSlide"=>$HomeSlide,
			"NclassModel"=>$NclassModel,
			"newsModel"=>$newsModel,
		));
    }
		//学校
	public function actionSchool() {
		if (empty($_GET['id']))  {
			throw new CHttpException(404,'Not found');  
		}
		$model=School::model()->findByPk($_GET['id']);
		if (empty($model))  {
			throw new CHttpException(404,'Not found');  
		}
		School::model()->updateCounters(array('s_click'=>1),"s_id='{$_GET['id']}'");
		$WsbmModel=new Wsbm;
		if(!empty($_POST)){
			$WsbmModel->setAttributes($_POST);
			$WsbmModel->bm_date=date("Y-m-d H:i:s",time());
			if($WsbmModel->save()){
				Yii::app()->user->setFlash('message','报名表提交成功');
				$this->redirect(array("school","id"=>$_GET['id']));
			}else{
				Yii::app()->user->setFlash('message','报名表提交失败');
			}
		}
		// $gfbschoolGG=XlSH::model()->getAllByType(6,4);
		// 幻灯片
		// $HomeSlide=Slide::model()->getHomeSlide();
        $this->render('school',array(
			"model"=>$model,
			"WsbmModel"=>$WsbmModel,
			// 'web'=>$web,
			// "gfbschoolGG"=>$gfbschoolGG,
			// "HomeSlide"=>$HomeSlide,
		));
		
		
    }
	//保存在线问答
	public function actionSavezxwd() {
		if (isset($_POST["wd_nc"])&&isset($_POST["wd_ask"])&&isset($_POST['s_name'])&&$_POST["wd_nc"]&&$_POST["wd_ask"]&&$_POST['s_name']){
			$num=Wdonline::model()->count("wd_ask='{$_POST["wd_ask"]}' and s_name='{$_POST["s_name"]}'");
			if ($num){
				exit("已存在相同的问题,请勿重复提交!");
			}else{
				$model=new Wdonline;
				$model->s_name=$_POST['s_name'];
				$model->wd_nc=$_POST['wd_nc'];
				$model->wd_ask=$_POST['wd_ask'];
				$model->wd_stime=date("Y-m-d H:i:s",time());
				if($model->insert()){
					exit("提问已发出,请等待管理员的审核回复!");
				}else{
					exit("提问失败，内部错误");
					
				}
			}
		}
		exit;
    }
	//得到开设科目
	public function actionGetlistbyskid() {
		if (isset($_GET["sid"])&&isset($_GET["sid"])&&isset($_GET['kid'])&&$_GET["kid"]){	
			$zy=Xlcal::model()->find("zy_id='{$_GET['kid']}'");
			if(!$zy)exit;
		
			$criteria=new CDbCriteria;
			$criteria->addCondition("s_id='{$_GET['sid']}'");
			$criteria->addCondition("zyclass='{$zy->zy_class}'");
			$criteria->select="s_id,zyclass,zyname";
			// $criteria->group="zyclass";
			$kkmodels=Kkinfo::model()->findAll($criteria);
			// echo "<pre>";
			// print_r($kkmodels);
			$Xlmcmodel=Xlmc::model()->getAllKcList();
			$all=array();
			foreach($kkmodels as $val){
				$all[]=$val->zyname;
			}
			foreach($Xlmcmodel as $key=>$val){
				if(!in_array($val,$all))unset($Xlmcmodel[$key]);
			}
			echo json_encode($Xlmcmodel);
		}
		exit;
    }
	
}