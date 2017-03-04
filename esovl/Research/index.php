<?php 
include_once("../web_start.php");
$rowa=$dblink->find("yx_step",array(),"yx_id =1");
$rowb=$dblink->find("yx_hd",array("hd_pic1","hd_link1","hd_pic2","hd_link2","hd_pic3","hd_link3","hd_pic4","hd_link4","hd_pic5","hd_link5"),"hd_id=1");
//$arr=array();
//foreach($rowb as $k=>$v)$arr[substr($k,0,strlen($k)-1)][]=$v;
$rowc=$dblink->find("yx_hd",array("hd_pic1","hd_link1","hd_pic2","hd_link2","hd_pic3","hd_link3","hd_pic4","hd_link4"),"hd_id=7");
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
			<div class="main_box01_left">
				<div class="main_box01_left_01"><img src="images/left1_topbg.jpg" /></div>
					<div class="main_box01_left_02">
						<div id=slideshow>
							<div class=slideshow>
								<div id=slider_nav></div>
								<div class=clearfix id=slider>								
									<?php
										$rowd=$dblink->findAll("yx_news",array(),'','','0,5',"news_id desc");
										if ($rowd){
											foreach($rowd as $key=>$v){?>
											<div class=featured_post>
												<?php /*<div class=slider_image><a href="<?=$arr['hd_link'][$key]?>"><img height='238' src="/admin_root/<?=$arr['hd_pic'][$key]?>" width=360 /></a> </div>*/?>
												<div class=slider_image><a href="re_news_show.php?id=<?=$v["news_id"]?>"><img height='238' src="/admin_root/<?=$v["npic"]?>" width=360 /></a> </div>
													<div class=slider_post>
														<h3> <a href="re_news_show.php?id=<?=$v["news_id"]?>"><?=$v["news_title"]?></a></h3>
														<div class=archive_info>
															 <span class=date><?php echo $v["ndate"];?></span>
															 <span class=category>⁄ 浏览次数：<?=$v["nclick"]?></span>
														</div>
														<p><?=$Common->strCutAndTags($v["news_con"],400,'..')?></p>
														<div class=clear></div>
													</div>              
											</div>
									<?php 	}
										}
									?>
								</div>
							</div>
					<!-- end: menu -->
						</div>
					</div>
					<div class="main_box01_left_03"><img src="images/left1_bottombg.jpg" /></div>
			</div>
			<div class="main_box01_right">
				<div class="main_box01_right_top">
				  <dl>
					<dt>最新公告</dt>
					<dd><a href="re_news_list.php?cl=7">MORE>></a></dd>
				  </dl>
				</div>
				<div class="main_box01_right_main">
					<?php
					$rowe=$dblink->findAll("yx_news",array(),'','','0,7',"news_id desc");
					foreach($rowe as $v){
					?>
					  <dl>
						<dt><a href="re_news_show.php?id=<?php echo $v["news_id"];?>" title="<?=$v["news_title"]?>"><?=$Common->strCutAndTags($v["news_title"],33,'..')?></a></dt>
						<dd><?=$v["ndate"]?></dd>
					  </dl>
					<?php }?>
				</div>
				<div class="main_box01_right_bottom"><img src="images/right1_bottombg.jpg" /></div>
			</div>
		</div>
		<div class="main_box02">
		  <div class="main_box002"><img src="images/yx_b01.jpg" width="950" height="4" /></div>
		  <div class="main_box001"><?=$rowa["yx_gg"]?></div>
		  <div class="main_box002"><img src="images/yx_b02.jpg" width="950" height="4" /></div>
		</div>
    <div class="main_box03">
      <div class="main_box03_01">
		<div style="float:right;">
		<?php include('index_left.php');?>
			<div class="main_box03_01_left">
			  <div class="main_box03_01_left_01">
					<?php
					$rowf=$dblink->find("yx_kaike",array(),"yxk_cl='MBA/EMBA'");			
					?>			
					<dl>
					  <dt><?=$rowf["yxk_cl"]?></dt>
					  <dd><a href="index_list.php?yxk_cl=<?php echo $rowf["yxk_cl"];?>">更多>></a></dd>
					</dl>
			  </div>
			  <div class="main_box03_01_left_02">
				<div class="main_box03_01_left_02_pic"><img src="/admin_root/<?=$rowc["hd_pic1"];?>" /></div>
				<div class="main_box03_01_left_02_list">
				  <div class="main_box03_01_left_02_list_title">
					<dl>
					  <dt class="t01">课程名称</dt>
					  <dd class="t02">开课时间</dd>
					  <dd class="t03">上课地点</dd>
					  <dd class="t04">学费</dd>
					</dl>
				  </div>
				  <div class="main_box03_01_left_02_list_text">
						<?php
						$rowg=$dblink->findAll("yx_kaike",array(),"yxk_cl='MBA/EMBA'",'','0,5',"yxk_id desc");
						foreach($rowg as $v){
						?>
						<dl>
						  <dt class="t01"><a href="yxschool.php?id=<?=$v["yxk_id"]?>" title="<?=$v["yxk_title"]?>"><?=$Common->strCutAndTags($v["yxk_title"],30,'..')?></a></dt>
						  <dd class="t02"><?php echo $v["yxk_time"];?></dd>
						  <dd class="t03"><?=$Common->strCutAndTags($v["yxk_adder"],27,'..')?></dd>
						  <dd class="t04"><span>￥<?php echo $v["yxk_xfei"];?></span><a href="yxschool_zxbm.php?id=<?php echo $v["yxk_id"]?>">[报名]</a></dd>
						</dl>
						<?php }?>
				  </div>
				</div>
			  </div>
			  <div class="main_box03_01_left_03"><img src="images/left1_bottombg.jpg" /></div>
			</div>
			<div class="main_box03_01_left">
							<div class="main_box03_01_left_01">
								<?php
								$rowi=$dblink->find("yx_kaike",array(),"yxk_cl='工程硕士'");
								?>
								<dl>
								  <dt><?=$rowi["yxk_cl"]?></dt>
								  <dd><a href="index_list.php?yxk_cl=<?=$rowi["yxk_cl"]?>">更多>></a></dd>
								</dl>						
							</div>
							<div class="main_box03_01_left_02">
									<div class="main_box03_01_left_02_pic"><img src="/admin_root/<?=$rowc["hd_pic2"]?>" /></div>
									<div class="main_box03_01_left_02_list">
										<div class="main_box03_01_left_02_list_title">
												<dl>
												  <dt class="t01">课程名称</dt>
												  <dd class="t02">开课时间</dd>
												  <dd class="t03">上课地点</dd>
												  <dd class="t04">学费</dd>
												</dl>
										</div>
										<div class="main_box03_01_left_02_list_text">
											<?php					
												$rowj=$dblink->findAll("yx_kaike",array(),"yxk_cl='工程硕士'",'','0,5',"yxk_id desc");
												foreach($rowj as $v){
											?>
											<dl>
											  <dt class="t01"><a href="yxschool.php?id=<?=$v["yxk_id"]?>" title="<?=$v["yxk_title"]?>"><?=$Common->strCutAndTags($v["yxk_title"],30,'..')?></a></dt>
											  <dd class="t02"><?=$v["yxk_time"]?></dd>
											  <dd class="t03"><?=$Common->strCutAndTags($v["yxk_adder"],27,'..')?></dd>
											  <dd class="t04"><span>￥<?=$v["yxk_xfei"]?></span> <a href="yxschool_zxbm.php?id=<?=$v["yxk_id"]?>">[报名]</a></dd>
											</dl>
											<?php }?>
										</div>
									</div>
							</div>
							<div class="main_box03_01_left_03"><img src="images/left1_bottombg.jpg" /></div>
				</div>
			<div class="main_box03_01_left">
				<div class="main_box03_01_left_01">
					<?php
					$rowl=$dblink->find("yx_kaike",array(),"yxk_cl='在职研究生'");
					?>
				<dl>
				  <dt><?=$rowl["yxk_cl"]?></dt>
				  <dd><a href="index_list.php?yxk_cl=<?=$rowl["yxk_cl"]?>">更多>></a></dd>
				</dl>
				</div>
				<div class="main_box03_01_left_02">
					<div class="main_box03_01_left_02_pic"><img src="/admin_root/<?=$rowc["hd_pic3"]?>" /></div>
					<div class="main_box03_01_left_02_list">
					  <div class="main_box03_01_left_02_list_title">
						<dl>
						  <dt class="t01">课程名称</dt>
						  <dd class="t02">开课时间</dd>
						  <dd class="t03">上课地点</dd>
						  <dd class="t04">学费</dd>
						</dl>
					  </div>
					  <div class="main_box03_01_left_02_list_text">
						<?php
							$rowm=$dblink->findAll("yx_kaike",array(),"yxk_cl='在职研究生'",'','0,5',"yxk_time desc");
							foreach($rowm as $v){
						?>
						<dl>
						  <dt class="t01"><a href="yxschool.php?id=<?=$v["yxk_id"]?>" title="<?=$v["yxk_title"]?>"><?=$Common->strCutAndTags($v["yxk_title"],30,'..')?></a></dt>
						  <dd class="t02"><?php echo $v["yxk_time"];?></dd>
						  <dd class="t03"><?=$Common->strCutAndTags($v["yxk_adder"],27,'..')?></dd>
						  <dd class="t04"><span>￥<?php echo $v["yxk_xfei"];?></span> <a href="yxschool_zxbm.php?id=<?php echo $v["yxk_id"]?>">[报名]</a></dd>
						</dl>
						<?php }?>
					  </div>
					</div>
				</div>
				<div class="main_box03_01_left_03"><img src="images/left1_bottombg.jpg" /></div>
			</div>
			<div class="main_box03_01_left">			
				<div class="main_box03_01_left_01">
				<?php $rowo=$dblink->find("yx_kaike",array(),"yxk_cl='总裁总监研修'");?>
				<dl>
				  <dt><?=$rowo["yxk_cl"]?></dt>
				  <dd><a href="index_list.php?yxk_cl=<?=$rowo["yxk_cl"]?>">更多>></a></dd>
				</dl>
				</div>
				<div class="main_box03_01_left_02">
            <div class="main_box03_01_left_02_pic"><img src="/admin_root/<?=$rowc["hd_pic3"]?>" /></div>
            <div class="main_box03_01_left_02_list">
              <div class="main_box03_01_left_02_list_title">
                <dl>
                  <dt class="t01">课程名称</dt>
                  <dd class="t02">开课时间</dd>
                  <dd class="t03">上课地点</dd>
                  <dd class="t04">学费</dd>
                </dl>
              </div>
              <div class="main_box03_01_left_02_list_text">
						<?php
						$rowh=$dblink->findAll("yx_kaike",array(),"yxk_cl='总裁总监研修'",'','0,5',"yxk_time desc");
						foreach($rowh as $v){
						?>
							<dl>
							  <dt class="t01"><a href="yxschool.php?id=<?=$v["yxk_id"]?>" title="<?=$v["yxk_title"]?>"><?=$Common->strCutAndTags($v["yxk_title"],30,'..')?></a></dt>
							  <dd class="t02"><?php echo $v["yxk_time"];?></dd>
							  <dd class="t03"><?=$Common->strCutAndTags($v["yxk_adder"],27,'..')?></dd>
							  <dd class="t04"><span>￥<?=$v["yxk_xfei"];?></span> <a href="yxschool_zxbm.php?id=<?=$v["yxk_id"]?>">[报名]</a></dd>
							</dl>
						<?php }?>
              </div>
            </div>
          </div>
				<div class="main_box03_01_left_03"><img src="images/left1_bottombg.jpg" /></div>
			</div>
			
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