<?php
include_once("../../conn.php");

include_once("../xl_webstep.php");
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
		  $classid=$_GET['classid'];
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
        <?php include_once "bx_left.php" ?>
        <?php
		$sql="select * from enclass where n_id='$classid'";     
	    $rs=mysql_query($sql,$conn);
		$row=mysql_fetch_assoc($rs);
		
		?>
        <div class="wl-zx-fd">
          <div class="wl-zx-lj">
            <dl>
              <dd><span><a href="<?=$z_website?>">首页</a></span></dd>
              <dt><img src="<?=$z_website?>images/bx_hw_03.jpg" width="17" height="30" /></dt>
              <dd><a href="<?=$z_website?>Education/gjbx/">国际办学</a></dd>
              <dt><img src="<?=$z_website?>images/bx_hw_03.jpg" width="17" height="30" /></dt>
              <dd><strong><?=$row['n_class']?></strong></dd>
              <dt><img src="<?=$z_website?>images/bx_hw_03.jpg" width="17" height="30" /></dt>
            </dl>
          </div>
        </div>
        <div class="wl-wzgg">
          <div class="wl-gg-lm">
            <div class="wl-gg-zl"><?=$row['n_class']?></div>
          </div>
          <div class="wl-lm-dian"><img src="<?=$z_website?>images/wl-gg_06.jpg" /></div>
          <div class="wl-xw-dk">
          <?php
		  $sql="select * from ennews where nclass='$classid' and npic!='' order by ndate desc";     
	      $rs=mysql_query($sql,$conn);
		  $row=mysql_fetch_assoc($rs);
		  $new_id=$row['nid'];
		  ?>
            <div class="wl-xw-tu"><a href="Education/gjbx/bx_zx_neiye.php?id=<?=$row['nid']?>"><img src="<?=$z_website?>admin_root/<?=$row['npic']?>"/></a></div>
            <div class="wl-xw-bt"><a href="Education/gjbx/bx_zx_neiye.php?id=<?=$row['nid']?>"><?=$row['ntitle']?></a></div>
            <div class="wl-xw-sj"><?=date("Y-m-d",strtotime($row['ndate']))?></div>
            <div class="wl-xw-nr"><?=$row['ncon']?></div>
          </div>
          <?php			
			$numq=mysql_query("select * from ennews where nclass='$classid' and nid!='$new_id'");
			$num = mysql_num_rows($numq);
			$PageSize=4;
			$sumpage=ceil($num/$PageSize);
			$CurrentPageID=@$_GET['page'];
			if (!$CurrentPageID){
				$CurrentPageID=1;
			}
			$page=($CurrentPageID-1)*$PageSize;
			$sql="select * from ennews where nclass='$classid' and nid!='$new_id' limit $page,$PageSize";
			$rs=mysql_query($sql,$conn);
			while($row=mysql_fetch_assoc($rs)){
			?>
          <div class="wl-xw-dk2">
            <div class="wl-wzgg-bt"><span><a href="Education/gjbx/bx_zx_neiye.php?id=<?=$row['nid']?>"><?=$row['ntitle']?></a></span><?=date("Y-m-d",strtotime($row['ndate']))?></div>
            <div class="wl-wzgg-nr"><?=$row['ncon']?><span><a href="Education/gjbx/bx_zx_neiye.php?id=<?=$row['nid']?>">查看详细>></a></span></div>
          </div>
          <?php }?>
          
          
          <div class="wl-gg-fy">
            	<div class="fy-syy"><a href="Education/gjbx/bx_zx.php?classid=<?php echo $classid;?>&page=<?php echo ($CurrentPageID-1);?>"><img src="<?=$z_website?>images/wl-gg_18.jpg" /></a></div>
                <?php
				if($CurrentPageID>1){
					for ($k=($CurrentPageID-1);$k<$CurrentPageID&$k>0;$k++){
						echo '<div class="zx_fy_sz"><a href="Education/gjbx/bx_zx.php?classid='.$classid.'&page='.$k.'">'.$k.'</a></div>';
					}
				}
				?>
                <div class="zx_fy_sz"><?php echo $CurrentPageID?></div>
                <?php
				if($CurrentPageID<$sumpage){
					for ($m=$CurrentPageID;$m<$sumpage&$m<($CurrentPageID+1);$m++){
						echo '<div class="zx_fy_sz"><a href="Education/gjbx/bx_zx.php?classid='.$classid.'&page='.($m+1).'">'.($m+1).'</a></div>';
					}
				}
				?>
                <div class="fy-syy"><a href="Education/gjbx/bx_zx.php?classid=<?php echo $classid;?>&page=<?php if($CurrentPageID<$sumpage) echo ($CurrentPageID+1); else echo $CurrentPageID;?>"><img src="<?=$z_website?>images/wl-gg_28.jpg" /></a></div>
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