<?php
	$pdao = "外语频道";
	$criteria=new CDbCriteria;
	$criteria->addCondition("pin_title ='".$pdao."'");
	$rowb = Pindao::model()->find($criteria);
	$pinpic1=$rowb["pin_pic1"];
	$pinpic2=$rowb["pin_pic2"];
	$pinpic3=$rowb["pin_pic3"];
	$pinpic4=$rowb["pin_pic4"];
?>
    <div class="px_pd">
		<div class="px_pd_box01">
			<div class="px_pd_box01_title" id="px_t01"><?=$pdao?></div>
            <div class="px_pd_box01_nav" id="px_n01">
                <?php
				//根据频道号查出BID号再查小类别
				// $model = Pxbclass::model()->getAllByPdao('外语频道');
				// foreach($model as $value){
					// $pid = $value['pb_id'];
					// $res = Pxsclass::model()->getByPbidclass($pid);
					// foreach($res as $row){
					$models = Icolumn::model()->getAllByPid(12);
					foreach($models as $v){
						$res = Icolumn::model()->getAllTagsByid($v);
						foreach($res as $row){
				?>
					<a href="<?=Yii::app()->createUrl("/training/pxkclist",array("id"=>$row['ic_id']))?>"><?=$row["ic_class"]?></a><span>|</span>
		   <?php	}}?>
			</div>
		</div>
		<div class="px_pd_box03">
			<div class="px_pd_box03_left">
				<img src="/admin_root/<?=$pinpic1?>" width="250" height="175" />
			</div>
			<div class="px_pd_box03_center" id="px_pd_box03_center_01">
				<div class="px_pd_box03_center_box01">
					<?php
						$models = Information::model()->getAllByid(68,'1','i_submitdate desc');
						if($models != ''){
						foreach($models as $row){					
					?>
							<dl>
								<dt id="new01"><a href="<?=Yii::app()->createUrl("/training/newsview",array("id"=>$row['i_id']))?>" title="<?=$row["i_title"]?>"><?=$row["i_title"]?></a></dt>
								<dd><?=Common::strCutAndTags($row["i_con"],220)?>
									<a href="<?=Yii::app()->createUrl("/training/newsview",array("id"=>$row['i_id']))?>" title="<?=$row["i_title"]?>">[详情]</a>
								</dd>
							</dl>
				<?php	}}?>
				</div>
				<div class="px_pd_box03_center_box02">
					<ul>
						<?php
						$models = Icolumn::model()->getAllByPid(12);
						foreach($models as $v){
						$res = Information::model()->getAllByid($v,'8','i_submitdate desc');
						foreach($res as $row){?>
						<li><a href="<?=Yii::app()->createUrl("/training/newsview",array("id"=>$row['i_id']))?>" title="<?=$row["i_title"]?>"><?=Common::strCutAndTags($row["i_title"],38)?></a></li>
						<?php }}?>
					</ul>
				</div>
			</div>
			<div class="px_pd_box03_right" id="px_pd_box03_right_01">
				<div class="px_pd_box03_right_title" id="px_pd_box03_right_01_title"><?=$pdao?>资料下载</div>
				<div class="px_pd_box03_right_list">
					<ul>
					<?php
						$res = XlAsk::model()->getAllBypdao($pdao,'8');
						foreach($res as $row){
					?>
					<li><a href="/admin_root/<?php echo $row["w_con"];?>"><?php echo $row["w_title"];?></a><span><a href="/admin_root/<?php echo $row["w_con"];?>"><img src="/images/xz.jpg" /></a></span></li>
					<?php }?>                 
					</ul>
				</div>
			</div>
		</div>
    </div>
    <div class="mian_px_index_banner"><img src="/admin_root/<?=$pinpic2?>" width="950" height="90" /></div>
    <div style="clear:both; height:14px;"></div>
    <div class="mian_px_index_news">
		<div class="mian_px_index_news_left">
        	<?php
				//根据频道号查出BID号再查小类别
				//$pindao = Pxbclass::model()->getAllByPdao($pdao);
				//foreach($pindao as $pid){
				$models = Icolumn::model()->getAllByPid(12);
				foreach($models as $v){
					$res = Icolumn::model()->getAllTagsByid($v);
					//$pbid=$pid['pb_id'];
					//$res = Pxsclass::model()->getByPbidclass($pbid);
					if(count($res)>=1){
						$kk=0;
						foreach($res as $row1){
							$kk++;
							
            ?>                
            <div class="mian_px_index_ky_bk">
				<div class="mian_px_index_ky_bj">
					<div class="mian_px_index_ky_bt"><span><?=$row1["ic_class"]?></span><a href="<?=Yii::app()->createUrl("/training/pxkclist",array("id"=>$row1['ic_id']))?>">更多...</a></div>
				</div>
				<div class="mian_px_index_ky_tu"><img src="/admin_root/<?=$row1["ic_icon"]?>" width="120" height="88" /></div>
				
				<div class="mian_px_index_ky_news_bt">
					<ul>          
						<?php
							$label = $row1['ic_id'];
							$criteria=new CDbCriteria;
							$criteria->addCondition("i_label ={$label}");
							$limit->limit='4';
							$model = Information::model()->findAll($criteria);
							foreach($model as $row){
						?>
								<li style="line-height:25px;"><a href="<?=Yii::app()->createUrl("/training/newsview",array("id"=>$row['i_id']))?>" title="<?=$row["i_title"]?>"><?=Common::strCutAndTags($row["i_title"],30)?></a></li>
					<?php	}?>                       
					</ul>
				</div>
				<div class="mian_px_index_ky_kc">
					<ul><li style="width:125px;">培训学校</li><li style="width:112px;">班级名称</li><li style="width:57px;">优惠价</li></ul>
					<dl>
						<?php
							$criteria=new CDbCriteria;
							$psModel = Pxschool::model()->findAll($criteria);
							foreach($psModel as $sql){
								$psid = $sql['pxs_id'];
								$row1_id = $row1['ic_id'];
								$res2 = Pxkkinfo::model()->getAllByid($psid,'pxk_id desc',$row1_id);
								foreach($res2 as $row){
						?>
								<dd style="width:120px;float:left;">[<a href="px_school/?pid=<?=$row["pxk_sid"]?>"><?php if($row["pxk_sid"]==$psid){echo Common::strCut($sql['pxs_name'],18);}?></a>]</dd>
								<dt style=" float:left;width:110px;" title="<?=$row["pxk_title"]?>">
									<a href="<?=Yii::app()->createUrl("/training/pxkcview",array("id"=>$row['pxk_id']))?>"><?=Common::strCut($row['pxk_title'],16)?></a>
								</dt>
								<dt style=" float:left;width:57px; color:#f00;"><?=$row["pxk_yhui"]?></dt>
					<?php 	}}?>
					</dl>
				</div>
				
            </div>
			<?php	if($kk%2!=0){?>
						<div style="width:14px; height:287px; float:left;"></div>
            <?php	}?>
			<?php }}}?>
    	</div>
        <div class="mian_px_index_right">
			<div class="mian_px_index_wyxw_bk">
				<div class="mian_px_index_wyxw_bj">
					<div class="mian_px_index_ywxw_bt"><span><?=$pdao?>新闻动态</span></div>
				</div>
				<div class="mian_px_ywxw_news_lb">
					<ul>
						<?php
							$models = Icolumn::model()->getAllByPid(12);
							foreach($models as $val){
								$res = Information::model()->getAllByid($val,'3','i_submitdate desc');
								foreach($res as $row){?>
							<li style="line-height:25px;"><a href="<?=Yii::app()->createUrl("/training/newsview",array("id"=>$row['i_id']))?>" title="<?=$row["i_title"]?>"><?=Common::strCutAndTags($row["i_title"],38)?></a><span><?=$row["i_submitdate"]?date('Y-m-d ',$row["i_submitdate"]):"";?></span></li>
						<?php }}?>  
					</ul>
				</div>
            </div>
            <div class="mian_px_index_right_xgg"><img src="/admin_root/<?=$pinpic3?>" width="277" height="181" /></div>
            <div style="clear:both; height:14px;"></div>
            <div class="mian_px_index_wyxw_bk" style="height:auto;">
				<div class="mian_px_index_wyxw_bj">
					<div class="mian_px_index_ywxw_bt"><span>在线问答</span><a href="<?=Yii::app()->createUrl("/training/zxwdlist")?>">更多...</a></div>
				</div>
				<div class="mian_px_ywxw_news_lb" style="height:auto;">
					<dl>
						<?php
							$res = Pxwd::model()->getAllbool(true,'4','px_time desc');
							foreach($res as $row){
						?>
								<dt>【问】<?=$row["px_ask"]?></dt>
								<dd>【答】：<?=$row["px_answer"]?></dd>
					 <?php	}?>   
					</dl>
                </div>
            </div>
            <div class="mian_px_index_right_xgg"><img src="/admin_root/<?=$pinpic4?>" width="277" height="181" /></div>			
        </div>
    </div>
    <div style="clear:both; height:14px;"></div>
<?/*</div>*/?>
<!-- main End -->