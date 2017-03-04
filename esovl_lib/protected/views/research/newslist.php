<!-- main -->
		<?=$this->renderPartial("_research_gg",array("AB"=>$AB));?>		
		<div class="main_box03">
			<div class="main_box03_01">
					<div class="main_box03_02_left">
							<div class="main_box03_02_lefta">
								<div class="main_box01_right_top">
									<dl>
									<dt>热点推荐</dt>						
									<dd><a href="<?=Yii::app()->createUrl('research/newslist',array("id"=>3,'order'=>'hot'))?>">MORE>></a></dd>
									</dl>
								</div>
								<div class="zxkb">
									<div class="zxkb_list">								
									<?php 	$news=Information::model()->getAllByPid(3,6,'i_click desc',true);
											foreach($news as $row){
												echo "<dl><dd><a href='".Yii::app()->createUrl("research/newsview",array('id'=>$row["i_id"]))."'>".$row['i_title']."</a></dt><dt>".$row["i_submitdate"]."</dt></dl>";
											}?>
									</div>
								</div>
								<div class="main_box01_right_bottom"><img src="/Research/images/right1_bottombg.jpg" /></div>
							</div>	
							
							<div class="main_box03_02_leftb">
								<div class="main_box01_right_top">
									<dl>
									<dt>一休网快报</dt>                        
									<dd><a href="<?=Yii::app()->createUrl('research/newslist',array("id"=>3))?>">MORE>></a></dd>
									</dl>
								</div>
								<div class="zxkb">
								<?php 
										$news=Information::model()->getAllByPid(3,6,'i_click desc',true);
										foreach($news as $k=>$row){
											if($k==0){
								?>
									<div class="zxkb_pic"><a href="<?=Yii::app()->createUrl("research/newsview",array('id'=>$row["i_id"]))?>"><img src="/admin_root/<?=$row["i_pic"]?>" /></a></div>
								<?php }else{?>
									<div class="zxkb_list"><?php 	echo "<dl><dd><a href='".Yii::app()->createUrl("research/newsview",array('id'=>$row["i_id"]))."'>".$row['i_title']."</a></dt><dt>".$row["i_submitdate"]."</dt></dl>";?></div>
								<?php }}?>
								</div>
								<div class="main_box01_right_bottom">
								<img src="/Research/images/right1_bottombg.jpg" />
								</div>
							</div>
					</div>
				<div class="main_box03_02_right_dh"><strong>您的位置：<a href="/"><?=$web->z_name?></a>	>	<a href="<?=Yii::app()->createUrl('research/newslist',array("id"=>$Nclass["ic_id"]))?>"><?=Icolumn::model()->getNameByid($Nclass->ic_id)?></a>
					<?php if($Nclass->ic_pid=='0')echo "> 最新新闻"?>
				> 新闻列表</strong></div>
                
					<div class="main_box03_02_right">
							<div class="main_box03_01_left_03"><img src="/Research/images/left1_topbg.jpg" /></div>
							<div class="main_box03_01_left_02_newlist">
									<div class="main_box03_01_left_02_newlist00">									
									<?php	$NewsModels=$dataProvider->getData();
												foreach($NewsModels as $k=>$row){?>																				
										<dl>
													 <dd class="main_box03_01_rigth_list01"><img src="/Research/images/ico01.jpg" /></dd>
													 <dd class="main_box03_01_rigth_list02"><a href="<?=Yii::app()->createUrl("research/newsview",array("id"=>$row->i_id))?>" title='<?php echo $row["i_title"];?>'><?php echo Common::strCut($row["i_title"],100);?></a></dd>
													 <dd class="main_box03_01_rigth_list03"><?=$row["i_submitdate"]?date('Y-m-d ',$row["i_submitdate"]):"";?></dd>
													 <dd class="main_box03_01_rigth_dt">
												
													 <?php echo Common::strCutAndTags($row["i_con"],300,'...');?>												 
													 </dd>
													<dd class="main_box03_01_rigth_rdt"><a href="<?=Yii::app()->createUrl("research/newsview",array("id"=>$row->i_id))?>" title='<?php echo $row["i_title"];?>'>>>阅读全文</a></dd>
										</dl>
									<?php	}?>
									
									</div>
									<div class="main_box03_01_rigth_list04">
										<ul>
											<li>共<?=$dataProvider->totalItemCount?> 条信息</li>
											<li><?php	$this->widget('CLinkPager',array(
															'pages'=>$dataProvider->pagination,
															"cssFile"=>"/css/pager.css"
												));?>
											</li>
										</ul>
									</div>
							</div>
								<div class="main_box03_01_left_03"><img src="/Research/images/left1_bottombg.jpg" /></div>
					</div>
				
			</div>
		</div>