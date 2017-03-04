<?php
 // Yii::app()->clientScript->registerScriptFile('/js/goldhome.js',CClientScript::POS_END ); 

// Yii::app()->clientScript->registerMetaTag("佳丽，上海佳丽，上海美女，上海约会，上海娱乐，上海会所",'keywords');
// Yii::app()->clientScript->registerMetaTag("上海佳丽网，这里有最新最全的娱乐休闲信息，约会美女，美女排名，佳丽排行榜，上海会所",'description');
// $this->pageTitle = "佳丽三千，金屋藏娇 - 佳丽网";
// echo 213;
?>


<div class="main_xl_pro">
	<?=$this->renderPartial("topindex",array("models"=>$xlschoolGG));?>
    <div class="main_xl_pro_box02">
        <div class="main_xl_pro_box02_title">
			<dl>
				<dt><a href="<?=Yii::app()->createUrl("/education/index")?>">学历教育</a></dt>
				<dd><a href="<?=Yii::app()->createUrl("/education/zxksindex")?>">自学考试</a></dd>
				<dd><a href="<?=Yii::app()->createUrl("/education/wlyxindex")?>">网络院校</a></dd>
				<dd><a href="<?=Yii::app()->createUrl("/education/crgkindex")?>">成人高考</a></dd>
				<dd><a href="<?=Yii::app()->createUrl("/education/gjbxindex")?>">国际办学</a></dd>
				<dd><a href="<?=Yii::app()->createUrl("/education/gxjzindex")?>">高校简章</a></dd>
				<dd><a href="<?=Yii::app()->createUrl("/education/jzsearch")?>">简章搜索</a></dd>
				<dd><a href="<?=Yii::app()->createUrl("/education/gfbindex")?>">高复班</a></dd>
			</dl>
        </div>
        <?=$this->renderPartial("_jzsearch2");?>
    </div>
    <div class="main_xllb">
        <div class="main_xllb_box01">
			<div class="main_xllb_box01_left00">
				<div class="main_xllb_box01_left">
					<div class="main_xllb_box01_left_list01">
					<?php 
							$criteria=new CDbCriteria;
							$criteria->limit='3';
							$rs=XlSF::model()->findAll($criteria);
							foreach($rs as $i=>$row){?>
								<div style="display: none" id='p<?php echo $i;?>'>
									<a href="<?php echo $row["s_h_http"];?>" target='_blank' >
										<img border='0' alt=<?php echo $row["s_h_title"];?> src="/admin_root/<?php echo $row["s_h_pic"];?>" width='315' height='186' />
										<span style=" margin-top:5px;margin-left:100px;display:block;"><?php echo $row["s_h_title"];?></span>
									</a>
								</div>
					<?php 	}	?>
					</div>
					<div class="main_xllb_box01_left_list02">
						<div class="main_xllb_box01_left_list02_box1">
							<div class="main_xllb_box01_left_list02_box1_title">
								<div class="main_xllb_box01_left_list02_box1_title_zi">
									<dl>
										<dt><img src="/images/xl_title_left.png" /></dt>
										<dd>名校推荐</dd>
										<dt><img src="/images/xl_title_right.png" /></dt>
									</dl>
								</div>
							</div>
							<div class="main_xllb_box01_left_list02_box1_text">
								<ul>
								<?php	$rs=MbStep::model()->getTjSchool("12");
										foreach($rs as $row){?>
											<li>·<a target="_blank" href="/school/?sid=<?php echo $row["mb_id"]?>" target="_blank"><?php echo $row["s_name"]?></a></li>
								<?php 	}	?>
								</ul>
							</div>
						</div>
						<div class="main_xllb_box01_left_list02_box2">
							<div class="main_xllb_box01_left_list02_box1_title">
								<div class="main_xllb_box01_left_list02_box1_title_zi">
									<dl>
										<dt><img src="/images/xl_title_left.png" /></dt>
										<dd>最新录取</dd>
										<dt><img src="/images/xl_title_right.png" /></dt>
									</dl>
								</div>
							</div>
							<div class="main_xllb_box01_left_list02_box2_text">
								<div class="main_xllb_box01_left_list02_box2_text01">
									<dl>
										<dt>学校名称</dt>
										<dt>学员姓名</dt>
										<dd>录取时间</dd>
									</dl>
								</div>
								<div class="main_xllb_box01_left_list02_box2_text02" id="Marquee" style="height:299px;">
								<?php	$criteria=new CDbCriteria;
										$criteria->limit='20';
										$criteria->order='lq_date desc';
										$model=Luqu::model()->findAll($criteria);
										foreach($model as $row){
											$row1=School::model()->find("s_id='{$row["s_id"]}'");?>
											<dl>
												<dt><a target="_blank"  href="<?=Yii::app()->createUrl("education/school",array("id"=>$row1["s_id"]))?>"><?php echo $row1["s_name"];?></a></dt>
												<dt><?php echo $row["lq_name"];?></dt>
												<dd><?php echo $row["lq_date"];?></dd>
											</dl>
								  <?php }?>
								</div>
								<script src="/js/xlgund.js"></script>
							</div>
						</div>
					</div>
				</div>
				<div class="main_xllb_box01_center">
					<div class="main_xllb_box01_center_list01">
						<div class="main_xllb_box01_center_list01_box1">
						<?php	$models=Information::model()->getAllByPid(1,1,"i_updatetime desc",true);
								foreach($models as $row){?>
									<dl>
										<dt>
											<a target='_blank'  href="<?=Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))?>">
												<?php echo $row["i_title"];?>
											</a>
										</dt>
										<dd>
											<?php echo Common::strCutAndTags($row["i_con"],180);?>
											<a target='_blank' href="<?=Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))?>">
												[详细]
											</a>
										</dd>
									</dl>
						<?php	}?>
						</div>
						<div class="main_xllb_box01_center_list01_box2">
							<a target="_blank"  href="<?php echo $web['z_gglink'];?>" target="_blank">
								<img src="/admin_root/<?php echo $web['z_onegg'];?>" />
							</a>
						</div>
					</div>
					<div class="main_xllb_box01_center_list02">
						<div class="main_xllb_box01_center_list02_box1">
							<div class="main_xllb_box01_center_list02_box1_title">
								<ul>
									<li id="xl_tb_1" class="xl_hovertab" onmouseover="xlHoverLi(1);">自学考试</li>
									<li id="xl_tb_2" class="xl_normaltab" onmouseover="xlHoverLi(2);">网络学院</li>
									<li id="xl_tb_3" class="xl_normaltab" onmouseover="xlHoverLi(3);">成人高考</li>
									<li id="xl_tb_4" class="xl_normaltab" onmouseover="xlHoverLi(4);">高复班</li>
								</ul>
							</div>
						</div>
						<div class="main_xllb_box01_center_list02_box2">
							<div class="main_xllb_box01_center_list02_box2_list">
								<div class="xl_dis" id="xl_tbc_01">
									<div class="main_xl_hd_box01">
									<?php 	$criteria=new CDbCriteria;
											$criteria->addCondition("bk_id=1");
											$criteria->order='kkdate desc';
											$model=Kkinfo::model()->findAll($criteria);
											foreach ($model as $i=>$row1 ){
												if($i>0)break;
												$row2=School::model()->find("s_id='{$row1["s_id"]}'");?>
												<div class="main_xl_hd_box01_pic" onmouseover="this.style.border='1px solid #fd5717'" onmouseout="this.style.border='1px solid #cccacd'" >
													<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
														<tr>
															<td align="center" valign="middle"><a target="_blank" href="<?=Yii::app()->createUrl("education/school",array("id"=>$row1["s_id"]))?>"><img src="/admin_root/<?=$row1["k_pic"]?>" /></a></td>
														</tr>
													</table>
												</div>
												<div class="main_xl_hd_box01_list">
													<div class="main_xl_hd_box01_list_box1">
														<dl>
															<dt>
																<a target="_blank" href="<?=Yii::app()->createUrl("education/school",array("id"=>$row1["s_id"]))?>">
																	<?=$row2["s_name"]?>
																</a>
																-
																<a target="_blank" href="<?=Yii::app()->createUrl("education/school",array("id"=>$row1["s_id"],"type"=>"zyjs","kid"=>$row1["kid"]))?>">
																	<?=$row1["ktitle"]?>
																</a>
															</dt>
															<dd>
																<a target="_blank" href="<?=Yii::app()->createUrl("education/school",array("id"=>$row1["s_id"]))?>">
																	<?=Common::strCut($row1["zycon"],84)?>
																</a>
															</dd>
														</dl>
													</div>
									<?php	}
													foreach ($model as $i=>$row1 ){
														if($i<1)continue;
														if($i>1)break;?>
													<div class="main_xl_hd_box01_list_box2"> 
														[<a target="_blank"  href="<?=Yii::app()->createUrl("education/school",array("id"=>$row1["s_id"]))?>">
															<?=$row1["ktitle"]?>
														</a>]
														<?=Common::strCut($row1["zycon"],80)?>
													</div>
												  <?php }?>
												</div>
									</div>
									<div class="main_xl_hd_box02">
										<div class="main_xl_hd_box02_list01">
											<dl>
												<dt>学校名称</dt>
												<dd>专业</dd>
												<dd>学费</dd>
												<dd>开学日期</dd>
											</dl>
										</div>
										<div class="main_xl_hd_box02_list02">
										<?php 	foreach ($model as $i=>$row1 ){
													if($i<2)continue;
													if($i>8)break;
													$row2=School::model()->find("s_id='{$row1["s_id"]}'");?>
													<dl onmouseover="this.style.background='#fbebdf'" onmouseout="this.style.background='#fff'">
														<dt>
															[<a target="_blank"  href="<?=Yii::app()->createUrl("education/school",array("id"=>$row1["s_id"]))?>">
																<?=$row2["s_name"]?>
															</a>]
														</dt>
														<dd>
															<a target="_blank"  href="<?=Yii::app()->createUrl("education/school",array("id"=>$row1["s_id"],"type"=>"zyjs","kid"=>$row1["kid"]))?>">
																<?=$row1["zyname"]?>
															</a>
														</dd>
														<dd>
															<?=$row1["xfei"]?>元/年
														</dd>
														<dd>
															<?=$row1["kdate"]?>
														</dd>
													</dl>
										  <?php }?>
										</div>
									</div>
									<div class="main_xl_hd_box03">
										<a href="#"><img src="/images/xl_hd_pic02.jpg" /></a>
									</div>
								</div>
								<div class="xl_undis" id="xl_tbc_02">
									<div class="xl_wl-jz">
									<?=$this->renderPartial("_wlyxzsjz");?>
									</div>
									<!--   wd   -->
									<div class="wl-jz" style="border:none;">
										<div class="xl_wz">学员问答</div>
										<?=$this->renderPartial("_wlyxxywd");?>
									</div>
								</div>
								<div class="xl_undis" id="xl_tbc_03">
									<?=$this->renderPartial("_crgknews");?>
									<?php $Webxl=WebStep::model()->findByPk(4);?>
									<div class="xl_crgk_pic">
										<a href="<?=$Webxl["z_gglink"]?>">
											<img src="/admin_root/<?=$Webxl["z_onegg"]?>" onload="if(this.width>415){this.width=415}"/>
										</a>
									</div>
								</div>
								<div class="xl_undis" id="xl_tbc_04">
									<div class="xl_gfb_hd">
										<?php 	
										$news=Ennews::model()->getAllNews(array("40"),6);
										$row=$news[0];?>
										<div class="gf_ff_bt">
											<a href="/Education/gfb/gf_zx_neiye.php?id=<?php echo $row["nid"];?>" title="<?php echo $row["ntitle"];?>">
												<?php echo Common::strCut($row["ntitle"],38)?>
											</a>
										</div>
										<div class="gf_nr">
											<?=Common::strCutAndTags($row["ncon"],124)?><span><a href="/Education/gfb/gf_zx_neiye.php?id=<?php echo $row["nid"];?>" title="<?php echo $row["ntitle"];?>">[详细]</a></span></div>
										<div class="gf_ff_rz">
											<ul>
												<?php	foreach ($news as $k=>$row){
															if($k==0)continue;?>
															<li><span>·<a href="/Education/gfb/gf_zx_neiye.php?id=<?php echo $row["nid"];?>" title="<?php echo $row["ntitle"];?>"><?php echo Common::strCut($row["ntitle"],70)?></a></span>
															  <?=date('Y-m-d',strtotime($row["ndate"]))?>
															</li>
												<?php 	}?>
											</ul>
										</div>
									</div>
									<div class="zx_qr_01_12" style="width:617px;">
										<!--三校生高复-->
										<div class="zx_qr_02_left_list">
											<div class="zx_qr_02_left_list_01_003">
												<dl>
													<dt>班级名称</dt>
													<dd>学费</dd>
													<dd style="width:80px;">报名</dd>
												</dl>
											</div>
											<?php	$criteria=new CDbCriteria;
													$criteria->limit='6';
													$criteria->addCondition("zyclass regexp '高复'");
													$criteria->order='kkdate desc';
													$rs1=Kkinfo::model()->findAll($criteria);
													foreach ($rs1 as $k=>$row1){
														// $rs_1=mysql_query("select s_name from school where s_id=".$row1["s_id"],$conn); 
														// $rw1=mysql_fetch_assoc($rs_1);?>
														<div class="zx_qr_02_left_list_02_004" id="Marquee">
															<dl>
															  <dt><span>[<a href="/Education/gfb/gfb_index.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>">
																<?=$row1["zyname"]?>
																</a>]<a href="/Education/gfb/gf_bm_lb_xiangxi.php?gid=<?=$row1["kid"]?>" title="<?=$row1["ktitle"]?>">
																  <?=$row1["ktitle"]?>
																</a></span></dt>
															  <dd><span>￥<?=$row1["yhui"]?></span></dd>
															  <dd><span><a href="/Education/gfb/gf_zx_wsbm.php?gid=<?=$row1["kid"]?>">报名</a></span></dd>
															</dl>
														</div>
										  <?php 	}?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<script type="text/javascript">xlHoverLi(1);</script>
					</div>
				</div>
				<div class="main_xl_box02">
					<?php 	$arr=array(
								"1",//新手指导	
								"5",//备考指南
								"6",//招生简章
								"7"	//职业教育公告
							);
							foreach($arr as $key=>$val){?>
								<div class="main_xl_box02_list" <?=$key=="2"?'style="margin-right:0;"':''?>>
									<div class="main_xl_box02_list_title" >
										  <?php	$rowa=Enclass::model()->find("n_id={$val}");
												$rows=Ennews::model()->getAllNews(array("{$rowa["n_id"]}"),5);
												$row=$rows[0];?>
										  <span><?php echo $rowa["n_class"];?></span> 
										  <a href="/Education/xl_newscl.php?cl=<?php echo $rowa["n_id"];?>">+MORE</a>
									</div>
									<div class="main_xl_box02_list_text">
										<div class="main_xl_box02_list_text_box1">
											<dl>
												<dt>
													<div class="main_xl_box02_list_text_box1_pic">
														<img src="<?=$row["npic"]==0||!$row["npic"]?"/images/xl_box2_01.jpg":$row["npic"]?>" />
													</div>
												</dt>
												<?php	
														?>
												<dd>
													<a title="<?=strip_tags($row["ncon"])?>" href="/Education/xl_news_detail.php?id=<?php echo $row["nid"];?>">
														<?php	echo Common::strCutAndTags($row["ncon"],84);?>
													</a>
												</dd>
											</dl>
										</div>
										<div class="main_xl_box02_list_text_box2">
											<?php	foreach ($rows as $k=>$row){
														if($k==0)continue;?>
														<dl>
																<dt>
																	<img src="/images/dot_h.jpg" width="4" height="7" />
																</dt>
																<dd>
																	<a  title="<?=$row["ntitle"]?>" href="/Education/xl_news_detail.php?id=<?php echo $row["nid"];?>">
																		<?php echo trim($row["ntitle"]);?>
																	</a>
																</dd>
														</dl>
											<?php 	}?>
										</div>
									</div>
								</div>
					<?php	}?>
					<div class="main_xl_box02_list">
						<div class="main_xl_box02_list_title">
							<span>论坛热帖</span>
							<a href="#">+MORE</a>
						</div>
						<div class="main_xl_box02_list_text">
							<div class="main_xl_box02_list_text_box1">
								<dl>
									<dt>
										<div class="main_xl_box02_list_text_box1_pic">
											<img src="/images/xl_box2_01.jpg" />
										</div>
									</dt>
									<dd>
										什么时间可以参加考试、一年又可以参加几次考试、如何进行补考、考试要求还有哪些...
									</dd>
								</dl>
							</div>
							<div class="main_xl_box02_list_text_box2">
								<dl>
									<dt>
										<img src="/images/dot_h.jpg" width="4" height="7" />
									</dt>
									<dd>
										<a href="#">2010年全国高考真题及答案汇总</a>
									</dd>
								</dl>
								<dl>
									<dt>
										<img src="/images/dot_h.jpg" width="4" height="7" />
									</dt>
									<dd>
										<a href="#">2010年高考填报志愿必看的专业解..</a>
									</dd>
								</dl>
								<dl>
									<dt>
										<img src="/images/dot_h.jpg" width="4" height="7" />
									</dt>
									<dd>
										<a href="#">第一时间公布2010年全国各地高考..</a>
									</dd>
								</dl>
							</div>
						</div>
					</div>
					<div class="main_xl_box02_list" style="margin-right:0;">
						<div class="main_xl_box02_list_title">
							<span>在线问答</span>
						</div>
						<div class="main_xl_box02_list_text">
							<div class="main_xl_box02_list_text_box1">
								<dl>
									<dt>
										<div class="main_xl_box02_list_text_box1_pic">
											<img src="/images/xl_box2_01.jpg" />
										</div>
									</dt>
									<?php 	$criteria=new CDbCriteria;
											$criteria->limit='15';
											$criteria->with[]="schoolinfo";
											// $criteria->with[]="kkinfoinfo";
											$criteria->addCondition("wd_bool=1");
											$criteria->order='wd_stime desc';
											$wdmodel=Wdonline::model()->findAll($criteria);
											foreach($wdmodel as $key=>$row){
												$kkinfo=Kkinfo::model()->find("s_id='{$row->schoolinfo->s_id}'");
												if (isset($kkinfo->kid)){?>
													<dd>
														<a title='<?=$row["wd_ask"]?>' href="<?=Yii::app()->createUrl("education/school",array("id"=>$row->schoolinfo["s_id"],"type"=>"wd"))?>">
															<?php echo Common::strCut($row["wd_ask"],60);?>
														</a>
														<br>
														<font title="<?=$row["wd_answer"]?>" color="#666">
															<?=Common::strCut($row["wd_answer"],60);?>
														</font>
													</dd>
									<?php 			break;
												}
											}?>
								</dl>
							</div>
							<div class="main_xl_box02_list_text_box2">
							<?php	$i=0;
									foreach($wdmodel as $k=>$row){
										if($k<$key)continue;
										if($i>2)break;
										$kkinfo=Kkinfo::model()->find("s_id='{$row->schoolinfo->s_id}'");
										if (isset($kkinfo->kid)){
											$i++;?>				 
											<dl>
												<dt>
													<img src="/images/dot_h.jpg" width="4" height="7" />
												</dt>
												<dd>
													[问]
													<a href="<?=Yii::app()->createUrl("education/school",array("id"=>$row->schoolinfo["s_id"],"type"=>"wd"))?>">
													<?php echo $row["wd_ask"];?>
													</a>
												</dd>
											</dl> 
							<?php 		}
									}?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="main_xllb_box01_right">
				<div class="main_xllb_box01_right_list01">
					<div class="main_xllb_box01_right_list01_title">
						<span>热门学院</span>
					</div>
					<div class="main_xllb_box01_right_list01_text"> 
						<div class="main_xllb_box01_right_list01_text_box1_00" style="display:none;height:82px;margin:0px">
						 <?php /*	$rdgz=Enclass::model()->find("n_id=8");
								$rdgzNews=Ennews::model()->getAllNews(array("{$rdgz["n_id"]}"),6);
								foreach($rdgzNews as $k=>$row){
									if($k>1)break;?>
									<div class="main_xllb_box01_right_list01_text_box1">
										<h1>
											<a href="/Education/xl_news_detail.php?id=<?php echo $row["nid"];?>">
												<?php echo $row["ntitle"];?>
											</a>
										</h1>
										<span>
											<?php echo Common::strCutAndTags($row["ncon"],88)?>
											<a href="/Education/xl_news_detail.php?id=<?php echo $row["nid"];?>">[详细]</a>
										</span>
									</div>
						<?php 	}*/?>
						</div>
						<div class="main_xllb_box01_right_list01_text_box2" style="height:172px">
						<?php	$School=School::model()->getAllSchool(8);
								foreach($School as $row){?>
									<a href="/school/?kid=&&<?php echo $row->sss->kid?>sid=<?php echo $row["s_id"];?>" target="_blank">
										<?php echo $row["s_name"];?>
									</a>
									<br />
						<?php 	}?>
						</div>
					</div>
				</div>
				<div class="main_xllb_box01_right_list01">
					<div class="main_xllb_box01_right_list01_title"> 
						<span>报名条件、时间</span>
					</div>
					<div class="main_xllb_box01_right_list01_text">
						<div class="main_bmtj">
							<div class="main_bmtj_box01">
								<?php echo $web["z_bmtj"];?> 
							</div>
							<div class="main_bmtj_box02">
								<span>报名电话：<?php echo $web["z_tel"];?></span> 
							</div>
						</div>
					</div>
				</div>
				<div class="main_xllb_box01_right_list01">
					<div class="main_xllb_box01_right_list01_title">
						<span>热点资讯</span>
						<a href="/Education/xl_newscl.php?cl=8">
							<img src="/images/xl_hot.jpg" />
						</a> 
					</div>
					<div class="main_xllb_box01_right_list01_text">
						<div class="main_rdzx">
							<ul>
							<?php	$models=Information::model()->getAllByPid(1,4,"i_click desc",true);
									foreach($models as $row){?>
										<li>
											<a href="<?=Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))?>">
												<?php echo $row["i_title"];?>
											</a>
										</li>
							<?php	}?>
					
							</ul>
						</div>
					</div>
				</div>
				<div class="main_xllb_box01_right_list01">
					<div class="main_xllb_box01_right_list01_title">
						<?php	
						$cjwt=Enclass::model()->find("n_id=9");
						$cjwtNews=Ennews::model()->getAllNews(array("{$cjwt["n_id"]}"),4);?>
						<span>
							<?php echo $rowa["n_class"];?>
						</span>
						<a href="/Education/xl_newscl.php?cl=<?php echo $rowa["n_id"];?>">
							<img src="/images/xl_fq.jpg" alt=""/>
						</a>
					</div>
					<div class="main_xllb_box01_right_list01_text">
						<div class="main_rdzx">
							<ul>
							<?php	foreach($cjwtNews as $row){?>
										<li>
											<a href="/Education/xl_news_detail.php?id=<?php echo $row["nid"];?>">
												<?php echo $row["ntitle"];?>
											</a>
										</li>
							<?php	}?>
							</ul>
						</div>
					</div>
				</div>
				<div class="main_xllb_box01_right_list01" style="margin-bottom:0;">
					<div class="main_xllb_box01_right_list01_title"> 
						<span>下载专区</span>
						<a href="/Education/xl_download.php">
							<img src="/images/xl_xz.jpg" alt="更多下载"/>
						</a> 
					</div>
					<div class="main_xllb_box01_right_list01_text">
						<div class="main_xzzq">
							<ul>
							<?php	$criteria=new CDbCriteria;
									$criteria->limit='4';
									$rs=XlAsk::model()->findAll($criteria);
										foreach($rs as $row){					
											if(Yii::app()->user->isGuest){?>
												<li>
													<a onclick="dsumXMLHttp(<?php echo $row["w_id"];?>)" href="/admin_root/<?php echo $row["w_con"];?>">
														<?php echo $row["w_title"];?>
													</a>
												</li>
							<?php 			}else{?>
												<li style="cursor:pointer;" onclick="alert('对不起您尚未登陆');location.href='/vip_login.php';"><?php echo $row["w_title"];?></li>
							<?php 			}
										}?>
							</ul>
						</div>
					</div>
				</div>
          </div>
        </div>
      </div>
    </div>