<?php

class TrainingController extends Controller
{
	public $layout='training';
	public function actionCleanCache(){
        Yii::app()->cache->flush();
        echo "success";exit;
    }
	public function actionIndex()
	{
		$web=WebStep::model()->findByPk(11);
		$this->render('index',array(
			'web'=>$web
		));
	}
	//外语频道
	public function actionPxpd01()
	{	
		$web=WebStep::model()->findByPk(11);
		$web['z_title']="培训-外语频道";
        $this->render('pxpd01',array(
			'web'=>$web
		));
	}
	//高考频道
	public function actionPxpd02()
	{
		$web=WebStep::model()->findByPk(11);
		$web['z_title']="培训-高考频道";
		$this->render('pxpd02',array(
			'web'=>$web
		));
	}
	//中学生辅导
	public function actionPxpd03()
	{
		$web=WebStep::model()->findByPk(11);
		$web['z_title']="培训-中学生辅导";
		$this->render('pxpd03',array(
			'web'=>$web
		));
	}
	//早教频道
	public function actionPxpd04()
	{
		$web=WebStep::model()->findByPk(11);
		$web['z_title']="培训-早教频道";
		$this->render('pxpd04',array(
			'web'=>$web
		));
	}
	//职业频道
	public function actionPxpd05()
	{
		$web=WebStep::model()->findByPk(11);
		$web['z_title']="培训-职业频道";
		$this->render('pxpd05',array(
			'web'=>$web
		));
	}
	//艺术体育
	public function actionPxpd06()
	{
		$web=WebStep::model()->findByPk(11);
		$web['z_title']="培训-艺术体育";
		$this->render('pxpd06',array(
			'web'=>$web
		));
	}
	//少儿频道
	public function actionPxpd07()
	{
		$web=WebStep::model()->findByPk(11);
		$web['z_title']="培训-少儿频道";
		$this->render('pxpd07',array(
			'web'=>$web
		));
	}
	//培训学校
	public function actionPxschool()
	{
		$web=WebStep::model()->findByPk(11);
		$this->render('pxschool',array(
			'web'=>$web
		));
	}
	//培训超市
	public function actionPxshop()
	{
		$web=WebStep::model()->findByPk(11);
		$web['z_title']="培训-培训超市";
		$this->render('pxshop',array(
			'web'=>$web
		));
	}
	//培训在线问答列表
	public function actionZxwdlist()
	{
		$web=WebStep::model()->findByPk(11);
		$web['z_title']='在线问答-'.$web['z_name'];
		$criteria = Pxwd::model()->getAllbool(true,'8','px_time desc');
		$dataProvider = new CActiveDataProvider("pxwd",array(
						'criteria'=>$criteria,
						'pagination'=>array(
								'pageSize'=>8,
						),
		));
		$this->render('zxwdlist',array(
			'web'=>$web,
			'dataProvider'=>$dataProvider//分页
		));
	}
	//保存培训在线问答
	public function actionSavezxwd()
	{
		if(isset($_POST['px_ask'])&&$_POST['px_ask']){
			$num = Pxwd::model()->count("px_ask ='{$_POST['px_ask']}'");
			if($num){
				exit("已存在相同的问题,请勿重复提交!");
			}else{
				$model = new Pxwd;
				$model->px_ask=$_POST['px_ask'];
				$model->px_time=date("Y-m-d H:i:s",time());
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
	
	//培训下载专区
	public function actionPxdowlist()
	{
		$web=WebStep::model()->findByPk(11);
		$web['z_title']='培训资料下载-'.$web['z_name'];
		$criteria=new CDbCriteria;
		$criteria->addCondition("w_downcl ='px'");
		$criteria->order='w_id desc';
		$dataProvider = new CActiveDataProvider("XlAsk",array(
						'criteria'=>$criteria,
						'pagination'=>array(
								'pageSize'=>15,
						),
		));
		$this->render('pxdowlist',array(
			'web'=>$web,
			'dataProvider'=>$dataProvider//分页
		));
	}
	
	//培训课程列表
	public function actionPxkclist()
	{
		if (empty($_GET['id']))  {
			throw new CHttpException(404,'Not found');  
		}
		$Nclass=Icolumn::model()->find("ic_id ='{$_GET['id']}'");
		//print_r($Nclass);
		$criteria=new CDbCriteria;
		$criteria->addCondition("pxk_cl ='{$_GET['id']}'");
		$criteria->order="pxk_id desc";
		$dataProvider = new CActiveDataProvider("Pxkkinfo", array(
						'criteria'=>$criteria,
						'pagination'=>array(
								'pageSize'=>8,
						),
		));
		$web=WebStep::model()->findByPk(11);
		$web['z_title']='培训课程列表'."-".$web['z_name'];
		$kefu=Customerservice::model()->getAllKefu();
		$this->render('pxkclist',array(
				'web'=>$web,//网站配置
				'dataProvider'=>$dataProvider,//分页
				'Nclass'=>$Nclass,//培训课程栏目
				'kefu'=>$kefu,//客服
		));
	}
	//培训课程详情
	public function actionPxkcview()
	{
		if (empty($_GET['id']))  {
			throw new CHttpException(404,'Not found');  
		}
		Pxkkinfo::model()->updateCounters(array('pxk_click'=>1),"pxk_id='{$_GET['id']}'");
		
		$newsModel=Pxkkinfo::model()->find("pxk_id =".$_GET['id']);
		
		// print_r($newsModel);
		
		$NclassModel=Icolumn::model()->find("ic_id =".$newsModel['pxk_cl']);
		if(!$newsModel&&$NclassModel){
			throw new CHttpException(404,'Not found');  
		}
		$kefu=Customerservice::model()->getAllKefu();
		$web=WebStep::model()->findByPk(11);
		$web['z_title']='培训课程详情'."-".$web['z_name'];
		$schoolGG=XlSH::model()->getAllByType(1,4);
        $this->render('pxkcview',array(
			'web'=>$web,
			'kefu'=>$kefu,
			"schoolGG"=>$schoolGG,
			"NclassModel"=>$NclassModel,
			"newsModel"=>$newsModel,
		));
	}
	//培训新闻列表
	public function actionNewslist() {
		if (empty($_GET['id']))  {
			$_GET['id']=2;
		}
		if($_GET['id']){
			$Nclass=Icolumn::model()->find("ic_id ='{$_GET['id']}'");
		}else{
			$Nclass=Icolumn::model()->find("ic_id ='136'");
		}
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
				if($_GET['id']=='136'){
					$criteria->addCondition("i_class ='{$Nclass['ic_id']}'");
				}else{
					$criteria->addCondition("i_class ='{$Nclass['ic_pid']}'");
					$criteria->addCondition("i_label ='{$Nclass['ic_id']}'");
				}
			}
		}else{
			throw new CHttpException(404,'Not found');  
		}
		$orderCondition=isset($_GET['order'])&&$_GET['order']=="hot"?"i_click desc":"i_submitdate desc";
		$criteria->order=$orderCondition;
		$dataProvider =  new CActiveDataProvider("Information", array(
						'criteria'=>$criteria,
						'pagination'=>array(
								'pageSize'=>8,
						),
		));
		$web=WebStep::model()->findByPk(11);
		$web['z_title']='培训新闻列表'."-".$web['z_name'];
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
	//培训新闻详情
	public function actionNewsview() 
	{
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
		$web=WebStep::model()->findByPk(11);
		$schoolGG=XlSH::model()->getAllByType(1,4);
        $this->render('newsview',array(
			'web'=>$web,
			'kefu'=>$kefu,
			"schoolGG"=>$schoolGG,
			"NclassModel"=>$NclassModel,
			"newsModel"=>$newsModel,
		));
    }
}
?>