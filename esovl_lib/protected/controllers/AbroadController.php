<?php

class AbroadController extends Controller
{
	public $layout='abroad';
	
	public function actionIndex()
	{	
		$this->render('index');
	}
	
	public function actionSchool()
	{	
		$criteria = new CDbCriteria;
		$criteria->addCondition('ic_id='.$_GET['id']);
		$criteria->select = 'ic_class';
		
		$res = Icolumn::model()->find($criteria);
		
		$this->render('school',array(
					'countryName'=>$res['ic_class'],
		));
	}
	
	public function actionCountrylist()
	{	
		$criteria = new CDbCriteria;
		$criteria->addCondition('ic_icon != ""');
		$criteria->order = 'ic_id asc';
		
		$countryall = Icolumn::model()->findAll($criteria);
		
		$criteria1 = new CDbCriteria;
		$criteria1->addCondition('i_bool = 1');
		$criteria1->addCondition('i_label = 24');
		$criteria1->limit = '8';
		$hotrec = Information::model()->findAll($criteria1);
		
		$this->render('countrylist',
					array(
						'countryall'=>$countryall,						
						'hotrec'=>$hotrec,						
		));
	}

	public function actionLxabroad(){
		session_start(); 
		//获取sid
		if(isset($_GET['sid'])&&$_GET['sid']!=''){
			$_SESSION['sid'] = $_GET['sid'];
		}else{
			if(isset($_SESSION['sid'])&&$_SESSION['sid']!=''){
				$_GET['sid'] = $_SESSION['sid'];
			}else{
				echo "<script>alert('请选择学校');window.location.href = '".Yii::app()->createUrl('abroad/index')."'</script>";
			}
		}		
		
		//获取学校信息
		$criteria = new CDbCriteria;
		$criteria->addCondition("lxs_id={$_GET["sid"]}");
		$lxcon = Lxschool::model()->find($criteria);
		
		//获取招生简章的学校信息
		$brochures = Yii::app()->db->CreateCommand("select * from lxkkinfo as a join icolumn as b on a.lxk_gjid=b.ic_id where lxk_sid=".$lxcon->lxs_id)->queryAll();
		
		//获取留言
		$criteria = new CDbCriteria;
		$criteria->addCondition("lxwd_xxmc='".$lxcon->lxs_name."'");
		$criteria->addCondition("lxwd_bool=1");
		$criteria->order = "lxwd_id desc";
		$dataProvider =  new CActiveDataProvider("Lxwd", array(
						'criteria'=>$criteria,
						'pagination'=>array(
								'pageSize'=>7,
						),
		));
		
		$this->render('lxabroad',array(
			'lxcon'=>$lxcon,
			'brochures'=>$brochures,
			'dataProvider'=>$dataProvider,
			)
		);
	}

	public function actionAbroadshow(){
		session_start(); 
		if(!isset($_SESSION['sid'])||$_SESSION['sid']==''){
			echo "<script>alert('请选择学校');window.location.href = '".Yii::app()->createUrl('abroad/index')."'</script>";
		}
		
		//获取学校信息
		$criteria = new CDbCriteria;
		$criteria->addCondition("lxs_id={$_SESSION["sid"]}");
		$lxcon = Lxschool::model()->find($criteria);
		
		//获取招生简章的学校信息
		$brochures = Yii::app()->db->CreateCommand("select * from lxkkinfo as a join icolumn as b on a.lxk_gjid=b.ic_id where lxk_sid=".$lxcon->lxs_id)->queryAll();
		
		$this->render('abroadshow',array(
			'lxcon'=>$lxcon,
			'brochures'=>$brochures,
			)		
		);
	}

