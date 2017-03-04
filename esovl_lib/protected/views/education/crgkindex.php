<div class="main_crgk">
    <div class="main_crgk_box01">
        <?=$this->renderPartial("topindex",array("models"=>$crgkschoolGG));?>
        <div class="main_xl_pro_box02">
            <div class="main_xl_pro_box02_title">
				<dl>
					<dt><a href="<?=Yii::app()->createUrl("/education/crgkindex")?>">成人高考</a></dt>
					<dd><a href="<?=Yii::app()->createUrl("/education/index")?>">学历教育</a></dd>
					<dd><a href="<?=Yii::app()->createUrl("/education/zxksindex")?>">自学考试</a></dd>
					<dd><a href="<?=Yii::app()->createUrl("/education/wlyxindex")?>">网络院校</a></dd>
					<dd><a href="<?=Yii::app()->createUrl("/education/gjbxindex")?>">国际办学</a></dd>
					<dd><a href="<?=Yii::app()->createUrl("/education/gxjzindex")?>">高校简章</a></dd>
					<dd><a href="<?=Yii::app()->createUrl("/education/jzsearch")?>">简章搜索</a></dd>
					<dd><a href="<?=Yii::app()->createUrl("/education/gfbindex")?>">高复班</a></dd>
				</dl>
			</div>
        	<?=$this->renderPartial("_jzsearch2");?>
        </div>
    </div>
    <div class="main_crgk_box02">
        <div class="main_crgk_box02_left">
            <div class="main_crgk_box02_left_01">
                <div class="main_crgk_box02_left_0100">
				<?php	$models=XlSF::model()->getAllByType(4,3);
						foreach($models  as $i=>$row){?>
							<div id=p<?php echo $i+1;?>>
								<a href="<?php echo $row["s_h_http"];?>" target=_blank>
									<img border='0' alt=<?php echo $row["s_h_title"];?> src="/admin_root/<?php echo $row["s_h_pic"];?>" width='298' height='160'/>
									<span style=" margin-top:5px;margin-left:100px;display:block;">
										<?php echo $row["s_h_title"];?>
									</span>
								</a>
							</div>
				<?php 	}?>                        
                </div>
            </div>
            <div class="main_crgk_box02_left_02">
            	<div class="main_crgk_box02_left_02_title">
                    <div class="main_crgk_box02_left_02_title_zi">
                        <dl>
							<dt><img src="/images/xl_title_left.png" /></dt>
							<dd>各省指南</dd>
							<dt><img src="/images/xl_title_right.png" /></dt>
                        </dl>
                    </div>
				</div>
                <div class="main_crgk_box02_left_02_list">
						
					<table border="0" cellpadding="0" cellspacing="0" valign="middle" align="center">
						<tr valign="middle" align="center">
							<td width="48" height="26" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=169">京</a> <a href="/Education/crgk/crgk_zx_detail.php?id=189">津</a></td>
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=170">河北</a></td>
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=171">山西</a></td>
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=172">内蒙古</a></td>
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=173">辽宁</a></td>
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=174">吉林</a></td>	
						<tr>
						<tr valign="middle" align="center">
							<td width="48" height="26" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=175">黑龙江</a></td>
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=176">上海</a></td>
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=177">江苏</a></td>
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=178">浙江</a></td>
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=179">安徽</a></td>
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=180">福建</a></td>	
						<tr>
							<tr valign="middle" align="center">
							<td width="48" height="26" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=181">江西</a></td>
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=182">山东</a></td>
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=183">河南</a></td>
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=184">湖北</a></td>
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=185">湖南</a></td>
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=186">广东</a></td>	
						<tr>
							<tr valign="middle" align="center">
							<td width="48" height="26" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=187">广西</a></td>
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=188">海南</a></td>  
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=190">四川</a></td>
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=191">重庆</a></td>
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=192">贵州</a></td>
							 <td width="48" height="26" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=193">云南</a></td>
						<tr>
							<tr valign="middle" align="center">   
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=194">西藏</a></td>
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=195">狭西</a></td>
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=196">甘肃</a></td>
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=197">青海</a></td>
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=198">宁夏</a></td>
							<td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="/Education/crgk/crgk_zx_detail.php?id=199">新疆</a></td>	
						<tr>
					</table>   
				</div>
            </div>
        </div>
        <div class="main_crgk_box02_center">
		<?php	// $criteria=new CDbCriteria;
				// $criteria->select='ndate';
				// $criteria->addCondition("nclass >=45 and nclass<=52  and nbool=1 ");
				// $criteria->order='ndate desc';
				$models=Information::model()->getAllByid(9,1,"i_submitdate desc",true);
				foreach($models as $model){?>
				<div class="main_crgk_box02_center_title">
					<span>更新时间：<?=date('Y-m-d',strtotime($model["i_submitdate"]))?></span>
				</div>
				<?php }?>
				<?=$this->renderPartial("_crgknews");?>
        </div>
        <div class="main_crgk_box02_right">
          	<div class="main_crgk_box02_right_01">
            	<div class="main_crgk_box02_right_01_title">
                    <span>报考指南</span>
                </div>
			   <div class="main_crgk_box02_right_01_list">
                	<ul>
                    <?php
						$models=Information::model()->getAllByLable(array("48"),21,9);
						foreach($models as $row){?>
							<li>
								<a href="<?=Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))?>" title="<?=$row["i_title"]?>">
									<?=Common::strCut($row["i_title"],12,'')?>
								</a>
							</li>
                    <?php }?> 
                    </ul>
                </div>
			</div>
            <div class="main_crgk_box02_right_02">
            	<div class="main_crgk_box02_right_02_pic">
					<a href="<?=$web->z_right1_link?>">
						<img src="/admin_root/<?=$web->z_right1?>" />
					</a>
				</div>
            </div>
        </div>
    </div>
    <div class="main_crgk_box03">
        <div class="main_crgk_box03_title">
        	<div class="main_crgk_box03_title_left">成考辅导</div>
            <div class="main_crgk_box03_title_right">
            	<dl>
					<dt><img src="/images/dng_left.jpg" width="6" height="30" /></dt>
					<dd>
					<?/*<?php	$criteria=new CDbCriteria;
							$criteria->addCondition("n_id between 53 and 62 and n_type=4");
							$models=array();//Enclass::model()->findAll($criteria);
							// $sql="select * from enclass where n_id between 53 and 62 and n_type=4";
							// $rs=mysql_query($sql);
							// $coun=mysql_num_rows($rs);
								foreach ($models as $i=>$row){
									$str=($i+1)==count($models)?"":"<span>|</span>"; ?>
									<a href="/Education/crgk/crgk_zx.php?nclass=<?php echo $row["n_id"]?>" target="_blank">
										<?php echo $row["n_class"]?>
									</a>
					<?php 			echo $str;
								}?>
					</dd>*/?>
					<dt><img src="/images/dng_right.jpg" width="6" height="30" /></dt>
                </dl>
            </div>
        </div>
        <div class="main_crgk_box03_box">
            <div class="main_crgk_box03_box_list00">
				<img src="/images/crgk_line01.jpg" />
			</div>
            <div class="main_crgk_box03_box_list">
            	<div class="main_crgk_box04_box_list_left">
                	<div class="main_crgk_box03_box_list_left_title">
						<span>历年真题</span>
						<a href="<?=Yii::app()->createUrl("education/newslist",array('id'=>47))?>">更多>></a>
					</div>
                    <div class="main_crgk_box04_box_list_left_list">
                   <?php	$models=Information::model()->getAllByLable(array("47"),8,9);
							foreach($models as $k=>$row){?>
								<dl>
									<dt <?php if($k>3){echo"id='crgk01'";}?>><?=$k+1?></dt>
									<dd>
										<a href="<?=Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))?>" title="<?php echo $row["i_title"];?>">
										<?php echo Common::strCut($row["i_title"],23)?>
										</a>
									</dd>
									<dd id="crgk00"><?=$row["i_submitdate"]?date('Y-m-d',strtotime($row["i_submitdate"])):""?></dd>
								</dl>
                    <?php 	}?>
                    </div>
                </div>
                <div class="main_crgk_box03_box_list_right">
                	<div class="main_crgk_box03_box_list_right_title" id="crgk_tb_">
                    	<ul>
                        <li id="crgk_tb_1" class="crgk_hovertab" onmousemove="crgkHoverLi(1);">高起专</li>
                        <li id="crgk_tb_2" class="crgk_normaltab" onmousemove="crgkHoverLi(2);">高起本</li>
                        <li id="crgk_tb_3" class="crgk_normaltab" onmousemove="crgkHoverLi(3);">专升本</li>
                        </ul>
                    </div>
                    <div class="main_crgk_box03_box_list_right_list">
					<?php 	$array=array("1"=>"高起专","2"=>"高起本","3"=>"专升本");
							foreach($array as $kk=>$val){?>
								<div class="crgk_dis" id="crgk_tbc_0<?=$kk?>">
									<div class="main_crgk_box03_box_list_right_list00">
										<div class="main_crgk_box03_box_list_right_list00_01">
											<dl>
											<dt>学校</dt>
											<dd style="width:108px;">专业</dd>
											<dd style="width:80px;">类别</dd>
											<dd style="width:80px;">上课类型</dd>
											<dd style="width:82px;">上课时间</dd>
											<dd style="width:54px;">学费</dd>
											<dd style="width:46px;">报名</dd>
											</dl>
										</div>
										<div class="main_crgk_box03_box_list_right_list00_02">
										<?php 	$models=Kkinfo::model()->getOtherByZyclass($val,"8");
												foreach ($models as $k=>$row1){
												?>
												<dl>
												<dt>
													<a target="_blank" href="<?=Yii::app()->createUrl("education/school",array("id"=>$row1["s_id"]))?>">
														<?=$row1->schoolinfo->s_name?>
													</a>
												</dt>
												<dd style="width:108px;">
													<span style="width:80px;">
														<a target="_blank" href="<?=Yii::app()->createUrl("education/school",array("id"=>$row1["s_id"],"type"=>"zyjs","kid"=>$row1["kid"]))?>">
															<?=$row1["zyname"]?>
														</a>
													</span>
												</dd>
												<dd style="width:80px;"><span style="width:108px;">
												  <?=$row1["zyclass"]?>
												</span></dd>
												<dd style="width:80px;"><?=$row1["kcal"]?></dd>
												<dd style="width:82px;"><?=$row1["ktime"]?></dd>
												<dd style="width:54px;"><?=$row1["xfei"]?>元</dd>
												
												<dd style="width:46px;"><a target="_blank" href="<?=Yii::app()->createUrl("education/school",array("id"=>$row1["s_id"],"type"=>"bm","kid"=>$row1["kid"]))?>"><img src="/images/crgk_bm.jpg" /></a></dd>
																				
												                               
										<?php }?>
										</div>
									</div>
								</div>
					<?php	}?>
									
                    </div>
                </div>
            </div>
			<div class="main_crgk_box03_box_list00">
				<img src="/images/crgk_line01.jpg" />
			</div>
        </div>
    </div>
    <div class="main_crgk_box03">
        <div class="main_crgk_box04_title">
        	<div class="main_crgk_box03_title_left">名校招生</div>
        </div>
        <div class="main_crgk_box03_box">
			<div class="main_crgk_box04_box_list00">
				<img src="/images/crgk_line01.jpg" />
			</div>
            <div class="main_crgk_box04_box_list">
				<div class="main_crgk_box04_box_list_left">
                    <div class="main_crgk_box03_box_list_left_title">
						<span>招生简章</span>
						<a href="<?=Yii::app()->createUrl("education/jzsearch",array())?>">更多>></a>
					</div>
                    <div class="main_crgk_box04_box_list_left_list">
					<?php	
						$criteria=new CDbCriteria;
						$criteria->limit=5;
						$criteria->with='schoolinfo';
						$criteria->addCondition("bk_id=4");
						$criteria->order='kkdate desc';
						$models=Kkinfo::model()->findAll($criteria);
						foreach ($models as $j=>$row){?>
							<dl>
								<dt <?php if($j>3){echo"id='crgk01'";}?>><?=$j+1?></dt>
								<dd>
									<a href="<?=Yii::app()->createUrl("education/school",array("id"=>$row["s_id"],"type"=>"zyjs","kid"=>$row["kid"]))?>" title="<?php echo $row['ktitle']?>">
										<?php echo $row["ktitle"]?>
									</a></dd>
								<dd id="crgk00"><?=$row["kkdate"]?></dd>
							</dl>
					<?php }?>
                    </div>
                </div>
				<div class="main_crgk_box04_box_list_right">
                <?php	$criteria=new CDbCriteria;
						$criteria->limit=6;
						$criteria->with='schoolinfo';
						$criteria->addCondition("bk_id=4");
						$criteria->order='kclick desc';
						$models=Kkinfo::model()->findAll($criteria);
						foreach ($models as $j=>$row){?>
							<div class="main_crgk_box04_box_list_right_list">
								<div class="main_crgk_box04_box_list_right_list_pic">
									<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
										<tr>
											<td align="center" valign="middle">
												<a href="<?=Yii::app()->createUrl("education/school",array("id"=>$row["s_id"]))?>">
													<img src="/admin_root/<?=$row->schoolinfo->s_logo?>" border="0" align="top"   onload="this.width=80"/>
												</a>
											</td>
										</tr>
									</table>
								</div>
								<div class="main_crgk_box04_box_list_right_list_text">
									<dl>
										<dt>学校：<span><?=$row->schoolinfo->s_name?></span></dt>
										<dt>专业：<span><?=$row["zyname"]?></span></dt>
										<dd>
											<a target="_blank" href="<?=Yii::app()->createUrl("education/school",array("id"=>$row["s_id"],"type"=>"bm","kid"=>$row["kid"]))?>">
												<img src="/images/crgk_djbm.jpg" />
											</a>
										</dd>
									</dl>
								</div>
							</div>
				<?php 	}?>                                     
                </div>
			</div>
			<div class="main_crgk_box04_box_list00">
				<img src="/images/crgk_line01.jpg" />
			</div>
		</div>
	</div>
</div>