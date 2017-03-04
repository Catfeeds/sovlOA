<?php
include_once("../web_start.php");
$web=getWeb("12");
$web['z_title'] = $web['z_name'].'--'.$web['z_title'];
include_once('Abroad_header.php');
?>


<body id="bg000" onload="document.getElementById('wp000').style.height="+aa+"-200+'px';">
<div class="wrapper" id="wp000">
  <div class="wrapper" id="wp">
    <!-- top -->
    <?php include("lxtop.php");?>
    <!-- top end -->
    <!-- main -->
    <div class="main">
      <?php include("gqtop.php");?>
      <div class="banner">
      <?=$web['z_banner']?>
      </div>
      <div class="main_box01">
        <div class="main_box01_left">
          <div class="png"><img src="images/hot.png" /></div>
          <div class="main_box01_left_00">
            <div class="main_box01_left_l">
              <ul>
                <?php
	 $res = $dblink->findAll('lxgjclass',array('lx_gjcl'),'','','8');
	 if (count($res)>=1){
		$k=0;
	    foreach($res as $row){
		$k=$k+1;
		    if($k==1){echo"<li class='hd_bg'>".$row["lx_gjcl"]."</li>";}else{echo"<li>".$row["lx_gjcl"]."</li>";}
		}
	}
	?>
              </ul>
            </div>
            <div class="main_box01_left_r">
              <div class="hot">
    <?php
     //$sql7="select * from lxgjclass limit 8";
	 $res1 = $dblink->findAll('lxgjclass','','','','8');
	 if (count($res1)>=1){
		$i=0;
	    foreach($res1 as $row7){
		$i=$i+1;   
		    if($i>1){echo "<div class='hide'>";}
	?>
                <div class="main_box01_left_r00">
                  <dl>
                    <dt>
                      <?=$row7["lx_gjcl"]?>留学资讯</dt>
						<?php
							//$rs8=mysql_query("select * from lxnews where lx_gjcl=".$row7["lx_gjid"]." limit 6",$conn);	
							$res2 = $dblink->findAll('lxnews','',"lx_gjcl=".$row7["lx_gjid"],'','6');
							foreach($res2 as $row8){		                       
						?>
                    <dd>·<a href="lx_news_detail.php?id=<?=$row8["lx_nid"]?>">
                      <?=$row8["lx_ntitle"]?>
                    </a></dd>
                    <?php }?>
                  </dl>
                  <dl>
                    <dt><?=$row7["lx_gjcl"]?>重点推荐</dt>
                    
                    <?php
	                        //$rs_8=mysql_query("select * from lxkkinfo where lxk_gjid=".$row7["lx_gjid"]." limit 6",$conn);	   
	                        $res3 = $dblink->findAll('lxkkinfo','',"lxk_gjid=".$row7["lx_gjid"],'','6');
							foreach($res3 as $row_8){		                       
	                           ?>
                    <dd>·<a href="lx_course.php?kid=<?=$row_8["lxk_id"]?>"><?=$row_8["lxk_title"]?></a></dd>
                    <?php }?>
                  </dl>
                </div>
                <?php 
						if($i>1){echo "</div>";}
						}}						
						?>
              </div>
            </div>
          </div>
        </div>
        <div class="main_box01_cen">
          <div class="main_box01_cen_flash">
            <?php include("Switch_lxpic.html");?>
          </div>
          <div class="main_box01_cen_list">
            <?php
				$row9 = $dblink->find('lxnews','','','','1');
			    if ($row9 != ''){								   
	                          
				?>
            <h1><a href='lx_news_detail.php?id=<?=$row9["lx_nid"]?>'>
              <?=$row9["lx_ntitle"]?>
            </a></h1>
            <p class='main_box01_cen_list_text'>
              <?=strip_tags($Common->strCut($row9["lx_ncon"],130))?>
             <a href='lx_news_detail.php?id=<?=$row9["lx_nid"]?>'>[阅读全文]</a></p>
            <?php }?>
            <ul>
              <?php
								$res = $dblink->findAll('lxnews','','','','1,5');
	                           foreach($res as $row10){								  
			  ?>
              <li>·<a href="lx_news_detail.php?id=<?=$row10["lx_nid"]?>">
              <?=$row10["lx_ntitle"]?>
                </a><span>
                <?=date("Y-m-d", strtotime($row10["lx_ndate"]));?>
                </span></li>
              <?php }?>
            </ul>
          </div>
        </div>
        <div class="main_box01_right">
          <div class="main_box01_right_01">
            <ul>
              <?php
					$lx_qq = explode(",",$web['z_qq']);
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
					$res = $dblink->findAll('lxnews','','lx_nbool=1','','5');
					$k=0;
					foreach($res as $row11){
						$k=$k+1;
?>
                  <li><span><?=$k?>.</span><a href="lx_news_detail.php?id=<?=$row11["lx_nid"]?>" title="<?=$row11["lx_ntitle"]?>"><?=$row11["lx_ntitle"]?></a></li>
                  <?php }?>
                </ul>
              </div>
              <div class="main_box01_right_02_box03"><img src="images/lx_bottom.jpg" /></div>
            </div>
          </div>
        </div>
      </div>
      <div class="banner">
        <?=$web['z_onegg']?>
      </div>
      <div class="main_box01">
        <div class="main_box02_left">
          <div class="main_xllb_box01_left_list02_box1_title">
            <div class="main_xllb_box01_left_list02_box1_title_zi">
              <dl>
                <dt><img src="images/lx_title_left.png" /></dt>
                <dd>名校推荐</dd>
                <dt><img src="images/lx_title_right.png" /></dt>
              </dl>
            </div>
          </div>
          <div class="main_box02_left_text">
            <div class="main_box02_left_text_list">
            
 <?php
	$row11 = $dblink->find('lxschool','','lxs_tjbool=1','','1');
	if($row11 != ''){
?>
              <div class="main_box02_left_text_list_pic" onmouseover="this.style.border='1px solid #85A9FF'" onmouseout="this.style.border='1px solid #fff'">
                <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
                  <tr>
                    <td align="center" valign="middle"><a href="lx_abroad.php?sid=<?=$row11["lxs_id"]?>"><img src="../admin_root/<?=$row11["lxs_logo"]?>" border="0" align="top"/></a></td>
                  </tr>
                </table>
              </div>
              <dl>
                <dt><a href="lx_abroad.php?sid=<?=$row11["lxs_id"]?>"><?=$row11["lxs_name"]?></a></dt>
                <dd><?=$Common->strCut($row11["lxs_xxjs"],70)?>....</dd>
              </dl>
              
   <?php }?>           
            </div>
            <ul>
            <?php
			$res = $dblink->findAll('lxschool','','lxs_tjbool=1','','1,6');
            foreach($res as $row_1){
            ?>
            <li>>> <a href="lx_abroad.php?sid=<?=$row_1["lxs_id"]?>"><?=$row_1["lxs_name"]?></a><span> 2011-01-06</span></li>
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
	 $res = $dblink->findAll('lxgjclass',array('lx_gjcl'),'lx_gjtj=1','','7');
	 
	 if (count($res)>=1){
		$k=0;
	    foreach($res as $row){
		$k=$k+1;
		    if($k==1){echo"<li class='daqian'>".$row["lx_gjcl"]."</li>";}else{echo"<li>".$row["lx_gjcl"]."</li>";}		    
		}
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
	 $res = $dblink->findAll('lxgjclass',array('lx_gjid','lx_gjcl'),'lx_gjtj=1','','7');
	 //$rs=mysql_query($sql,$conn);
	 if (count($res)>=1){
		$k=0;
	    foreach($res as $row){
		$k=$k+1;
		   if($k!=1){echo"<div class='hide'>";}
	 ?>
              <div class="main_box02_cen_list00">
                <div class="main_box02_cen_list_01">
                  <?php                 
				 $row01 = $dblink->find('lxnews','',"lx_gjcl=".$row["lx_gjid"]." and lx_ncl='msjz'",'','1');
                 if($row01 != ''){                   
                 ?>
                  <div class="main_box02_cen_list_01_pic">
                    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
                      <tr>
                        <td align="center" valign="middle"><img src="../admin_root/<?=$row01["lx_npic"]?>" border="0" align="top" /></td>
                      </tr>
                    </table>
                  </div>
                  <div class="main_box02_cen_list_01_text">
                    <h1><a href="lx_news_detail.php?id=<?=$row01["lx_nid"]?>">
                      <?=$row01["lx_ntitle"]?>
                    </a></h1>
                    <p>
                      <?=strip_tags($Common->strCut($row01["lx_ncon"],150))?>
					  <a href="lx_news_detail.php?id=<?=$row01["lx_nid"]?>">[查看详细]</a></p>
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
				 $res2 = $dblink->findAll('lxnews','',"lx_gjcl=".$row["lx_gjid"]." and lx_ncl='msjz'",'','1,5');
                 foreach($res2 as $row02){                   
                 ?>
                    <dl>
                      <dt><a href="lx_news_detail.php?id=<?=$row02["lx_nid"]?>">
                        <?=$row02["lx_ntitle"]?>
                      </a></dt>
                      <dd><span>
                        <?=$row02["lx_jzdate"]?>
                      </span></dd>
                      <dd>
                        <?=date("Y-m-d", strtotime($row02["lx_ndate"]));?>
                      </dd>
                    </dl>
                    <?php }?>
                  </div>
                </div>
              </div>
              <?php if($k!=1){echo"</div>";}}}?>
            </div>
          </div>
        </div>
        <div class="main_box02_right">
          <div class="main_box02_right_title">
            <dl>
              <dt>海外生活</dt>
              <dd><a href="lx_news_list.php?cl=hwsh">更多>></a></dd>
            </dl>
          </div>
          <div class="main_box02_right_list">
            <?php
				 $row11 = $dblink->find('lxnews','',"lx_ncl='hwsh' and lx_npic<>''",'','1','lx_ndate desc');
                 if($row11 != ''){  
					$tmp_id=$row11["lx_nid"];
                 ?>
            <dl>
              <dt><a href="<?=$row11["lx_nsp"]?>"><img src="../admin_root/<?=$row11["lx_npic"]?>" border="0" /></a></dt>
              <dd><a href="lx_news_detail.php?id=<?=$row11["lx_nid"]?>">
                <?=$row11["lx_ntitle"]?>
              </a></dd>
            </dl>
            <?php }?>
            <ul>
              <?php
				 $res = $dblink->findAll('lxnews','',"lx_ncl='hwsh' and lx_nid<>".$tmp_id,'','0,5','lx_ndate desc');
                 foreach($res as $row12){                   
                 ?>
              <li><a href="lx_news_detail.php?id=<?=$row12["lx_nid"]?>" title="<?=$row12["lx_ntitle"]?>">
                <?=$Common->strCut($row12["lx_ntitle"],28)?>
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
                <dd>专家免费咨询热线：<?=$lx_bmtel?></dd>
              </dl>
            </div>
            <div class="main_box_left00_list">
              <div class="main_lm">
                <div class="main_lm_title">
                  <dl>
                    <dt>留学宝典</dt>
                    <dd><a href="sdnews_blist.php?bid=1">更多>></a></dd>
                  </dl>
                </div>
                <div class="main_lm_list">
                  <div class="main_lm_list_t">
                    <ul>
                 <?php
				 $res = $dblink->findAll('lxsclass','','lb_id=1','','0,5','ls_id asc');
                
					$k=0;
                    foreach($res as $row12){
					$k=$k+1;
                 ?>                    
                      <li <?php if($k==1){echo "class='hd'";}?>><a href="lx_sdnews_list.php?sid=<?=$row12["ls_id"]?>"><?=$row12["ls_title"]?></a></li>
                 <?php }?>
                    </ul>
                  </div>
                  <div class="tab_box">
                       <?php                
				 $res3 = $dblink->findAll('lxsclass','','lb_id=1','','0,5','ls_id asc');                 
                 if (count($res3)>=1){
					$k=0;
                    foreach($res3 as $row13){
					$k=$k+1;
					$tsid=$row13["ls_id"];
					   if($k!=1){echo "<div class='hide'>";}
                       ?>                 
                                <div class="main_lm_list_l">                                
                                <?php
								$res4 = $dblink->findAll('lxsdnews','','lx_sdscl='.$tsid,'','0,7','lx_sdid asc');
                                
					            foreach($res4 as  $row14){					     					            
                                ?>                               
                                  <dl>
                                    <dt><span>·</span><a href="lx_sdnews_detail.php?id=<?=$row14["lx_sdid"]?>"><?=$row14["lx_sdtitle"]?></a></dt>
                                    <dd><?=date("Y-m-d", strtotime($row14["lx_sdate"]));?></dd>
                                  </dl>  
                                <?php }?>
                                </div>
                    <?php 
					  if($k!=1){echo "</div>";}
					}}?>
                  </div>
                </div>
              </div>
              <div class="main_lm">
                <div class="main_lm_title">
                  <dl>
                    <dt>留学考试</dt>
                    <dd><a href="sdnews_blist.php?bid=2">更多>></a></dd>
                  </dl>
                </div>
                <div class="main_lm_list">
                  <div class="main_lm_list_t">
                    <ul>
                 <?php
				 $res = $dblink->findAll('lxsclass','','lb_id=2','','0,5','ls_id asc');                 
					$k=0;
                    foreach($res as $row12){
					$k=$k+1;
                 ?>                    
               <li <?php if($k==1){echo "class='hd'";}?>><a href="lx_sdnews_list.php?sid=<?=$row12["ls_id"]?>"><?=$row12["ls_title"]?></a></li>                      
                 <?php }?>
                    </ul>
                  </div>
                  <div class="tab_box">
                       <?php
                $res = $dblink->findAll('lxsclass','','lb_id=2','','0,5','ls_id asc');
                 if (count($res)>=1){
					$k=0;
                    foreach($res as $row13){
					$k=$k+1;
					$tsid=$row13["ls_id"];
					   if($k!=1){echo "<div class='hide'>";}
                       ?>                 
                                <div class="main_lm_list_l">                                
                                <?php
								$res4 = $dblink->findAll('lxsdnews','','lx_sdscl='.$tsid,'','0,7','lx_sdid asc');
                                
					            foreach($res4 as $row14){					     					            
                                ?>                               
                                  <dl>
                                    <dt><span>·</span><a href="lx_sdnews_detail.php?id=<?=$row14["lx_sdid"]?>"><?=$row14["lx_sdtitle"]?></a></dt>
                                    <dd><?=date("Y-m-d", strtotime($row14["lx_sdate"]));?></dd>
                                  </dl>  
                                <?php }?>
                                </div>
                    <?php 
					  if($k!=1){echo "</div>";}
					}}?>                    
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
				  $res = $dblink->findAll('lxkkinfo as a','','lxk_tjbool=1','join lxgjclass as b  on a.lxk_gjid=b.lx_gjid join lxschool as c on a.lxk_sid=c.lxs_id','0,5','lxk_id asc');
				  
				  foreach($res as $row15){					     					            
				  ?>    
                    <ul>
                      <li>·<?=$row15["lx_gjcl"]?></li>
                      <li class="widht32"><a href="lx_abroad.php?sid=<?=$row15["lxk_sid"]?>"><?=$row15["lxs_name"]?></a></li>
                      <li><?=$row15["lxk_zy"]?></li>
                      <li class="widht32"><?=$row15["lxk_xuefei"]?></li>
                      <li class="more02"><a href="lx_course.php?kid=<?=$row15["lxk_id"]?>">详情..</a></li>
                    </ul>
                  <?php }?>              
                  </div>
                </div>
              </div>
              <div class="main_lm">
                <div class="main_lm_title">
                  <dl>
                    <dt>海外生活</dt>
                    <dd><a href="lx_news_list.php?cl=hwsh">更多>></a></dd>
                  </dl>
                </div>
                <div class="main_lm_list">
                  <div class="main_lm_list_l03">
                    <div class="main_box02_left_text11">
                      <div class="main_box02_left_text_list11">
<?php
$res = $dblink->findAll('lxnews','',"lx_ncl='hwsh' and lx_npic<>''",'','1','lx_ndate desc');
foreach($res as $row12){  
  $tmp_id=$row12["lx_nid"];
?>
                        <div class="main_box02_left_text_list_pic11">
                          <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td valign="middle" align="center"><a href="<?=$row12["lx_nsp"]?>"><img src="../admin_root/<?=$row12["lx_npic"]?>" border="0" width="112"/></a></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <dl>
                          <dt><a href="lx_news_detail.php?id=<?=$row12["lx_nid"]?>">
                            <?=$row12["lx_ntitle"]?>
                          </a></dt>
                          <dd><?=$Common->strCut($row12["lx_ncon"],100)?></dd>
                        </dl>
                        <?php }?>
                      </div>
                      <ul>
                        <?php
							$res12 = $dblink->findAll('lxnews','',"lx_ncl='hwsh' and lx_nid<>".$tmp_id,'','0,5','lx_ndate desc');     
							foreach($res12 as $row12){                   
      ?>
                        <li>&gt;&gt; <a href="lx_news_detail.php?id=<?=$row12["lx_nid"]?>">
                          <?=$row12["lx_ntitle"]?>
                          </a><span>
                            <?=date("Y-m-d", strtotime($row10["lx_ndate"]));?>
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
                <dd>专家免费咨询热线：<?=$lx_bmtel?></dd>
              </dl>
            </div>
            <div class="main_box_left00_list">
              <div class="main_lm">
                <div class="main_lm_title">
                  <dl>
                    <dt>成功案例</dt>
                    <dd><a href="lx_news_list.php?cl=cgal">更多>></a></dd>
                  </dl>
                </div>
                <div class="main_lm_list">
                  <div class="main_lm_list_l03">
                    <div class="main_box02_left_text11">
                      <div class="main_box02_left_text_list11">
<?php
$row12 = $dblink->find('lxnews','',"lx_ncl='cgal' and lx_npic<>''",'','1','lx_ndate desc');
if ($row12 != ''){
  $tmp_id=$row12["lx_nid"];
?>
                        <div class="main_box02_left_text_list_pic11">
                          <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td valign="middle" align="center"><a href="<?=$row12["lx_nsp"]?>"><img src="../admin_root/<?=$row12["lx_npic"]?>" border="0" width="112"/></a></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <dl>
                          <dt><a href="lx_news_detail.php?id=<?=$row12["lx_nid"]?>" title="<?=$row12["lx_ntitle"]?>">
                            <?=$Common->strCut($row12["lx_ntitle"],30)?>
                          </a></dt>
                          <dd>
                            <?=strip_tags($Common->strCut($row12["lx_ncon"],96))?>
                            </dd>
                        </dl>
                        <?php }?>
                      </div>
                      <ul>
      <?php
	  $res = $dblink->findAll('lxnews','',"lx_ncl='cgal' and lx_nid<>".$tmp_id,'','0,5','lx_ndate desc');
      foreach($res as $row12){                   
      ?>
                        <li>&gt;&gt; <a href="lx_news_detail.php?id=<?=$row12["lx_nid"]?>">
                          <?=$row12["lx_ntitle"]?>
                          </a><span>
                            <?=date("Y-m-d", strtotime($row10["lx_ndate"]));?>
                          </span></li>
                        <?php }?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="main_lm">
                <div class="main_lm_title">
                  <dl>
                    <dt>回国归来</dt>
                    <dd><a href="lx_news_list.php?cl=hggl">更多>></a></dd>
                  </dl>
                </div>
                <div class="main_lm_list">
                  <div class="main_lm_list_l03">
                    <div class="main_box02_left_text11">
                      <div class="main_box02_left_text_list11">
                        <?php
$row12 = $dblink->find('lxnews','',"lx_ncl='hggl' and lx_npic<>''",'','1','lx_ndate desc');
if($row12 != ''){  
  $tmp_id=$row12["lx_nid"];
?>
                        <div class="main_box02_left_text_list_pic11">
                          <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td valign="middle" align="center"><a href="<?=$row12["lx_nsp"]?>"><img src="../admin_root/<?=$row12["lx_npic"]?>" border="0" width="112"/></a></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <dl>
                          <dt><a href="lx_news_detail.php?id=<?=$row12["lx_nid"]?>" title="<?=$row12["lx_ntitle"]?>">
                            <?=$Common->strCut($row12["lx_ntitle"],30)?>
                          </a></dt>
                          <dd>
                            <?=$Common->strCut($row12["lx_ncon"],96)?>
                            ...</dd>
                        </dl>
                        <?php }?>
                      </div>
                      <ul>
                        <?php
	  $res = $dblink->findAll('lxnews','',"lx_ncl='hggl' and lx_nid<>".$tmp_id,'','0,5','lx_ndate desc');
      foreach($res as $row12){                   
      ?>
                        <li>&gt;&gt; <a href="lx_news_detail.php?id=<?=$row12["lx_nid"]?>">
                          <?=$row12["lx_ntitle"]?>
                          </a><span>
                            <?=date("Y-m-d", strtotime($row10["lx_ndate"]));?>
                          </span></li>
                        <?php }?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="main_lm">
                <div class="main_lm_title">
                  <dl>
                    <dt>漫镜海外</dt>
                    <dd><a href="lx_news_list.php?cl=mjhw">更多>></a></dd>
                  </dl>
                </div>
                <div class="main_lm_list">
                  <div class="main_lm_list_l03">
                    <?php
$res = $dblink->findAll('lxnews','',"lx_ncl='mjhw' and lx_npic<>''",'','4','lx_ndate desc');
foreach($res as $row12){  
?>
                    <div class="img02"> <a href="lx_news_detail.php?id=<?=$row12["lx_nid"]?>" title="<?=$row12["lx_ntitle"]?>"><img src="../admin_root/<?=$row12["lx_npic"]?>" border="0" width="112"/><br />
                      <?=$Common->strCut($row12["lx_ntitle"],28,'')?>
                    </a> </div>
                    <?php }?>
                  </div>
                </div>
              </div>
              <div class="main_lm">
                <div class="main_lm_title">
                  <dl>
                    <dt>移民海外</dt>
                    <dd><a href="lx_news_list.php?cl=ymhw">更多>></a></dd>
                  </dl>
                </div>
                <div class="main_lm_list">
                  <div class="main_lm_list_l03">
                    <div class="main_box02_left_text11">
                      <div class="main_box02_left_text_list11">
                        <?php
$row12 = $dblink->find('lxnews','',"lx_ncl='ymhw' and lx_npic<>''",'','1','lx_ndate desc');
if($row12 != ''){  
  $tmp_id=$row12["lx_nid"];
?>
                        <div class="main_box02_left_text_list_pic11">
                          <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td valign="middle" align="center"><a href="lx_news_detail.php?id=<?=$row12["lx_nid"]?>" title="<?=$row12["lx_ntitle"]?>"><img src="../admin_root/<?=$row12["lx_npic"]?>" border="0" width="112"/></a></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <dl>
                          <dt><a href="lx_news_detail.php?id=<?=$row12["lx_nid"]?>" title="<?=$row12["lx_ntitle"]?>">
                            <?=$Common->strCut($row12["lx_ntitle"],30)?>
                          </a></dt>
                          <dd>
                            <?=$Common->strCut($row12["lx_ncon"],96)?>
                            ...</dd>
                        </dl>
                        <?php }?>
                      </div>
                      <ul>
      <?php
	  $res = $dblink->findAll('lxnews','',"lx_ncl='ymhw' and lx_nid<>".$tmp_id,'','0,5','lx_ndate desc');
      foreach($res as $row12){                   
      ?>
                        <li>&gt;&gt; <a href="lx_news_detail.php?id=<?=$row12["lx_nid"]?>">
                          <?=$row12["lx_ntitle"]?>
                          </a><span>
                            <?=date("Y-m-d", strtotime($row10["lx_ndate"]));?>
                          </span></li>
       <?php }?>
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
				 $res = $dblink->findAll('lxkkinfo','','lxk_tjbool=1','join lxgjclass on lxkkinfo.lxk_gjid=lxgjclass.lx_gjid','6');
	             if (count($res)>=1){
					 $k=0;
	             foreach($res as $row_2){
					 $k=$k+1;
	            ?>
                <li><?=$k?>.<span>[<?=$row_2["lx_gjcl"]?>]</span><a href="lx_course.php?kid=<?=$row_2["lxk_id"]?>" title="<?=$row_2["lxk_title"]?>"><?=$row_2["lxk_title"]?></a></li>
                <?php }}?>
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
              <div class="main_box02_right_list02"> <a href="http://time.123cha.com/" target="_blank"><img src="images/tool01.jpg" /></a> <a href="http://weather.news.sina.com.cn/"  target="_blank"><img src="images/tool02.jpg" /></a> <a href="http://jipiao.oklx.com/search.aspx"  target="_blank"><img src="images/tool03.jpg" /></a> <a href="http://renzheng.cscse.edu.cn/"  target="_blank"><img src="images/tool04.jpg" /></a> <a href="http://www.boc.cn/sourcedb/whpj/"  target="_blank"><img src="images/tool05.jpg" /></a> <a href="http://www.jsj.edu.cn/index.php/default/"  target="_blank"><img src="images/tool06.jpg" /></a> </div>
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
	 $res = $dblink->findAll('lxwd','','lxwd_bool=1','','3','lxwd_id desc');	 
	 if (count($res)>=1){
	 $i=0;
	 foreach($res as $row){
     $i=$i+1;	 
	?>
                  <li><font color="#666">[问]<?=$row["lxwd_question"]?> <?=date("Y-m-d",strtotime($row["lxwd_date"]))?><br />
                    [答]<?=$row["lxwd_answer"]?></font></li>
  <?php }}?>           
                 
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
				$res1 = $dblink->findAll('lxdown','','','','0,6','lxd_id desc');
               foreach($res1 as $row_1){                   
                ?>             
                <li><a href="../admin_root/<?=$row_1["lxd_file"]?>" title="<?=$row_1["lxd_title"]?>"><?=$row_1["lxd_title"]?>..</a></li>
                <?php }?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- main end -->
    <!-- bottom -->
    <?php include("lxbottom.php");?>
    <!-- bottom end -->
  </div>
</div>
</body>
</html>