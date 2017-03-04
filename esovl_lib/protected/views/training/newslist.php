<div class="px_ss">
	<ul>
		<?php 
			// if(isset($_POST["xl_skey"])){	
				// $skey=@$_POST["xl_skey"];
				// echo "<script>location.href='../Education/xl_pro_search.php?skey=".$skey."';</script>";	
			// }
		?>
		<form name="xl_sform" id="xl_sform" method="post" onsubmit="return xl_sou();" action="">
			<li>
				<input name="xl_skey" type="text" style="width:220px;" />
			</li>
			<li>
				<input name="input" type="image" src="images/ss_pro.jpg" style="width:60px;height:24px;" />
			</li>
			<li><span>搜索关键词：</span><a href="#">考研</a> <a href="#">普通高考</a> <a href="#">成人高考</a> <a href="#">自考</a> <a href="#">在职硕士</a></li>
		</form>
	</ul>
</div>
<div class="px_kclist">
    <div class="px_kclist_wz">
		您当前的位置：<a href="/">一休网</a> >> <a href="<?=Yii::app()->createUrl('/training/index')?>">培训首页</a> >> 
		<a href="<?=Yii::app()->createUrl("/training/newslist",array('id'=>$Nclass->ic_id))?>">
			<?=Icolumn::model()->getNameByid($Nclass->ic_id)?>新闻列表
		</a> >>新闻详细
	</div>
    <div class="px_kclist_box01">
        <div class="main_box03_left_0003">
			<div class="mian_left_news_lb" style="margin-top:0;">
				<div class="mian_left_news_bj">
					<div class="mian_left_news_lb_mc">
						<?=Icolumn::model()->getNameByid($Nclass->ic_id)?>新闻列表
					</div>
				</div>
				<?php	
					$NewsModels = $dataProvider->getData();
					foreach($NewsModels as $row){
				?>
					<div class="mian_left_news_bt"><span><a href="<?=Yii::app()->createUrl("/training/newsview",array('id'=>$row['i_id']))?>"><?=$row["i_title"]?></a></span>
						<?=$row["i_submitdate"]?date('Y-m-d ',$row["i_submitdate"]):"";?>
					</div>
					<div class="mian_left_news_jxnr">
						<?=Common::strCut($row["i_con"],250)?>
						..<span><a href="<?=Yii::app()->createUrl("training/newsview",array('id'=>$row['i_id']))?>">[详细...]</a></span>
					</div>
					<div class="mian_left_news_xux"></div>
				<?php } ?>
				<div class="mian_left_mews_fanyi">
					共<?=$dataProvider->totalItemCount?> 条信息
					<?php	
						$this->widget('CLinkPager',array(
							'pages'=>$dataProvider->pagination,
							"cssFile"=>"/css/pager.css"
						));
					?>
				</div>
			</div>
			<div style="clear:both; float:left; height:12px;"></div>
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
							$res = Information::model()->getAllByid($Nclass['ic_id'],'6','i_submitdate desc');
							foreach($res as $row){
						?>
							<dl>
								<dt><a href="<?=Yii::app()->createUrl("/training/newsview",array("id"=>$row['i_id']))?>" title="<?=$row["i_title"]?>">
									<?=Common::strCut($row["i_title"],26)?>
								</a></dt>
								<dd>
									<?=$row["i_submitdate"]?date('Y-m-d ',$row["i_submitdate"]):"";?>
								</dd>
							</dl>
						<?php }?>
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
							<dl><dt><a href="<?=Yii::app()->createUrl("/training/pxkcview",array('id'=>$row['pxk_id']))?>" title="<?=$row["pxk_title"]?>"><?=Common::strCut($row['pxk_title'],30)?> </a></dt><dd><?=$row["pxk_date"]?></dd></dl>
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