	public function actionLxadvisory(){
		session_start(); 
		 if (isset($_POST["lxwd_question"])){
			$criteria = new CDbCriteria;
			$criteria->addCondition("lxwd_question='".$_POST["lxwd_question"]."'");
			$num = Lxwd::model()->count($criteria);
			if ($num){
				echo"<script>alert('已存在相同的问题,请勿重复提交!');</script>";
				echo"<script>window.location.href = '/abroad/lxadvisory/';</script>";
			}else{
				$lx = new Lxwd;
				$lx->lxwd_name = $_POST["lxwd_name"];
				$lx->lxwd_question = $_POST["lxwd_question"];
				$lx->lxwd_tel = $_POST["lxwd_tel"];
				$lx->lxwd_xxmc = $_POST["lxwd_xxmc"];
				$lx->lxwd_date = date("Y-m-d H:i:s");
				$rs = $lx->insert();
				if ($rs){
					echo"<script>alert('提问已发出,请等待管理员的审核回复!');</script>";
					echo"<script>window.location.href = '/abroad/lxadvisory/';</script>";
				}else{	  
					echo"<script>alert('添加失败!');</script>";
				}
			}
		}
		if(!isset($_SESSION['sid'])||$_SESSION['sid']==''){
			echo "<script>alert('请选择学校');window.location.href = '".Yii::app()->createUrl('abroad/index')."'</script>";
		}
		
		//获取学校信息
		$criteria = new CDbCriteria;
		$criteria->addCondition("lxs_id={$_SESSION["sid"]}");
		$lxcon = Lxschool::model()->find($criteria);
		
		//获取留言
		$criteria = new CDbCriteria;
		$criteria->addCondition("lxwd_xxmc='".$lxcon->lxs_name."'");
		$criteria->addCondition("lxwd_bool=1");
		$criteria->order = "lxwd_id desc";
		$dataProvider =  new CActiveDataProvider("Lxwd", array(
						'criteria'=>$criteria,
						'pagination'=>array(
								'pageSize'=>7,
						),
		));
		
		$this->render('lxadvisory',
			array(
			'dataProvider'=>$dataProvider,
			'lxcon'=>$lxcon
			)
		);
	}

	public function actionLxcourse(){
		session_start(); 
		$criteria = new CDbCriteria;
		$criteria->addCondition("lxk_id = '{$_GET["kid"]}'");
		$r = Lxkkinfo::model()->find($criteria);		
		if($r->lxk_sid)$_SESSION['sid']=$r->lxk_sid;		
		if(!isset($_SESSION['sid'])||$_SESSION['sid']==''){
			echo "<script>alert('请选择学校');window.location.href = '".Yii::app()->createUrl('abroad/index')."'</script>";
		}
		//获取学校信息
		$criteria = new CDbCriteria;
		$criteria->addCondition("lxs_id={$_SESSION["sid"]}");
		$lxcon = Lxschool::model()->find($criteria);
		
		//课程详细
		$result = Yii::app()->db->createCommand("select * from lxkkinfo as a join icolumn as b on (a.lxk_gjid=b.ic_id) where  lxk_id='{$_GET["kid"]}'")->queryRow();
		$this->render('lxcourse',
			array('lxcon'=>$lxcon,
			'result'=>$result)
		);
	}

	public function actionLxonline(){
		session_start(); 
		$lxbm=new Lxbm;
		if(!empty($_POST)){
			$lxbm->setAttributes($_POST);
			$lxbm->lxbm_date=date("Y-m-d H:i:s",time());
			if($lxbm->save()){
				Yii::app()->user->setFlash('message','报名成功');
				echo "<script>alert('报名成功');window.location.href = '/abroad/lxabroad'</script>";
			}else{
				echo "<script>alert('报名失败');</script>";
				
			}
		}
		
		if(!isset($_SESSION['sid'])||$_SESSION['sid']==''){
			echo "<script>alert('请选择学校');window.location.href = '".Yii::app()->createUrl('abroad/index')."'</script>";
		}
		
		//获取学校信息
		$criteria = new CDbCriteria;
		$criteria->addCondition("lxs_id={$_SESSION["sid"]}");
		$lxcon = Lxschool::model()->find($criteria);
		
		$this->render('lxonline',
			array("lxcon"=>$lxcon,
				"lxbm"=>$lxbm
			)
		);
	}
	
