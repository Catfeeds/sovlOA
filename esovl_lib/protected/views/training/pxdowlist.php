
<div class="px_ss">
	<ul>
		<li>
			<input name="input" type="text" />
		</li>
		<li>
			<select name="select">
				<option>所在省</option>
			</select>
		</li>
		<li>
			<select name="select">
				<option>请选择...</option>
			</select>
		</li>
		<li>
			<input name="input2" type="image" src="/images/ss_pro.jpg" style="width:60px;height:24px;" />
		</li>
		<li><span>搜索关键词：</span><a href="#">考研</a> <a href="#">普通高考</a> <a href="#">成人高考</a> <a href="#">自考</a> <a href="#">在职硕士</a></li>
	</ul>
</div>
<div class="px_kclist">
    <div class="px_kclist_box01">
        <div class="main_box03_left_0003">
			<div class="mian_left_lj">
				<div class="mian_left_lj_001">您当前的页面地址：<a href="<?=Yii::app()->createUrl("/training/index")?>">培训首页</a> >资料下载列表</div>
			</div>
			<div class="mian_left_news_lb">
				<div class="mian_left_news_bj">
					<div class="mian_left_news_lb_mc">资料下载列表</div>
				</div>
				<?php
					$NewsModels = $dataProvider->getData();
					foreach($NewsModels as $row){
				?>
					<div class="mian_left_news_bt">
						<dl>
							<dt><?=$row["w_title"]?></dt>
							<dd><a href="admin_root/<?php echo $row["w_con"];?>" target="_blank"><img src="/images/djxz.jpg" /></a></dd>
						</dl>
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
		
		<?/**/?>
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
						<?php	   /*
							@$sql="select * from ennews where nclass=37 order by ndate desc limit 6"; //热点资讯
							$res = $dblink->fetchAll($sql);
							//$res = array();
							foreach($res as $row){
						?>
							<dl>
								<dt>
									<a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>">
										<?=$Common->strCut($row["ntitle"],26)?>
									</a>
								</dt>
								<dd>
									<?=$row["ndate"]?>
								</dd>
							</dl>
						<?php } */?>
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
									<a href="<?=Yii::app()->createUrl("/training/pxkcview",array('id'=>$row['pxk_id']))?>" title="<?=$row["pxk_title"]?>">
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