<?php 
include_once("../web_start.php");
?>
<?php
	$pdao = "高考频道";
	$rowb = $dblink->find('pindao','',"pin_title='".$pdao."'");
	$pinpic1=$rowb["pin_pic1"];
	$pinpic2=$rowb["pin_pic2"];
	$pinpic3=$rowb["pin_pic3"];
	$pinpic4=$rowb["pin_pic4"];
?>
<?php 
$web=getWeb("11");
$web['z_title']="培训-高考频道";
include_once("Training_header.php");
?>
<script src="js/pxstyle.js"></script>

<body>
<div class="wrapper">

<!-- top -->
<?php include("pxtop.html")?>
<!-- top End -->

<!-- main -->
<div class="main">
	<div class="px_gg"><?=$web['z_banner']?></div>
    
    <div class="px_pd">
		<div class="px_pd_box01">
        	<div class="px_pd_box01_title" id="px_t02"><?=$pdao?></div>
            <div class="px_pd_box01_nav" id="px_n02">
                <?php
				//根据频道号查出BID号再查小类别
				$res = $dblink->fetchAll("select * from pxsclass where pb_id in(select pb_id from pxbclass where pb_pindao='".$pdao."')");
				foreach($res as $row1){								
                ?>
                <a href="px_kc_list.php?pid=<?=$row1["ps_id"]?>"><?=$row1["ps_title"]?></a><span>|</span> 
                <?php }?>
       	  </div>
		</div>
		<!--<div class="px_pd_box02" id="px_t002_01">
        	<div class="px_pd_box2_hd">
            	<div class="px_wy_ss_02">外语搜索</div>
                <div class="px_wy_ss_kc_02">（9121个班级，8450门课程，300多家培训机构）</div>
                <div class="px_wy_ss_xian_02"></div>
                <div class="px_wy_ss_kcxz">
                	<ul>
                    	<li><input type="text" value="课程名称" size="15" /></li>
                        <li><select id="Province" style="WIDTH: 120px"><OPTION value="" selected>选择学校</OPTION></select></li>
                        <li><select id="Province" style="WIDTH: 80px"><OPTION value="" selected>开课时间</OPTION><OPTION value="" selected>7天之内</OPTION><OPTION value="" selected>14天之内</OPTION><OPTION value="" selected>21天之内</OPTION><OPTION value="" selected>28天之内</OPTION></select></li>
                        <li><select id="Province" style="WIDTH: 80px"><OPTION value="" selected>所有地区</OPTION><OPTION value="" selected>徐汇区</OPTION><OPTION value="" selected>长宁区</OPTION><OPTION value="" selected>浦东区</OPTION><OPTION value="" selected>闵行区</OPTION></select></li>
                        <li><select id="Province" style="WIDTH: 80px"><OPTION value="" selected>上课时段</OPTION><OPTION value="" selected>白天班</OPTION><OPTION value="" selected>晚班</OPTION><OPTION value="" selected>全日制</OPTION><OPTION value="" selected>周六周日</OPTION></select></li>
                        <li><input name="" type="image" src="images/px_ss_07.jpg" /></li>
                    </ul>
                </div>
            </div>
            <div class="px_pd_box2_tel" id="px_bmzx01">
            	<span>021-1234567</span>
            </div>
        </div>-->
    <div class="px_pd_box03">
        <div class="px_pd_box03_left">
            <img src="../admin_root/<?=$pinpic1?>" width="250" height="175" />
        </div>
        <div class="px_pd_box03_center" id="px_pd_box03_center_02">
            <div class="px_pd_box03_center_box01">
             <?php
	  	  $row = $dblink->find('ennews','','nclass=71');
	     if($row != ''){?>
            
            	<dl>
                  <dt id="new02"><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?=$row["ntitle"]?></a></dt>
                  <dd><?php if (strlen($row["ncon"])>400){echo strip_tags($Common->strCut($row["ncon"],400));}else{echo strip_tags($row["ncon"]);}?><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>">[详情]</a></dd>
                </dl>
			  <?php }?>
                
            </div>
            
            <div class="px_pd_box03_center_box02">
            	<ul>
                	  <?php
	  	 $res = $dblink->findAll('ennews','','nclass in(71)','','1,10');
			foreach($res as $row){?>
	<li><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?php if (strlen($row["ntitle"])>35){echo $Common->strCut($row["ntitle"],35);}else{echo $row["ntitle"];}?></a></li>
          <?php }?>  
                    
                </ul>
            </div>
        </div>
        <div class="px_pd_box03_right" id="px_pd_box03_right_02">
            <div class="px_pd_box03_right_title" id="px_pd_box03_right_01_title_02"><?=$pdao?>资料下载</div>
            <div class="px_pd_box03_right_list">
            	<ul>
                 <?php
						$res = $dblink->findAll('xl_ask','',"w_downcl='px' and w_pindao='".$pdao."'",'','8');						
						foreach($res as $row){
				?>
                   <li><a href="../admin_root/<?php echo $row["w_con"];?>"><?php echo $row["w_title"];?></a><span><a href="../admin_root/<?php echo $row["w_con"];?>"><img src="images/xz.jpg" /></a></span></li>
                <?php }?>                 
                </ul>
            </div>
        </div>
    </div>
    </div>
    <div class="mian_px_index_banner"><img src="../admin_root/<?=$pinpic2?>" width="950" height="90" /></div>
    <div style="clear:both; height:14px;"></div>
    <div class="mian_px_index_news">
    	<div class="mian_px_index_news_left">
        	<?php
				//根据频道号查出BID号再查小类别
				$sql = "select * from pxsclass where pb_id in(select pb_id from pxbclass where pb_pindao='".$pdao."')";
				$res = $dblink->fetchAll($sql);
					  if(count($res)>=1){ 
					  $kk=0;
					  foreach($res as $row1){
					  $kk=$kk+1;
                ?>
                               
            <div class="mian_px_index_ky_bk_02">
           	  <div class="mian_px_index_ky_bj_02">
               	<div class="mian_px_index_ky_bt"><span><?=$row1["ps_title"]?></span><a href="px_kc_list.php?pid=<?=$row1["ps_id"]?>">更多...</a></div>
              </div>
                <div class="mian_px_index_ky_tu"><img src="../admin_root/<?=$row1["ps_pic"]?>" width="120" height="88" /></div>
                <div class="mian_px_index_ky_news_bt">
                	<ul>          
           <?php
	  	   $res = $dblink->findAll('ennews','',"smclass=".$row1["ps_id"],'','4');
          foreach($res as $row){?>
	<li style="line-height:25px;"><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?=$Common->strCut($row["ntitle"],24);?></a></li>
          <?php }?>                       
                    </ul>
                </div>
                <div class="mian_px_index_ky_kc">
                	<ul><li style="width:125px;">培训学校</li><li style="width:112px;">班级名称</li><li style="width:57px;">优惠价</li></ul>
                    <dl>
     <?php
   $sql="SELECT * FROM pxkkinfo join pxschool on pxkkinfo.pxk_sid=pxschool.pxs_id where pxk_cl=".$row1["ps_id"]." order by pxk_id desc";
	 $res = $dblink->fetchAll($sql); 
	 foreach($res as $row){			
?>
                        <dd style="width:120px;float:left;">[<a href="px_school/?pid=<?=$row["pxs_id"]?>"><?=$Common->strCut($row["pxs_name"],18)?></a>]</dd><dt style=" float:left;width:110px;" title="<?=$row["pxk_title"]?>"><a href="px_kc_list_details.php?id=<?=$row["pxk_id"]?>"><?=$Common->strCut($row["pxk_title"],16)?></a></dt><dt style=" float:left;width:57px; color:#f00;"><?=$row["pxk_yhui"]?></dt>
                        <?php }?>
                    </dl>
                </div>
            </div>
			  <?php if($kk%2!=0){?>
              <div style="width:14px; height:287px; float:left;"></div>
              <?php }?>
          <?php }}?>
    	</div>
        <div class="mian_px_index_right">
        	<div class="mian_px_index_wyxw_bk_02">
            	<div class="mian_px_index_wyxw_bj_02">
                	<div class="mian_px_index_ywxw_bt_02"><span><?=$pdao?>新闻动态</span></div>
                </div>
                <div class="mian_px_ywxw_news_lb">
                	<ul>
           <?php
	  	 $res = $dblink->findAll('ennews','','nclass in(71)','','1,10');
          
          foreach($res as $row){?>
	<li style="line-height:25px;"><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?php if (strlen($row["ntitle"])>24){echo $Common->strCut($row["ntitle"],24);}else{echo $row["ntitle"];}?></a><span><?=date("Y-m-d",strtotime($row["ndate"]))?></span></li>
          <?php }?>  
                    </ul>
                </div>
            </div>
            <div class="mian_px_index_right_xgg"><img src="../admin_root/<?=$pinpic3?>" width="277" height="181" /></div>
            <div style="clear:both; height:14px;"></div>
            <div class="mian_px_index_wyxw_bk_02" style="height:auto;">
            	<div class="mian_px_index_wyxw_bj_02">
                	<div class="mian_px_index_ywxw_bt_02"><span>在线问答</span><a href="px_wd_list.php">更多...</a></div>
                </div>
                <div class="mian_px_ywxw_news_lb" style="height:auto;">
                	<dl>
       <?php 
	  $res = $dblink->findAll('pxwd','','px_bool=1','','4','px_time desc');
	 foreach($res as $row){
		  ?>
            
                <dt>【问】<?=$row["px_ask"]?></dt>
                <dd>【答】：<?=$row["px_answer"]?></dd>
            
         <?php }?>   
                    </dl>
                </div>
            </div>
            <div class="mian_px_index_right_xgg"><img src="../admin_root/<?=$pinpic4?>" width="277" height="181" /></div>
        </div>
       
    </div>
    <div style="clear:both; height:14px;"></div>
    
</div>
<!-- main End -->

<!-- bottom -->
<?php include("pxbottom.html");?>
<!-- bottom End -->
</div>

</body>
</html>