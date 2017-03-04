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
											foreach($LuquModels as $row){
										?>
										  <dl>
											<dt><?=Common::strCut($row['lq_name'],10,'..')?></dt>
											<dd><?=$row["lq_zy"];?></dd>
											<dt><?=$row['lq_date']?$row['lq_date']:"0"?></dt>
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
						foreach($KechenModels as $v){
						?>
						<li><a href="<?=Yii::app()->createUrl("/research/yxschool",array('id'=>$v["yxk_id"]))?>" title="<?=$v["yxk_title"]?>"><?=Common::strCut($v["yxk_title"],49,'..')?></a></li>
						<?php }?>
						</ul>
					</div>
					<div class="main_box01_right_bottom"><img src="images/right1_bottombg.jpg" /></div>
		</div>                
		<div class="main_box03_01_right">
					<div class="main_box01_right_top">
						<dl>
						<dt>活动看板</dt>						
						<dd><a href="<?=Yii::app()->createUrl('research/newslist',array("id"=>3))?>">MORE>></a></dd>
						</dl>
					</div>
					<div class="main_box01_right_main">						
						<?php 
									foreach($newsHdong as $k=>$v){
										if($k<1){?>
											<div class="hdkb">
												<div class="hdkb_pic"><a href="<?=Yii::app()->createUrl("research/newsview",array('id'=>$v["i_id"]))?>"><img src="/admin_root/<?=$v["i_pic"]?>" border="0" width="110"/></a></div>
												<div class="hdkb_list">								
												<h3><a href="<?=Yii::app()->createUrl("research/newsview",array('id'=>$v["i_id"]))?>" title="<?=$v["i_title"]?>"><?=Common::strCutAndTags($v["i_title"],24)?></a></h3>
												<p><?=Common::strCutAndTags($v["i_con"],54)?></p>
												</div>
											</div>
						<?php		}else{?>
											<dl>
												<dt>·<a href="<?=Yii::app()->createUrl("research/newsview",array('id'=>$v["i_id"]))?>" title="<?=$v["i_title"]?>"><?=Common::strCutAndTags($v["i_title"],36,"..")?></a></dt>
												<dd><a href="<?=Yii::app()->createUrl("research/newsview",array('id'=>$v["i_id"]))?>"><img src="images/yx_ck.gif" border="0" /></a></dd>
											</dl>
						<?php }?>								
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
						//$rown=$dblink->findAll("yx_down",array(),"",'','0,7',"down_id asc");
						foreach($downModels as $k=>$v){
						?>
						<dl>
						<dt>·<?=Common::strCutAndTags($v["down_title"],36)?></dt>
						<dd><a href="../admin_root/<?=$v["w_con"];?>"><img src="images/yx_xz.jpg" border="0" /></a></dd>
						</dl>
                        <?php }?>						
					</div>
					<div class="main_box01_right_bottom"><img src="images/right1_bottombg.jpg" /></div>
		</div>
</div>