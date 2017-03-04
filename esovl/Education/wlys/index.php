<?php
include_once("../../conn.php");
include_once("wl_webstep.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$wl_title?></title>
<meta name="keywords" content="<?=$wl_keyword?>" />
<meta name="description" content="<?=$wl_contant?>" />
<base href="http://<?php echo $_SERVER['SERVER_NAME'];?>/">
<link href="../../css/css.css" rel="stylesheet" type="text/css" />
<link href="../../css/top.css" rel="stylesheet" type="text/css" />
<link href="../../css/main.css" rel="stylesheet" type="text/css" />
<link href="../../css/bottom.css" rel="stylesheet" type="text/css" />
<script src="../../js/style.js"></script>
<link href="../../css/main2.css" rel="stylesheet" type="text/css" />
</head>

<body>
        <div class="wrapper">
          <!-- top -->
          <div class="top">
            <?php 
	include("../../top/top_1.html");
	include("../../top/xl_top.html");
	?>
          </div>
          <!-- top End -->
          <!-- main -->
          <div class="main">
            <div class="main_xl_pro">
              <div class="main_xl_pro_box01">
                
                  <div class="main_xl_pro_box01_left">
                    <?php
		$sql="select * from xl_s_h limit 4";
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
                        <div id="tbc_0<?php echo $i;?>" class=""><a href="<?php echo $row["s_h_http"];?>"><img src="<?=$z_website?>admin_root/<?php echo $row["s_h_pic"];?>"/></a></div>
                        <?php }	?>
                      </div>
                      <div class="main_xl_pro_box01_left_text">
                        <ul>
                          <?php
				$sql="select * from xl_s_h limit 4";
                $rs=mysql_query($sql); 
				$j=0;
				while ($row=mysql_fetch_assoc($rs)){
				$j=$j+1;
				?>
                          <li id="tb_<?php echo $j;?>" <?php if($j!=1){echo "class='normaltab1'";}else{echo "class='hovertab1'";}?> onmouseover="HoverLi(3);OvHoverLi(<?php echo $j;?>);">·<a href="<?php echo $row["s_h_http"];?>"><?php echo $row["s_h_title"];?></a></li>
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
                      <li>·<a href="Education/xl_pro_detail.php?kid=<?php echo $row2["kid"];?>&sid=<?php echo $row["s_id"];?>"><?php echo $row1["s_name"];?></a></li>
                      <?php }}?>
                    </ul>
                  </div>
              </div>
              <div class="main_xl_pro_box02">
                <div class="main_xl_pro_box02_title">
                  <dl>
                    <dt><a href="Education/wlys/">网络院校</a></dt>
                    <dd><a href="Education/">学历教育</a></dd>
                    <dd><a href="Education/zxks/">自学考试</a></dd>
                    <dd><a href="Education/crgk/">成人高考</a></dd>
                    <dd><a href="Education/gjbx/">国际办学</a></dd>
                    <dd><a href="Education/xl_gxjz.php">高校简章</a></dd>
                    <dd><a href="Education/xl_pro_search.php">简章搜索</a></dd>
                    <dd><a href="Education/gfb/">高复班</a></dd>
                  </dl>
                </div>
              </div>
              <div class="main_xllb">
                <div class="wl-wy">
                  <div class="wl-tz"><img src="<?=$z_website?>images/wl-tz_03.jpg" /></div>
                  
                        <div class="wl-wk">
                          <div class="wl-nk"><img src="<?=$z_website?>images/wl-tz_08.jpg" /></div>
                          
                          <div class="wl-nk-contant">
                          
                          	<div class="wl_xytj_list">
        <?php
		$sql="select * from mb_step join school on mb_step.s_name=school.s_name where mb_step.mb_tj=1 order by mb_step.mb_id desc";
		$rs=mysql_query($sql,$conn);
		$row=mysql_fetch_assoc($rs);		
		?>
        		<div id="demomain">
                    <div id="indemomain">
                      <div id="demo1main">
        					<div class="wl_xytj_list_gd">
                            <?php if(isset($row["s_name"])){?>
                            <div class="tz-tu">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle">
<a href="<?=$z_website?>school/?sid=<?=$row['mb_id']?>" target="_blank"><img src="<?=$z_website?>admin_root/<?php echo $row['mb_logo'];?>" onload="if(this.width>92){this.width=92}" border="0" align="top"/></a>
</td>
</tr>
</table> 
                            </div>
                            <div class="tz-bt"><a href="school/?sid=<?=$row['mb_id']?>" target="_blank"><?php echo $row['s_name']; ?></a></div>
                            <div class="tz-wz"><?php echo strip_tags($row['s_xyjs']);?></div>
                            <div class="tz-xx"></div>
                            <?php }
							$row=mysql_fetch_assoc($rs);
							if(isset($row["s_name"])){
							?>
                            <div class="tz-tu">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle">
<a href="<?=$z_website?>school/?sid=<?=$row['mb_id']?>" target="_blank"><img src="<?=$z_website?>admin_root/<?php echo $row['mb_logo'];?>" onload="if(this.width>92){this.width=92}" border="0" align="top"/></a>
</td>
</tr>
</table></div>
                            <div class="tz-bt"><a href="<?=$z_website?>school/?sid=<?=$row['mb_id']?>" target="_blank"><?php echo $row['s_name']; ?></a></div>
                            <div class="tz-wz"><?php echo strip_tags($row['s_xyjs']);?></div>
                            <div class="tz-xx"></div>
                            </div>
                            <div class="wl_xytj_list_gd2">
                            <?php }
							$row=mysql_fetch_assoc($rs);
							if(isset($row["s_name"])){
							?>
                            <div class="tz-tu">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle">
<a href="<?=$z_website?>school/?sid=<?=$row['mb_id']?>" target="_blank"><img src="<?=$z_website?>admin_root/<?php echo $row['mb_logo'];?>" onload="if(this.width>92){this.width=92}" border="0" align="top"/></a>
</td>
</tr>
</table>
                            </div>
                            <div class="tz-bt"><a href="<?=$z_website?>school/?sid=<?=$row['mb_id']?>" target="_blank"><?php echo $row['s_name']; ?></a></div>
                            <div class="tz-wz"><?php echo strip_tags($row['s_xyjs']);?></div>
                            <div class="tz-xx"></div>
                            <?php }
							$row=mysql_fetch_assoc($rs);
							if(isset($row["s_name"])){
							?>
                            <div class="tz-tu">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle">
<a href="<?=$z_website?>school/?sid=<?=$row['mb_id']?>" target="_blank"><img src="<?=$z_website?>admin_root/<?php echo $row['mb_logo'];?>" onload="if(this.width>92){this.width=92}" border="0" align="top"/></a>
</td>
</tr>
</table>
                            </div>
                            <div class="tz-bt"><a href="<?=$z_website?>school/?sid=<?=$row['mb_id']?>" target="_blank"><?php echo $row['s_name']; ?></a></div>
                            <div class="tz-wz"><?php echo strip_tags($row['s_xyjs']);?></div>
                            <div class="tz-xx"></div>
                            <?php }?>
                            </div>                           
                            
                      </div>
                      <div id="demo2main">                      
                       </div>
                      </div>
                  </div>    
                            
                            <div class="tz-an">
                              <input name="input" type="image" src="<?=$z_website?>images/wl-tz_17.jpg" onclick="goleft()" />
                            </div>
                            <div class="tz-an" style="margin-left:10px;">
                              <input name="input" type="image" src="<?=$z_website?>images/wl-tz_19.jpg" onclick="goright()" />
                            </div>
                            
                          </div>
                          
                        </div>
                        <div class="wl-nk-bommom"><img src="<?=$z_website?>images/wl-tz_23.jpg" /></div>
                      </div>
                      <script src="../../js/lright.js" type="text/javascript"></script>
                    
                  <div class="wl-tz-bommom"><img src="<?=$z_website?>images/wl-tz_25.jpg" /></div>
                </div>
                <div class="wl-xw-left"><img src="<?=$z_website?>images/wl-xw_05.jpg" /></div>
                <div class="wl-xw-contant">
                  <div class="wl-xw">
                    <ul>
                      <?php
			$sql="select * from ennews where nclass=16 order by nclick desc limit 3";
			$rs=mysql_query($sql,$conn);
			while ($row=mysql_fetch_assoc($rs)){
				echo "<li><a href='Education/wlys/wl_zx-neiye.php?nid=".$row['nid']."' title='".$row["ntitle"]."'>".msubstr($row["ntitle"],30)."</a></li>";
			}
			?>
                    </ul>
                  </div>
                </div>
                <div class="wl-xw-right"><img src="<?=$z_website?>images/wl-xw_08.jpg" /></div>
                <?php
  $sql="select * from ennews where nclass=38 order by nid desc";
  $rs=mysql_query($sql,$conn);
  for ($k=0;$k<3;$k++){
	  $row=mysql_fetch_assoc($rs);
	  $z_pic[]=$row['npic'];
  }
  ?>
                <div class="wl-lh">
                  <?php include("S_pic.html");?>
                </div>
                <div class="wl-zc-left"><img src="<?=$z_website?>images/wl-zc_27.jpg" /></div>
                <div class="wl-zc-contant">
                  <div class="zc-bt">网络教育政策</div>
                  <div class="zc-more"><a href="Education/wlys/wl_zx.php?classid=15">MORE+</a></div>
                </div>
                <div class="wl-zc-right"><img src="<?=$z_website?>images/wl-zc_30.jpg" /></div>
                <div class="wl-zc-dk">
                  <div class="wl-zc-bt">
                    <ul>
                      <?php
		$sql="select * from ennews where nclass=15 order by nid desc";
		$rs=mysql_query($sql,$conn);
		for ($m=0;$m<6;$m++){
			$row=mysql_fetch_assoc($rs);
			echo "<li><a href='Education/wlys/wl_zx-neiye.php?nid=".$row['nid']."'>".$row['ntitle']."</a></li>";        	
        }
		?>
                    </ul>
                  </div>
                </div>
                <div style="width:950px; float:left;">
                <div class="wl-gg">
                  <div class="wl-gg-left"><img src="<?=$z_website?>images/wl-zc_27.jpg" /></div>
                  <div class="wl-gg-contant">
                    <div class="gg-bt">网站公告</div>
                    <div class="gg-more"><a href="Education/wlys/wl_zx.php?classid=16">MORE+</a></div>
                  </div>
                  <div class="wl-gg-right"><img src="<?=$z_website?>images/wl-zc_30.jpg" /></div>
                  <div class="wl-gg-dk">
                    <div class="wl-gg-bt">
                      <ul>
                        <?php
			$sql="select * from ennews where nclass=16 order by ndate desc";
			$rs=mysql_query($sql,$conn);
			for ($m=0;$m<6;$m++){
				$row=mysql_fetch_assoc($rs);
				echo "<li><a href='Education/wlys/wl_zx-neiye.php?nid=".$row['nid']."'>".$row['ntitle']."</a></li>";
			}
			?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="wl-jz">
                  <div class="wl-zj-bt"><img src="<?=$z_website?>images/wl-jz_60.jpg" /></div>
                  <?php
	$sql="select * from kkinfo join school on kkinfo.s_id=school.s_id where bk_id=3 order by kid desc limit 3";
	$rs=mysql_query($sql,$conn);
	while($row=mysql_fetch_assoc($rs)){		
	?>
                  <div class="wl-zj-tp"><a href="Education/xl_pro_zyjs.php?kid=<?=$row['kid']?>&sid=<?=$row['s_id']?>"><img src="admin_root/<?php echo $row['s_logo']?>" width="110" height="100"/></a><br /><a href="Education/xl_pro_zyjs.php?kid=<?=$row['kid']?>&sid=<?=$row['s_id']?>"><?php echo $row['s_name']?></a></div>
                  <?php }?>
                  <div class="zj-xx"></div>
                  <div class="wl-zj-xx">
                    <ul>
                      <?php
					  $sql="select * from kkinfo order by s_id desc";
					  $rs=mysql_query($sql,$conn);
					  for ($m=0;$m<8;$m++){
					  $row=mysql_fetch_assoc($rs);
			echo "<li><a href='Education/xl_pro_zyjs.php?kid=".$row['kid']."&sid=".$row['s_id']."'>".$row['ktitle']."</a></li>";
		}
		?>
                    </ul>
                  </div>
                </div>
                <div class="wl-zc-left"><img src="<?=$z_website?>images/wl-zc_27.jpg" /></div>
                <div class="wl-zc-contant">
                  <div class="zc-bt">报名流程</div>
                </div>
                <div class="wl-zc-right"><img src="<?=$z_website?>images/wl-zc_30.jpg" /></div>
                <div class="wl-zc-dk">
                  <?php
	$sql="select * from ennews where nclass=20 order by ndate desc";
	$rs=mysql_query($sql,$conn);
	$row=mysql_fetch_assoc($rs);
	?>
                  <div class="wl-zc-lc"><img src="<?=$z_website?>admin_root/<?php echo $row['npic']?>" /></div>
                </div>
                </div>
                <div class="wl-gg">
                  <div class="wl-gg-left"><img src="<?=$z_website?>images/wl-zc_27.jpg" /></div>
                  <div class="wl-gg-contant">
                    <div class="gg-bt">基础知识</div>
                    <div class="gg-more"><a href="Education/wlys/wl_zx.php?classid=18">MORE+</a></div>
                  </div>
                  <div class="wl-gg-right"><img src="<?=$z_website?>images/wl-zc_30.jpg" /></div>
                  <div class="wl-gg-dk">
                    <div class="wl-gg-bt">
                      <ul>
                        <?php
			$sql="select * from ennews where nclass=18 order by ndate desc";
			$rs=mysql_query($sql,$conn);
			for ($m=0;$m<6;$m++){
				$row=mysql_fetch_assoc($rs);
				echo "<li><a href='Education/wlys/wl_zx-neiye.php?nid=".$row['nid']."'>".$row['ntitle']."</a></li>";
			}
			?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="wl-jz">
                  <div class="wl-zj-bt"><img src="<?=$z_website?>images/wl-hd_79.jpg" /></div>
     <?php 
	  $sql="select * from wdonline join (school,kkinfo) on (wdonline.s_name=school.s_name and school.s_id=kkinfo.s_id) where wdonline.wd_bool=1 and kkinfo.bk_id=3 order by wd_stime desc limit 4";
	  $rs=mysql_query($sql,$conn);
	  if (mysql_num_rows($rs)>=1){
	  while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
	 ?>
                  <div class="wl-hd">
                    <dl>
                      <dd><span>[问]</span><a href="Education/xl_pro_zxtw.php?kid=<?=$row["kid"]?>&sid=<?=$row["s_id"]?>" target="_blank" title="<?=$row["wd_ask"]?>"><?=msubstr($row["wd_ask"],46)?></a></dd>
                      <dt style="color:#333;"><?php echo date('Y-m-d',strtotime($row["wd_stime"]))?></dt>
                      <dd><span>[答]</span><?=$row["wd_answer"]?></dd>
                      <dt><?php echo date('Y-m-d',strtotime($row["wd_ltime"]))?></dt>
                    </dl>
                  </div>
                  <div class="zj-xx"></div>
     <?php }}?>
                </div>
                <div class="wl-zc-left"><img src="<?=$z_website?>images/wl-zc_27.jpg" /></div>
                <div class="wl-zc-contant">
                  <div class="zc-bt">学习资料</div>
                </div>
                <div class="wl-zc-right"><img src="<?=$z_website?>images/wl-zc_30.jpg" /></div>
                <div class="wl-zc-dk">
                  <div class="wl-zc-bt">
                    <ul>
                      <?php
		$sql="select * from ennews where nclass=19 order by ndate desc";
		$rs=mysql_query($sql,$conn);
		for ($m=0;$m<6;$m++){
			$row=mysql_fetch_assoc($rs);
			echo "<li><a href='Education/wlys/wl_zx-neiye.php?nid=".$row['nid']."'>"?><?php echo utf_substr($row["ntitle"],36);?><?php "</a></li>";
		}
			?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- main End -->
          <!-- bottom -->
          <?php include("../../bottom/bottom.html");?>
          <!-- bottom End -->
        </div>
     
</body>
</html>