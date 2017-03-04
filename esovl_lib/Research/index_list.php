<?php 
include_once("../web_start.php");
$rowa=$dblink->find("yx_step",array(),"yx_id =1");
$rowb=$dblink->find("yx_hd",array(),"hd_id=7");//hd_id=7为研修版块
?>
<?php include('Research_head.php');?>
<body>
<div class="wrapper">
<!-- top -->
	<?php include('yx_top.html'); ?>
<!-- top end -->
<!-- main -->
	<div class="main">
	  <div class="main_box04">
            <div class="main_box002"><img src="images/yx_b01.jpg" width="950" height="4" /></div>
			<div class="main_box001"><?=$rowa["yx_gg"]?></div>
            <div class="main_box002"><img src="images/yx_b02.jpg" width="950" height="4" /></div>			
	  </div>
      <div class="main_box03" style="float:left;">
<div class="main_box03_01" style="float:left;">
	<div class="main_box03_01_left">
						<div class="main_box03_01_left_01">
							<dl>
							<dt><?=$_GET["yxk_cl"]?></dt>							
							<dd><a href="index_list.php?yxk_cl=<?=$_GET["yxk_cl"]?>">更多>></a></dd>
							</dl>
						</div>
						<div class="main_box03_01_left22_02">
							<div class="main_box03_01_left_02_pic"><img src="/admin_root/<?=$rowb["hd_pic1"];?>" /></div>
							<div class="main_box03_01_left_02_list">
								<div class="main_box03_01_left_02_list_title">
									<dl><dt class="t01">课程名称</dt><dd class="t02">开课时间</dd><dd class="t03">上课地点</dd><dd class="t04">学费</dd></dl>
								</div>
								<div class="main_box03_01_left_02_list_text">
									<?php
									$row1=$dblink->findAll("yx_kaike",array(),"yxk_cl='{$_GET["yxk_cl"]}'",'','',"");
									foreach($row1 as $v){
									?>
										<dl>
											<dt class="t01"><a href="yxschool.php?id=<?=$v["yxk_id"]?>" title="<?=$v["yxk_title"]?>"><?=$Common->strCut($v["yxk_title"],30,'..')?></a></dt>
											<dd class="t02"><?=$v["yxk_time"]?></dd>
											<dd class="t03"><?=$Common->strCut($v["yxk_adder"],27,'..')?></dd>
											<dd class="t04"><span>￥<?=$v["yxk_xfei"]?></span><a href="yxschool_zxbm.php?id=<?=$v["yxk_id"]?>">[报名]</a></dd>
										</dl>
									<?php }?>
								</div>
							</div>
						</div>
						<div class="main_box03_01_left_03"><img src="images/left1_bottombg.jpg" /></div>
	</div>
</div>
<?php include('index_left.php'); ?>
</div>
<!-- main end -->
<!-- bottom -->
<?php include('yx_bottom.html'); ?>
<!-- bottom end -->	
</div>
</body>
</html>