	public function actionNewsdetail(){
		Yii::app()->db->createCommand("update information set i_click=i_click+1 where i_id=".$_GET["id"])->query();
		
		$criteria = new CDbCriteria;
		$criteria->addCondition('i_id='.$_GET["id"]);	
		$details = Information::model()->find($criteria);
		
		$information = new Information;
		$recnews = $information->getAllByPid(4,8);
		$this->render('newsdetail',array(
					'details'=>$details,
					'recnews'=>$recnews,
		));
	}
	
	public function actionDownlist(){
		$criteria1 = new CDbCriteria;
		$criteria1->addCondition('i_bool = 1');
		$criteria1->addCondition('i_label = 24');
		$criteria1->limit = 10;
		$recnews = Information::model()->findAll($criteria1);
		
		$this->render('downlist',array(
					'recnews'=>$recnews,
		));
	}
	
	public function actionNewslist(){
		//获取留言
		$criteria = new CDbCriteria;
		$criteria->addCondition("i_class='{$_GET['cl']}'");
		$dataProvider =  new CActiveDataProvider("Information", array(
						'criteria'=>$criteria,
						'pagination'=>array(
								'pageSize'=>6,
						),
		));
		
		$criteria = new CDbCriteria;
		$criteria->addCondition("ic_id='{$_GET['cl']}'");
		$ic_class = Icolumn::model()->find($criteria);
		
		$information = new Information;
		$recnews = $information->getAllByPid(4,10,true,true);
		$this->render('newslist',array(
					'recnews'=>$recnews,
					'ic_class'=>$ic_class->ic_class,
					"dataProvider"=>$dataProvider,
		));
	}
	
	public function actionReclist(){
		//获取留言
		$criteria = new CDbCriteria;
		$criteria->addCondition("i_class='{$_GET['cl']}'");
		$dataProvider =  new CActiveDataProvider("Information", array(
						'criteria'=>$criteria,
						'pagination'=>array(
								'pageSize'=>6,
						),
		));
		
		$criteria = new CDbCriteria;
		$criteria->addCondition("ic_id='{$_GET['cl']}'");
		$ic_class = Icolumn::model()->find($criteria);
		
		$information = new Information;
		$recnews = $information->getAllByPid(4,10,true,true);
		$this->render('reclist',array(
					'recnews'=>$recnews,
					'ic_class'=>$ic_class->ic_class,
					"dataProvider"=>$dataProvider,
		));
	}
	
	public function actionVnewslist(){
		//获取留言
		$criteria = new CDbCriteria;
		$criteria->addCondition("vi_class='{$_GET['cl']}'");
		$dataProvider =  new CActiveDataProvider("Vinformation", array(
						'criteria'=>$criteria,
						'pagination'=>array(
								'pageSize'=>6,
						),
		));
		
		$criteria = new CDbCriteria;
		$criteria->addCondition("vc_id='{$_GET['cl']}'");
		$vc_class = Vcolumn::model()->find($criteria);
		
		$vinformation = new Vinformation;
		$recnews = $vinformation->getAllByPid(4,10,true,true);
		$this->render('vnewslist',array(
					'recnews'=>$recnews,
					'ic_class'=>$vc_class->vc_class,
					"dataProvider"=>$dataProvider,
		));
	}
	
	public function actionVnewsdetail(){
		Yii::app()->db->createCommand("update vinformation set vi_click=vi_click+1 where vi_id=".$_GET["id"])->query();
		
		$criteria = new CDbCriteria;
		$criteria->addCondition('vi_id='.$_GET["id"]);	
		$details = Vinformation::model()->find($criteria);
		
		$vinformation = new Vinformation;
		$recnews = $vinformation->getAllByPid(4,8);
		$this->render('vnewsdetail',array(
					'details'=>$details,
					'recnews'=>$recnews,
		));
	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}