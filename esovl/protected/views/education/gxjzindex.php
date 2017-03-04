<script>
<!--
var ss=0;
function left_menu(meval)
{
  var left_n=document.getElementById(meval);
  
  if (left_n.style.display=='none')//js 中等于和赋值是不一样的号
  { left_n.style.display='';}
  else  
  { left_n.style.display='none';}
 
}
-->
<!--
var pp=0;
function opc(me)
{ 
 
 if (document.getElementById(me).innerHTML=='打开↓'){
     document.getElementById(me).innerHTML='收起↑';
     }else{
    document.getElementById(me).innerHTML='打开↓';
 }
 
}
-->
</script>
<div class="main_xl_pro">
    <?=$this->renderPartial("topindex",array("models"=>$gxjzschoolGG));?>
    <div class="main_xl_pro_box02">
        <div class="main_xl_pro_box02_title">
            <dl>
                <dt><a href="<?=Yii::app()->createUrl("/education/gxjzindex")?>">高校简章</a></dt>
           	    <dd><a href="<?=Yii::app()->createUrl("/education/index")?>">学历教育</a></dd>
                <dd><a href="<?=Yii::app()->createUrl("/education/zxksindex")?>">自学考试</a></dd>
                <dd><a href="<?=Yii::app()->createUrl("/education/wlyxindex")?>">网络院校</a></dd>
                <dd><a href="<?=Yii::app()->createUrl("/education/crgkindex")?>">成人高考</a></dd>
                <dd><a href="<?=Yii::app()->createUrl("/education/gjbxindex")?>">国际办学</a></dd>
                <dd><a href="<?=Yii::app()->createUrl("/education/jzsearch")?>">简章搜索</a></dd>
                <dd><a href="<?=Yii::app()->createUrl("/education/gfbindex")?>">高复班</a></dd>
            </dl>                            
        </div>
		<?=$this->renderPartial("_jzsearch");?>
	</div>
    <div class="main_xl_gxjz">
        <div class="main_xl_gxjz_left">
           	<div class="main_xl_gxjz_left_box">
                <div class="main_xl_gxjz_left_box_title">
                    <div class="main_xl_detail_box03_main_right_box2_title_gxjz01">
                        <div class="main_xllb_box01_left_list02_box1_title_zi_xx_gxjz01">
                            <dl>
								<dt><img src="/images/xl_title_left.png"></dt>
								<dd>按学校分类</dd>
								<dt><img src="/images/xl_title_right.png"></dt>
                            </dl>
                        </div>
                    </div>
                </div>
				<?php	$xlbkmodels=Xlbk::model()->findAll();
						foreach($xlbkmodels as $row){?>
							<div class="main_xl_gxjz_left_box_list">
								<a href="javascript:void(null)" onclick="javascript:left_menu('<?php echo $row["bk_id"];?>');opc('p<?php echo $row["bk_id"];?>');">
									<div class="main_xl_gxjz_left_box_list_title">
										<dl>
											<dt><img src="/images/dou_l.jpg" /><?php echo $row["bk_title"];?></dt>
											<dd><span id="p<?php echo $row["bk_id"];?>">打开↓</span></dd>
										</dl>
									</div>
								</a>
								<div class="main_xl_gxjz_left_box_list_box00" id="<?php echo $row["bk_id"];?>" style="display:none;">
								<?php 	$criteria=new CDbCriteria;
										$criteria->select="t.s_id";
										$criteria->group=" t.s_id";
										$criteria->with='schoolinfo';
										$criteria->addCondition(" bk_id='{$row["bk_id"]}'");
										$models=Kkinfo::model()->findAll($criteria);
										foreach  ($models as $row1){
											$Kkinfos=Kkinfo::model()->findAll("s_id='{$row1["s_id"]}' and bk_id='{$row["bk_id"]}'");
											$rw8=$Kkinfos[0];?>
											<div class="main_xl_gxjz_left_box_list_box00_list">
												<h1><img src="/images/dot_l_s.jpg" width="8" height="7" /><a href="/Education/xl_pro_detail.php?kid=<?php echo $rw8["kid"];?>&sid=<?php echo $row1["s_id"];?>"><font color="#3C82C0"><?php echo $row1->schoolinfo->s_name?></font></a></h1>
												<ul>
												<?php	foreach ($Kkinfos as $kk=>$rowp){?>
															<li>·<a href="/Education/xl_pro_zyjs.php?kid=<?php echo $rowp["kid"];?>&sid=<?php echo $rowp["s_id"];?>" title="<?php echo $rowp["ktitle"];?>">[<?php echo $rowp["zyclass"];?>]<?php echo $rowp["zyname"];?></a></li>
												<?php 	}?>
												</ul>
											</div>
								<?php 	}?>
								</div>
							</div>
				<?php 	}?>  
            </div>
        </div>
        <div class="main_xl_gxjz_right">
            <div class="main_xl_gxjz_left_box">
            	<div class="main_xl_gxjz_left_box_title">
                	<div class="main_xl_detail_box03_main_right_box2_title_gxjz01">
                        <div class="main_xllb_box01_left_list02_box1_title_zi_xx_gxjz01">
                            <dl>
                            <dt><img src="/images/xl_title_left.png"></dt>
                            <dd>按专业分类</dd>
                            <dt><img src="/images/xl_title_right.png"></dt>
                            </dl>
                        </div>
                    </div>
                </div>			 
				<?php	foreach($xlbkmodels as $row){?>
							<div class="main_xl_gxjz_left_box_list">
								<a href="javascript:void(null)" onClick="javascript:left_menu('z_<?php echo $row["bk_id"];?>');opc('b<?php echo $row["bk_id"];?>');">
									<div class="main_xl_gxjz_left_box_list_title">
										<dl>
											<dt><img src="/images/dou_l.jpg" /><?php echo $row["bk_title"];?></dt>
											<dd><span id="b<?php echo $row["bk_id"];?>">打开↓</span></dd>
										</dl>
									</div>
								</a>
								<div class="main_xl_gxjz_left_box_list_box00" id="z_<?php echo $row["bk_id"];?>" style="display:none">                      	
								<?php 	$criteria=new CDbCriteria;
										$criteria->select="t.zyname";
										$criteria->group=" t.zyname";
										$criteria->with='schoolinfo';
										$criteria->addCondition(" bk_id='{$row["bk_id"]}'");
										$models=Kkinfo::model()->findAll($criteria);
										foreach ($models as $rowa){?>
											<div class="main_xl_gxjz_left_box_list_box00_list">
												<h1><img src="/images/dot_l_s.jpg" width="8" height="7" /><?php echo $rowa["zyname"];?></h1>
												<ul>
												<?php	$Kkinfos=Kkinfo::model()->findAll("zyname='{$rowa["zyname"]}' and bk_id='{$row["bk_id"]}'");
														foreach  ($Kkinfos as $rowb){
															$rw=School::model()->find("s_id ='{$rowb["s_id"]}' ");?>
															<li>·<a href="/Education/xl_pro_zyjs.php?kid=<?php echo $rowb["kid"];?>&sid=<?php echo $rowb["s_id"];?>" title="<?php echo $rowb["ktitle"];?>(<?php echo $rowb["zyclass"];?>)">[<?php echo $rw["s_name"];?>]<?php echo $rowb["ktitle"];?>(<?php echo $rowb["zyclass"];?>)</a></li>
												<?php	}?>
												</ul>
											</div>
								<?php 	}?>
								</div>
							</div>
				<?php 	}?>
            </div>
        </div>
    </div>
</div>