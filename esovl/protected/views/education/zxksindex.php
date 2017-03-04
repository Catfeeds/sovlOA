<div class="main_xl_pro">
	<?=$this->renderPartial("topindex",array("models"=>$zxschoolGG));?>
    <div class="main_xl_pro_box02">
        <div class="main_xl_pro_box02_title">
            <dl>
				<dt><a>自学考试</a></dt>
				<dd><a href="<?=Yii::app()->createUrl("/education/index")?>">学历教育</a></dd>
				<dd><a href="<?=Yii::app()->createUrl("/education/wlyxindex")?>">网络院校</a></dd>
				<dd><a href="<?=Yii::app()->createUrl("/education/crgkindex")?>">成人高考</a></dd>
				<dd><a href="<?=Yii::app()->createUrl("/education/gjbxindex")?>">国际办学</a></dd>
				<dd><a href="<?=Yii::app()->createUrl("/education/gxjzindex")?>">高校简章</a></dd>
				<dd><a href="<?=Yii::app()->createUrl("/education/jzsearch")?>">简章搜索</a></dd>
				<dd><a href="<?=Yii::app()->createUrl("/education/gfbindex")?>">高复班</a></dd>
            </dl>
        </div>
        <div class="main_xl_pro_box02_mu1">
			<img src="/images/zx_01.jpg" />
		</div>
        <div class="main_xl_pro_box02_mu2">
			<div>
				<ul>
				<?php 	$TagModels=Icolumn::model()->getAllTagsByid(7,true);		
						$Tags=array();
						foreach($TagModels as $key=>$val){
							$Tags[$val["ic_ishome"]][$val->ic_id]=$val->ic_class;
						}	
						$i=1;
						$j=4;
						foreach($Tags as $val){
							if($j>7)break;?>
							<li class="zx_tagli_<?=$i?>">
								<img src="/images/zx_0<?=$j?>.jpg" />
							</li>
							<li class="zx_tagli_<?=$i+1?>">
								<div class="zx_li_2_dv1">
									<dl>
									<?php 	$l=0;
											$m=$j<=5?"6":$j==6?"4":"2";
											foreach($val as $k=>$v){
												if($l>$m)break;?>
												<dt><a target="_blank" href="<?=Yii::app()->createUrl("education/newslist",array('id'=>$k))?>"><?=$v?></a></dt>
									<?php 	$l++;
											}?>
									</dl>
								</div>
							</li>
							<li class="zx_li_6"></li>
					<?php 	$i+=2;
							$j++;
							}?>
					<li class="zx_li_10">自考不限户口、职业、年龄、学历、一律免考入学，多种形式上课，专业任选</li>
				</ul>
			</div>
        </div>
        <div class="main_xl_pro_box02_mu3"><img src="/images/zx_03.jpg" /></div>
    </div>
</div>
<div class="zx_zy_01">
    <div class="zx_zy_01_01">
	<?php	$model=XlSF::model()->getAllByType(2,3);
			foreach($model as $i=>$row){?>
				<div id=p<?php echo $i+1;?>><a href="<?php echo $row["s_h_http"];?>" target=_blank><img border=0 alt=<?php echo $row["s_h_title"];?> src="/admin_root/<?php echo $row["s_h_pic"];?>" width=315 height=186 /><span style=" margin-top:5px;margin-left:100px;display:block;"><?php echo $row["s_h_title"];?></span></a></div>
    <?php 	}	?>
    </div>
    <div class="zx_zy_01_02">
		<div class="zx_zy_01_02_01">
			<dl>
			<?php	$Newsmodels=Information::model()->getAllByLable(array("41"),1,7);
					foreach($Newsmodels as $row){?>
						<dt><a href="<?=Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))?>" title="<?=$row["i_title"]?>"><?=Common::strCut($row["i_title"],46)?></a></dt>
						<dd><a href="<?=Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))?>" title="<?=Common::strTags($row["i_con"])?>"><?=Common::strCutAndTags($row["i_con"],128)?></a></dd>
			<?php   }?>
			</dl>
		</div>
		<div class="zx_zy_01_02_02"></div>
		<div class="zx_zy_01_02_03">
			<dl>
			<?php	$models=Information::model()->getAllByLable(array("39"),4,7);
					foreach($models as $row){?>
						<dt><img src="/images/zx_bot1.jpg" /></dt>
						<dd><a href="<?=Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))?>" title="<?=$row["i_title"]?>"><?=Common::strCut($row["i_title"],39)?></a></dd>
			<?php	}?>
			</dl>
			<dl>
			<?php	$models=Information::model()->getAllByLable(array("30"),4,7);
					foreach($models as $row){?>
						  <dt><img src="/images/zx_bot1.jpg" /></dt>
						  <dd><a href="<?=Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))?>" title="<?=$row["i_title"]?>"><?=Common::strCut($row["i_title"],39)?></a></dd>
			<?php 	}?>
			</dl>
		</div>
    </div>
    <div class="zx_zy_01_03">
		<ul>
			<a href="<?php echo $web->z_right1_link;?>">
				<img src="/admin_root/<?php echo $web->z_right1;?>" />
			</a>
		</ul>
		<div class="zx_zy_01_03_blank"></div>
		<ul>
			<a href="<?php echo $web->z_right2_link;?>">
				<img src="/admin_root/<?php echo $web->z_right2;?>" />
			</a>
		</ul>
    </div>
