<script language="javascript">
	function opennavbox(ww){
		document.getElementById(ww).style.display="block";
	}
	function closenavbox(ww){
		document.getElementById(ww).style.display="none";
	}
</script>
<!-- main -->
    <div class="main_box02">
		<div class="main_box02_left">
			<div class="main_box02_left_title"> <span>培训分类</span> </div>
			<div class="main_box02_left_list">
				<div class="main_box02_left_list00">
					<ul>
						<?php
							$models = Icolumn::model()->getAllNameByid(2);
							foreach($models as $k=>$row){
								$iid=$row['ic_id'];
								$res = Icolumn::model()->getAllNameByid($iid);
								foreach($res as $v){
						?>
						<li onmousemove="opennavbox('nav0<?=$v['ic_id']?>');" onmouseout="closenavbox('nav0<?=$v['ic_id']?>');">
							<?php
								$array = array(
									1=>"外语频道",
									2=>"高考频道",
									3=>"中学生辅导频道",
									4=>"早教频道",
									5=>"职业频道",
									6=>"艺术频道",
									7=>"少儿频道"
								);
								foreach($array as $key=>$value){
									if($row['ic_class']==$value){
										echo "<a href='".Yii::app()->createUrl('/training/pxpd0'.$key)."'>".$v['ic_class']."</a>";
									}
								}
							?>
							<ul class="nav0" id="nav0<?=$v['ic_id']?>" style="display:none;">
								<?php
									$models = Icolumn::model()->getAllTagsByid($v['ic_id']);
									$k=0;
									foreach($models as $val){
										$k=$k+1;
										if ($k==1){
								?>
								<dl>
									<dd style="border-left:none; width:151px;">
										<a href="<?=Yii::app()->createUrl('/training/pxkclist',array('id'=>$val['ic_id']))?>"><?=$val["ic_class"]?></a>
									</dd>
								</dl>
								<?php 	}else{?>
								<dl>
									<dd>
										<a href="<?=Yii::app()->createUrl('/training/pxkclist',array('id'=>$val['ic_id']))?>"><?=$val["ic_class"]?></a>
									</dd>
									
								</dl>
							<?php }} ?>
							</ul>
						</li>
					  <?php }}?>
					</ul>
				</div>
			</div>
		</div>
		<div class="main_box02_center">
			<!--flashBegin-->
			<div class="main_box02_center_flash">
				<?=$this->renderPartial("_pxhdp");?>
			</div>
			<!--flashEnd-->
		</div>
		<div class="main_box02_right">
			<div class="main_box02_right_title">一休会员</div>
			<div class="main_box02_right_list">
				<div class="main_box02_right_list_01">
					<form name="logform" method="post" id="logform" onsubmit="return pxXMLHttp()" action="">
						<dl>
							<dt>账号：</dt>
							<dd>
								<input name="user" type="text" />
								<span id="luser"></span>
							</dd>
						</dl>
						<dl>
							<dt>密码：</dt>
							<dd>
								<input name="pass" type="password" />
								<span id="lpass"></span>
							</dd>
						</dl>
						<dl>
							<dt>&nbsp;</dt>
							<dd><a href="#" onclick="alert('暂未开通此功能..')">忘记密码？</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="alert('暂未开通此功能..')">修改密码</a></dd>
						</dl>
						<dl>
							<dt>&nbsp;</dt>
							<dd>
								<input type="image" src="/images/px_dl.jpg" style="width:69px;height:25px;"/>
								&nbsp;&nbsp;&nbsp;<a href="/vip_zc.php"><img src="/images/dl_zc.jpg" style="margin-top:4px;"/></a>
							</dd>
						</dl>
					</form>
				</div>
				<div class="main_box02_right_list_02">
					<dl>
						<dt>注册教一休网，成为会员特权更多：</dt>
						<dd>1.轻松三步搞定注册</dd>
						<dd>2.累计天币兑换精美好礼</dd>
						<dd>3.享受更多贴心专享服务</dd>
					</dl>
				</div>
				<div class="main_box02_right_list_03">
				<?php
					$web_step=WebStep::model()->findByPk(0);
					$z_qq=$web_step["z_qq"];
					$z_qq=explode(",", $z_qq);
					$qq1=$z_qq[0];
					$qq2=$z_qq[1];
				?>
					<ul>
						<li><a href=tencent://message/?uin=<?=$qq1?>&Site=一休教育网&Menu=yes title="在线咨询1"><img border="0" src=http://wpa.qq.com/pa?p=7:<?=$qq1?>:7 align="top"/></a></li>
						<li><a href=tencent://message/?uin=<?=$qq2?>&Site=一休教育网&Menu=yes title="在线咨询1"><img border="0" src=http://wpa.qq.com/pa?p=7:<?=$qq2?>:7 align="top"/></a></li>
					</ul>
				</div>
			</div>
		</div>
    </div>
    <div class="main_box03">
		<div class="main_box03_left">
			<?php
				$arr = array('87','69','70','71','72','73','74','75');
				$i = 0;
				foreach($arr as $v)
				{$i++;
			?>
			<div class="main_box03_left_box">
				<div class="main_box03_left_title">
					<dl>
						<dt><img src="/images/px_t0<?=$i?>.jpg" /></dt>
						<dd>
							<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
									<td align="right" valign="middle">
										<?php
											$res = Icolumn::model()->getAllTagsByid($v);
											$k = 0;
											foreach($res as $row){
												$k++;
												if($k!=count($res)){?>
													<a href='<?=Yii::app()->createUrl('/training/pxkclist',array('id'=>$row['ic_id']))?>'><?=$row['ic_class']?></a> |
										<?php
												}else{?>
														<a href='<?=Yii::app()->createUrl('/training/pxkclist',array('id'=>$row['ic_id']))?>'><?=$row['ic_class']?></a>
										<?php
												}
											}?>
									</td>
								</tr>
							</table>
						</dd>
					</dl>
				</div>
				<div class="main_box03_left_list" id="fk0<?=$i?>">
					<?php
						if($i) $models = Information::model()->getAllByid($v,'1','i_click desc');
						if(!empty($models)){
					?>
					
					<div class="main_box03_left_list_pic">
						<div class="main_box03_left_list_pic00">
							<?php
								foreach($models as $row){
							?>
								<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
									<tr>
										<td align="center" valign="middle"><a href="<?=Yii::app()->createUrl("training/newsview",array('id'=>$row['i_id']))?>" title="<?=$row["i_title"]?>"><img src="/admin_root/<?=$row["i_pic"]?>" border="0" align="top" onLoad="javascript:if(this.height>=146){this.width=146};"/></a></td>
									</tr>
								</table>
								<?php	}?>
						</div>
					</div>
					<div class="main_box03_left_list_text">
						<div class="main_box03_left_list_text_01">
							<dl>
								<dt id="text01"><a href="<?=Yii::app()->createUrl("training/newsview",array('id'=>$row['i_id']))?>" title="<?=$row["i_title"]?>"><?=$row["i_title"]?></a></dt>
								
								
								<dd><?=Common::strCutAndTags($row["i_con"],220)?><a href="<?=Yii::app()->createUrl("training/newsview",array('id'=>$row['i_id']))?>" title="<?=$row["i_title"]?>">[详情]</a></dd>
							</dl>
						</div>
						<div class="main_box03_left_list_text_02">
							<ul>
							<?php
								if($i) $res = Information::model()->getAllByid($v,'10','i_click desc');
								if(!empty($res)){
								foreach($res as $row){
							?>
								<li><a href="<?=Yii::app()->createUrl("training/newsview",array('id'=>$row['i_id']))?>" title="<?=$row["i_title"]?>"><?php echo Common::strCut($row["i_title"],35);?></a></li>
						<?php	}}?>       
							</ul>
						</div>
					</div>
					<?php 	}else{?>
								<div class="main_box03_left_list_pic"><div class="main_box03_left_list_pic00"></div></div>
								<div class="main_box03_left_list_text"></div>
					<?php 	}?>
				</div>
			</div>
		<?php   }?>
		</div>
		<div class="main_box03_right">
			<div class="main_box03_right_box01">
				<?=$web['z_onegg']?>
			</div>
			<div class="main_box03_right_box02">
				<div class="main_box03_right_box02_title">
					<dl><dt>培训学校推荐</dt></dl>
				</div>
				<div class="main_box03_right_box02_list">
					<div class="main_box03_right_box02_list_01_cjwt">
						<ul>
							<?php
								$criteria=new CDbCriteria;
								$criteria->order='pxs_bool desc';
								$psModel = Pxschool::model()->findAll($criteria);
								foreach($psModel as $row){
							?>
							<li><span>·</span><a href="px_school/?pid=<?=$row["pxs_id"]?>"><?=$row["pxs_name"]?></a></li>
						<?php }?>
						</ul>
					</div>
				</div>
			</div>
			<div class="main_box03_right_box01"><?=$web['z_right1']?></div>
			<div class="main_box03_right_box02">
				<div class="main_box03_right_box02_title">
					<dl>
						<dt>常见问题</dt>
						<dd><a href="<?=Yii::app()->createUrl("/training/newslist",array('id'=>136))?>">更多...</a></dd>
					</dl>
				</div>
				<div class="main_box03_right_box02_list">
					<div class="main_box03_right_box02_list_01_cjwt">
						<ul>
							<?php 
								$model = Information::model()->getAllByid(136,'10');
								foreach($model as $row){
							?>
							<li><span>·</span><a href="<?=Yii::app()->createUrl("training/newsview",array('id'=>$row['i_id']))?>"><?=Common::strCut($row['i_title'],30)?></a></li>
							<?php }?>
						</ul>
					</div>
				</div>
			</div>
			<div class="main_box03_right_box03">
				<div class="main_box03_right_box0300"><?=$web['z_right2']?></div>
			</div>
			<div class="main_box03_right_box03">
				<div class="main_box03_right_box0300"><?=$web['z_right3']?></div>
			</div>
			<div class="main_box03_right_box02">
				<?php
					$criteria=new CDbCriteria;
					$criteria->addCondition("w_downcl ='px'");
					$criteria->limit='8';
					$rs=XlAsk::model()->findAll($criteria);
				?>
				<div class="main_box03_right_box02_title">
					<dl>
						<dt>下载专区</dt>
						<dd><a href="<?=Yii::app()->createUrl("/training/pxdowlist");?>">更多...</a></dd>
					</dl>
				</div>
				<div class="main_box03_right_box02_list">
					<div class="main_box03_right_box02_list_01_cjwt">
						<ul>
							<?php
								// $criteria=new CDbCriteria;
								// $criteria->addCondition("w_downcl ='px'");
								// $criteria->limit='8';
								// $rs=XlAsk::model()->findAll($criteria);
								foreach($rs as $row){
							?>
									<li><span>*</span><a onclick="dsumXMLHttp(<?php echo $row["w_id"];?>)" href="/admin_root/<?php echo $row["w_con"];?>"><?php echo Common::strCut($row["w_title"],40);?></a></li>
						<?php	}?>
						</ul>
					</div>
				</div>
			</div>
			<div class="main_box03_right_box02">
				<div class="main_box03_right_box02_title">
					<dl>
						<dt>在线问答</dt>
						<dd><a href="<?=Yii::app()->createUrl("/training/zxwdlist")?>">更多...</a></dd>
					</dl>
				</div>
				<div class="main_box03_right_box02_list">
					<?php 
						$criteria=new CDbCriteria;
						$criteria->addCondition(" px_bool = 1 ");
						$criteria->order='px_time desc';
						$criteria->limit='4';
						$pdModel = Pxwd::model()->findAll($criteria);
						foreach($pdModel as $row){
					?>
							<div class="main_box03_right_box02_list_01">
								<ul>
									<li><span>【问】：</span><?=$row["px_ask"]?></li>
									<li><span>【答】：</span><?=$row["px_answer"]?></li>
								</ul>
							</div>
				<?php	}?>   
				</div>
			</div>
			<div class="main_box03_right_box03_bottom">
				<div class="main_box03_right_box0300"><?=$web['z_right4']?></div>
			</div>
		</div>
    </div>
 <!-- main End -->	