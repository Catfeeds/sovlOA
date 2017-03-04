<?php 
include_once("../web_start.php");
$rowa=$dblink->find("yx_step",array(),"yx_id =1");
$rowb=$dblink->find("yx_hd",array(),"hd_id=8");
?> 
<?php
			$row1=$dblink->find("yx_news",array("nclick"),"news_id=".$_GET["id"]);		
			$sum=$row1["nclick"]+1;
            $rowc=$dblink->update("yx_news",array("nclick"=>$sum),"news_id=".$_GET["id"]);
			$rowd=$dblink->find("yx_news",array(),"news_id=".$_GET["id"]);
			$yxtitle=$rowd["news_title"];
			$rowe=$dblink->find("yx_news_class",array("class_name"),"class_id =".$rowd["class_name"]);
		if(isset($rowe["class_name"])){
		$tion=$rowe["class_name"];
	    }else{
		$tion="最新推荐";
		}
?>
<?php include('Research_head.php');?>
<body>
<div class="wrapper">
<!-- top -->
	<?php include('yx_top.html'); ?>
<!-- top end -->
<!-- main -->
<div class="main">
		<div class="main_box002"><img src="/Research/images/yx_b01.jpg" width="950" height="4" /></div>
		<div class="main_box001"><?=$rowa["yx_gg"]?></div>
		<div class="main_box002"><img src="/Research/images/yx_b02.jpg" width="950" height="4" /></div>
		<div class="main_box03">
			<div class="main_box03_01">
					<div class="main_box03_02_left">
							<div class="main_box03_02_lefta">
								<div class="main_box01_right_top">
									<dl>
									<dt>热点推荐</dt>						
									<dd><a href="/Research/re_news_list.php">MORE>></a></dd>
									</dl>
								</div>
								<div class="zxkb">
									<div class="zxkb_list">
									<?php
										$row3=$dblink->findAll("yx_news",array(),"yx_news.nbool=1",'left join yx_news_class on yx_news.class_name=yx_news_class.class_id','0,8',"ndate desc");
										foreach($row3 as $v){
									?>
										<dl><dd><a href="/Research/re_news_show.php?id=<?=$v["news_id"];?>" title="<?=$v["news_title"]?>"><?=$Common->strCut($v["news_title"],39,'..')?></a></dd><dt><?=$v["ndate"];?></dt></dl>
									<?php }?>
									</div>
								</div>
								<div class="main_box01_right_bottom">
								<img src="/Research/images/right1_bottombg.jpg" />
								</div>
							</div>
							<div class="main_box03_02_leftb">
								<div class="main_box01_right_top">
									<dl>
									<dt>一休网快报</dt>                        
									<dd><a href="/Research/re_news_list.php?cl=9">MORE>></a></dd>
									</dl>
								</div>
								<div class="zxkb">
									<div class="zxkb_pic"><a href="<?=$rowb["hd_link2"]?>"><img src="/admin_root/<?=$rowb["hd_pic2"]?>" /></a></div>
									<div class="zxkb_list">
										<?php
										$row4=$dblink->findAll("yx_news",array(),"class_name='9' and nbool='1'",'','0,6',"ndate desc");
										foreach($row4 as $v){
										?>
										<dl><dd><a href="/Research/re_news_show.php?id=<?=$v["news_id"];?>"><?=$Common->strCut($v["news_title"],39,'..')?></a></dd><dt><?=$v["ndate"]?></dt></dl>
										<?php }?>
									</div>
								</div>
								<div class="main_box01_right_bottom">
								<img src="/Research/images/right1_bottombg.jpg" />
								</div>
							</div>
					</div>
					<div class="main_box03_02_right">
						<div class="main_box03_02_right_dh"><strong>您的位置：<a href="/"><?=$z_name?></a>&gt; <a href="/Research/re_news_list.php?cl=<?=$rowd["class_name"];?>"><?=$tion?></a> &gt; 新闻详细</strong></div>    
						<div class="main_box03_01_left_03">
						<img src="/Research/images/left1_topbg.jpg" />
						</div>
						<div class="main_box03_01_left_02_newlist">
								<div class="main_box03_01_left_02_newlist00">
									<dl>
										<!--/*<dd class="main_box03_01_rigth_list02"><a href="#">2010年专本科考试逻辑基础练7</a></dd>
										<dd class="main_box03_01_rigth_list03">2011-05-06</dd>*/-->
										<h1><?=$rowd["news_title"]?></h1>
										<h2>发表于：<?=$rowd["ndate"]?> 来源：<?=$z_name?> 浏览：<?=$sum?></h2>
										<dd class="main_box03_01_rigth_dt"><?=$rowd["news_con"]?></dd>
									</dl>
								</div>                                     
								<div class="main_box03_01_rigth_list05"><img src="/Research/images/222.gif" width="7" height="8" /> <a href="#">Top</a>&nbsp;&nbsp;<img src="/Research/images/1010.gif" width="4" height="6" />  <a href="/Research/re_news_list.php?cl=<?=$rowd["class_name"];?>">返回列表</a></div>
						</div>
						<div class="main_box03_01_left_03"><img src="/Research/images/left1_bottombg.jpg" /></div>
					</div>				
			</div>				
		</div>
</div>
<!-- main end -->
<!-- bottom -->
	<?php include('yx_bottom.html'); ?>
<!-- bottom end -->	
</div>
</body>
</html>