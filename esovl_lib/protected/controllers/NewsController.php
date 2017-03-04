<?php

class NewsController extends Controller
{	
	public $layout='home';
	public function actionCleanCache(){
        Yii::app()->cache->flush();
        echo "success";exit;
    }
	
	public function actionIndex()
	{
		$this->render('index');
	}
	
	//资讯新闻展示页
	public function actionNewslist() {
		$criteria=new CDbCriteria;
		$Nclass="";
		if (isset($_GET['id'])&&$_GET['id'])  {
			$Nclass=Icolumn::model()->find("ic_id ='{$_GET['id']}'");
			if($Nclass){
				if($Nclass['ic_type']=="menu"){
					if($Nclass['ic_pid']=="0"){
						$idArr=Icolumn::model()->getAllByPid($_GET['id']);
						$criteria->addCondition("i_class in(".join(",",$idArr).")");
					}else{
						$criteria->addCondition("i_class ='{$Nclass['ic_id']}'");
					}
				}elseif($Nclass['ic_type']=="tags"){
					// echo $Nclass['ic_pid'].$Nclass['ic_id'];
					$criteria->addCondition("i_class ='{$Nclass['ic_pid']}'");
					$criteria->addCondition("i_label ='{$Nclass['ic_id']}'");
				}
			}
		}else{
			$idArr=Icolumn::model()->getAllByPid(array("1","2","3","4"));
			// echo "<pre>";
			// print_r($idArr);
			$criteria->addCondition("i_class in(".join(",",$idArr).")");
		}
		$orderCondition=isset($_GET['order'])&&$_GET['order']=="hot"?"i_click desc":"i_submitdate desc";
		$criteria->order=$orderCondition;
		if(isset($_GET["type"])&&$_GET["type"]=="tj"){
				$criteria->addCondition("i_bool  =1 ");
		}
		$dataProvider =  new CActiveDataProvider("Information", array(
						'criteria'=>$criteria,
						'pagination'=>array(
								'pageSize'=>6,
						),
		));
		$web=WebStep::model()->findByPk(1);
		$schoolGG=XlSH::model()->getAllByType(1,4);
		$kefu=Customerservice::model()->getAllKefu();
		// 幻灯片
		$HomeSlide=Slide::model()->getHomeSlide();
        $this->render('newslist',array(
			'web'=>$web,
			"schoolGG"=>$schoolGG,//学习广告
			"HomeSlide"=>$HomeSlide,//首页图片滑动
			"dataProvider"=>$dataProvider,//分页
			"Nclass"=>$Nclass,//新闻栏目
			"kefu"=>$kefu,//客服
		));
    }
	//含有图片的新闻展示页
	public function actionNewsimg()
	{
		$criteria=new CDbCriteria;
		$Nclass="";
		if (isset($_GET['id'])&&$_GET['id'])  {
			$Nclass=Icolumn::model()->find("ic_id ='{$_GET['id']}'");
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
			}
		}
		$criteria->order="i_click desc";
		$criteria->addCondition(" i_pic != '' ");
		$dataProvider =  new CActiveDataProvider("Information", array(
						'criteria'=>$criteria,
						'pagination'=>array(
								'pageSize'=>12,
						),
		));
		$web=WebStep::model()->findByPk(1);
		$schoolGG=XlSH::model()->getAllByType(1,4);
		$kefu=Customerservice::model()->getAllKefu();
		// 幻灯片
		$HomeSlide=Slide::model()->getHomeSlide();
        $this->render('newsimg',array(
			'web'=>$web,
			"schoolGG"=>$schoolGG,//学习广告
			"HomeSlide"=>$HomeSlide,//首页图片滑动
			"dataProvider"=>$dataProvider,//分页
			"Nclass"=>$Nclass,//新闻栏目
			"kefu"=>$kefu,//客服
		));
	}
	//资讯新闻详情
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
}