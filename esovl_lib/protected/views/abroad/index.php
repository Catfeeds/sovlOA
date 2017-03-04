 <div class="banner">
	<?php 	
		$web=WebStep::model()->findByPk(12);
	?>
      <?=$web->z_banner?>
      </div>
      <div class="main_box01">
        <div class="main_box01_left">
          <div class="png"><img src="/images/hot.png" /></div>
          <div class="main_box01_left_00">
            <div class="main_box01_left_l">
              <ul>
                <?php
					/*
					$criteria = new CDbCriteria;
					$criteria->addCondition('ic_pid=24');
					$criteria->select = "ic_class";
					$criteria->limit = 8;
					$res = Icolumn::model()->findAll($criteria);*/
					$icolumn = new Icolumn;
					$res = $icolumn->getAllTagsByid(24,'',8,false);					
					foreach($res as $k=>$row){
						if($k==1){echo"<li class='hd_bg'>".$row["ic_class"]."</li>";}else{echo"<li>".$row["ic_class"]."</li>";}
					}
				?>
              </ul>
            </div>
            <div class="main_box01_left_r">
              <div class="hot">
    <?php 
	/* $criteria=new CDbCriteria;
	$criteria->addCondition('ic_pid=24');
	$criteria->limit='8';						
	$res1 = Icolumn::model()->findAll($criteria); */
	$res1 = $icolumn->getAllTagsByid(24,'',8,false);	
	 //$res1 = $dblink->findAll('lxgjclass','','','','8');
		$i=0;
	    foreach($res1 as $row7){
		$i=$i+1;   
		    if($i>1){echo "<div class='hide'>";}
	?>
                <div class="main_box01_left_r00">
                  <dl>
                    <dt>
                      <?=$row7["ic_class"]?>留学资讯</dt>
						<?php
							//$rs8=mysql_query("select * from lxnews where lx_gjcl=".$row7["lx_gjid"]." limit 6",$conn);
							/* $criteria=new CDbCriteria;
							$criteria->addCondition("i_class=".$row7["ic_id"]);
							$criteria->limit='6';						
							$res2 = Information::model()->findAll($criteria); */
							$information = new Information;
							$res2 = $information->getAllByLable(array($row7["ic_id"]),6);
							foreach($res2 as $row8){		                       
						?>
                    <dd>·<a href="<?=Yii::app()->createUrl("abroad/newsdetail",array("id"=>$row8["i_id"]))?>"><?=$row8["i_title"]?></a></dd>
                    <?php }?>
                  </dl>
                  <dl>
                    <dt><?=$row7["ic_class"]?>重点推荐</dt>
                    
                    <?php
	                        //$rs_8=mysql_query("select * from lxkkinfo where lxk_gjid=".$row7["lx_gjid"]." limit 6",$conn);	
							$criteria=new CDbCriteria;
							$criteria->addCondition("lxk_gjid=".$row7["ic_id"]);
							$criteria->limit='6';						
							$res3 = Lxkkinfo::model()->findAll($criteria);
							foreach($res3 as $row_8){		                       
	                           ?>
                    <dd>·<a href="<?=Yii::app()->createUrl('abroad/lxcourse',array('kid'=>$row_8["lxk_id"]));?>"><?=$row_8["lxk_title"]?></a></dd>
                    <?php }?>
                  </dl>
                </div>
                <?php 
						if($i>1){echo "</div>";}
						}				
						?>?>
              </div>
            </div>
          </div>
        </div>
        <div class="main_box01_cen">
          <div class="main_box01_cen_flash"><?=$this->renderPartial("_lxpic");?>
          </div>
          <div class="main_box01_cen_list">
            <?php 
				/* $criteria = new CDbCriteria;
				$criteria->addCondition("i_label = 24");
				$row9 = Information::model()->find($criteria); */
				$res = $information->getAllByPid(4,1,"i_id asc");
				$row9 = $res[0];
			    if ($row9 != ''){								   
	                          
				?>
            <h1><a href='<?=Yii::app()->createUrl("abroad/newsdetail",array("id"=>$row9["i_id"]));?>'>
              <?=$row9["i_title"]?>
            </a></h1>
            <p class='main_box01_cen_list_text'>
              <?=strip_tags(Common::strCut($row9["i_con"],130))?>
             <a href='<?=Yii::app()->createUrl("abroad/newsdetail",array("id"=>$row9["i_id"]));?>'>[阅读全文]</a></p>
            <?php }?>
            <ul>
              <?php 
				/* $criteria = new CDbCriteria;
				$criteria->addCondition("i_label = 24");
				$criteria->limit = 5;
				$criteria->offset = 1;
				$res = Information::model()->findAll($criteria); */
				$res = $information->getAllByPid(4,5,'','',1);
				foreach($res as $row10){								  
			  ?>
              <li>·<a href="<?=Yii::app()->createUrl("abroad/newsdetail",array("id"=>$row10["i_id"]));?>">
              <?=$row10["i_title"]?>
                </a><span>
                <?=date("Y-m-d", strtotime($row10["i_submitdate"]));?>
                </span></li>
              <?php }?>
            </ul>
          </div>
        </div>
        <div class="main_box01_right">
          <div class="main_box01_right_01">
            <ul>
              <?php 
					$lx_qq = explode(",",$web->z_qq);
					$qcount = count($lx_qq);
                    if($qcount>2){
					    for ($i=0;$i<=1;$i++){
						echo "<li><a title='在线咨询1' href='tencent://message/?uin=".$lx_qq[$i]."&amp;Site=一休教育网&amp;Menu=yes'><img border='0' align='top' src='http://wpa.qq.com/pa?p=1:".$lx_qq[$i].":1'></a></li>";
						}
					}else{
						for ($i=0;$i<=$qcount-1;$i++){
						echo "<li><a title='在线咨询1' href='tencent://message/?uin=".$lx_qq[$i]."&amp;Site=一休教育网&amp;Menu=yes'><img border='0' align='top' src='http://wpa.qq.com/pa?p=1:".$lx_qq[$i].":1'></a></li>";
						}
						}
			  ?>
            </ul>
          </div>
          <div class="main_box01_right_02">
            <div class="main_box01_right_02_box">
              <div class="main_box01_right_02_box01">&nbsp;</div>
              <div class="main_box01_right_02_box02">
                <ul>
                  <?php	
					/* $criteria = new CDbCriteria;
					$criteria->addCondition('i_bool=1');
					$criteria->addCondition("i_label = 24");
					$criteria->limit = 5;
					$res = Information::model()->findAll($criteria); */
					$res = $information->getAllByPid(4,5,'',true);
					foreach($res as $k=>$row11){
?>
                  <li><span><?=$k+1?>.</span><a href="<?=Yii::app()->createUrl("abroad/newsdetail",array("id"=>$row11["i_id"]));?>" title="<?=$row11["i_title"]?>"><?=$row11["i_title"]?></a></li>
                  <?php }?>
                </ul>
              </div>
              <div class="main_box01_right_02_box03"><img src="/images/lx_bottom.jpg" /></div>
            </div>
          </div>
        </div>
      </div>
      <div class="banner">
        <?=$web->z_onegg?>
      </div>
      <div class="main_box01">
        <div class="main_box02_left">
          <div class="main_xllb_box01_left_list02_box1_title">
            <div class="main_xllb_box01_left_list02_box1_title_zi">
              <dl>
                <dt><img src="/images/lx_title_left.png" /></dt>
                <dd>名校推荐</dd>
                <dt><img src="/images/lx_title_right.png" /></dt>
              </dl>
            </div>
          </div>
          <div class="main_box02_left_text">
            <div class="main_box02_left_text_list">            
			 <?php 	
				$criteria = new CDbCriteria;
				$criteria->addCondition('lxs_tjbool=1');
				$row11 = Lxschool::model()->find($criteria);
				if($row11 != ''){
			?>
			  <div class="main_box02_left_text_list_pic" onmouseover="this.style.border='1px solid #85A9FF'" onmouseout="this.style.border='1px solid #fff'">
				<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
				  <tr>
					<td align="center" valign="middle"><a href="<?=Yii::app()->createUrl('abroad/lxabroad',array('sid'=>$row11["lxs_id"]))?>"><img src="/admin_root/<?=$row11["lxs_logo"]?>" border="0" align="top"/></a></td>
				  </tr>
				</table>
			  </div>
			  <dl>
				<dt><a href="<?=Yii::app()->createUrl('abroad/lxabroad',array('sid'=>$row11["lxs_id"]))?>"><?=$row11["lxs_name"]?></a></dt>
				<dd><?=Common::strCut($row11["lxs_xxjs"],70)?>....</dd>
			  </dl>
						  
			   <?php }?>           
            </div>
            <ul>
            <?php
			$criteria = new CDbCriteria;
			$criteria->addCondition('lxs_tjbool=1');
			$criteria->limit = 6;
			$criteria->offset = 1;
			$res = Lxschool::model()->findAll($criteria);
            foreach($res as $row_1){
            ?>
            <li>>> <a href="<?=Yii::app()->createUrl('abroad/lxabroad',array('sid'=>$row_1["lxs_id"]))?>"><?=$row_1["lxs_name"]?></a><span> 2011-01-06</span></li>
            <?php }?>
            </ul>
          </div>
        </div>
        <div class="main_box02_cen">
          <div class="main_box02_cen_title">
            <dl>
              <dt>面试讲座</dt>
              <dd>
                <ul>
                  <?php
		$vcolumn = new Vcolumn;
		$res = $vcolumn->getAllTagsByid(6,true,'7');
		$k=0;
	    foreach($res as $row){
		$k=$k+1;
		    if($k==1){echo"<li class='daqian'>".$row["vc_class"]."</li>";}else{echo"<li>".$row["vc_class"]."</li>";}		    
		}
	?>
                </ul>
              </dd>
            </dl>
          </div>
          <div class="main_box02_cen_list">
            <div class="tab_box00">
              <?php 
     //$sql="select lx_gjid,lx_gjcl from lxgjclass where lx_gjtj=1 limit 7";
		$res = $vcolumn->getAllTagsByid(6,true,'7');
	 //$rs=mysql_query($sql,$conn);
		$k=0;
	    foreach($res as $row){
		$k=$k+1;
		   if($k!=1){echo"<div class='hide'>";}
	 ?>
              <div class="main_box02_cen_list00">
                <div class="main_box02_cen_list_01">
                  <?php                 
					$vinformation = new Vinformation;
					//$criteria->addCondition("lx_gjcl=".$row["ic_id"]);
					//$criteria->addCondition("lx_ncl='msjz'");
					$row001 = $vinformation->getAllByLable(array($row['vc_id']),1,'','vi_id asc');
					$row01 = $row001[0];
				 //$row01 = $dblink->find('lxnews','',"lx_gjcl=".$row["lx_gjid"]." and lx_ncl='msjz'",'','1');
                 if($row01 != ''){                   
                 ?>
                  <div class="main_box02_cen_list_01_pic">
                    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
                      <tr>
                        <td align="center" valign="middle"><img src="/admin_root/<?=$row01["vi_pic"]?>" border="0" align="top" /></td>
                      </tr>
                    </table>
                  </div>
                  <div class="main_box02_cen_list_01_text">
                    <h1><a href="lx_news_detail.php?id=<?=$row01["vi_id"]?>">
                      <?=$row01["vi_title"]?>
                    </a></h1>
                    <p>
                      <?=strip_tags(Common::strCut($row01["vi_con"],150))?>
					  <a href="<?=Yii::app()->createUrl("abroad/vnewsdetail",array("id"=>$row01["vi_id"]));?>">[查看详细]</a></p>
                  </div>
                  <?php }?>
                </div>
                <div class="main_box02_cen_list_02">
                  <div class="main_box02_cen_list_02_title">
                    <dl>
                      <dt>讲座标题</dt>
                      <dd>讲座日期</dd>
                      <dd>发布日期</dd>
                    </dl>
                  </div>
                  <div class="main_box02_cen_list_02_text">
                    <?php
				 //$res2 = $dblink->findAll('lxnews','',"lx_gjcl=".$row["lx_gjid"]." and lx_ncl='msjz'",'','1,5');
					$res2 = $vinformation->getAllByLable(array($row['vc_id']),5,'','vi_id asc','',1);
                 foreach($res2 as $row02){                   
                 ?>
                    <dl>
                      <dt><a href="<?=Yii::app()->createUrl("abroad/vnewsdetail",array("id"=>$row02["vi_id"]));?>">
                        <?=$row02["vi_title"]?>
                      </a></dt>
                      <dd><span>
                        <?=$row02["vi_jzdate"]?>
                      </span></dd>
                      <dd>
                        <?=date("Y-m-d", strtotime($row02["vi_submitdate"]));?>
                      </dd>
                    </dl>
                    <?php }?>
                  </div>
                </div>
              </div>
              <?php if($k!=1){echo"</div>";}}?>
            </div>
          </div>
        </div>
        <div class="main_box02_right">
          <div class="main_box02_right_title">
            <dl>
              <dt>海外生活</dt>
              <dd><a href="<?=Yii::app()->createUrl("abroad/newslist",array("cl"=>122));?>">更多>></a></dd>
            </dl>
          </div>
          <div class="main_box02_right_list">
            <?php 
				 //$row11 = $dblink->find('lxnews','',"lx_ncl='hwsh' and lx_npic<>''",'','1','lx_ndate desc');
				 $row11 = $information->getOneById(122);
                 if($row11 != ''){  
					$tmp_id=$row11["i_id"];
                 ?>
            <dl>
              <dt><a href="<?//=$row11["lx_nsp"]?>"><img src="admin_root/<?=$row11["i_pic"]?>" border="0" /></a></dt>
              <dd><a href="<?=Yii::app()->createUrl("abroad/newsdetail",array("id"=>$row11["i_id"]));?>">
                <?=$row11["i_title"]?>
              </a></dd>
            </dl>
            <?php }?>
            <ul>
              <?php
					// $criteria = new CDbCriteria;
					// $criteria->addCondition("lx_ncl='hwsh'");
					// $criteria->addCondition("lx_nid<>".$tmp_id);
					// $criteria->limit = 5;
					// $criteria->offset = 0;
					// $criteria->order = "lx_ndate desc";					
					$res = $information->getNeedById(122,array($tmp_id),5);
				 //$res = $dblink->findAll('lxnews','',"lx_ncl='hwsh' and lx_nid<>".$tmp_id,'','0,5','lx_ndate desc');
                 foreach($res as $row12){                   
                 ?>
              <li><a href="<?=Yii::app()->createUrl("abroad/newsdetail",array("id"=>$row12["i_id"]));?>" title="<?=$row12["i_title"]?>">
                <?=Common::strCut($row12["i_title"],28)?>
              </a></li>
              <?php }?>
            </ul>
          </div>
        </div>
      </div>
      <div class="main_box">
        <div class="main_box_left">
          <div class="main_box_left00">
            <div class="main_box_left00_title">
              <dl>
                <dt><span class="color01">视点</span><span class="color02">·</span><span class="color03">专题</span></dt>
                <dd>专家免费咨询热线：<?=$web->z_tel?></dd>
              </dl>
            </div>
            <div class="main_box_left00_list">
              <div class="main_lm">
                <div class="main_lm_title">
                  <dl>
                    <dt>留学宝典</dt>
                    <dd><a href="<?=Yii::app()->createUrl("abroad/newslist",array("cl"=>124));?>">更多>></a></dd>
                  </dl>
                </div>
                <div class="main_lm_list">
                  <div class="main_lm_list_t">
                    <ul>
                 <?php 
					/* $criteria = new CDbCriteria;
					$criteria->addCondition('lb_id=1');
					$criteria->limit = 5;
					$criteria->offset = 0;
					$criteria->order = 'ls_id asc';
					$res = Lxsclass::model()->findAll($criteria); */
					$res = $icolumn->getAllTagsByid(124,'',5);
					//$res = $dblink->findAll('lxsclass','','lb_id=1','','0,5','ls_id asc');
                					
                    foreach($res as $k=>$row12){
                 ?>                    
                      <li <?php if($k==0){echo "class='hd'";}?>><a href="#"><?=$row12["ic_class"]?></a></li>
                 <?php }?>
                    </ul>
                  </div>
                  <div class="tab_box">
                       <?php
						$res3 = $icolumn->getAllTagsByid(124,'',5);
				 //$res3 = $dblink->findAll('lxsclass','','lb_id=1','','0,5','ls_id asc');                 
               		$k=0;
                    foreach($res3 as $row13){
					$k=$k+1;
					$tsid=$row13["ic_id"];
					   if($k!=1){echo "<div class='hide'>";}
                       ?>                 
                                <div class="main_lm_list_l">                                
                                <?php
								/* $criteria = new CDbCriteria;
								$criteria->addCondition('lx_sdscl='.$tsid);
								$criteria->limit = 7;
								$criteria->offset = 0;
								$criteria->order = 'lx_sdid asc';
								$res4 = Lxsdnews::model()->findAll($criteria); */
								//$res4 = $dblink->findAll('lxsdnews','','lx_sdscl='.$tsid,'','0,7','lx_sdid asc');
                                $res4 = $information->getAllByLable(array($tsid),7,'',"i_id asc");
					            foreach($res4 as  $row14){					     					            
                                ?>                               
                                  <dl>
                                    <dt><span>·</span><a href="<?=Yii::app()->createUrl("abroad/newsdetail",array("id"=>$row14["i_id"]));?>"><?=$row14["i_title"]?></a></dt>
                                    <dd><?=date("Y-m-d", strtotime($row14["i_submitdate"]));?></dd>
                                  </dl>  
                                <?php }?>
                                </div>
                    <?php 
					  if($k!=1){echo "</div>";}
					}?>
                  </div>
                </div>
              </div>
              <div class="main_lm">
                <div class="main_lm_title">
                  <dl>
                    <dt>留学考试</dt>
                    <dd><a href="<?=Yii::app()->createUrl("abroad/newslist",array("cl"=>125));?>">更多>></a></dd>
                  </dl>
                </div>
                <div class="main_lm_list">
                  <div class="main_lm_list_t">
                    <ul>
                 <?php 
					/* $criteria = new CDbCriteria;
					$criteria->addCondition('lb_id=2');
					$criteria->limit = 5;
					$criteria->offset = 0;
					$criteria->order = 'ls_id asc';
					$res = Lxsclass::model()->findAll($criteria); */
					//$res = $dblink->findAll('lxsclass','','lb_id=2','','0,5','ls_id asc');   
					$res = $icolumn->getAllTagsByid(125,'',5);					
					$k=0;
                    foreach($res as $row12){
					$k=$k+1;
                 ?>                    
               <li <?php if($k==1){echo "class='hd'";}?>><a href="#"><?=$row12["ic_class"]?></a></li>                      
                 <?php }?>
                    </ul>
                  </div>
                  <div class="tab_box">
                       <?php
					//$res = $dblink->findAll('lxsclass','','lb_id=2','','0,5','ls_id asc');
					$res = $icolumn->getAllTagsByid(125,'',5);	
                 if (count($res)>=1){
					$k=0;
                    foreach($res as $row13){
					$k=$k+1;
					$tsid=$row13["ic_id"];
					   if($k!=1){echo "<div class='hide'>";}
                       ?>                 
                                <div class="main_lm_list_l">                                
                                <?php
								$res4 = $information->getAllByLable(array($tsid),7,'',"i_id asc");
								//$res4 = $dblink->findAll('lxsdnews','','lx_sdscl='.$tsid,'','0,7','lx_sdid asc');
                                
					            foreach($res4 as $row14){					     					            
                                ?>                               
                                  <dl>
                                    <dt><span>·</span><a href="<?=Yii::app()->createUrl("abroad/newsdetail",array("id"=>$row14["i_id"]));?>"><?=$row14["i_title"]?></a></dt>
                                    <dd><?=date("Y-m-d", strtotime($row14["i_submitdate"]));?></dd>
                                  </dl>  
                                <?php }?>
                                </div>
                    <?php 
					  if($k!=1){echo "</div>";}
					}} ?>                    
                  </div>
                </div>
              </div>
              <div class="main_lm">
                <div class="main_lm_title">
                  <dl>
                    <dt>热点推荐</dt>
                    <dd><a href="lx_rdtj_list.php">更多>></a></dd>
                  </dl>
                </div>
                <div class="main_lm_list">
                  <div class="main_lm_list_t02">
                    <ul>
                      <li>国家</li>
                      <li class="widht32">学校</li>
                      <li>专业</li>
                      <li class="widht32">学费</li>
                    </ul>
                  </div>
                  <div class="main_lm_list_l02">
                    
                    
                  <?php
				  //$sq15="select * from lxkkinfo as a join lxgjclass as b  on a.lxk_gjid=b.lx_gjid join lxschool as c on a.lxk_sid=c.lxs_id where lxk_tjbool=1 order by lxk_id asc limit 0,5";
				  //$res = $dblink->findAll('lxkkinfo as a','','lxk_tjbool=1','join lxgjclass as b  on a.lxk_gjid=b.lx_gjid join lxschool as c on a.lxk_sid=c.lxs_id','0,5','lxk_id asc');
				  
				  $res = Yii::app()->db->CreateCommand("select * from lxkkinfo as a join icolumn as b on a.lxk_gjid = b.ic_id join lxschool as c on a.lxk_sid=c.lxs_id where a.lxk_tjbool=1 order by lxk_id asc limit 0,5")->queryAll();
				  foreach($res as $row15){					     					            
				  ?>    
                    <ul>
                      <li><?=$row15["ic_class"]?></li>
                      <li class="widht32"><a href="<?=Yii::app()->createUrl("abroad/lxabroad",array("sid"=>$row15["lxk_sid"]));?>"><?=$row15["lxs_name"]?></a></li>
                      <li><?=$row15["lxk_zy"]?></li>
                      <li class="widht32"><?=$row15["lxk_xuefei"]?></li>
                      <li class="more02"><a href="<?=Yii::app()->createUrl("abroad/lxcourse",array("kid"=>$row15["lxk_id"]));?>">详情..</a></li>
                    </ul>
                  <?php } 
				  ?>              
                  </div>
                </div>
              </div>
              <div class="main_lm">
                <div class="main_lm_title">
                  <dl>
                    <dt>海外生活</dt>
                    <dd><a href="<?=Yii::app()->createUrl("abroad/newslist",array("cl"=>122));?>">更多>></a></dd>
                  </dl>
                </div>
                <div class="main_lm_list">
                  <div class="main_lm_list_l03">
                    <div class="main_box02_left_text11">
                      <div class="main_box02_left_text_list11">
						<?php 
						/* $criteria = new CDbCriteria;
						$criteria->addCondition("lx_ncl='hwsh'");
						$criteria->addCondition("lx_npic<>''");
						$criteria->limit = 1;
						$criteria->order = 'lx_ndate desc'; */
						$row12 = $information->getOneById(122);
						if($row12 != ''){   
						  $tmp_id=$row12["i_id"];
						?>
                        <div class="main_box02_left_text_list_pic11">
                          <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td valign="middle" align="center"><a href="<?//=$row12["lx_nsp"]?>"><img src="/admin_root/<?=$row12["i_pic"]?>" border="0" width="112"/></a></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <dl>
                          <dt><a href="<?=Yii::app()->createUrl("abroad/newsdetail",array("id"=>$row12["i_id"]));?>">
                            <?=$row12["i_title"]?>
                          </a></dt>
                          <dd><?=Common::strCut($row12["i_con"],100)?></dd>
                        </dl>
                        <?php } ?>
                      </div>
                      <ul>
                        <?php 
							/* $criteria = new CDbCriteria;
							$criteria->addCondition("lx_ncl='hwsh'");
							$criteria->addCondition("lx_nid<>".$tmp_id);
							$criteria->limit = 5;
							$criteria->offset = 0;
							$criteria->order = 'lx_ndate desc';
							$res12 = Lxnews::model()->findAll($criteria); */
							$res12 = $information->getNeedById(122,array($tmp_id),5);
							//$res12 = $dblink->findAll('lxnews','',"lx_ncl='hwsh' and lx_nid<>".$tmp_id,'','0,5','lx_ndate desc');     
							foreach($res12 as $row12){                   
      ?>
                        <li>&gt;&gt; <a href="<?=Yii::app()->createUrl("abroad/newsdetail",array("id"=>$row12["i_id"]));?>">
                          <?=$row12["i_title"]?>
                          </a><span>
                            <?=date("Y-m-d", strtotime($row12["i_submitdate"]));?>
                          </span></li>
                        <?php }?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="main_box_left00">
            <div class="main_box_left00_title">
              <dl>
                <dt><span class="color01">留学</span><span class="color02">·</span><span class="color03">体验</span></dt>
                <dd>专家免费咨询热线：<?=$web->z_tel;?></dd>
              </dl>
            </div>
            <div class="main_box_left00_list">
              <div class="main_lm">
                <div class="main_lm_title">
                  <dl>
                    <dt>成功案例</dt>
                    <dd><a href="<?=Yii::app()->createUrl("abroad/newslist",array("cl"=>77));?>">更多>></a></dd>
                  </dl>
                </div>
                <div class="main_lm_list">
                  <div class="main_lm_list_l03">
                    <div class="main_box02_left_text11">
                      <div class="main_box02_left_text_list11">
						<?php 

						//$row12 = $dblink->find('lxnews','',"lx_ncl='cgal' and lx_npic<>''",'','1','lx_ndate desc');
						$row12 = $information->getOneById(77);
						if ($row12 != ''){
						  $tmp_id=$row12["i_id"];
						?>
                        <div class="main_box02_left_text_list_pic11">
                          <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td valign="middle" align="center"><a href="#"><img src="/admin_root/<?=$row12["i_pic"]?>" border="0" width="112"/></a></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <dl>
                          <dt><a href="<?=Yii::app()->createUrl("abroad/newsdetail",array('id'=>$row12['i_id']));?>" title="<?=$row12["i_title"]?>">
                            <?=Common::strCut($row12["i_title"],30)?>
                          </a></dt>
                          <dd>
                            <?=Common::strCut(strip_tags($row12["i_con"]),96)?>
                            </dd>
                        </dl>
                        <?php }
						?>
                      </div>
                      <ul>
					  <?php
						
						//$res = $dblink->findAll('lxnews','',"lx_ncl='cgal' and lx_nid<>".$tmp_id,'','0,5','lx_ndate desc');
						$res = $information->getNeedById(77,array($tmp_id),5);
						foreach($res as $row12){                   
						?>
                        <li>&gt;&gt; <a href="<?=Yii::app()->createUrl("abroad/newsdetail",array('id'=>$row12['i_id']));?>">
                          <?=$row12["i_title"]?>
                          </a><span>
                            <?=date("Y-m-d", strtotime($row12["i_submitdate"]));?>
                          </span></li>
                        <?php }
						?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="main_lm">
                <div class="main_lm_title">
                  <dl>
                    <dt>回国归来</dt>
                    <dd><a href="<?=Yii::app()->createUrl("abroad/newslist",array("cl"=>102));?>">更多>></a></dd>
                  </dl>
                </div>
                <div class="main_lm_list">
                  <div class="main_lm_list_l03">
                    <div class="main_box02_left_text11">
                      <div class="main_box02_left_text_list11">
                        <?php 
						
						//$row12 = $dblink->find('lxnews','',"lx_ncl='hggl' and lx_npic<>''",'','1','lx_ndate desc');
						$row12 = $information->getOneById(102);
						if($row12 != ''){  
						  $tmp_id=$row12["i_id"];
?>
                        <div class="main_box02_left_text_list_pic11">
                          <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td valign="middle" align="center"><a href="<?//=$row12["lx_nsp"]?>"><img src="/admin_root/<?=$row12["i_pic"]?>" border="0" width="112"/></a></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <dl>
                          <dt><a href="lx_news_detail.php?id=<?=$row12["i_id"]?>" title="<?=$row12["i_title"]?>">
                            <?=Common::strCut($row12["i_title"],30)?>
                          </a></dt>
                          <dd>
                            <?=Common::strCut($row12["i_con"],96)?>
                            ...</dd>
                        </dl>
                        <?php }
						?>
                      </div>
                      <ul> 
                        <?php 
						
						  //$res = $dblink->findAll('lxnews','',"lx_ncl='hggl' and lx_nid<>".$tmp_id,'','0,5','lx_ndate desc');
						  $res = $information->getNeedById(102,array($tmp_id),5);
						  foreach($res as $row12){                   
						  ?>
                        <li>&gt;&gt; <a href="<?=Yii::app()->createUrl("abroad/newsdetail",array('id'=>$row12["i_id"]))?>">
                          <?=$row12["i_title"]?>
                          </a><span>
                            <?=date("Y-m-d", strtotime($row12["i_submitdate"]));?>
                          </span></li>
                        <?php }
						?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="main_lm">
                <div class="main_lm_title">
                  <dl>
                    <dt>漫镜海外</dt>
                    <dd><a href="<?=Yii::app()->createUrl("abroad/newslist",array("cl"=>103));?>">更多>></a></dd>
                  </dl>
                </div>
                <div class="main_lm_list">
                  <div class="main_lm_list_l03">
                    <?php 
					
					//$res = $dblink->findAll('lxnews','',"lx_ncl='mjhw' and lx_npic<>''",'','4','lx_ndate desc');
					$res = $information->getNeedById(103,'',4,'',true);
					foreach($res as $row12){  
					?>
                    <div class="img02"> <a href="<?=Yii::app()->createUrl("abroad/newsdetail",array('id'=>$row12["i_id"]))?>" title="<?=$row12["i_title"]?>"><img src="/admin_root/<?=$row12["i_pic"]?>" border="0" width="112"/><br />
                      <?=Common::strCut($row12["i_title"],28,'')?>
                    </a> </div>
                    <?php }
					?>
                  </div>
                </div>
              </div>
              <div class="main_lm">
                <div class="main_lm_title">
                  <dl>
                    <dt>移民海外</dt>
                    <dd><a href="<?=Yii::app()->createUrl("abroad/newslist",array("cl"=>104));?>">更多>></a></dd>
                  </dl>
                </div>
                <div class="main_lm_list">
                  <div class="main_lm_list_l03">
                    <div class="main_box02_left_text11">
                      <div class="main_box02_left_text_list11">
                        <?php 
						
						//$row12 = $dblink->find('lxnews','',"lx_ncl='ymhw' and lx_npic<>''",'','1','lx_ndate desc');
						$row12 = $information->getOneById(104);
						if($row12 != ''){  
						  $tmp_id=$row12["i_id"];
						?>
                        <div class="main_box02_left_text_list_pic11">
                          <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td valign="middle" align="center"><a href="<?=Yii::app()->createUrl("abroad/newsdetail",array('id'=>$row12["i_id"]))?>" title="<?=$row12["i_title"]?>"><img src="/admin_root/<?=$row12["i_pic"]?>" border="0" width="112"/></a></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <dl>
                          <dt><a href="<?=Yii::app()->createUrl("abroad/newsdetail",array('id'=>$row12["i_id"]))?>" title="<?=$row12["i_title"]?>">
                            <?=Common::strCut($row12["i_title"],30)?>
                          </a></dt>
                          <dd>
                            <?=Common::strCut($row12["i_con"],96)?>
                            ...</dd>
                        </dl>
                        <?php }
						?>
                      </div>
						<ul>
						  <?php 
						  
						  //$res = $dblink->findAll('lxnews','',"lx_ncl='ymhw' and lx_nid<>".$tmp_id,'','0,5','lx_ndate desc');
						  $res = $information->getNeedById(104,array($tmp_id),5);
						  foreach($res as $row12){                   
						  ?>
							<li>&gt;&gt; <a href="<?=Yii::app()->createUrl("abroad/newsdetail",array('id'=>$row12["i_id"]))?>">
							  <?=$row12["i_title"]?>
							  </a><span>
								<?=date("Y-m-d", strtotime($row10["i_submitdate"]));?>
							  </span></li>
						   <?php }
						   ?>
						</ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="main_box_right">
          <div class="main_box02_right00">
            <div class="main_box02_right_title">
              <dl>
                <dt>热门课程</dt>
                <dd><a href="lx_rdtj_list.php">更多>></a></dd>
              </dl>
            </div>
            <div class="main_box02_right_list00">
              <ul>              
				<?php 
				
				 //$res = $dblink->findAll('lxkkinfo','','lxk_tjbool=1','join lxgjclass on lxkkinfo.lxk_gjid=lxgjclass.lx_gjid','6');
				 $res = Yii::app()->db->CreateCommand("select * from lxkkinfo join icolumn on lxkkinfo.lxk_gjid=icolumn.ic_id where lxk_tjbool=1 limit 6")->queryAll();
	             foreach($res as $k=>$row_2){
	            ?>
                <li><?=$k+1?>.<span>[<?=$row_2["ic_class"]?>]</span><a href="<?=Yii::app()->createUrl("abroad/lxcourse",array("kid"=>$row_2["lxk_id"]));?>" title="<?=$row_2["lxk_title"]?>"><?=$row_2["lxk_title"]?></a></li>
                <?php } 
				?>
              </ul>
            </div>
          </div>
          <div class="main_box02_right00">
            <div class="main_box02_right_title">
              <dl>
                <dt>留学工具大全</dt>
                <dd>&nbsp;</dd>
              </dl>
            </div>
            <div class="main_box02_right_list">
              <div class="main_box02_right_list02"> <a href="http://time.123cha.com/" target="_blank"><img src="/images/tool01.jpg" /></a> <a href="http://weather.news.sina.com.cn/"  target="_blank"><img src="/images/tool02.jpg" /></a> <a href="http://jipiao.oklx.com/search.aspx"  target="_blank"><img src="/images/tool03.jpg" /></a> <a href="http://renzheng.cscse.edu.cn/"  target="_blank"><img src="/images/tool04.jpg" /></a> <a href="http://www.boc.cn/sourcedb/whpj/"  target="_blank"><img src="/images/tool05.jpg" /></a> <a href="http://www.jsj.edu.cn/index.php/default/"  target="_blank"><img src="/images/tool06.jpg" /></a> </div>
            </div>
          </div>
          <div class="main_box02_right00">
            <div class="main_box02_right_title">
              <dl>
                <dt>专家解答</dt>
                <dd>&nbsp;</dd>
              </dl>
            </div>
            <div class="main_box02_right_list">
              <div class="main_box02_right_list03">
                <ul>