</div>
<div class="zx_qr">
    <div class="zx_qr_01">
        <div class="zx_qr_01_01">
            <div class="zx_qr_01_01_01">
				<img src="/images/zx_bg3.jpg" />
			</div>
            <div id="zx_qr_01_01_021">
				<dl>
					<dt class="zx_qr_01_01_02_01">全日制</dt>
					<dt class="zx_qr_01_01_02_02">业余制</dt>
					<dt class="zx_qr_01_01_02_03">专科</dt>
					<dt class="zx_qr_01_01_02_04">本科</dt>
				</dl>
            </div>
        </div>
		<?php 
		$arr=array("全","业余","高起专","本");
		foreach($arr as $kk=>$vv){
		?>
        <div class="zx_qr_01_1<?=$kk+2?>">
			<div class="zx_qr_01_02">
            <?php	$functionName=in_array($vv,array("全","业余"))?"getAllByKcal":"getAllByZyclass";
					$kkqrmodels=Kkinfo::model()->$functionName($vv);
					foreach($kkqrmodels as $key=>$value){
						if($key>0)break;	?>
						<div class="zx_qr_01_02_l">
							<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td align="center" valign="middle">
										<a href="<?=Yii::app()->createUrl("education/school",array("id"=>$value["s_id"]))?>">
											<?=Common::getImage($value["k_pic"])?>
										</a>
									</td>
								</tr>
							</table>
						</div>
						<div class="zx_qr_01_02_ru">
							<a href="<?=Yii::app()->createUrl("education/school",array("id"=>$value["s_id"]))?>">
								<?=$value->schoolinfo->s_name?>
							</a>-
							<a href="<?=Yii::app()->createUrl("education/school",array("id"=>$value["s_id"],"type"=>"zyjs","kid"=>$value["kid"]))?>">
								<?=$value["ktitle"]?>
							</a>
						</div>
						<div class="zx_qr_01_02_rd">
							<a href="<?=Yii::app()->createUrl("education/school",array("id"=>$value["s_id"]))?>">
								<?=Common::strCut($value["zycon"],92)?>
							</a>
						</div>
            <?php 	}?>
            </div>
            <div class="zx_qr_01_03">
              	<ul>
                <?php 
						foreach($kkqrmodels as $key=>$value){
							if($key<1)continue;?>
							<li>
								<span>>></span>
								<a href="<?=Yii::app()->createUrl("education/school",array("id"=>$value["s_id"],"type"=>"zyjs","kid"=>$value["kid"]))?>">
									<?=$value["ktitle"]?>:<?=$value["zyname"]?>
								</a>
							</li>
				<?php 		if(($key+1)%3==0)echo"<div class='zx_qr_01_04'></div>";
					}?>
                </ul>
            </div>
        </div>
		<?php }?>
		<?php /*
        <div class="zx_qr_01_13"><!--业余制-->
            <div class="zx_qr_01_02">
           <?php	$kkyymodels=Kkinfo::model()->getAllByKcal('业余');
					foreach($kkyymodels as $key=>$value){
						if($key>0)break;?>
						<div class="zx_qr_01_02_l">
							<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td align="center" valign="middle">
									<a href="/Education/xl_pro_detail.php?kid=<?=$value["kid"]?>&sid=<?=$value["s_id"]?>">
										<?=Common::getImage($value["k_pic"])?>
									</a>
								</td>
								</tr>
							</table>
						</div>
						<div class="zx_qr_01_02_ru">
							<a href="/Education/xl_pro_detail.php?kid=<?=$value["kid"]?>&sid=<?=$value["s_id"]?>">
								<?=$value->schoolinfo->s_name?>
							</a>-
							<a href="/Education/xl_pro_zyjs.php?kid=<?=$value["kid"]?>&sid=<?=$value["s_id"]?>">
								<?=$value["ktitle"]?>
							</a>
						</div>
						<div class="zx_qr_01_02_rd">
							<a href="/Education/xl_pro_detail.php?kid=<?=$value["kid"]?>&sid=<?=$value["s_id"]?>">
								<?=Common::strCut($value["zycon"],92)?>
							</a>
						</div>
            <?php 	}?>
            </div>
            <div class="zx_qr_01_03">
              	<ul>
                <?php	foreach($kkyymodels as $key=>$value){
							if($key<1)continue;?>
							<li>
								<span>>></span>
								<a href="/Education/xl_pro_zyjs.php?kid=<?=$value["kid"]?>&sid=<?=$value["s_id"]?>">
									<?=$value["ktitle"]?>:<?=$value["zyname"]?>
								</a>
							</li>
                <?php 		if(($key+1)%3==0)echo"<div class='zx_qr_01_04'></div>";
						}?>
                </ul>
            </div>                  
        </div>
        <div class="zx_qr_01_14"><!--专科-->
			<div class="zx_qr_01_02">
			<?php 	$kkzkmodels=Kkinfo::model()->getAllByZyclass('高起专');
					foreach($kkzkmodels as $key=>$value){
						if($key>0)break;?>
						<div class="zx_qr_01_02_l">
							<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td align="center" valign="middle">
									<a href="/Education/xl_pro_detail.php?kid=<?=$value["kid"]?>&sid=<?=$value["s_id"]?>">
										<?=Common::getImage($value["k_pic"])?>
									</a>
								</td>
								</tr>
							</table>
						</div>
						<div class="zx_qr_01_02_ru">
							<a href="/Education/xl_pro_detail.php?kid=<?=$value["kid"]?>&sid=<?=$value["s_id"]?>">
								<?=$value->schoolinfo->s_name?>
							</a>-
							<a href="/Education/xl_pro_zyjs.php?kid=<?=$value["kid"]?>&sid=<?=$value["s_id"]?>">
								<?=$value["ktitle"]?>
							</a>
						</div>
						<div class="zx_qr_01_02_rd">
							<a href="/Education/xl_pro_detail.php?kid=<?=$value["kid"]?>&sid=<?=$value["s_id"]?>">
								<?=Common::strCut($value["zycon"],92)?>
							</a>
						</div>
			<?php 	}?>
			</div>
			<div class="zx_qr_01_03">
				<ul>
				<?php	foreach($kkzkmodels as $key=>$value){
							if($key<1)continue;?>
							<li>
								<span>>></span>
								<a href="/Education/xl_pro_zyjs.php?kid=<?=$value["kid"]?>&sid=<?=$value["s_id"]?>">
									<?=$value["ktitle"]?>:<?=$value["zyname"]?>
								</a>
							</li>
				<?php 		if(($key+1)%3==0)echo"<div class='zx_qr_01_04'></div>";
						}?>
				</ul>
			</div>                  
        </div>
        <div class="zx_qr_01_15"><!--本科-->
            <div class="zx_qr_01_02">
            <?php 	$kkbkmodels=Kkinfo::model()->getAllByZyclass('本');
					foreach($kkbkmodels as $key=>$value){
						if($key>0)break;?>
						<div class="zx_qr_01_02_l">
							<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td align="center" valign="middle">
										<a href="/Education/xl_pro_detail.php?kid=<?=$value["kid"]?>&sid=<?=$value["s_id"]?>">
											<?=Common::getImage($value["k_pic"])?>
										</a>
									</td>
								</tr>
							</table>
						</div>
						<div class="zx_qr_01_02_ru">
							<a href="/Education/xl_pro_detail.php?kid=<?=$value["kid"]?>&sid=<?=$value["s_id"]?>">
								<?=$value->schoolinfo->s_name?>
							</a>-
							<a href="/Education/xl_pro_zyjs.php?kid=<?=$value["kid"]?>&sid=<?=$value["s_id"]?>">
								<?=$value["ktitle"]?>
							</a>
						</div>
						<div class="zx_qr_01_02_rd">
							<a href="/Education/xl_pro_detail.php?kid=<?=$value["kid"]?>&sid=<?=$value["s_id"]?>">
								<?=Common::strCut($value["zycon"],92)?>
							</a>
						</div>
            <?php 	}?>
            </div>
            <div class="zx_qr_01_03">
              	<ul>
                <?php	foreach($kkzkmodels as $key=>$value){
							if($key<1)continue;?>
							<li>
								<span>>></span>
								<a href="/Education/xl_pro_zyjs.php?kid=<?=$value["kid"]?>&sid=<?=$value["s_id"]?>">
									<?=$value["ktitle"]?>:<?=$value["zyname"]?>
								</a>
							</li>
				<?php 		if(($key+1)%3==0)echo"<div class='zx_qr_01_04'></div>";
						}?>
                </ul>
            </div>
        </div>
		*/?>
    </div>
    <div class="zx_qr_02">
        <div class="zx_qr_02_left">
            <div class="zx_qr_02_left_title">
                <dl>
                    <dt>最新录取</dt>
                    <dd></dd>
                </dl>
            </div>
            <div class="zx_qr_02_left_list">
                <div class="zx_qr_02_left_list_01">
                    <dl>
						<dt>学校名称</dt>
						<dd>专业名称</dd>
						<dd>学员姓名</dd>
						<dd>录取时间</dd>
                    </dl>
                </div>
                <div class="zx_qr_02_left_list_02" id="Marquee">
                <?php 	$lqmodels=Luqu::model()->getAllByClass(2,7);
						foreach($lqmodels as $value){?>
							<dl>
								<dt>
									<span>
										<a target="_blank" href="<?=Yii::app()->createUrl("education/school",array("id"=>$value["s_id"]))?>">
											<?php  echo $value->schoolinfo->s_name?>
										</a>
									</span>
								</dt>
								<dd><a target="_blank" href="<?=Yii::app()->createUrl("education/school",array("id"=>$value["s_id"],"type"=>"zyjs","kid"=>$value->kkinfoinfo->kid))?>"><?php echo $value["lq_zy"];?></a></dd>
								<dd><?php echo $value["lq_name"];?></dd>
								<dd><?php echo $value["lq_date"];?></dd>
							</dl>
                <?php 	}?>
						<script src="/js/xlgund.js"></script>
                </div>
			</div>
        </div>
    </div>
    <div class="zx-zk-kuang">
        <div class="zx-zk-bj">
            <div class="zx-zk-xts">
				<span>自考小贴士</span>
				<a target="_blank" href="<?=Yii::app()->createUrl("education/newslist",array('id'=>40))?>">更多</a>
			</div>
		</div>
        <div class="zx-zk-xian"></div>
        <div class="zx-zk-bt">
            <ul>
			<?php
					$rdnews=Information::model()->getAllByLable(array("41"),8,7);
					
					foreach ($rdnews as $row){?>
						<li>
							<a target="_blank" title="<?=Common::strTags(trim($row["i_title"]))?>" href="<?=Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))?>"><?=Common::strCut(trim($row["i_title"]),30)?></a>&nbsp;
						</li>
			<?php	}?>
            </ul>
        </div>
    </div>
    <div class="zx_qr_03">
		<a href="<?php echo $web->z_right3_link;?>">
			<img src="/admin_root/<?php echo $web->z_right3;?>" />
		</a>
	</div>
 </div>
           