<?php
// Yii::app()->clientScript->registerCssFile("123321",'keywords');
// Yii::app()->clientScript->registerScriptFile("333",'description');
// $this->pageTitle = "一休网AAA";
?>

<div class="main_box01">
    <div class="main_box01_left">
		<div class="main_box01_left_01">
			<img src="/images/tel.jpg" />
		</div>
        <div class="main_box01_left_02">
			<a href="javascript:void(null);">
				<img src="/images/wlxy.jpg" />
			</a>
		</div>
    </div>
    <div class="main_box01_center">
		<div class="main_box01_center_flash">
			<?php 
			$pics="";
			$links="";
			$title='';
			foreach($HomeSlide as $val){
				if($val['pic']){
					$str=$pics||$links||$title?"|":'';
					$pics.=$str."/admin_root/".$val['pic'];
					$links.=$str.$val['link'];
					$title.=$str;//.$val['title'];
				}
			}?>
			<script type="text/javascript">
			<!-- 
			var interval_time=2 ;
			var focus_width=549;
			var focus_height=273;
			var text_height=23;
			var text_mtop = 0;
			var text_lm = 0;
			var textmargin = text_mtop+"|"+text_lm;
			var textcolor = "#005F00";
			var text_align= 'center'; 
			var swf_height = focus_height+text_height+text_mtop; 
			var text_size = 13;
			var borderStyle="0|0x000000|000";
			var pics="<?=$pics;?>";
			var links="<?=$links;?>";
			var texts="<?=$title;?>";
			
			document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash. cab#version=6,0,0,0" width="'+ focus_width +'" height="'+ swf_height +'">');
			document.write('<param name="allowScriptAccess" value="sameDomain"><param name="movie" value="images/hot_new.swf"> <param name="quality" value="high"><param name="Wmode" value="transparent">');
			document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
			document.write('<param name="FlashVars" value="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'&textmargin='+textmargin+'&textcolor='+textcolor+'&borderstyle='+borderStyle+'&text_align='+text_align+'&interval_time='+interval_time+'&textsize='+text_size+'">');
			document.write('<embed src="/images/hot_new.swf" wmode="opaque" FlashVars="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'&textmargin='+textmargin+'&textcolor='+textcolor+'&borderstyle='+borderStyle+'&text_align='+text_align+'&interval_time='+interval_time+'&textsize='+text_size+'" menu="false" bgcolor="#ffffff" quality="high" width="'+ focus_width +'" height="'+ swf_height +'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');	document.write('</object>');
			//-->
			</script> 
		</div>
	</div>
    <div class="main_box01_right">
        <div class="main_box01_right_01">
            <ul>
			<?php foreach ($kefu as $val){?>
				<li><a href="tencent://message/?uin=<?=$val['number']?>&Site=<?=$this->pageTitle?>&Menu=yes" title="<?=$val['name']?>"><img border="0" src=http://wpa.qq.com/pa?p=1:<?=$val['number']?>:1 align="top"/></a></li>
            <?php }?>
			</ul>
		</div>
        <div class="main_box01_right_02">
            <div class="main_box01_right_02_box">
                <div class="main_box01_right_02_box01">
					<img src="/images/yxdt.jpg" width="171" height="35" />
				</div>
                <div class="main_box01_right_02_box02">
                    <ul>
					<?php foreach($TjNews as $i=>$row){	?>
							<li>
								<span><?=$i+1?>.</span>
								<a href="/news_detail.php?id=<?php echo $row["nid"];?>" title="<?php echo $row["ntitle"];?>"><?php echo $row->ntitle;?></a>
							</li>
					<?php }?>
                    </ul>
				</div>
                <div class="main_box01_right_02_box03">
					<img src="/images/yxdt_bottom.jpg" width="171" height="10" />
				</div>
            </div>
        </div>
    </div>
</div>
<div class="main_box02">
    <div class="main_box02_00">
        <div class="main_box02_00_left">名校直达</div>
        <div class="main_box02_00_right">
		<?	foreach($TjSchool as $i=>$row){	?>
				<a href="/school/?sid=<?=$row["mb_id"];?>" target="_blank"><?=$row["s_name"];?></a>
		<?php
				if ($i+1!=count($TjSchool))echo"<span>|</span>";
			} 
		?>         
        </div>
    </div> 
</div>
<div class="main_box03">
	<div class="main_box03_left">
    	<div class="main_box03_left_title">
			<span>提供<strong>215</strong>家知名培训机构，<strong>8256</strong>门培训课程的咨询报名服务</span>
        </div>
    	<div class="main_box03_left_list">
		<?php //分类导航	
			$fldhTitle=Kcbname::model()->findAll();
			foreach($fldhTitle as $key=>$row){
				if($key>5)break;?>
				<div class="main_box03_left_list00">
					<table width="100%" height="100%"  class='table10'  onmouseout="this.className='table10';" onmousemove="this.className='table09';">
						<tr>
							<td width="40" height="97" align="center" valign="middle" bgcolor="#f5f5f5">
								<h1><?php echo $row["kc_bname"]?></h1>
							</td>
							<td style="padding:10px;;">
							<?php 	$fldhlist=Kcsname::model()->findAll("kcbid='{$row["kc_id"]}'");
									foreach($fldhlist as $rw){?>
										<a href="/<?php echo $rw["kc_http"]?>" target="_blank"><?php echo $rw["kc_sname"]?></a>
							<?php 	}?>
							</td>
						</tr>
					</table>
				</div>
		<?php
			}?>              
        </div>
        <div class="main_box03_left_more">
        	<div class="main_box03_left_more_ck"><a href="#">查看所有分类↑</a></div> 
        </div>
    </div>
    <div class="main_box03_right">
    	<div class="main_box03_right_title">
        	<div class="main_box03_right_title_name">考试日历</div>
            <div class="main_box03_right_title_more"><a href="/ksrl.php">更多>></a></div>
        </div>
        <div class="main_box03_right_list">
        	<div class="main_box03_right_list_01">
            	<dl>
					<dt>考试名称</dt>
					<dt>开考时间</dt>
					<dt>考试辅导</dt>
                </dl>
            </div>
			<div class="main_box03_right_list_02" id="mq" onmouseout="document.getElementsByTagName('main_box03_right_list_02').idName = 'mq';" onmouseover="document.getElementsByTagName('main_box03_right_list_02').idName = '';">
			<?php
					foreach($excalModel as $row){?>
						<dl>
							<dt><a href="/ksrl_detail.php?id=<?php echo $row["ex_id"]?>" title="<?php echo $row["ex_title"]?>"><?php echo $row["ex_title"]?></a></dt>
							<dt><?php echo date("Y-m-d",strtotime($row["ex_kstime"]))?></dt>
							<dt>课程辅导</dt>
						</dl>                   
            <?php 	}?>
            </div>
			<?php if(count($excalModel)>9){?>
				<script src="/js/gund.js"></script>
			<?php }?>
        </div>
    </div>
</div>
<div class="main_box04">
    <div class="main_box04_title">
        <div class="main_box04_title_left">一休带你逛</div>
        <div class="main_box04_title_right">
            <dl>
                <dt><img src="/images/dng_left.jpg" width="6" height="30" /></dt>
				<dd>
				<?php
						foreach($Tjguang as $i=>$row){
							$str=$i=1==count($Tjguang)?"":"<span>|</span>";?>
							<a href="<?php echo $row["mx_link"]?>" target="_blank"><?php echo $row["mx_title"]?></a>
				<?php 		echo $str;
						}	?>
                </dd>
                <dt><img src="/images/dng_right.jpg" width="6" height="30" /></dt>
			</dl>
        </div>
    </div>
    <div class="main_box04_box">
    	<div class="main_box04_box_left">
        	<div class="main_box04_box_left_box01">
            	<div class="main_box04_box_left_box01_list">
                	<div class="main_box04_box_left_box01_list_pic00" onmouseover="this.style.border='1px solid #ff5714'" onmouseout="this.style.border='1px solid #ced0c5'">
                    	<div class="main_box04_box_left_box01_list_pic">
							<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
									<td align="center" valign="middle">
									<?php	$models=Information::model()->getAllHasImg("",1);
											foreach($models as $row){?>
												<a href="<?=Yii::app()->createUrl("education/newsview",array("id"=>$row["i_id"]))?>">
													<img src="/admin_root/<?php echo $row['i_pic'];?>" onLoad="javascript:if(this.width>=this.height&&this.width>=88){this.width=88};if(this.height>this.width&&this.height>=98){this.height=98};" border="0" align="top" />
												</a>
									<?php 	}?>
									</td>
								</tr>
							</table>
                       </div>
					</div>
                    <div class="main_box04_box_left_box01_list_text">        
						<dl>
						<?php 	foreach($models as $row){?>
									<dt>
										<span>■</span>
										<a href="<?=Yii::app()->createUrl("education/newsview",array("id"=>$row["i_id"]))?>">
											<?=Common::strCut($row["i_title"],45);?>
										</a>
										
									</dt>
									<dd><?=Common::strCutAndTags($row['i_con'],76);?></dd>
						<?php 	}?>
                        </dl>
					
                        <h1>
							<?php
							$criteria=new CDbCriteria;
							$criteria->order="ps_id desc";
							$criteria->limit="6";
							$rs=Pxsclass::model()->findAll($criteria);
							foreach($rs as $row){?>
								[<a href="/Training/px_kc_list.php?pid=<?php echo $row["pb_id"];?>"><?php echo $row["ps_title"];?></a>]<span></span>
							<?php }?>
                        </h1>
                    </div>
                </div>
                <div class="main_box04_box_left_box01_list">
                    <div class="main_box04_box_left_box01_list_pic00" onmouseover="this.style.border='1px solid #ff5714'" onmouseout="this.style.border='1px solid #ced0c5'">
                        <div class="main_box04_box_left_box01_list_pic">
							<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
									<td align="center" valign="middle">
										<?php
										$criteria=new CDbCriteria;
										$criteria->addCondition("npic !='0' or npic !=''");
										$criteria->order="ndate desc";
										$row=YxNews::model()->find($criteria);?>
										<a href="Research/re_news_show.php?id=<? echo $row["news_id"];?>"><img src="/admin_root/<?php echo $row["npic"];?>"  onLoad="javascript:if(this.width>=this.height&&this.width>=88){this.width=88};if(this.height>this.width&&this.height>=98){this.height=98};"	border="0" align="top" /></a>
									</td>
								</tr>
							</table>
                        </div>
                        </div>
                        <div class="main_box04_box_left_box01_list_text">
                            <dl>
								<dt>
									<span>■</span>
									<a title="<?=$row["news_title"]?>" href="/Research/re_news_show.php?id=<? echo $row["news_id"];?>">
										<?=Common::strCut($row["news_title"],45);?>
									</a>
								</dt>
								<dd title='<?=Common::strTags($row["news_con"])?>'><?=Common::strCutAndTags("&nbsp;".$row["news_con"],76);?></dd>
                            </dl>
                            <h1>
								<ul>
								<?php					
									$criteria=new CDbCriteria;
									$criteria->order="yxk_id desc";
									$criteria->limit="2";
									$rs=YxKaike::model()->findAll($criteria);
									foreach ($rs as $row){?>
										<li>[<?php echo $row["yxk_cl"];?>] <a href="/Research/yxschool.php?id=<?php echo $row["yxk_id"];?>"><?=Common::strCut($row["yxk_title"],32);?></a><span></span></li>
								<?php }?>                	
								</ul>
							</h1>
                    </div>
                </div>
                <div class="main_box04_box_left_box01_list">
                	<div class="main_box04_box_left_box01_list_pic00" onmouseover="this.style.border='1px solid #ff5714'" onmouseout="this.style.border='1px solid #ced0c5'">
                    	<div class="main_box04_box_left_box01_list_pic">
							<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
									<td align="center" valign="middle">
									<?php	$models=Information::model()->getAllHasImg(5,1);
											foreach($models as $row){?>
												<a href="<?=Yii::app()->createUrl("Enterprise/newsview",array("id"=>$row["i_id"]))?>"><img src="/admin_root/<?php echo $row["i_pic"];?>"  onLoad="javascript:if(this.width>=this.height&&this.width>=88){this.width=88};if(this.height>this.width&&this.height>=98){this.height=98};"  border="0" align="top" /></a>
									<?php 	}?>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="main_box04_box_left_box01_list_text">
						<dl>
							<dt>
								<span>■</span>
								<a href="<?=Yii::app()->createUrl("Enterprise/newsview",array("id"=>$row["i_id"]))?>">
									<?=Common::strCut($row["i_title"],28);?>
								</a>
							</dt>
							<dd><?=Common::strCutAndTags($row["i_con"],72);?></dd>
						</dl>
						<h1>
							<ul>
							<?php
								$criteria=new CDbCriteria;
								$criteria->order="kk_id desc";
								$criteria->limit="2";
								$rs=QpKaikeClass::model()->findAll($criteria);
								foreach($rs as $row){?>
									<li>[<?php echo $row["kk_title"];?>]<a href="Enterprise/qp_course_detial.php?cl=<?php echo $row["kk_id"];?>"><?=Common::strCut($row["kk_kcts"],20);?></a><span></span></li>
							<?php }?>
							</ul>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="main_box04_box_left_box02">
                <div class="main_box04_box_left_box01_list_left">
                	<div class="main_box04_box_left_box02_list_pic00" onmouseover="this.style.border='1px solid #ff5714'" onmouseout="this.style.border='1px solid #ced0c5'" >
                    	<div class="main_box04_box_left_box02_list_pic">
							<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
									<td align="center" valign="middle">
									<?php
										$criteria=new CDbCriteria;
										$criteria->addCondition("lx_npic !='0'  or lx_npic !=''");
										$criteria->order="lx_nid desc";
										$row=Lxnews::model()->find($criteria);?>
										<a href="/Abroad/lx_news_detail.php?id=<?php echo $row["lx_nid"];?>">
											<img src="/admin_root/<?php echo $row["lx_npic"];?>" onLoad="javascript:if(this.width>=this.height&&this.width>=135){this.width=135};if(this.height>this.width&&this.height>=100){this.height=100};"  border="0" align="top" />
										</a>
									</td>
								</tr>
							</table>                            
                        </div>
                    </div>
                    <div class="main_box04_box_left_box02_list_text">
						<ul>
						<?php 
							$criteria=new CDbCriteria;
							$criteria->limit="5";
							$criteria->order="lx_nid desc";
							$rs=Lxnews::model()->findAll($criteria);
							foreach ($rs as $row){?>
								<li><a href="/Abroad/lx_news_detail.php?id=<?php echo $row["lx_nid"];?>"><?php echo Common::strCut($row["lx_ntitle"],30);?></a></li>
						<?php }?>
                        </ul>
                    </div>
                </div>
                <div class="main_box04_box_left_box01_list_left">
                	<div class="main_box04_box_left_box02_list_pic00" onmouseover="this.style.border='1px solid #ff5714'" onmouseout="this.style.border='1px solid #ced0c5'" >
                    	<div class="main_box04_box_left_box02_list_pic">
							<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
									<td align="center" valign="middle">
									<?php
										$criteria=new CDbCriteria;
										$criteria->addCondition("k_pic !='0' or k_pic !=''");
										$criteria->order="kid desc";
										$row=Kkinfo::model()->find($criteria);?>
										<a href="Education/xl_pro_detail.php?kid=<?php echo $row["kid"];?>">
											<img src="/admin_root/<?php echo $row["k_pic"];?>" onLoad="javascript:if(this.width>=this.height&&this.width>=135){this.width=135};if(this.height>this.width&&this.height>=100){this.height=100};" border="0" align="top" />
										</a>
									</td>
								</tr>
							</table>                            
						</div>
                    </div>
                    <div class="main_box04_box_left_box02_list_text">
                    	<ul>
						<?php
							$criteria=new CDbCriteria;
							$criteria->order="kid desc";
							$criteria->limit="5";
							$rs=Kkinfo::model()->findAll($criteria);
							foreach($rs as $row){?>
								<li><span>[<?php echo $row["zyclass"];?>]</span><a title="<?=$row["ktitle"]?>" target="_blank" href="<?=Yii::app()->createUrl("/education/school",array("id"=>$row->s_id,"type"=>"zyjs","kid"=>$row->kid))?>"><?php echo Common::strCut($row["ktitle"],20);?></a></li>
						<?php }?>
                        </ul>
                    </div>
                </div>
                <div class="main_box04_box_left_box01_list_left">
                    <div class="main_box04_box_left_box01_list_left_box">
						<div class="main_box04_box_left_box01_list_left_box_02">
							<dl id="gtb_" class="gtb_">
							<?php
								$criteria=new CDbCriteria;
								$criteria->order="ps_id desc";
								$criteria->limit="5";
								$rs=Pxsclass::model()->findAll($criteria);
								foreach($rs as $k=>$row1){
								$str=$str.",".$row1["ps_id"];?>
									<dd id="gtb_<?=$k+1?>" <?php if($k==0){echo"class='ghovertab'";}else{echo"class='gnormaltab'";}?> onmouseover="gHoverLi(<?=$k+1?>);">
										<a title='<?=$row1["ps_title"]?>' href="/Training/px_kc_list.php?pid=<?php echo $row1["ps_id"];?>"><?php echo Common::strCut($row1["ps_title"],6,"");?></a>
									</dd>
							<?php }?>
							</dl>
						</div>
						<?php
						foreach($rs as $i=>$v){
							$criteria=new CDbCriteria;
							$criteria->addCondition("pxk_cl ='{$v["ps_id"]}'");
							$criteria->order="pxk_id desc";
							$criteria->limit="5";
							$PxkkinfoModel=Pxkkinfo::model()->findAll($criteria);
							foreach($PxkkinfoModel as $k=>$row){?>
								<div <?=$k=="0"?"class='gdis'":"class='gundis'"?> id="gtbc_0<?=$i+1?>">
									<div class="main_box04_box_left_box01_list_left_box_01">
										<div class="main_box04_box_left_box01_list_left_box_01_pic">
											<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
												<tr>
													<td align="center" valign="middle">
														<a href="Training/px_kc_list_details.php?id=<?php echo $row["pxk_id"];?>">
															<img src="/admin_root/<?php echo $row["pxk_pic"];?>" border="0" align="top" onLoad="javascript:if(this.width>=this.height&&this.width>=135){this.width=135};if(this.height>this.width&&this.height>=100){this.height=100};"/>
														</a>
													</td>
												</tr>
											</table>                                
										</div>
										<div class="main_box04_box_left_box01_list_left_box_01_list">
											<dl>
												<dt>
													<a href="Training/px_kc_list_details.php?id=<?php echo $row["pxk_id"];?>">
														<?=$row["pxk_title"]?>
													</a>
												</dt>
												<dd>
													开班时间：<?php echo $row["pxk_time"];?><br />
													报名费用<span>￥:<?php echo $row["pxk_xfei"];?>(元)</span>
												</dd>
											</dl>
											<div class="anniu00"><a href="Training/px_school/baoming.php?pid=<?=$row["pxk_sid"]?>">我要报名</a></div>
										</div>
									</div>
								</div>
						<?php 
							}
						}
						?>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_box04_box_right">
        	<div class="main_box04_box_right_title">
            	<dl id="b1">
					<dt onmouseover="openbox_tj_01_01();o_01_01();">本月推荐</dt>
					<dd onmouseover="openbox_tj_01_02();o_01_02();">热门课程</dd>
                </dl>
                <dl id="r1" style="display:none;">
					<dd onmouseover="openbox_tj_01_01();o_01_01();">本月推荐</dd>
					<dt onmouseover="openbox_tj_01_02();o_01_02();">热门课程</dt>
                </dl>
            </div>
            <div class="main_box04_box_right_list" id="brtj">
				<div class="main_box04_box_right_list01">
				<?php
					foreach ($TjSchool as $k=>$row){
						if($k>1)break;?>
						<div class="main_box04_box_right_list01_js">
							<div class="main_box04_box_right_list01_js_pic00">
								<div class="main_box04_box_right_list01_js_pic">
									<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
										<tr>
											<td align="center" valign="middle">
												<a href="school/?sid=<?php echo $row["mb_id"];?>" target="_blank">
													<img src="/admin_root/<?php echo $row["mb_logo"]?>" border="0" align="top" onload="javascript:ResizePic(this,88,78)" />
												</a>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<dl>
								<dt>
									<a href="school/?sid=<?php echo $row["mb_id"]?>" target="_blank">
										<?php echo $row["s_name"];?>
									</a>
								</dt>
							</dl>
						</div>
                <?php }?>
				</div>
				<div class="main_box04_box_right_list02">
				<?php
					foreach ($NotTjSchool as $row){	?>
                	<dl>
						<dt>
							<img src="/images/dot.jpg" width="4" height="7" />
						</dt>
						<dd>
							<a href="school/?sid=<?php echo $row["mb_id"]?>" target="_blank">
								<?php echo $row["s_name"]?>
							</a>
						</dd>
                    </dl>                       
				<?php }?>
				</div>
			</div>
			
            <div class="main_box04_box_right_list" id="rmkc" style="display:none;">
            	<div class="main_box04_box_right_list01">
				<?php
					$TjTeacher=Teacher::model()->getTjTeacher(2);
					foreach ($TjTeacher as $row){?>
                    <div class="main_box04_box_right_list01_js">
                    	<div class="main_box04_box_right_list01_js_pic00">
                        	<div class="main_box04_box_right_list01_js_pic">
								<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
									<tr>
										<td align="center" valign="middle">
											<a href="msfc.php?id=<?php echo $row["t_id"]?>">
												<img src="/admin_root/<?php echo $row["t_pic"]?>" border="0" align="top" onload="javascript:ResizePic(this,88,78)">
											</a>
										</td>
									</tr>
								</table>                                 
							</div>
						</div>
                        <dl>
                        <dt><a href="/msfc.php?id=<?php echo $row["t_id"]?>">
						<?php echo $row["t_name"]?></a></dt>
                        <dd><?php echo $row["t_fzkc"]?></dd>
                        </dl>
                    </div>
				<?php
					} ?>
                </div>
                <div class="main_box04_box_right_list02">
					<?php
						$Tjbiaomodel=Tjbiao::model()->getTjbiao();
						foreach ($Tjbiaomodel as $row){	?>	
                	<dl>
                    <dt>
						<img src="/images/dot.jpg" width="4" height="7" />
					</dt>
               	    <dd>
						<a href="kc_detail.php?id=<?php echo $row["tj_id"]?>">
							<?php echo $row["tj_title"]?>
						</a>
					</dd>
                    </dl>
                    <?php }	?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main_box05">
	<div class="main_box05_title">
    	<div class="main_box05_title_01">热门推荐</div>
        <div class="main_box05_title_02">
        	<ul>
				<?php
					foreach ($TjrHot as $i=>$row){
						$str=$i+1==count($TjrHot)?"":"<span>|</span>";?>
						<li><a href="<?php echo $row["mx_link"]?>" target="_blank"><?php echo $row["mx_title"]?></a><?=$str?></li>
				<?php }	?>
            </ul>
        </div>
        <div class="main_box05_title_03"> .</div>
    </div>	
    <div class="main_box05_list">
		<?php
			foreach($Guanggao as $row){	?>		 	
				<div class="main_box05_list00">
					<div class="main_box05_list00_pic">
						<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
							<tr>
								<td align="center" valign="middle">
									<a href="<?php echo $row["g_website"]?>" target="_blank">
										<img src="/admin_root/<?php echo $row["g_pic"]?>" border="0" align="top" onload="javascript:ResizePic(this,116,116)"/>
									</a>
								</td>
							</tr>
						</table>                 
					</div>
					<h1>
					<a href="#"><?php echo $row["g_name"]?></a>
					</h1>
				</div>
		<?php }?>
	</div>
</div>
<div class="main_box06">
          <div class="main_box06_top"><img src="/images/bottom_bg_top.jpg" /></div>
          <div class="main_box06_cen">
              <div class="main_box06_cen_list">
                  <dl>
                  <dt>如何报名</dt>
                  <dd><a href="#">如何报名</a></dd>
                <dd><a href="#">网上报名</a></dd>
                <dd><a href="#">电话报名</a></dd>
                <dd><a href="#">报名步骤</a></dd>
                </dl>
            </div>
            <div class="main_box06_cen_list">
            	<dl>
                <dt>售后服务</dt>
                <dd><a href="#">退课说明</a></dd>
                <dd><a href="#">换课手续</a></dd>
                </dl>
            </div>
            <div class="main_box06_cen_list">
            	<dl>
                <dt>支付方式</dt>
                <dd><a href="#">现金/银行卡支付</a></dd>
                <dd><a href="#">第三方网上支付</a></dd>	
                <dd><a href="#">如何使用储值账户</a></dd>
                </dl>
            </div>
            <div class="main_box06_cen_list">
            	<dl>
                <dt>我的订单</dt>
                <dd><a href="#">如何查询订单</a></dd>
                <dd><a href="#">订单状态</a></dd>
                <dd><a href="#">订单操作</a></dd>
                </dl> 
             </div>
            <div class="main_box06_cen_list">
            	<dl>
                <dt>会员中心</dt>
                <dd><a href="#">会员服务</a></dd>
                <dd><a href="#">积分说名</a></dd>
                <dd><a href="#">抵用券使用</a></dd>
                </dl> 
            </div>
            <div class="main_box06_cen_list">
            	<dl>
                <dt>帮助中心</dt>
                <dd><a href="#">找回密码</a></dd>
                <dd><a href="#">常见问题</a></dd>
                <dd><a href="#">建议意见</a></dd>
                </dl> 
            </div>       
        </div>
        <div class="main_box06_top"><img src="/images/bottom_bg_bottom.jpg" /></div>
    </div>	
