<link href="/css/abroad/lxschool.css" rel="stylesheet" type="text/css" />
<!--[if gte IE 6]><script language="javascript" src="/js/ie6png.js" type="text/javascript" ></script><![endif]-->
	<div class="main00">
		<div class="school">
			<div class="school_logo"><img src="/admin_root/<?=$lxcon->lxs_banner?>" /></div>
			<div class="school_weizhi">您当前的位置：<a href="/abroad/index">留学频道</a> >> <?=$lxcon->lxs_name?></div>
			<div class="school_box">
				<?=$this->renderPartial("_schleft",array('action'=>'lxs_xxjs'));?>				
				<div class="school_box_cen">
					<div class="school_box_cen_list">
						<div class="school_box_cen_list_title">
							<dl>
								<dt><img src="/images/xx_t01.jpg" /></dt>
								<dd><a href="<?=Yii::app()->createUrl('abroad/abroadshow',array('action'=>'lxs_xxjs'))?>"><img src="/images/xx_more.jpg" /></a></dd>
							</dl>
						</div>
						<div class="school_box_cen_list_text">
                        <?=Common::strCut(strip_tags($lxcon->lxs_xxjs),320)?>
						</div>
					</div>
					<div class="school_box_cen_list">
						<div class="school_box_cen_list_title">
							<dl>
								<dt><img src="/images/xx_t02.jpg" /></dt>
								<dd><a href="<?=Yii::app()->createUrl('abroad/abroadshow',array('action'=>'lxs_kcys'))?>"><img src="/images/xx_more.jpg" /></a></dd>
							</dl>
						</div>
						<div class="school_box_cen_list_text">
						<?=Common::strCut(strip_tags($lxcon->lxs_kcys),320)?>
						</div>
					</div>
					<div class="school_box_cen_list">
						<div class="school_box_cen_list_title">
							<dl>
								<dt><img src="/images/xx_t03.jpg" /></dt>
								<dd><a href="<?=Yii::app()->createUrl('abroad/abroadshow',array('action'=>'lxs_zsjz'))?>"><img src="/images/xx_more.jpg" /></a></dd>
							</dl>
						</div>
						<div class="school_box_cen_list_text">
						<?=Common::strCut(strip_tags($lxcon->lxs_zsjz),320)?>
 
						 <table width="508" border="1" cellpadding="1" cellspacing="1" style="color:#333;margin-top:20px;">
						  <tr align="center" valign="middle">
							<td width="63"><strong>国家</strong></td>
							<td width="79"><strong>专业名称</strong></td>
							<td width="149"><strong>开班名称</strong></td><td width="75"><strong>学费</strong></td><td width="88">&nbsp;</td>
						  </tr>
						<?php foreach($brochures as $row){ ?>
						  <tr align="center" valign="middle">
							<td><?php echo $row['ic_class']?></td>
							<td><?php echo $row["lxk_zy"];?></td>
							<td><u><a href="<?=Yii::app()->createUrl('abroad/lxcourse',array('kid'=>$row["lxk_id"]));?>"><?php echo $row["lxk_title"];?></a></u></td>

							<td style="color:red;"><?php echo $row["lxk_xuefei"];?></td>
							<td><a href="<?=Yii::app()->createUrl('abroad/lxonline',array('kid'=>$row["lxk_id"]));?>">网上报名>></a></td>
						  </tr>
						<?php }?>
						</table>
						</div>
					</div>
					<div class="school_box_cen_list">
						<div class="school_box_cen_list_title">
							<dl>
								<dt><img src="/images/xx_t04.jpg" /></dt>
								<dd><a href="<?=Yii::app()->createUrl('abroad/abroadshow',array('action'=>'lxs_shhj'))?>"><img src="/images/xx_more.jpg" /></a></dd>
							</dl>
						</div>
						<div class="school_box_cen_list_text">
                    <?=Common::strCut(strip_tags($lxcon->lxs_shhj),320)?>
						</div>
					</div>
					<div class="school_box_cen_list">
						<div class="school_box_cen_list_title">
							<dl>
								<dt><img src="/images/xx_t05.jpg" />
									<a style="display:block;" id="lyb_anniu01" href="JavaScript:void(0);"><img src="/images/xx_wytw.jpg" /></a>
									<a id="lyb_anniu02" href="JavaScript:void(0);" style="display:none;"><img src="/images/xx_wytw02.jpg" /></a>
								</dt>
                                <dd><a href="<?=Yii::app()->createUrl('abroad/lxadvisory')?>"><img src="/images/xx_more.jpg" /></a></dd>					
							</dl>
						</div>
						<div class="school_box_cen_list_text">
							<div id="main_lyb_list" style="display:none;">
								<form name="lxwdform" onsubmit="return lxwd()" method="post" action="<?=Yii::app()->createUrl('abroad/lxadvisory')?>">
									<div class="main_lyb_list_left">
										<dl><dt>姓名：</dt><dd><input type="text" value="<?php if(isset($_COOKIE["vipname"])){echo $_COOKIE["vipname"];}?>" name="lxwd_name"></dd></dl>
										<dl><dt>咨询学校：</dt><dd><input type="text" value="<?=$lxcon->lxs_name?>" readonly="readonly" name="lxwd_xxmc"></dd></dl>
										<dl><dt>联系方式：</dt><dd><input type="text" name="lxwd_tel"></dd></dl>
									</div>
									<div class="main_lyb_list_right">
									<h1>请填写你的问题</h1>
										<textarea name="lxwd_question"></textarea>
										<input type="submit" value="提交">
									</div>
								</form>
							</div>
							<div class="main_xl_zxtw">
								<div class="main_xl_zxtw_box">
								<?php 
								$res = $dataProvider->getData();
								$i=0;
								foreach($res as $row){
								$i=$i+1;	 
								?>
								  <div class="main_xl_zxtw_box_list00">
									<div class="main_xl_zxtw_box_title00">
										<div class="main_xl_zxtw_box_title">
											<dl>
											<dt>昵称：<?php echo $row["lxwd_name"];?></dt>
											<dd>[<?php echo $row["lxwd_date"];?>]</dd>
											</dl>
										</div>
									</div>
									<div class="main_xl_zxtw_box_list">
										<dl>
										<dt><?php echo $row["lxwd_question"];?></dt>
										<dd>
											<ul>
											<li><?php echo $row["lxwd_answer"];?></li>
											<li class="main_xl_zxtw_box_list_zxhf"><strong>【在线回复】</strong><?php echo $row["lxwd_ltime"];?></li>
											</ul>
										</dd>
										</dl>
									</div>
								  </div>
								<?php }?>
									<div class="main_xl_zxtw_box_fy">
										<dl>
										<dt><span class="main_news_right_box03_left">
										  <?php echo "共 ".$dataProvider->totalItemCount." 条信息";?>
										</span></dt>
										<dd>
										<?php	$this->widget('CLinkPager',array(
															'pages'=>$dataProvider->pagination,
															"cssFile"=>"/css/pager.css"
													));?>
										</dd>
										</dl>
									</div>
								</div>
							</div>
						</div>
					</div>					
				</div>
				<?=$this->renderPartial('_schright');?>
			</div>
		</div>
	</div>