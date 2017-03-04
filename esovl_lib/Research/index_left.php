<div style="width:281px;float:right;">
		<div class="main_box03_01_right">
							<div class="main_box01_right_top">
								<dl>
								<dt>最新录取</dt>
								<dd>&nbsp;</dd>
								</dl>
							</div>
							<div class="zxlq">
								<div class="zxlq_title">
								  <dl>
									<dt>学生姓名</dt>
									<dd>类 别</dd>
									<dt>录取时间</dt>
								  </dl>
								</div>  
								<div class="zxlq_list" id="Marquee2" style="height:190px;">
									  <?php
											$rowh=$dblink->findAll("yx_luqu",array(),"",'','20',"lq_date desc");
											foreach($rowh as $v){
									  ?>
									  <dl>
										<dt><span><?=$v["lq_name"];?></span></dt>
										<dd><?=$Common->strCutAndTags($v["lq_zy"],20)?></dd>
										<dt><?=$v["lq_date"];?></dt>
									  </dl>
									  <?php }?>
								</div>
								<script src="/js/xlgund2.js"></script>
							</div>
							<div class="main_box01_right_bottom"><img src="images/right1_bottombg.jpg" /></div>
		</div>
		<div class="main_box03_01_right">
					<div class="main_box01_right_top">
						<dl>
						<dt>金牌课程推荐</dt>
						<dd></dd>
						</dl>
					</div>
					<div class="main_box01_right_main">
						<ul>
                        <?php 
						$rowk=$dblink->findAll("yx_kaike",array(),"pxk_bool=1",'','0,7',"yxk_id desc");
						foreach($rowk as $v){
						?>
						<li><a href="yxschool.php?id=<?=$v["yxk_id"]?>" title="<?=$v["yxk_title"]?>"><?=$Common->strCutAndTags($v["yxk_title"],45)?></a></li>
						<?php }?>
						</ul>
					</div>
					<div class="main_box01_right_bottom"><img src="images/right1_bottombg.jpg" /></div>
		</div>                
		<div class="main_box03_01_right">
					<div class="main_box01_right_top">
						<dl>
						<dt>活动看板</dt>						
						<dd><a href="re_news_list.php?cl=8">MORE>></a></dd>
						</dl>
					</div>
					<div class="main_box01_right_main">
						<div class="hdkb">
							<?php
								$rown=$dblink->findAll("yx_news",array(),"class_name='8'",'','0,1',"news_id asc");
								foreach($rown as $k=>$v){
							?>
								<div class="hdkb_pic"><a href="#"><img src="/admin_root/<?=$v["npic"]?>" border="0" width="110"/></a></div>
								<div class="hdkb_list">								
									<h3><a href="re_news_show.php?id=<?=$v["news_id"];?>" title="<?=$v["news_title"]?>"><?=$Common->strCutAndTags($v["news_title"],24)?></a></h3>
									<p><?=$Common->strCutAndTags($v["news_con"],54)?></p>
								</div>
							<?php }?>
						</div>
							
						<?php 
						$rown=$dblink->findAll("yx_news",array(),"class_name='8'",'','1,4',"news_id asc");
						foreach($rown as $k=>$v){
						?>
							<dl>
							<dt>·<a href="re_news_show.php?id=<?=$v["news_id"];?>" title="<?=$v["news_title"]?>"><?=$Common->strCutAndTags($v["news_title"],30,"...")?></a></dt>
							<dd><a href="re_news_show.php?id=<?=$v["news_id"]?>"><img src="images/yx_st.jpg" border="0" /></a></dd>
							</dl>
                        <?php }?>
					</div>
					<div class="main_box01_right_bottom"><img src="images/right1_bottombg.jpg" /></div>
		</div>
		<div class="main_box03_01_right">
					<div class="main_box01_right_top">
						<dl>
						<dt>资料下载</dt>						 
						<dd><a href="re_down_list.php">MORE>></a></dd>
						</dl>
					</div>
					<div class="main_box01_right_main">
                        <?php
						$rown=$dblink->findAll("yx_down",array(),"",'','0,7',"down_id asc");
						foreach($rown as $k=>$v){
						?>
						<dl>
						<dt>·<?=$Common->strCutAndTags($v["down_title"],36)?></dt>
						<dd><a href="../admin_root/<?=$v["w_con"];?>"><img src="images/yx_xz.jpg" border="0" /></a></dd>
						</dl>
                        <?php }?>						
					</div>
					<div class="main_box01_right_bottom"><img src="images/right1_bottombg.jpg" /></div>
		</div>
</div>