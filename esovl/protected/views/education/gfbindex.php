<div class="main_xl_pro">
    <?=$this->renderPartial("topindex",array("models"=>$gfbschoolGG));?>
    <div class="main_xl_pro_box02">
        <div class="main_xl_pro_box02_title">
            <dl>
				<dt><a href="<?=Yii::app()->createUrl("/education/gfbindex")?>">高复班</a></dt>
				<dd><a href="<?=Yii::app()->createUrl("/education/wlyxindex")?>">网络院校</a></dd>
				<dd><a href="<?=Yii::app()->createUrl("/education/index")?>">学历教育</a></dd>
				<dd><a href="<?=Yii::app()->createUrl("/education/zxksindex")?>">自学考试</a></dd>
				<dd><a href="<?=Yii::app()->createUrl("/education/gjbxindex")?>">国际办学</a></dd>
				<dd><a href="<?=Yii::app()->createUrl("/education/crgkindex")?>">成人高考</a></dd>
				<dd><a href="<?=Yii::app()->createUrl("/education/gxjzindex")?>">高校简章</a></dd>
				<dd><a href="<?=Yii::app()->createUrl("/education/jzsearch")?>">简章搜索</a></dd>
			</dl>                          
        </div>
		<?=$this->renderPartial("_jzsearch2");?>
	</div>
    <div class="main_xllb">
        <div class="gf_xx_kuang">
			<div class="gf_ff_left">
				<div class="gf_ff_tu">
				<?php	$xlsfmodels=XlSF::model()->getAllByType(6,3);
						foreach($xlsfmodels as $i=>$row){?>
							<div id=p<?php echo $i+1;?>>
								<a href="<?php echo $row["s_h_http"];?>" target=_blank>
									<img border=0 alt=<?php echo $row["s_h_title"];?> src="/admin_root/<?php echo $row["s_h_pic"];?>" width='315' height='186' />
									<span style=" margin-top:5px;margin-left:100px;display:block;">
										<?php echo $row["s_h_title"];?>
									</span>
								</a>
							</div>
				<?php 	}?>
				</div>
				<?php	$models=Ennews::model()->getAllNews(array("40"),6);
						foreach($models as $i=>$row){
							if($i>0)break;?>
							<div class="gf_ff_bt">
								<a href="/Education/gfb/gf_zx_neiye.php?id=<?php echo $row["nid"];?>" title="<?php echo $row["ntitle"];?>">
									<?php echo Common::strCut($row["ntitle"],38)?>
								</a>
							</div>
							<div class="gf_nr">
								<?=Common::strCutAndTags($row["ncon"],124)?>
								<span>
									<a href="/Education/gfb/gf_zx_neiye.php?id=<?php echo $row["nid"];?>" title="<?php echo $row["ntitle"];?>">
										[详细]
									</a>
								</span>
							</div>
				<?php 	}?>
				<div class="gf_ff_rz">
					<ul>
					<?php	foreach($models as $i=>$row){
								if($i<1)continue;?>
								<li><span>·<a href="/Education/gfb/gf_zx_neiye.php?id=<?php echo $row["nid"];?>" title="<?php echo $row["ntitle"];?>"><?php echo Common::strCut($row["ntitle"],70)?></a></span><?=date('Y-m-d',strtotime($row["ndate"]))?></li>
					<?php	}?>
					</ul>
				</div>
			</div>
			<div class="gf_ff_right">
				<div class="gf_ks">
					<div class="gf_ks_lm">
						<span>考试信息</span>
						<a href="/Education/gfb/gf_zx.php?cid=39">更多</a>...
					</div>
				</div>
				<div class="gf_ks_xian"></div>
				<div class="gf_ks_bt">
					<ul>
					<?php	$models=Ennews::model()->getAllNews(array("39"),7);
							foreach ($models as $row){?>
								<li>
									<a href="/Education/gfb/gf_zx_neiye.php?id=<?php echo $row["nid"];?>" title="<?php echo $row["ntitle"];?>">
										<?php echo Common::strCut($row["ntitle"],30)?>
									</a>
								</li>
					<?php	}?>
					</ul>
				</div>
			</div>
        </div>
        <div class="gf_xx_kuang_001_02">
			<div class="zx_qr_02_001_0003">
				<div class="zx_qr_02_left">
					<div class="zx_qr_01_01">
						<div class="zx_qr_01_01_01">
							<img src="/images/zx_bg3.jpg" />
						</div>
						<div id="zx_qr_01_01_02" style="width:607px;">
							<dl>
								<dt class="zx_qr_01_01_02_01">三校生高复</dt>
								<dt class="zx_qr_01_01_02_02">普通高复</dt>
								<dt class="zx_qr_01_01_02_03">成人高复</dt>
							</dl>
						</div>
					</div>
					<?php 	$listArr=array("三","普","成");
							foreach($listArr as $key=>$value){?>
								<div class="zx_qr_01_1<?=$key+2?>" style="width:617px;">
									<div class="zx_qr_02_left_list">
										<div class="zx_qr_02_left_list_01_003">
											<dl>
												<dt>班级名称</dt>
												<dd>开课日期</dd>
												<dd style="width:95px;">上课地点</dd>
												<dd>原价</dd>
												<dd>网上优惠</dd>
											</dl>
										</div>               
										<?php	$kkinfomodels=Kkinfo::model()->getOtherByZyclass($value,6);
												foreach ($kkinfomodels as $k=>$row1){?>
													<div class="zx_qr_02_left_list_02_004" id="Marquee">
														<dl>
															<dt>
																<span>
																	[<a href="/Education/gfb/gfb_index.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>">
																		<?=$row1["zyname"]?>
																	</a>]
																	<a href="/Education/gfb/gf_bm_lb_xiangxi.php?gid=<?=$row1["kid"]?>" title="<?=$row1["ktitle"]?>">
																		<?=$row1["ktitle"]?>
																	</a>
																</span>
															</dt>
															<dd><?=$row1["kdate"]?></dd>
															<dd style="width:95px;"><?=$row1["k_adderss"]?></dd>
															<dd style="text-decoration:line-through;">￥<?=$row1["xfei"]?></dd>
															<dd><span>￥<?=$row1["yhui"]?></span></dd>
															<dd>
																<span>
																	<a href="/Education/gfb/gf_zx_wsbm.php?gid=<?=$row1["kid"]?>">
																		报名
																	</a>
																</span>
															</dd>
														</dl>
													</div>
													<?=($k+1)&3==0?"<div class='zx_qr_01_04'></div>":""?>
										<?php 	}?>
									</div>
								</div>
					<?php 	}?>
				</div>
			</div>
			<div class="zx_qr_02_001_002" style="margin-top:12px;">
				<div class="gf_tj_kc">
					<div class="gf_tj_kc_001">高复推荐学校</div>
				</div>
				<div class="gf_tj_xian"></div>
				<?php $kkinfomodels=Kkinfo::model()->getOtherByZyclass("高复",4);
						foreach($kkinfomodels as $k=>$row1){
							if($k>0)break;?>
							<div class="gf_sxs_bt">
								<a href="/Education/gfb/gfb_index.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>">
									<?=$row1->schoolinfo->s_name?>
								</a>
							</div>
							<div class="gf_sxs_nr">
								<?=Common::strCutAndTags($row1["zycon"],230)?>
							</div>
				<?php	}?>
				<div class="gf_sxs_lm">
					<ul>
					<?php 	foreach($kkinfomodels as $k=>$row1){
							if($k<1)continue;?>
							<li>
								>><a href="/Education/gfb/gfb_index.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>">
								<?=$row1->schoolinfo->s_name?>
								</a> 
								[<?=$row1["zyclass"]?>]
							</li>
					<?php }?>
					</ul>
				</div>
			</div>
        </div>
        <div class="gf_tj_kuang">
			<div class="gf_tj_tu">
				<ul>
					<li>
						<a href="<?=$web->z_bottom1_link?>">
							<img src="/admin_root/<?=$web->z_bottom1?>" width="210" height="149" />
						</a>
					</li>
					<li>
						<a href="<?=$web->z_bottom2_link?>">
							<img src="/admin_root/<?=$web->z_bottom2?>" width="210" height="149" />
						</a>
					</li>
					<li>
						<a href="<?=$web->z_bottom3_link?>">
							<img src="/admin_root/<?=$web->z_bottom3?>" width="210" height="149" />
						</a>
					</li>
					<li>
						<a href="<?=$web->z_bottom4_link?>">
							<img src="/admin_root/<?=$web->z_bottom4?>" width="210" height="149" />
						</a>
					</li>
				</ul>
			</div>
        </div>
    </div>
</div>