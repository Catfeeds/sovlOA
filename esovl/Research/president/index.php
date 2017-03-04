<?php 
include_once("../../web_start.php");
$rowa=$dblink->find("yx_step",array(),"yx_id =5");
$rowb=$dblink->find("yx_hd",array(),"hd_id=5");
?>
<?php include('../Research_head.php');?>
<body>
<div class="wrapper">
<!-- top -->
<?php include('../yx_top.html'); ?>
<!-- top end -->
<!-- main -->
<div class="main">
<div class="mba_zxtop">
<div class="main_mba">
    <div class="mba_tpic_01"><img src="/Research/images/mba_top_03.jpg" /></div>
    <div class="mba_tipc">
    <dl>
    <dd><a href="/Research/mba/">MBA/EMBA</a></dd>
    <dd><a href="/Research/master/">工程硕士</a></dd>
    <dd><a href="/Research/graduate/">在职研究生</a></dd>
    <dt><a href="/Research/president/">总裁总监研修</a></dt>
    <dd><a href="/Research/yx_daquan.php">简章大全</a></dd>
    <dd><a href="/Research/yx_seach.php">简章搜索</a></dd>
    </dl></div>
    <div class="mba_tpic_01"><img src="/Research/images/mba_top_09.jpg" /></div>
</div>
<div class="mba_zxtop_001">
<div class="mba_01">
    <div><img src="images/mba_10.jpg" width="210" height="3" /></div>
    <div class="mba_zxjx"><h5>最新资讯</h5><span></span></div>
    <div class="mba_zxjx_box">
    <ul>
        <?php
		$row1=$dblink->findAll('yx_news',array(),"news_class='{$rowa["yx_name"]}'",'','7','news_id desc');		
		foreach($row1 as $v){
		?>
         <li>·<a title="<?=$v["news_title"]?>" href="/Research/re_news_show.php?id=<?=$v["news_id"]?>"><?=$Common->strCutAndTags($v["news_title"],39,'..')?></a></li>
        <?php }?>
    </ul>
</div>
<div><img src="/Research/images/mba_13.jpg" width="210" height="3" /></div>
</div>
<div class="mba_02">
      <div class="mba_02_top"><img src="/Research/images/mba_a03.jpg" width="461" height="2" /></div>
      <div class="mba_02_con">          
      <?php include('../pic_switch.php');?>
      </div>
      <div class="mba_02_bot"><img src="/Research/images/mba_06.jpg" width="461" height="2" /></div>
</div>
<div class="mba_03">
      <div class="mba_03_top"><h5>活动看版</h5><span><a href="/Research/re_news_list.php?cl=8">MORE</a></span></div>
			<div class="mba_03_con">
						<?php
						$row2=$dblink->findAll('yx_news',array(),"news_class='{$rowa["yx_name"]}' and nbool='1'",'','0,4','news_id desc');
						foreach($row2 as $key=>$v){
						if($key==0){
						?>
							<span class="mba_03_s1"><a href="/Research/re_news_show.php?id=<?=$v["news_id"];?>"><img src="/admin_root/<?=$v["npic"]?>" width="95" height="81" /></a></span>
								<span class="mba_03_s2">
								  <h4><a href="/Research/re_news_show.php?id=<?=$v["news_id"];?>"><?=$Common->strCutAndTags($v["news_title"],24,'..')?></a></h4>
								  <h5><a href="/Research/re_news_show.php?id=<?=$v["news_id"];?>"><?=$Common->strCutAndTags($v["news_con"],90,'..')?></a></h5>
								</span>
						<?php }else{?>
								<div class="mba_03_s3">
										<ul><li>·<a title="<?=$v["news_title"]?>" href="/Research/re_news_show.php?id=<?=$v["news_id"];?>"><?=$Common->strCutAndTags($v["news_title"],45,'..')?></a></li></ul>
								</div>
						<?php }}?>        
			</div>
      <div class="mba_03_bot"></div>
</div>
</div>
</div>
<div class="mba_tj">
    <div class="mba_tjleft">
        <div class="mba_tj_top">
             <dl><dt>推荐学校</dt><dd><a href="/Research/index_more.php">MORE..</a></dd><dd class="mba_tj_tel">咨询热线:<span><?php echo $yx_qq;?></span></dd></dl>
        </div>
        <div class="mba_tj_mid">
            <div class="mba_crlie">			
				<?php
				$row3=$dblink->findAll('yx_school',array(),"nbool='1'",'','0,4','school_id desc');						
				foreach($row3 as $v){
				$yxk_school=$v["school_id"];
				?> 
						<div class="mba_tj_mcon01">             
								<div class="mba_xt_left">													  
									   <span class="mab_tj_xt"><img src="/admin_root/<?=$v["s_banner"]?>" width="115" height="93" /></span>
									   <span class="mba_tj_xt"><?=$v["school_name"]?></span>								
								</div>                        
								<div class="mba_tj_li">
									<ul>
										<?php
										$row4=$dblink->findAll('yx_kaike',array(),"yxk_school='{$yxk_school}' and yxk_cl ='{$rowa["yx_name"]}'",'','0,4','yxk_id desc');							
										foreach($row4 as $v){
										?> 
										<li><a href="/Research/yxschool.php?id=<?=$v["yxk_id"]?>" title="<?=$v["yxk_title"]?>"><?=$Common->strCutAndTags($v["yxk_title"],45,'..')?></a></li>
										<?php }?>
									</ul>
								</div>
						</div>
				<?php }?>
            </div>
        </div>
        <div class="mba_tj_bot"><img src="/Research/images/mba_tj02.jpg" width="681" height="2" /></div>
    </div>
    
    <div class="mba_tjriht">
				<div class="mba_03_top"><h5>金牌课程推荐</h5><span></span></div>
                 <div class="mba_tjright_list">
                    <ul>
						 <?php
						$row5=$dblink->findAll('yx_kaike',array(),"pxk_bool='1' and yxk_cl ='{$rowa["yx_name"]}'",'','0,9','');
						foreach($row5 as $v){
						?>
						<li><a href="/Research/yxschool.php?id=<?=$v["yxk_id"]?>" title="<?=$v["yxk_title"]?>"><?=$Common->strCutAndTags($v["yxk_title"],45,'..')?></a></li>
						<?php }?>
					</ul> 
				</div>
				<div class="mba_03_bot"></div>
    </div>
