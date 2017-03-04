<?php

class EnterpriseController extends Controller
{
	public $layout='enterprise';
	public function actionIndex()
	{
		$kefu=Customerservice::model()->getAllKefu();
		$this->render('index',array(
				'kefu'=>$kefu
		));
	}
	//企培新闻展示页
	public function actionNewslist() {
		if (empty($_GET['id']))  {
			$_GET['id']=5;
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
	//企培新闻详情
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
	//企培中心
	public function actionAbout() {
		$kefu=Customerservice::model()->getAllKefu();
		$web=WebStep::model()->findByPk(1);
		// 幻灯片
		$HomeSlide=Slide::model()->getHomeSlide();
		$contentModel=QpZhongxin::model()->find();
        $this->render('about',array(
			'web'=>$web,
			'kefu'=>$kefu,
			'contentModel'=>$contentModel,
		));
    }
	//企业课程
	public function actionCourses() {
		$criteria=new CDbCriteria;
		$show='list';
		if (isset($_GET['id'])&&$_GET['id'])  {
			if(QpKaike::model()->findByPk($_GET['id'])){
				$criteria->addCondition("qpk_id  ='{$_GET['id']}'");
				$show='index';
			}
		}
		$dataProvider =  new CActiveDataProvider("QpKaike", array(
						'criteria'=>$criteria,
						'pagination'=>array(
								'pageSize'=>10,
						),
		));
		$kefu=Customerservice::model()->getAllKefu();
        $this->render('courselist',array(
			'kefu'=>$kefu,
			'dataProvider'=>$dataProvider,
			'show'=>$show,
		));
    }
	//企培课程详情
	public function actionCourseview() {
		if (empty($_GET['id']))  {
			throw new CHttpException(404,'Not found');  
		}
		$KCModel=QpKaikeClass::model()->findByPk($_GET['id']);
		
		if(!$KCModel){
			throw new CHttpException(404,'Not found');  
		}
		$kefu=Customerservice::model()->getAllKefu();
        $this->render('courseview',array(
			'kefu'=>$kefu,
			"KCModel"=>$KCModel,
		));
    }
	//企培课程报名
	public function actionCoursebm() {
		$WsbmModel=new QpUser;
		if(!empty($_POST)){
			$WsbmModel->setAttributes($_POST);
			$WsbmModel->user_date=date("Y-m-d",time());
			if($WsbmModel->save()){
				Yii::app()->user->setFlash('message','企培报名成功');
				$this->redirect(array("courseview","id"=>$_GET['id']));
			}else{
				Yii::app()->user->setFlash('message','企培报名失败');
			}
		}
		
		$kefu=Customerservice::model()->getAllKefu();
        $this->render('coursebm',array(
			'kefu'=>$kefu,
			"WsbmModel"=>$WsbmModel,
		));
    }
	//企培老师
	public function actionTeachers() {
		$criteria=new CDbCriteria;
		$dataProvider =  new CActiveDataProvider("QpTeacher", array(
						'criteria'=>$criteria,
						'pagination'=>array(
								'pageSize'=>10,
						),
		));
		$kefu=Customerservice::model()->getAllKefu();
        $this->render('teacherlist',array(
			'kefu'=>$kefu,
			'dataProvider'=>$dataProvider, 
		));
    }
	//企培老师详情
	public function actionTeacherview() {
		if (empty($_GET['id']))  {
			throw new CHttpException(404,'Not found');  
		}
		$TeacherModel=QpTeacher::model()->findByPk($_GET['id']);
		
		if(!$TeacherModel){
			throw new CHttpException(404,'Not found');  
		}
		$kefu=Customerservice::model()->getAllKefu();
        $this->render('teacherview',array(
			'kefu'=>$kefu,
			"TeacherModel"=>$TeacherModel,
		));
    }
	//企培学校
	public function actionSchools() {
		$criteria=new CDbCriteria;
		$dataProvider =  new CActiveDataProvider("QpSchool", array(
						'criteria'=>$criteria,
						'pagination'=>array(
								'pageSize'=>5,
						),
		));
		$kefu=Customerservice::model()->getAllKefu();
        $this->render('schoollist',array(
			'kefu'=>$kefu,
			'dataProvider'=>$dataProvider, 
		));
    }
	//企培老师详情
	public function actionSchoolview() {
		if (empty($_GET['id']))  {
			throw new CHttpException(404,'Not found');  
		}
		$SchoolModel=QpSchool::model()->findByPk($_GET['id']);
		
		if(!$SchoolModel){
			throw new CHttpException(404,'Not found');  
		}
		$kefu=Customerservice::model()->getAllKefu();
        $this->render('schoolview',array(
			'kefu'=>$kefu,
			"SchoolModel"=>$SchoolModel,
		));
    }
	//企培问答
	public function actionFaq() {
		$criteria=new CDbCriteria;
		$criteria->addCondition("px_bool =1");
		$dataProvider =  new CActiveDataProvider("QpWd", array(
						'criteria'=>$criteria,
						'pagination'=>array(
								'pageSize'=>2,
						),
		));
		$kefu=Customerservice::model()->getAllKefu();
        $this->render('faqlist',array(
			'kefu'=>$kefu,
			'dataProvider'=>$dataProvider,
		));
    }
		//保存在线问答
	public function actionSavezxwd() {
		if (isset($_POST["wd_name"])&&isset($_POST["wd_con"])&&$_POST["wd_name"]&&$_POST["wd_con"]){
			$num=QpWd::model()->count("wd_con='{$_POST["wd_con"]}' ");
			if ($num){
				exit("已存在相同的问题,请勿重复提交!");
			}else{
				$model=new QpWd;
				$model->wd_name=$_POST['wd_name'];
				$model->wd_con=$_POST['wd_con'];
				$model->wd_ttime=date("Y-m-d H:i:s",time());
				if($model->insert()){
					exit("提问已发出,请等待管理员的审核回复!");
				}else{
					exit("提问失败，内部错误");
					
				}
			}
		}else{
			exit("提问失败，内部错误!");
		}
		exit;
    }
}