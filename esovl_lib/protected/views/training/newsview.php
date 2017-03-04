<div class="px_ss">
		<ul>
			<?php 
				if(isset($_POST["xl_skey"])){
					$skey=@$_POST["xl_skey"];
					echo "<script>location.href='../Education/xl_pro_search.php?skey=".$skey."';</script>";	
				}
			?>
			<form name="xl_sform" id="xl_sform" method="post" onsubmit="return xl_sou();" action="">
				<li>
					<input name="xl_skey" type="text" style="width:220px;" />
				</li>
				<li>
					<input name="input" type="image" src="/images/ss_pro.jpg" style="width:60px;height:24px;" />
				</li>
				<li><span>搜索关键词：</span><a href="#">考研</a> <a href="#">普通高考</a> <a href="#">成人高考</a> <a href="#">自考</a> <a href="#">在职硕士</a></li>
			</form>
		</ul>
</div>
<div class="px_kclist">
	<div class="px_kclist_wz">您当前的位置：<a href="<?=Yii::app()->createUrl("/training/index")?>">培训首页</a> >> 
		<a href="<?=Yii::app()->createUrl("/training/newslist",array('id'=>$NclassModel->ic_id))?>">
			<?=Icolumn::model()->getNameByid($NclassModel->ic_id)?>新闻列表
		</a> >>新闻详细
	</div>
	<div class="px_kclist_box01">
		<div class="main_box03_left">
			<div class="main_box03_left_news">
			<?/*	*/?>
				<div class="main_box03_left_news_title"><span><?=Icolumn::model()->getNameByid($NclassModel->ic_id)?>新闻详细</span></div>
				<div class="main_box03_left_news_list_d">
					<h1><?php echo $newsModel->i_title;?></h1>
					<h2>	<?php echo $newsModel->i_submitdate?date('Y-m-d H:i:s',$newsModel->i_submitdate):"";?>&nbsp;&nbsp;浏览次数：<?php echo $newsModel->i_click;?>
					</h2>
					<div class="main_box03_left_news_list_d_text">
						<?php echo $newsModel->i_con;?>
						<span style="width:640px; border-top:1px solid #ccc; margin-left:10px; display:inline; float:left; text-align:right;">
							<a href="<?=Yii::app()->createUrl("training/newslist",array("id"=>$newsModel->i_class))?>">返回列表</a>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="main_box03_right">
			<div class="main_box03_right_box02">
				<div class="main_box03_right_box02_title">
					<dl>
						<dt>最新资讯</dt>
						<dd>&nbsp;</dd>
					</dl>
				</div>
				<div class="main_box03_right_box02_list">
					<div class="main_box03_right_box02_list_kc">
						<?php
							$res = Information::model()->getAllByid($newsModel['i_class'],'6','i_submitdate desc');
							foreach($res as $row){
						?>
							<dl>
								<dt><a href="<?=Yii::app()->createUrl("/training/newsview",array('id'=>$row['i_id']))?>" title="<?=$row["i_title"]?>">
									<?=Common::strCut($row["i_title"],26)?>
								</a></dt>
								<dd>
									<?=$row["i_submitdate"]?date('Y-m-d ',$row["i_submitdate"]):"";?>
								</dd>
							</dl>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="main_box03_right_box02">
				<div class="main_box03_right_box02_title">
					<dl><dt>推荐课程</dt></dl>
				</div>
				<div class="main_box03_right_box02_list">
					<div class="main_box03_right_box02_list_kc">
						<?php
							$res = Pxkkinfo::model()->getAllByinfo('pxk_bool desc');
							foreach($res as $row){
						?>                 
							<dl>
								<dt>
									<a href="<?=Yii::app()->createUrl("/training/newsvew",array("id"=>$row['pxk_id']))?>">
										<?=Common::strCut($row['pxk_title'],30)?>
									</a>
								</dt>
								<dd><?=$row["pxk_date"]?></dd>
							</dl>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="main_box03_right_box03">
				<div class="main_box03_right_box0300"><?=$web['z_right1']?></div>
			</div>
		</div>
	</div>
</div>