</div>
<div class="mba_001">
<div class="mba_left">
	<div class="mba_tjleft">
				<div class="mba_tj_top">
									<dl>
									<dt>推荐专业</dt>
									<dd><a href="/Research/index_zhuanye.php?pd='MBA/EMBA'">MORE..</a></dd>
									<dd class="mba_tj_tel">咨询热线:<span><?=$z_tel;?></span></dd>
									</dl>
				</div>
				<div class="mba_tj_mid">
						<div class="mba_crlie">
							<?php
							$row6=$dblink->findAll('yx_class',array(),"class_pindao='{$rowa["yx_name"]}'",'','0,2','class_id asc');
							foreach($row6 as $v){
							if($v["class_id"]){
							$class_title=$v["class_id"];
							?> 
									<div class="mba_tj_zy01">											                    
											<div class="mba_tjzy1"><span><?=$v["class_title"];?></span></div>												
											<div class="mba_tjzy2">
												<span><a href="/Research/re_news_zhuanye.php?id=<?=$class_title?>"><img src="/admin_root/<?=$v["pxk_pic"]?>" width="75" height="70" /></a></span>
													<?php
														$row7=$dblink->findAll('yx_kaike',array(),"yx_kaike.yxk_cl='{$rowa["yx_name"]}' and yx_kaike.class_title='{$class_title}'",'join yx_class on yx_kaike.class_title=yx_class.class_id','0,5','yx_kaike.yxk_id desc');																	
														foreach($row7 as $key=>$v){
															if($key==0){															
														?>
														<span class="con1"><?=$Common->strCutAndTags($v["class_con"],120,'..')?><a href="/Research/re_news_zhuanye.php?id=<?=$class_title;?>">详细>></a></span>														
															<?php }else{
																		echo $key==1?'<span class="ul001"><ul>':"";?>
																		<li>·<a href="/Research/yxschool.php?id=<?=$v["yxk_id"]?>" title="<?=$v["yxk_title"]?>"><?=$Common->strCutAndTags($v["yxk_title"],45,'..')?></a></li>														
															<?php		echo $key==(count($v)-1)?'</ul></span>':'';
															}?>
													<?php }?>														
											</div>												            
									</div>
							<?php }}?>									
						</div>
				</div>
				<div class="mba_tj_bot"><img src="/Research/images/mba_tj02.jpg" width="681" height="2" /></div>
	</div>
<?php
			$row=$dblink->findAll('yx_kaoshi_class',array());
			foreach($row as $v){
			$class_id=$v["class_id"];	
			$class_name=$v["class_name"];	
			?>
					<div class="mba_tjleft">
							<div class="mba_tj_top">
								 <dl><dt><?=$class_name?></dt><dd><a href="/Research/index_beikao.php">MORE..</a></dd><dd class="mba_tj_tel">咨询热线:<span><?=$z_tel;?></span></dd></dl>
							</div>
							<div class="mba_tj_mid">
									<div class="mba_crlie">
												<?php 
												$row=$dblink->findAll('yx_kaoshi',array(),"class_id='{$class_name}'",'','0,2','');	
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
<div class="mba_right">
	<div class="mba_tjriht">
		<div class="mba_03_top"><?=$rowa["yx_name"]?></div>
		<div class="mba_tjright_list"><?=$rowa["yx_gg"]?></div>
		<div class="mba_03_bot"></div>
	</div>
    <div class="mba_tjriht">
      <div class="mba_03_top"><h5>常见问题</h5><span><a href="/Research/re_wenda_list.php">MORE</a></span></div>
<div class="mba_tjright_list">
<ul>
		<?php
			$row0=$dblink->findAll('yx_changj',array(),"cj_pindao='{$rowa["yx_name"]}'",'','0,9','cj_id desc');						
			foreach($row0 as $v){
			?>
			<li><a href="/Research/re_wenti_show.php?id=<?=$v["cj_id"];?>"><?=$Common->strCutAndTags($v["cj_wenti"],26,'..')?></a></li>
		<?php }?>
</ul>
</div>
<div class="mba_03_bot"></div>
</div>
</div>
</div>
<!-- main end -->
<!-- bottom -->
<?php include('../yx_bottom.html'); ?>
<!-- bottom end -->	
</div>
</div>
</body>
</html>