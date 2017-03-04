<?php 
//Yii::app()->clientScript->registerMetaTag("关键子",'keywords');
//Yii::app()->clientScript->registerMetaTag("介绍",'description');
$this->pageTitle = $newsModel->i_title."-".$web->z_name."-".$web->beizhu;
?>
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
									<?php 	$news=Information::model()->getAllByPid(3,8,'i_click desc',true);
											foreach($news as $row){
												echo "<dl><dd><a href='".Yii::app()->createUrl("research/newsview",array('id'=>$row["i_id"]))."'>".$row['i_title']."</a></dt><dt>".$row["i_submitdate"]."</dt></dl>";
											}?>
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
									<dd><a href="<?=Yii::app()->createUrl('research/newslist',array("id"=>3))?>">MORE>></a></dd>
									</dl>
								</div>
								<div class="zxkb">
								<?php 
										$news=Information::model()->getAllByPid(3,8,'i_click desc',true);
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
					<div class="main_box03_02_right">
						<div class="main_box03_02_right_dh"><strong>您的位置：<a href="/"><?=$web->z_name?></a>&gt; <a href="<?=Yii::app()->createUrl('research/newslist',array("id"=>$newsModel["i_class"]))?>"><?=$NclassModel->ic_class?></a> &gt; 新闻详细</strong></div>    
						<div class="main_box03_01_left_03">
						<img src="/Research/images/left1_topbg.jpg" />
						</div>
						<div class="main_box03_01_left_02_newlist">
								<div class="main_box03_01_left_02_newlist00">
									<dl>
										<h1><?=$newsModel["i_title"]?></h1>
										<h2>发表于：<?=$newsModel->i_submitdate?> 来源：<?=$web->z_name?> 浏览：<?=$newsModel->i_click?></h2>
										<dd class="main_box03_01_rigth_dt"><?=$newsModel->i_con?></dd>
									</dl>
								</div>                                     
								<div class="main_box03_01_rigth_list05"><img src="/Research/images/222.gif" width="7" height="8" /> <a href="#">Top</a>&nbsp;&nbsp;<img src="/Research/images/1010.gif" width="4" height="6" />  <a href="<?=Yii::app()->createUrl('research/newslist',array("id"=>$newsModel["i_class"]))?>">返回列表</a></div>
						</div>
						<div class="main_box03_01_left_03"><img src="/Research/images/left1_bottombg.jpg" /></div>
					</div>				
			</div>				
		</div>

