<?php
class ResearchController extends Controller
{	public $layout='researche';
	
	public function actionIndex()
	{
		$criteria=new CDbCriteria;
		$criteria->order="lq_id desc";
	    $LuquModels=YxLuqu::model()->findAll($criteria);		
		
		$KechenModels=YxKaike::model()->getAll();
		$downModels=YxDown::model()->findAll();//这里搞个模型，，LIMIT。。。
		$newsHdong=Information::model()->getAllByLable(array(30),'7');
		// echo "<pre>";
			// print_r($KechenModels);
			// exit;
		$GG=YxStep::model()->findByPk("1");
		$this->render('index',array("AB"=>$GG,"LuquModels"=>$LuquModels,"KechenModels"=>$KechenModels,"newsHdong"=>$newsHdong,'downModels'=>$downModels));
	}
	//研修新闻展示页
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
		$GG=YxStep::model()->findByPk("1");
		$web=WebStep::model()->findByPk(1);
		$schoolGG=XlSH::model()->getAllByType(1,4);
		$kefu=Customerservice::model()->getAllKefu();
		// 幻灯片
		$HomeSlide=Slide::model()->getHomeSlide();
        $this->render('newslist',array(
			"AB"=>$GG,
			'web'=>$web,
			"schoolGG"=>$schoolGG,
			"HomeSlide"=>$HomeSlide,
			"dataProvider"=>$dataProvider,
			"Nclass"=>$Nclass,
			"kefu"=>$kefu,
		));
    }
	//研修新闻详情
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
		// $kefu=Customerservice::model()->getAllKefu();
		$web=WebStep::model()->findByPk(1);
		// $schoolGG=XlSH::model()->getAllByType(1,4);
		// 幻灯片
		// $HomeSlide=Slide::model()->getHomeSlide();
		$GG=YxStep::model()->findByPk("1");
        $this->render('newsview',array(
			'web'=>$web,
			// 'kefu'=>$kefu,
			// "schoolGG"=>$schoolGG,
			"AB"=>$GG,
			"NclassModel"=>$NclassModel,
			"newsModel"=>$newsModel,
		));
    }
	
	//研修资料下载
	public function actionDownlist() {
		// if (empty($_GET['id']))  {
			// throw new CHttpException(404,'Not found');
		// }
		// Information::model()->updateCounters(array('i_click'=>1),"i_id='{$_GET['id']}'");
		// $newsModel=Information::model()->find("i_id =".$_GET['id']);
		// $NclassModel=Icolumn::model()->find("ic_id =".$newsModel['i_class']);
		// if(!$newsModel&&$NclassModel){
			// throw new CHttpException(404,'Not found');
		// }
		/* $kefu=Customerservice::model()->getAllKefu(); */
		// $web=WebStep::model()->findByPk(1);
		// $schoolGG=XlSH::model()->getAllByType(1,4);
		// 幻灯片
		// $HomeSlide=Slide::model()->getHomeSlide();
		// $GG=YxStep::model()->findByPk("1");
        // $this->render('downlist',array(
			// 'web'=>$web,
			// 'kefu'=>$kefu,
			// "schoolGG"=>$schoolGG,
			// "AB"=>$GG,
			// "NclassModel"=>$NclassModel,
			// "newsModel"=>$newsModel,
		// ));
    }
}