<?php 
		$criteria = new CDbCriteria;
		$criteria->addCondition('lxwd_bool=1');
		$criteria->limit = 5;
		$criteria->order = 'lxwd_id desc';
		$res = Lxwd::model()->findAll($criteria);
	 //$res = $dblink->findAll('lxwd','','lxwd_bool=1','','3','lxwd_id desc');	 
	 $i=0;
	 foreach($res as $row){
     $i=$i+1;	 
	?>
                  <li><font color="#666">[问]<?=$row["lxwd_question"]?> <?=date("Y-m-d",strtotime($row["lxwd_date"]))?><br />
                    [答]<?=$row["lxwd_answer"]?></font></li>
  <?php }?>           
                 
                </ul>
              </div>
            </div>
          </div>
          <div class="main_box02_right00">
            <div class="main_box02_right_title">
              <dl>
                <dt>资料下载</dt>
                <dd><a href="lx_down_list.php">更多>></a></dd>
              </dl>
            </div>
            <div class="main_box02_right_list00">
              <ul>
                <?php 
				$criteria = new CDbCriteria;
				$criteria->limit = 6;				
				$criteria->offset = 0;				
				$criteria->order = 'lxd_id desc';
				$res1 = Lxdown::model()->findAll($criteria);
				//$res1 = $dblink->findAll('lxdown','','','','0,6','lxd_id desc');
               foreach($res1 as $row_1){                   
                ?>             
                <li><a href="/admin_root/<?=$row_1["lxd_file"]?>" title="<?=$row_1["lxd_title"]?>"><?=$row_1["lxd_title"]?>..</a></li>
                <?php }?>
              </ul>
            </div>
          </div>
        </div>
      </div>