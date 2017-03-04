
<div class="main_xl_detail_box03">
    <div class="main_xl_detail_box03_main">
        <div class="main_xl_detail_box03_main_left">
            <div class="main_xl_detail_box03_main_left_box1">
				<?php echo nl2br($model->s_xyjs);?>
            </div>
			<a id="bxys">&nbsp;</a>
            <div class="main_xl_detail_box03_main_left_box2">
				<div class="main_xl_detail_box03_main_left_box2_title"><span>办校优势</span></div>
                <div class="main_xl_detail_box03_main_left_box2_text">
					<?php echo $model->s_bxys;?>                    	
				</div>
            </div>
            <a id="zsdx">&nbsp;</a>
            <div class="main_xl_detail_box03_main_left_box2">
              	<div class="main_xl_detail_box03_main_left_box2_title"><span>招生对象</span></div>
                <div class="main_xl_detail_box03_main_left_box2_text">
					<?php echo $model->s_zsdx;?>                       	
                </div>
            </div>
			<a id="zyjs">&nbsp;</a>
            <div class="main_xl_detail_box03_main_left_box2">
            	<div class="main_xl_detail_box03_main_left_box2_title"><span>专业课程</span></div>
                <div class="main_xl_detail_box03_main_left_box2_text">
					<table width="590" border="1" cellpadding="1" cellspacing="1" style="color:#333;">
						<tr align="center" valign="middle">
							<td width="84">专业名称</td>
							<td width="193">开班名称</td>
							<td width="72">类别</td>
							<td width="44">学制</td>
							<td width="79">学制类别</td>
							<td width="38">学费</td>
							<td width="64">&nbsp;</td>
						</tr>
						<?php 	$kkinfoModels=Kkinfo::model()->findAll("s_id= '{$model->s_id}'");
								foreach($kkinfoModels as $row){?>
									<tr align="center" valign="middle">
										<td>
											<span>
												<a href="<?=Yii::app()->createUrl("education/school",array("id"=>$_GET['id'],"type"=>"zyjs","kid"=>$row["kid"]))?>">
													<?php echo $row["zyname"];?>
												</a>
											</span>
										</td>
										<td><?php echo $row["ktitle"];?></td>
										<td><?php echo $row["zyclass"];?></td>
										<td><?php echo $row["ktime"];?></td>
										<td><?php echo $row["kcal"];?></td>
										<td><?php echo $row["xfei"];?></td>
										<td>
											<a href="<?=Yii::app()->createUrl("education/school",array("id"=>$_GET['id'],"type"=>"bm","kid"=>$row["kid"]))?>">
												网上报名>>
											</a>
										</td>
									</tr>
						<?php 	}?>
					</table>
				</div>
			</div>
			<?=$this->renderPartial("_schoolwdfrom",array("model"=>$model));?>
        </div>
		<?=$this->renderPartial("_schoolright",array("model"=>$model));?>
    </div>
 </div>

