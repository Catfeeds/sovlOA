<?php
include_once("../../conn.php");

include_once("bx_webstep.php");
$sql="select * from web_step where z_id=5";
$rs=mysql_query($sql);
$row=mysql_fetch_assoc($rs);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$row['z_title']?></title>
<meta name="keywords" content="<?=$row['z_keyword']?>" />
<meta name="description" content="<?=$row['z_contant']?>" />
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
          	<dt><a href="Education/gjbx/">国际办学</a></dt>
            <dd><a href="Education/wlys/">网络院校</a></dd>
            <dd><a href="Education/">学历教育</a></dd>
            <dd><a href="Education/zxks/">自学考试</a></dd>
            <dd><a href="Education/crgk/">成人高考</a></dd>
            
            <dd><a href="Education/xl_gxjz.php">高校简章</a></dd>
            <dd><a href="Education/xl_pro_search.php">简章搜索</a></dd>
            <dd><a href="Education/gfb/">高复班</a></dd>
          </dl>
        </div>
      </div>
      <div class="main_xllb">
      	<div class="hz-k1"><img src="<?=$z_website?>images/bx-hz_03.jpg" width="3" height="35" /></div>
        <div class="hz-k2">
       	  <div class="hz-bt">中外合作</div>
        </div>
      	<div class="hz-k1"><img src="<?=$z_website?>images/bx-hz_06.jpg" width="4" height="35" /></div>
        <div class="hz-dk">
        	<div class="hz-dian"><img src="<?=$z_website?>images/bx-hz_11.jpg" width="7" height="4" /></div>
        <div class="hz-lx">
            	<div class="hz-lx-tu"><img src="<?=$z_website?>images/bx-hz_15.jpg" width="235" height="253" /></div>
                <div class="hz-lx-kuang">
                	<div class="hz-lx-bt">海外留学项目</div>
                    <div class="lx-hx"></div>
                    <div class="hz-lx-gg">
                    	<ul>
                    <?php 
					$rs1=mysql_query("select * from kkinfo join school on kkinfo.s_id=school.s_id where bk_id=2  order by kkdate desc limit 8",$conn);		 
					if (mysql_num_rows($rs1)>=1){						
	                while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
					?>
                       <li><a href="Education/xl_pro_detail.php?kid=<?=$row1['kid']?>&sid=<?=$row1['s_id']?>"><?=$row1['ktitle']?></a></li>
                    <?php }}?>
                            
                        </ul>
                    </div>
                </div>
                <div class="hz-hw-dk">
                	<div class="hz-hw-bj">
                    	<div class="hz-hw-bt"><span>热点资讯</span><a href="Education/gjbx/bx_zx.php?classid=37">更多>></a></div>
                    </div>
                    <div class="hz-hw-xian"></div>
                    <div class="hz-hw-xw">
                    	<ul>
                        <?php
						$sql="select * from ennews where nclass=37 order by nid desc";
						$rs=mysql_query($sql,$conn);
						for ($m=0;$m<6;$m++){
						$row=mysql_fetch_assoc($rs);
						?>
                      <li><a href="Education/gjbx/bx_zx_neiye.php?id=<?=$row['nid']?>" title="<?=$row["ntitle"]?>"><?=utf_substr($row["ntitle"],24);?></a></li>
                        <?php }?>                            
                        </ul>
                    </div>
                </div>
          </div>
        </div>
        <div class="hz-k3"><img src="<?=$z_website?>images/bx-hzz_18.jpg" width="950" height="4" /></div>
        <div class="hz-k1"><img src="<?=$z_website?>images/bx-hz_03.jpg" width="3" height="35" /></div>
        <div class="hz-k2">
       	  <div class="hz-bt">国际办学</div>
        </div>
      	<div class="hz-k1"><img src="<?=$z_website?>images/bx-hz_06.jpg" width="4" height="35" /></div>
        <div class="hz-dk">
        	<div class="hz-dian"><img src="<?=$z_website?>images/bx-hz_11.jpg" width="7" height="4" /></div>
        <div class="hz-lx">
            	<div class="hz-lx-tu"><img src="<?=$z_website?>images/bx-hz_18.jpg" width="235" height="253" /></div>
                <div class="hz-lx-kuang">
                	<div class="hz-lx-bt">名校推荐</div>
                    <div class="lx-hx"></div>
                    <div class="hz-lx-gg">
                    	<ul>
                        <?php 
					$rs1=mysql_query("select * from kkinfo join school on kkinfo.s_id=school.s_id where bk_id=6  order by kkdate desc limit 8",$conn);		 
					if (mysql_num_rows($rs1)>=1){						
	                while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
					?>
                       <li><a href="Education/xl_pro_detail.php?kid=<?=$row1['kid']?>&sid=<?=$row1['s_id']?>"><?=$row1['ktitle']?></a></li>
                    <?php }}?>
                            
                        </ul>
                    </div>
                </div>
                <div class="hz-hw-dk">
                	<div class="hz-hw-bj">
                    	<div class="hz-hw-bt"><span>海外新闻</span><a href="Education/gjbx/bx_zx.php?classid=36">更多>></a></div>
                    </div>
                    <div class="hz-hw-xian"></div>
                    <div class="hz-hw-xw">
                    	<ul>
                        <?php
						$sql="select * from ennews where nclass=36 order by nid desc";
						$rs=mysql_query($sql,$conn);
						for ($m=0;$m<6;$m++){
						$row=mysql_fetch_assoc($rs);
						?>
                        	<li><a href="Education/gjbx/bx_zx_neiye.php?id=<?=$row['nid']?>"><?=utf_substr($row["ntitle"],24);?></a></li>
                            <?php }?>
                            
                        </ul>
                    </div>
                </div>
          </div>
        </div>
        <div class="hz-k3"><img src="<?=$z_website?>images/bx-hzz_18.jpg" width="950" height="4" /></div>
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