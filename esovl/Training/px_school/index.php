<?php
include("../../web_start.php");
include("px_step.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$pxs_name?></title>
<link href="css/px_school.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="wrapper">
  <!-- top -->
  <?php include('top.html');?>
  <!-- top emd  -->
  <!-- mian  -->
  <div class="school_lujing">您现在的位置： <?=$pxs_name?> >> <span>机构首页</span></div>
  <?php include('left.html');?>
  <div class="school_mian_right">
    <div class="school_mian_banner"><?php include("pxmb_flash.html");?></div>
    <div style="clear:both; height:12px;"></div>
    <div class="school_mian_kecheng">

      <div class="school_mian_kc2">
        <ul id="tabfirst">
          <li class='tabin' id="li1" ><a href="#" onmouseover="showdiv('1')"> 重点课程推荐</a></li>
        </ul>
      </div>
      <div class="school_mian_xian"></div>
      <div class="contentin contentfirst" id="content1">
        <div class="school_mian_liebiao">
          <ul>
            <li style="width:240px;">课程名称</li>
            <li style="width:60px;">发布时间</li>
            <li style="width:200px;">上课地点</li>
            <li style="width:69px;">在线报名</li>
          </ul>
          
          <?php
	  $res = $dblink->findAll('pxkkinfo','',"pxs_name='".$_SESSION["pxs_name"]."' and pxk_bool=1",'join pxschool on pxkkinfo.pxk_sid=pxschool.pxs_id','8');
	  foreach($res as $row){		
?>
          <dl>
            <dd style="width:240px;"><?=$row["pxk_title"]?></dd>
            <dt style="width:60px;"><?=$row["pxk_date"]?></dt>
            <dt style="width:200px;"><?=$row["pxk_adder"]?></dt>
            <dt style="width:69px;"><a href="baoming.php"><img src="images/school2_45.jpg" width="69" height="22" /></a></dt>
          </dl>
          <span>&nbsp;</span>
 <?php }?>         
          
          
        </div>
      </div>
      
      <div class="school_mian_xian"></div>
    </div>
    <div class="school_mian_px" style=" height:271px; margin-top:12px;">
      <div class="school_mian_px_bj">
        <div class="school_mian_px_kc">机构展示</div>
        <div class="school_mian_more"><a href="shizi.php?t=huanjin">MORE</a>>></div>
      </div>
      <div class="school_mian_xx_tu">
        <ul>
		 <?php
			$res = $dblink->findAll('szfencai','',"sz_class='学校环境'",'','3');
			foreach($res as $row){		
		 ?>
		<li><a href="shizi_deails.php?sid=<?=$row["sz_id"]?>"><img src="../../admin_root/<?=$row["sz_pic"]?>" width="194" height="177" /></a>
			<?=$row["sz_name"]?></li>
		  <?php }?>
        </ul>
      </div>
    </div>
  </div>
  <!-- mian emd -->
  <!-- bottom -->
  <?php include('bottom.html');?>
  <!-- bottom End -->
</div>
</body>
</html>
