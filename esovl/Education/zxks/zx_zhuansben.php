<?php
include_once("../../conn.php");

include_once("zx_webstep.php");
?>
<?php
$ction="专升本";   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>自学考试-<?=$ction?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<base href="http://<?php echo $_SERVER['SERVER_NAME'];?>/">
<link href="../../css/css.css" rel="stylesheet" type="text/css" />
<link href="../../css/top.css" rel="stylesheet" type="text/css" />
<link href="../../css/main.css" rel="stylesheet" type="text/css" />
<link href="../../css/bottom.css" rel="stylesheet" type="text/css" />
<script src="../../js/jquery.js"></script>
<script src="../../js/style.js"></script>
</head>
<body>
        <div class="wrapper">
          <div class="top">
            <?php 
	include("../../top/top_1.html");
	include("../../top/xl_top.html");
	?>
          </div>
          <div class="main">
            <div class="main_xl_pro">
              <div class="main_xl_pro_box01">
                <div class="main_xl_pro_box01_left">
                  <?php
				$sql="select * from xl_s_h limit 3";
       			$rs=mysql_query($sql);
        			//$row=mysql_fetch_assoc($rs);
				?>
                  <div class="right_box01">
                    <div class="main_xl_pro_box01_left_pic">
                      <?php
						$i=0;
						while ($row=mysql_fetch_assoc($rs)){
						$i=$i+1;
						?>
                      <div id="tbc_0<?php echo $i;?>" class=""><a href="<?php echo $row["zxks/s_h_http"];?>"><img src="admin_root/<?php echo $row["s_h_pic"];?>"/></a></div>
                      <?php }	?>
                    </div>
                    <div class="main_xl_pro_box01_left_text">
                      <ul>
                        <?php
							$sql="select * from xl_s_h limit 3";
                			$rs=mysql_query($sql); 
							$j=0;
							while ($row=mysql_fetch_assoc($rs)){
							$j=$j+1;
							?>
                        <li id="tb_<?php echo $j;?>" <?php if($j!=1){echo "class='normaltab1'";}else{echo "class='hovertab1'";}?> onmouseover="HoverLi(3);OvHoverLi(<?php echo $j;?>);">·<a href="<?php echo $row["zxks/s_h_http"];?>"><?php echo $row["s_h_title"];?></a></li>
                        <?php }?>
                      </ul>
                    </div>
                    <script type="text/javascript">
