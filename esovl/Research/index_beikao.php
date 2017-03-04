<?php 
include_once("../web_start.php");
$rowa=$dblink->find("yx_step",array(),"yx_id =2");
?>
<?php include('Research_head.php');?>
<body>
<div class="wrapper">
<!-- top -->
<?php include('yx_top.html'); ?>
<!-- top end -->
<!-- main -->
<div class="main">
	<div class="mba_left">
	  <?php
			$row=$dblink->findAll('yx_kaoshi_class',array());
			foreach($row as $v){
			$class_id=$v["class_id"];	
			$class_name=$v["class_name"];	
			?>
					<div class="mba_tjleft"  style="margin-top:0;">
							<div class="mba_tj_top">
								 <dl><dt><?=$class_name?>列表</dt><dd>&nbsp;</dd><dd class="mba_tj_tel">咨询热线:<span><?=$z_tel;?></span></dd></dl>
							</div>
							<div class="mba_tj_mid">
									<div class="mba_crlie">
												<?php 
												$row=$dblink->findAll('yx_kaoshi',array(),"class_id='{$class_name}'",'','','');	
                                                  foreach($row as $vlaue){												
												?>
											<div class="mba_tj_zy01">
													<div class="mba_tjzy1"><span><?=$vlaue["kaoshi_title"]?></span></div>
													<div class="mba_tjzy2">
														<span><a href="/Research/re_news_xiangguan.php?id=<?=$vlaue["kaoshi_id"]?>"><img src="/admin_root/<?=$vlaue["pxk_pic"]?>" width="75" height="70" /></a></span>
														<span class="con1">
															<?=$Common->strCutAndTags($vlaue["kaoshi_con"],150,'..')?><a href="/Research/re_news_xiangguan.php?id=<?=$vlaue["kaoshi_id"]?>">详细>></a>
														</span>
														<span class="ul001">
															<ul>
																<?php
																$row1=$dblink->findAll('yx_news',array(),"kaoshi_title='{$vlaue["kaoshi_title"]}'",'','0,5','');																
																foreach($row1 as $v){
																?>
																<li>·<a href="/Research/re_news_show.php?id=<?=$v["news_id"]?>"><?=$Common->strCutAndTags($v["news_title"],120,'..')?></a></li>
																<?php }?>
															</ul>
														</span>
													</div>                    
											</div>
											<?php }?>														 
									</div>
							</div>
							<div class="mba_tj_bot"><img src="/Research/images/mba_tj02.jpg" width="681" height="2" /></div>
					</div>
			<?php }?>  
	</div>      
	<?php include_once("right.php");?>
	<!-- main end -->
	<!-- bottom -->
	<?php include('yx_bottom.html'); ?>
	<!-- bottom end -->
</div>
</div>
</body>
</html>