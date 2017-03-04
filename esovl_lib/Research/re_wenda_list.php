<?php 
include_once("../web_start.php");
$rowa=$dblink->find("yx_step",array(),"yx_id =1");
$rowb=$dblink->find("yx_hd",array(),"hd_id=8");
?>
<?php include('Research_head.php');?>
<body>
<div class="wrapper">
<!-- top -->
	<?php include('yx_top.html'); ?>
<!-- top end -->
<!-- main -->
	<div class="main">
	  <div class="main_box01">
		  <img src="/Research/images/ggpic.jpg" />
	  </div>
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
							$row3=$dblink->findAll("yx_news",array(),"nbool='1'",'','0,8',"ndate desc");
							foreach($row3 as $v){
						?>
							<dl><dd><a href="/Research/re_news_show.php?id=<?=$v["news_id"];?>" title="<?=$v["news_title"]?>"><?=$Common->strCut($v["news_title"],39,'..')?></a></dd><dt><?=$v["ndate"];?></dt></dl>
						<?php }?>
                        </div>
					</div>
					<div class="main_box01_right_bottom"><img src="/Research/images/right1_bottombg.jpg" /></div>
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
							$row4=$dblink->findAll("yx_news",array(),"class_name=9",'','0,4',"ndate desc");							
							foreach($row4 as $v){
							?>
								<dl><dd><a href="/Research/re_news_show.php?id=<?=$v["news_id"]?>"><?=$Common->strCut($v["news_title"],39,'..')?></a></dd><dt><?=$v["ndate"]?></dt></dl>
							<?php }?>
						</div>
					</div>
					<div class="main_box01_right_bottom"><img src="/Research/images/right1_bottombg.jpg" /></div>
				</div>
        </div>
            <div class="main_box03_02_right_dh"><strong>您的位置：<a href="#">一修教育网</a> > <a href="#">研修</a> >常见问题列表</strong></div>
                
<div class="main_box03_02_right">
					<div class="main_box03_01_left_03"><img src="/Research/images/left1_topbg.jpg" /></div>
		<div class="main_box03_01_left_02_newlist">
				<div class="main_box03_01_left_02_newlist00">
						<?php
						$criteria=new CDbCriteria;//顶部已写
						$count=$dblink->count("yx_changj",$criteria);
						$page= isset($_GET['page'])?$_GET['page']:1;//默认页码
						$getpageinfo = page($page,$count,$_SERVER['REQUEST_URI'],10);//调用函数，生成分页HTML 和 SQL LIMIT 子句
						$criteria->limit=$getpageinfo['sqllimit'];
						$criteria->order="cj_id desc";
						$newModel=$dblink->selectAll("yx_changj",$criteria);
						$j=0;
						foreach ($newModel as $row){
						$j=$j+1;
						?>
							 <dl>
								 <dd class="main_box03_01_rigth_list01"><img src="images/ico01.jpg" /></dd>
								 <dd class="main_box03_01_rigth_list02"><a href="/Research/re_wenti_show.php?id=<?=$row["cj_id"]?>"><?=$Common->strCutAndTags($row["cj_wenti"],50,'..')?></a></dd>
						   
								 <dd class="main_box03_01_rigth_dt"><?=$Common->strCutAndTags($row["cj_huif"],200,'..')?></dd>
								<dd class="main_box03_01_rigth_rdt"></dd>
							  </dl>

						<?php }?>
				</div>                                     
				<div class="main_box03_01_rigth_list04">
					<ul>
					<li>共有 <?=$getpageinfo['pagetotal']?> 条记录，当前第 <?=$getpageinfo['curpage']?> 页</li>
					<?=$getpageinfo['pagecode']?>
					</ul>        
				</div>
		</div>
		<div class="main_box03_01_left_03"><img src="images/left1_bottombg.jpg" /></div>
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