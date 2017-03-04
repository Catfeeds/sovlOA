<?php 
	$controllerID = $this->getId();
    $actionID = $this->getAction()->getId();
    $meconandaction = $controllerID.$actionID;
?>
<div class="top_nav_box02_box02">
		<div class="<?=$meconandaction=="siteindex"?"nav_dis":"nav_undis"?>" id="nav_tbc_00">老魏的宣传文字
		</div>
	<div class="<?=$controllerID=="education"?"nav_dis":"nav_undis"?>" id="nav_tbc_01">
		<a href="<?=Yii::app()->createUrl("/education/index")?>">学历教育</a>
		<a href="<?=Yii::app()->createUrl("/education/zxksindex")?>">自学考试</a>
		<a href="<?=Yii::app()->createUrl("/education/wlyxindex")?>">网络院校</a>
		<a href="<?=Yii::app()->createUrl("/education/crgkindex")?>">成人高考</a>
		<a href="<?=Yii::app()->createUrl("/education/gjbxindex")?>">国际办学</a>
		<a href="<?=Yii::app()->createUrl("/education/gxjzindex")?>">高校简章</a>
		<a href="<?=Yii::app()->createUrl("/education/jzsearch")?>">简章搜索</a>
		<a href="<?=Yii::app()->createUrl("/education/gfbindex")?>">高复班</a>
	</div>
	<div class="<?=$controllerID=="training"?"nav_dis":"nav_undis"?>" id="nav_tbc_02">
		<?php
			foreach(Pxbclass::model()->findAll() as $rowp){
				$array = array(
					1=>"外语频道",
					2=>"高考频道",
					3=>"中学生辅导",
					4=>"早教频道",
					5=>"职业频道",
					6=>"艺术体育",
					7=>"少儿频道"
				);
				foreach($array as $key=>$value){
					if($rowp['pb_pindao']==$value){
						echo "<a href='".Yii::app()->createUrl('/training/pxpd0'.$key)."'>".$rowp["pb_title"]."</a>";
					}
				}
			}
		 ?>            
		<?/*<a href="/Training/px_shcool.php">培训学校</a>*/?>
		<a href="<?=Yii::app()->createUrl("training/pxschool")?>">培训学校</a>
		<?/*<a href="/Training/px_shop.php">培训超市</a>  */?>
		<a href="<?=Yii::app()->createUrl("training/pxshop")?>">培训超市</a>  
	</div>          
	<div class="nav_undis" id="nav_tbc_03">
		<a href="/Research/MBA">MBA/EMBA</a>
		<a href="/Research/master">工程硕士</a>
		<a href="/Research/graduate">在职研究生</a>
		<a href="/Research/president">总裁总监研修</a> <a href="/Research/yx_daquan.php">简章大全</a> <a href="/Research/yx_seach.php">简章搜索</a> 
	</div>
	<div class="nav_undis" id="nav_tbc_04">
		<a href="/Research/MBA">留学宝典</a>
		<a href="/Research/master">留学考试</a>
	</div>
	<div class="nav_undis" id="nav_tbc_05">
		<a href="<?=Yii::app()->createUrl('enterprise/about')?>">企培中心</a>
		<a href="<?=Yii::app()->createUrl('enterprise/courses')?>">企培课程</a>
		<a href="<?=Yii::app()->createUrl('enterprise/teachers')?>">学校老师</a>
		<a href="<?=Yii::app()->createUrl('enterprise/schools')?>">学校环境</a>
		<a href="<?=Yii::app()->createUrl('enterprise/newslist')?>">新闻中心</a>
		<a href="<?=Yii::app()->createUrl('enterprise/faq')?>">在线问答</a>
	</div>
	<div class="nav_undis" id="nav_tbc_06">
		<a href="<?=Yii::app()->createUrl('news/newslist',array('id'=>1))?>">学历信息</a>
		<a href="<?=Yii::app()->createUrl("news/newslist",array('id'=>2))?>">培训信息</a>
		<a href="<?=Yii::app()->createUrl("news/newslist",array('id'=>3))?>">研修信息</a>
		<a href="<?=Yii::app()->createUrl("news/newslist",array('id'=>65))?>">学校新闻</a> 
		<a href="<?=Yii::app()->createUrl("news/newslist",array("order"=>"hot"))?>">热点资讯</a>
	</div>
	<div class="nav_undis" id="nav_tbc_07">
		<a href="/Research/MBA">栏目1</a>
		<a href="/Research/master">栏目2</a>
		<a href="/Research/graduate">栏目3</a>
		<a href="/Research/president">栏目4</a> 
	</div>
</div>
