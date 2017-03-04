<!-- main -->
<div class="main">
	<div class="main_N">
    	<div class="main_N_left">
        	<div class="main_N_left_title">
            	<dl>
					<dt>教育动态</dt>
					<dd>
						<a href="<?=Yii::app()->createUrl("news/newslist",array('id'=>1))?>">学历信息</a><span>|</span>
						<a href="<?=Yii::app()->createUrl("news/newslist",array('id'=>2))?>">培训信息</a><span>|</span>
						<a href="<?=Yii::app()->createUrl("news/newslist",array('id'=>3))?>">研修信息</a><span>|</span>
						<a href="<?=Yii::app()->createUrl("news/newslist",array('id'=>65))?>">学校新闻</a><span>|</span>
						<a href="<?=Yii::app()->createUrl("news/newslist",array("order"=>"hot"))?>">热点资讯</a><span>|</span>
					</dd>
                </dl>
            </div>
            <div class="main_N_left_box01">
				<div class="main_N_left_box01_title">
					<dl><dt><span><a href="<?=Yii::app()->createUrl("news/newslist",array("order"=>"hot"))?>" title="热点资讯">热点资讯</a>图片</span>新闻</dt><dd><a href="<?=Yii::app()->createUrl("news/newsimg")?>">更多>></a></dd></dl>
				</div>
                <div class="main_N_left_box01_list">
					<?php
						$hasImgNews=Information::model()->getAllHasImg("",4,'i_click desc',false,true);
						foreach($hasImgNews as $row){
					?>
					<div class="main_N_left_box01_list00">
						<dl>
							<dt>
								<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
									<tr>
										<td align="center" valign="middle">
											<a href="<?=Yii::app()->createUrl("news/newsview",array('id'=>$row->i_id))?>"><img src="/admin_root/<?php echo $row["i_pic"]?>" border="0" align="top" onload="if(this.width>152){this.width=152}if(this.height>96){this.height=96}"/></a>
										</td>
									</tr>
								</table>                        
							</dt>
							<dd><a title="<?php echo $row["i_title"]?>" href="<?=Yii::app()->createUrl("news/newsview",array('id'=>$row->i_id))?>"><?php echo Common::strCut($row["i_title"],35);?></a></dd>
						</dl>
					</div>
					<?php }?>
				</div>
            </div>		
 <div class="main_N_left_box01">
	<?php
		$arr = array(
			"1",
			"2",
			"3",
			"65"
		);
		$j=0;
		//热点资讯单独拿出来做
		foreach($arr as $key=>$val){
		$j++;
			$models = Information::model()->getAllByPid($val,5,"i_submitdate desc");
			
	 ?>
	<div class="main_N_left_box01_00">
		<div class="main_N_left_box01_title">
			<dl><dt><span><?=Icolumn::model()->getNameByid($val)?></span></dt><dd><a href="<?=Yii::app()->createUrl("news/newslist",array("id"=>$val))?>" title="<?=Icolumn::model()->getNameByid($val)?>">更多>></a></dd></dl>
		</div>
		<?php
			foreach($models as $k=>$row){
		?>
		<div class="main_N_left_box01_l_list">
			<dl><dt><span>·</span><a href="<?=Yii::app()->createUrl("news/newsview",array('id'=>$row->i_id))?>" title="<?=$row['i_title']?>"><?=$row["i_title"]?></a></dt><dd><?=$row["i_submitdate"]?date('Y-m-d ',$row["i_submitdate"]):"";?></dd></dl>
		</div>
		<?php }?>
	</div>
	<?php if($j==4){ //广告图片为学历教育后台设置 ?>
	<div class="main_N_left_box02"><?/*<a href="<?//=$xl_gglink?>"><img src="/admin_root/<?=$xl_onegg?>" /></a>*/?></div>
	<?php }}?>
	<!--热点资讯Begin-->
	<div class="main_N_left_box01_00">
		<div class="main_N_left_box01_title">
			<dl><dt><span>热点资讯</span></dt><dd><a href="<?=Yii::app()->createUrl("news/newslist",array("order"=>"hot"))?>" title="热点资讯">更多>></a></dd></dl>
		</div>
		<div class="main_N_left_box01_l_list">                    
		<?php
			$models = Information::model()->getAllHasImg('',5,'i_click desc',true);
			foreach($models as $row){
		?>
			<dl><dt><span>·</span><a href="<?=Yii::app()->createUrl("news/newsview",array('id'=>$row['i_id']))?>"><?=$row["i_title"]?></a></dt><dd><?=$row["i_submitdate"]?date('Y-m-d ',$row["i_submitdate"]):"";?></dd></dl>
		<?php }?>
		</div>
	</div>
	<!--热点资讯End-->