function g(o){return document.getElementById(o);}
function HoverLi(n){
for(var i=1;i<=3;i++){g('tb_'+i).className='normaltab1';g('tbc_0'+i).className='undis';}g('tbc_0'+n).className='dis';g('tb_'+n).className='hovertab1';
}
function OvHoverLi(n){
for(var i=1;i<=3;i++){g('tb_'+i).className='normaltab1';g('tbc_0'+i).className='undis';}g('tbc_0'+n).className='dis';g('tb_'+n).className='hovertab1';
}
        </script> 
                  </div>
                </div>
                <div class="main_xl_pro_box01_right">
                  <ul>
                    <?php 
	  				$sql="select * from luqu order by lq_date desc limit 5 ";     
	  				$rs=mysql_query($sql,$conn);
	  				if (!$rs){  
	  					exit("数据库操作失败! 错误信息为:".mysql_error());
	 				}
	  				if (mysql_num_rows($rs)>=1){
						while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
	     					$rs1=mysql_query("select s_name from school where s_id=".$row["s_id"],$conn); 
		  					$row1=mysql_fetch_assoc($rs1);
		  				
           					$rs2=mysql_query("select * from kkinfo where s_id=".$row["s_id"]." limit 1");
							$row2=mysql_fetch_assoc($rs2);
	  				?>
                    <li>·<a href="Education/xl_pro_detail.php?kid=<?php echo $row2["kid"];?>&amp;sid=<?php echo $row["s_id"];?>"><?php echo $row1["s_name"];?></a></li>
                    <?php }}?>
                  </ul>
                </div>
              </div>
              <div class="main_xl_pro_box02">
                <div class="main_xl_pro_box02_title">
                  <dl>
                    <dt><a href="Education/zxks/">自学考试</a></dt>
                    <dd><a href="Education/">学历教育</a></dd>
                    <dd><a href="Education/wlys/">网络院校</a></dd>
                    <dd><a href="Education/crgk/">成人高考</a></dd>
                    <dd><a href="Education/gjbx/">国际办学</a></dd>
                    <dd><a href="Education/xl_gxjz.php">高校简章</a></dd>
                    <dd><a href="Education/xl_pro_search.php">简章搜索</a></dd>
                    <dd><a href="Education/gfb/">高复班</a></dd>
                  </dl>
                </div>
                <div class="main_xl_pro_box02_mu1"><img src="zxks/../images/zx_01.jpg" /></div>
                <div class="main_xl_pro_box02_mu2">
                  <div>
                    <ul>
                      <li class="zx_li_1"><img src="zxks/../images/zx_04.jpg" /></li>
                      <li class="zx_li_2">
                        <div class="zx_li_2_dv1">
                          <dl>
                            <dt><a href="Education/zxks/zx_nlist.php?cid=22">自考政策</a></dt>
                            <dt><a href="Education/zxks/zx_nlist.php?cid=23">报名信息</a></dt>
                            <dt><a href="Education/zxks/zx_nlist.php?cid=24">自考常识</a></dt>
                            <dt><a href="Education/zxks/zx_nlist.php?cid=25">各地新闻</a></dt>
                            <dt><a href="Education/zxks/zx_nlist.php?cid=26">自考辅导</a></dt>
                            <dt><a href="Education/zxks/zx_nlist.php?cid=27">成绩查询</a></dt>
                          </dl>
                        </div>
                      </li>
                      <li class="zx_li_6"></li>
                      <li class="zx_li_4"><img src="zxks/../images/zx_05.jpg" /></li>
                      <li class="zx_li_5">
                        <div class="zx_li_2_dv1">
                          <dl>
                            <dt><a href="Education/zxks/zx_nlist.php?cid=28">择校指南</a></dt>
                            <dt><a href="Education/zxks/zx_school.php">自考院校</a></dt>
                            <dt><a href="Education/zxks/zx_ask.php">自考问答</a></dt>
                            <dt><a href="Education/zxks/zx_nlist.php?cid=30">复习备考</a></dt>
                            <dt><a href="Education/zxks/zx_zkzy.php">自考专业</a></dt>
                            <dt><a href="Education/zxks/zx_nlist.php?cid=31">经验分享</a></dt>
                          </dl>
                        </div>
                      </li>
                      <li class="zx_li_6"></li>
                      <li class="zx_li_7"><img src="zxks/../images/zx_06.jpg" /></li>
                      <li class="zx_li_8">
                        <div class="zx_li_2_dv1">
                          <dl>
                            <dt><a href="Education/zxks/zx_gaoqizhuan.php">高起专</a></dt>
                            <dt class="zx_li_2_dv1_1"><a href="Education/zxks/zx_zhuansben.php">专升本</a></dt>
                            <dt><a href="Education/zxks/zx_gaoqiben.php">高起本</a></dt>
                            <dt><a href="Education/zxks/zx_nlist.php?cid=32">试题库</a></dt>
                          </dl>
                        </div>
                      </li>
                      <li class="zx_li_6"></li>
                      <li class="zx_li_7"><img src="zxks/../images/zx_07.jpg" /></li>
                      <li class="zx_li_9">
                        <div class="zx_li_2_dv1">
                          <dl>
                            <dt><a href="Education/zxks/zx_nlist.php?cid=33">考试计划</a></dt>
                            <dt><a href="Education/xl_gxjz.php">简章大全</a></dt>
                          </dl>
                        </div>
                      </li>
                      <li class="zx_li_6"></li>
                      <li class="zx_li_10">自考不限户口、职业、年龄、学历、一律免考入学，多种形式上课，专业任选</li>
                    </ul>
                  </div>
                </div>
                <div class="main_xl_pro_box02_mu3"><img src="zxks/../images/zx_03.jpg" /></div>
              </div>
              <div class="zx_zx_dk">
                  <div class="zx_zx_fd">
                    <div class="zx_zx_lj">
                        <dl>
                          <dd><span><a href="#">首页</a></span></dd>
                          <dt><img src="../../images/bx_hw_03.jpg" width="17" height="30" /></dt>
                          <dd><a href="Education/zxks/">自学考试</a></dd>
                          <dt><img src="../../images/bx_hw_03.jpg" width="17" height="30" /></dt>
                          <dd><strong><?=$ction?></strong></dd>
                          <dt><img src="../../images/bx_hw_03.jpg" width="17" height="30" /></dt>
                        </dl>
                     </div>
                  </div>
                  <div class="zx_wzgg">
                    <div class="zx_gg_lm">
                      <div class="zx_gg_zl"><?=$ction?></div>
                    </div>
                    <div class="zx_lm_dian"><img src="../../images/wl-gg_06.jpg" /></div>
               
           <div class="zx_xw_dk33">
           <?php 
					 $rs=mysql_query("select * from xlbk where bk_id=1",$conn);					 
					if (mysql_num_rows($rs)>=1){
	                while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
					?>
           <div class="main_xl_gxjz_left_box_list_001">
             <div class="main_xl_gxjz_left_box_list_box00" id="z_<?php echo $row["bk_id"];?>" style="">
               <?php 
					 $rsa=mysql_query("select distinct zyclass from kkinfo where zyclass like '%".$ction."%' and bk_id=".$row["bk_id"],$conn);					 
					if (mysql_num_rows($rsa)>=1){
	                while ($rowa=mysql_fetch_array($rsa,MYSQL_ASSOC)){
					?>
               <div class="main_xl_gxjz_left_box_list_box002_list">
                 <h1><?php echo $rowa["zyclass"];?></h1>
                 <ul>
                   <?php 
								$rsb=mysql_query("select * from kkinfo where zyclass='".$rowa["zyclass"]."' and bk_id=".$row["bk_id"],$conn);					 
								if (mysql_num_rows($rsb)>=1){
								while ($rowb=mysql_fetch_array($rsb,MYSQL_ASSOC)){
		  $rs1=mysql_query("select s_name from school where s_id=".$rowb["s_id"],$conn); 
		  $rw=mysql_fetch_assoc($rs1);
								
								?>
                   <li>·<a href="Education/xl_pro_detail.php?kid=<?php echo $rowb["kid"];?>&sid=<?php echo $rowb["s_id"];?>" title="<?php echo $rowb["ktitle"];?>">[<?php echo $rw["s_name"];?>]<?php echo $rowb["ktitle"];?></a>(<a href="Education/xl_pro_zyjs.php?kid=<?php echo $rowb["kid"];?>&sid=<?php echo $rowb["s_id"];?>" title="<?php echo $rowb["zyname"];?>"><?php echo $rowb["zyname"];?></a>)</li>
                   <?php }}?>
                 </ul>
               </div>
               <?php }}?>
             </div>
           </div>
           <?php }}?>
           </div>
                  
                   
          </div>
              </div>    
             <div class="zxks_xx_right">   
              <div class="zx_zxfs">
               <div class="main_box01_right_01_pr">
           			<ul>
