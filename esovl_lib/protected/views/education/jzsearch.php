<div class="main_xl_pro">
    <?=$this->renderPartial("topindex",array("models"=>$gxjzschoolGG));?>
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
        <?=$this->renderPartial("_jzsearch");?>
    </div>
    	<div class="main_xl_pro_box03">
        	<div class="main_xl_pro_box03_left">
            	<div class="main_xl_pro_box03_left_01">
                	<ul>
						<li><a href="#">所有分类</a></li>
						<li><a href="#">学历</a></li>
						<?php
						$url="/education/jzsearch";
						$sshow="";
						// $str_sid='';
							if(isset($_GET["sschool"])&&$_GET["sschool"]){
									$row=School::model()->find("s_id='{$_GET["sschool"]}'");
									 $sshow=$row["s_name"]." > ";
								// $str_sid=" s_id='{$_GET["sschool"]}' and ";	 
							}
							if(isset($_GET["szyclass"])&&$_GET["szyclass"]){$sshow.=$_GET["szyclass"]." > ";}
							if(isset($_GET["szyname"])&&$_GET["szyname"]){$sshow.=$_GET["szyname"]." > ";}
							if(isset($_GET["skey"])&&!$_GET["skey"]){$sshow.=$_GET["skey"];}
						?>
						<li>搜索条件：<?php echo $sshow;?></li>
                    </ul>
                </div>
                <div class="main_xl_pro_box03_left_02">
                	<div class="main_xl_pro_box03_left_02_title">按条件选择</div>
						<div class="main_xl_pro_box03_left_02_list">
							<?php foreach($xfeiArr as $key=>$val){?>
							<input <?=isset($_GET['xfei'])&&$_GET['xfei']==$key?"checked='checked'":""?> type="checkbox"   onclick="window.location.href='<?=Yii::app()->createUrl($url,array("xfei"=>$key))?>'"/>
							<?=$val?><br />
							<?php }?>
							
						</div>
                </div>
                <div class="main_xl_pro_box03_left_03">
                	<div class="main_xl_pro_box03_left_03_b01">
                    	<div class="main_xl_pro_box03_left_03_b01_left">
                        	<ul>
								<li>
									<label>排序：</label>
									<select name="" onchange="location.href=this.options[this.selectedIndex].value">
										<?php 
											$get=$options=$_GET;
											unset($options['order']);
											?>
										<option value='<?=Yii::app()->createUrl($url,$options)?>' >默认价格</option>
										<option <?=isset($get['order'])&&$get['order']=="xfu"?"selected='selected'":""?> <?php $options['order']='xfu';?> value="<?=Yii::app()->createUrl($url,$options)?>">价格从低到高</option>
										<option <?=isset($get['order'])&&$get['order']=="xfd"?"selected='selected'":""?> <?php $options['order']='xfd';?> value="<?=Yii::app()->createUrl($url,$options)?>">价格从高到低</option>
									</select>
								
								</li>
							<?php
								if(isset($get['order']) && $get['order'] == "xfu") {
									$options['order']='xfd';
									$img = "/images/jg_bg01.jpg";
								}else if (isset($get['order']) && $get['order'] == "xfd") {
									$img = "/images/jg_bg02.jpg";
									unset($options['order']);
								}else {
									$img = "/images/jg_bg00.jpg";
									$options['order']='xfu';
								}?>
								<li><a href="<?php echo Yii::app()->createUrl($url,$options) ?>" ><img  src='<?=$img?>'/></a></li>
                            </ul>
                        </div>
								<?php
								$jzmodels=$dataProvider->getData();
								 echo "<div style='float:right; height:20px; padding-top:10px;'>";
									$this->widget('CYixiuLinkPager',array(
									'pages'=>$dataProvider->pagination,
									"htmlOptions"=>array("style"=>"float:right","class"=>"yixiuPage",),
									"nextPageLabel"=>"下一页",
									"prevPageLabel"=>"上一页",
									"cssFile"=>"/css/otherPageLink.css",
									));
								echo "</div>";
								?>
								</div>
					<div class="main_xl_pro_box03_left_03_b02">
						<?php
							foreach($jzmodels as $row) {
								// print_r($row);
									// $this->renderPartial('_view', array(
											// 'data'=>$data,
									// ));
						?>
										<div class="main_xl_pro_box03_left_03_b02_list" onmouseover="this.style.background='#f9f9f9'" onmouseout="this.style.background='#fff'" >
											<table width="724" height="186" border="0" cellspacing="0" cellpadding="0">
											  <tr height="35">
												<td colspan="5"><strong><a target="_blank" href="<?=Yii::app()->createUrl("education/school",array("id"=>$row->s_id))?>"><?php echo $row->schoolinfo->s_name?></a> －－ <span><a target="_blank" href="<?=Yii::app()->createUrl("education/school",array("id"=>$row->s_id,"type"=>"zyjs","kid"=>$row->kid))?>"><?php echo $row["ktitle"]?>(<?php echo $row["zyclass"]?>)</a></span></strong></td>
												</tr>
											  <tr height="50">
												<td align="center" valign="top" width="12%"><strong>专业介绍：</strong></td>
												<td colspan="3" valign="top"><span title="<?php echo Common::strTags($row["zycon"]);?>"><?php echo Common::strCutAndTags($row["zycon"],340);?></span></td>
												<td><a target="_blank" href="<?=Yii::app()->createUrl("education/school",array("id"=>$row->s_id,"type"=>"zyjs","kid"=>$row->kid))?>">查看招生简章>></a></td>
												</tr>
											  <tr height="30">
												<td align="center" valign="top"><strong>专业类别：</strong></td>
												<td width="19%" valign="top"><?php echo $row["zyclass"];?></td>
												<td align="center" valign="top" width="12%"><strong>课程时间：</strong></td>
												<td colspan="2" valign="top"><?php echo $row["ktime"];?></td>
												</tr>
											  <tr height="30">
												<td align="center" valign="top"><strong>学&nbsp;&nbsp;&nbsp;费：</strong></td>
												<td valign="top"><?php echo $row["xfei"];?>元/年</td>
												<td align="center" valign="top"><strong>专业名称：</strong></td>
												<td width="43%" valign="top"><?php echo $row["zyname"];?></td>
												<td width="14%"><a target="_blank" href="<?=Yii::app()->createUrl("education/school",array("id"=>$row->s_id,"type"=>"wd","kid"=>$row->kid))?>">我要咨询>></a></td>
											  </tr>
											  <tr height="30">
												<td align="center" valign="top"><strong>上课类型：</strong></td>
												<td valign="top"><?php echo $row["kcal"];?></td>
												<td align="center" valign="top"><strong>开班日期：</strong></td>
												<td valign="top"><?php echo $row["kdate"];?></td>
												<td><a target="_blank" href="<?=Yii::app()->createUrl("education/school",array("id"=>$row->s_id,"type"=>"bm","kid"=>$row->kid))?>">网上报名>></a></td>
											  </tr>
											</table>
										</div>
								<?php
								}
								?>                     
					</div>
						<div class="main_xl_pro_box03_left_03_b03">
						 <?php
									$this->widget('CLinkPager',array(
											'pages'=>$dataProvider->pagination,
											"cssFile"=>"/css/pager.css"
									));
									?>
						</div>
                </div>
            </div>
            <div class="main_xl_pro_box03_right">
            	<div class="main_xl_pro_box03_right_box00">
					<div class="main_box01_right_01_pr">
						<ul>
						<?php foreach ($kefu as $val){?>
							<li><a href="tencent://message/?uin=<?=$val['number']?>&Site=<?=$this->pageTitle?>&Menu=yes" title="<?=$val['name']?>"><img border="0" src=http://wpa.qq.com/pa?p=1:<?=$val['number']?>:1 align="top"/></a></li>
						<?php }?>
						</ul>
					</div>
                </div>
            	<div class="main_xl_pro_box03_right_box01">
                	<div class="main_xl_pro_box03_right_box01_title">热点推荐</div>
                    <div class="main_xl_pro_box03_right_box01_list">
					<ul>
                    <?php	$criteria=new CDbCriteria;
							$criteria->limit='5';
							$criteria->addCondition('xx_bool=1');
							$xxmodels=Xxtj::model()->findAll($criteria);
							foreach($xxmodels as $row){?>
								<li><a href="<?php echo $row["xx_http"]?>" target="_blank"><?php echo $row["xx_name"]?></a></li>
					<?php	}?>
					  </ul>
                    </div>
                </div>
                <div class="main_xl_pro_box03_right_box01">
                	<div class="main_xl_pro_box03_right_box01_title">你浏览过的学校</div>
				<div class="main_xl_pro_box03_right_box01_list">
				<ul>
				<?php
				/*
					if(isset($_SESSION["kkid"])){
					$cstr=substr(@$_SESSION["kkid"],1);
					//echo $cstr;
					$sql="select * from kkinfo where kid in (".$cstr.")";
					$rs=mysql_query($sql);
					if (mysql_num_rows($rs)>=1){
					while ($row=mysql_fetch_assoc($rs)){
					$rs1=mysql_query("select s_name from school where s_id=".$row["s_id"]);
					$row1=mysql_fetch_assoc($rs1);
				?>
				<li><a href="/Education/xl_pro_detail.php?kid=<?php echo $row["kid"];?>&sid=<?php echo $row["s_id"];?>"><?php echo $row1["s_name"];?></a></li>
				<?php }}}*/
				?>
				</ul>
				</div>
                </div>
                
            </div>
        </div>
    
    </div>