</div> 
        </div>
		<div class="main_N_right">
			<div class="main_N_right_box01">
            	<div class="main_N_right_box01_title"><dl><dt>推荐新闻</dt><dd><a href="<?=Yii::app()->createUrl("news/newslist",array("type"=>"tj"))?>">更多>></a></dd></dl></div>
                <div class="main_N_right_box01_list">
					<div class="zx_qr_01_12" style="width:auto;">
						<?php
							$sql = Information::model()->getAllHasImg('',1,'i_submitdate desc',true);
							foreach($sql as $row){
						?>
						<div class="zx_qr_01_02">
							<div class="zx_qr_01_02_ru_new"><a title="<?=$row["i_title"]?>" href="<?=Yii::app()->createUrl("news/newsview",array('id'=>$row['i_id']))?>"><?=Common::strCut($row["i_title"],35)?></a></div>
							<div class="zx_qr_01_02_rd_new"><?=Common::strCutAndTags($row['i_con'],86)?></div>
						</div>
						<?php }?>
						<div class="zx_qr_01_03">
							<ul>
							<?php
								$sql = Information::model()->getAllHasImg('',5,'i_submitdate desc',true);
								foreach($sql as $row){
							?>
								<li><span>·</span><a title="<?php echo $row["i_title"]?>" href="<?=Yii::app()->createUrl("news/newsview",array('id'=>$row['i_id']))?>"><?=$row["i_title"]?></a></li>
							<?php }?>
							</ul>
						</div>
					</div>
				</div>
            </div>
			<div class="main_N_right_box01">
       	    	<?/* <a href="<?php //echo $xl_z_right1_link?>"><img src="/admin_root/<?php //echo $xl_z_right1?>" onload="if(this.width>220){this.width=220}"/></a> */?>
            </div>
			 <div class="main_N_right_box01">
            	<div class="main_N_right_box01_title"><dl><dt>最新新闻</dt><dd><a href="<?=Yii::app()->createUrl("news/newslist",array("order"=>"i_submitdate"))?>">更多>></a></dd></dl></div>
                <div class="main_N_right_box01_list">
					<div class="zx_qr_01_12" style="width:auto;">
						<?php
						$sql = Information::model()->getAllHasImg('',1,'i_submitdate desc');
						foreach($sql as $row){
						?>
						<div class="zx_qr_01_02">
							<div class="zx_qr_01_02_ru_new"><a title="<?php echo $row["i_title"]?>" href="<?=Yii::app()->createUrl("news/newsview",array('id'=>$row['i_id']))?>"><?=Common::strCut($row["i_title"],35)?></a></div>
							<div class="zx_qr_01_02_rd_new"><?=Common::strCutAndTags($row['i_con'],86)?></div>
						</div>
						<?php }?>
						<div class="zx_qr_01_03">
							<ul>
							<?php
								$sql = Information::model()->getAllHasImg('',5,'i_submitdate desc');
								foreach($sql as $row){
							?>
								<li><span>·</span><a title="<?php echo $row["i_title"]?>" href="<?=Yii::app()->createUrl("news/newsview",array('id'=>$row['i_id']))?>"><?=$row["i_title"]?></a></li>
							<?php }?>
							</ul>
						</div>
					</div>
				</div>
            </div>
			<div class="main_N_right_box01">
				<?/* <a href="<? //=$xl_z_right2_link?>"><img src="/admin_root/<? //=$xl_z_right2?>" onload="if(this.width>220){this.width=220}"/></a> */?>
       	    	
            </div>
			<!--热门新闻Begin-->
			<div class="main_N_right_box01">
            	<div class="main_N_right_box01_title"><dl><dt>热门新闻</dt><dd><a href="<?=Yii::app()->createUrl("news/newslist",array("order"=>"hot","type"=>"tj"))?>">更多>></a></dd></dl></div>
                <div class="main_N_right_box01_list">
					<div class="zx_qr_01_12" style="width:auto;">
						<?php
							$sql = Information::model()->getAllHasImg('',1,'i_click desc');
							foreach($sql as $row){
							 ?>
						<div class="zx_qr_01_02">
							<div class="zx_qr_01_02_ru_new"><a href="<?=Yii::app()->createUrl("news/newsview",array('id'=>$row['i_id']))?>"><?=$row["i_title"]?></a></div>
							<div class="zx_qr_01_02_rd_new"><?=Common::strCutAndTags($row['i_con'],86)?></div>
						</div>
						<?php }?>
						<div class="zx_qr_01_03">
							<ul>
							<?php
								$sql = Information::model()->getAllHasImg('',5,'i_click desc');
								 foreach($sql as $row){
								 ?>
								<li><span>·</span><a title="<?php echo $row["i_title"]?>" href="<?=Yii::app()->createUrl("news/newsview",array('id'=>$row['i_id']))?>"><?=$row["i_title"]?></a></li>
							<?php }?>
							</ul>
						</div> 
					</div>
              </div>
            </div>
			<!--热门新闻End-->
			<?/**/?>
		</div>
    </div>
</div>
<!-- main End -->