<li><a href=tencent://message/?uin=<?php echo $qq1;?>&Site=<?php echo $z_name;?>&Menu=yes title="在线咨询1"><img border="0" src=http://wpa.qq.com/pa?p=1:<?php echo $qq1;?>:1 align="top"/></a></li>
<li><a href=tencent://message/?uin=<?php echo $qq2;?>&Site=<?php echo $z_name;?>&Menu=yes title="在线咨询2"><img border="0" src=http://wpa.qq.com/pa?p=1:<?php echo $qq2;?>:1 align="top"/></a></li>
                </ul>
            	  </div>
              </div>
              <div class="zx_hw_dk">
               	  <div class="zx_hw_bj">
                    	<div class="zx_hw_bt"><span>热门推荐</span></div>
                    </div>
                    <div class="zx_hw_xian"></div>
                    <div class="zx_hw_xw">
                    	<ul>
                        	<?php
						$sql="select * from ennews where ntype=2 and nbool=1 order by ndate desc limit 5";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
						?>
                <li><a href="Education/zxks/zx_nlist_detail.php?id=<?php echo $row["nid"];?>" title="<?php echo $row["ntitle"];?>"><?php echo msubstr($row["ntitle"],23)?></a></li>                 
                        <?php
						}}
						?>
                        </ul>
                    </div>
                </div>
                <div class="zx_hw_dk" style="height:159px;">
                	<div class="zx_hw_bj">
                    	<div class="zx_hw_bt"><span>自考学校</span></div>
                    </div>
                    <div class="zx_hw_xian"></div>
                    <div class="zx_hw_xw2">
                    	<ul>
      <?php
      $sql="select * from kkinfo where bk_id=1 order by kkdate desc limit 5";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	  
	 if (mysql_num_rows($rs)>=1){
	
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){ 
		 $rsa=mysql_query("select s_name,s_xyjs from school where s_id=".$row["s_id"],$conn); 
		 $rowa=mysql_fetch_assoc($rsa);
                            ?>
         <li><a href="Education/xl_pro_detail.php?kid=<?=$row["kid"]?>&sid=<?=$row["s_id"]?>"><?=$rowa["s_name"]?></a></li>
      <?php }}?>
                        </ul>
                    </div>
                </div>
                <div class="zx_hw_dk_001">
                	<div class="zx_hw_bj">
                    	<div class="zx_hw_bt"><span>咨询解答</span></div>
                    </div>
                    <div class="zx_hw_xian"></div>
                    
      <?php
      $sql="select * from wdonline where s_name in(".$sname.") and wd_bool=1 order by wd_stime desc limit 3"; 
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	  
	 if (mysql_num_rows($rs)>=1){	 
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
    	 $rs5=mysql_query("select s_id,s_name from school where s_name='".$row["s_name"]."'",$conn); 
		 $row5=mysql_fetch_assoc($rs5);
		   $rs6=mysql_query("select * from kkinfo where s_id=".$row5["s_id"],$conn); 
		   $row6=mysql_fetch_assoc($rs6);
		 // if ($rowb["bk_id"]==1){
			 ?>
                    <div class="wl_hd">
                     <ul>
                     <li><span>[问]</span><a href="Education/xl_pro_zxtw.php?kid=<?=$row6["kid"]?>&sid=<?=$row6["s_id"]?>"><?=$row["wd_ask"]?>...<?=date('Y-m-d',strtotime($row["wd_stime"]))?></a></li>
                     <li><span>[答]</span><?=$row["wd_answer"]?>...<?=date('Y-m-d',strtotime($row["wd_ltime"]))?></li>
                     </ul>
    				</div>
             <?php }}?>
             		<div style="clear:both; height:12px;"></div>
                </div>
              </div>
            </div>
          </div>
  <!-- bottom -->
  <?php include("../../bottom/bottom.html");?>
  <!-- bottom End --> 
        </div>
      
</body>
</html>