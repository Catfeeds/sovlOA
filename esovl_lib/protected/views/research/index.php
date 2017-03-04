<?php
//$this->breadcrumbs=array('Research',);
?>


		<div class="main_box01">
			<div class="main_box01_left">
				<div class="main_box01_left_01"><img src="images/left1_topbg.jpg" /></div>
					<div class="main_box01_left_02">
						<div id="slideshow">
							<div class="slideshow">
								<div id="slider_nav"></div>
								<div class="clearfix" id="slider">								
									<?php
									$models=Information::model()->getAllByPid(3,5,"i_submitdate desc",true);									
									foreach($models as $key=>$v){?>
										<div class="featured_post">											
											<div class="slider_image">
											<a href="<?=Yii::app()->createUrl("research/newsview",array('id'=>$v["i_id"]))?>"><img height='238' src="/admin_root/<?=$v["i_pic"]?>" width=360 /></a>											
											</div>
												<div class="slider_post">
													<h3> <a href="<?=Yii::app()->createUrl("research/newsview",array('id'=>$v["i_id"]))?>"><?=$v["i_title"];?></a></h3>
													<div class="archive_info">
														 <span class="date"><?=$v["i_submitdate"]?date("Y-m-d H:i:s",$v["i_submitdate"]):""?></span>
														 <span class="category">浏览次数：<?=$v["i_click"]?></span>
													</div>
													<p><?=Common::strCutAndTags($v["i_con"],400,'..')?></p>
													<div class="clear"></div>
												</div>              
										</div>
									<?php 	}?>
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
					<dd><a href="<?=Yii::app()->createUrl('research/newslist',array("id"=>3,'order'=>'hot'))?>">MORE>></a></dd>
				  </dl>
				</div>
				<div class="main_box01_right_main">
					<?php 
					$news=Information::model()->getAllByPid(3,7,'i_click desc',true);
						foreach($news as $row){
					?>
					  <dl>
						<dt><a href="<?=Yii::app()->createUrl("/research/newsview",array('id'=>$row["i_id"]))?>" title="<?=$row['i_title']?>"><?=Common::strCut($row['i_title'],40,'..')?></a></dt>
						<dd><?=$row['i_submitdate']?$row['i_submitdate']:"0"?></dd>
					  </dl>
					<?php }?>					
				</div>				
				<div class="main_box01_right_bottom"><img src="images/right1_bottombg.jpg" /></div>
			</div>
		</div>
		<div class="main_box02">
		  <?=$this->renderPartial("_research_gg",array("AB"=>$AB))?>
		</div>
		<?=$this->renderPartial("_index_left",array("LuquModels"=>$LuquModels,"KechenModels"=>$KechenModels,"newsHdong"=>$newsHdong,'downModels'=>$downModels))?>
	<?php /*	 	
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
	   */?>
      </div>