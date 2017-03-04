<?php
include_once("../../conn.php");

include("../xl_pro_public.php");
include_once("gf_webstep.php");
?>
<?php
mysql_query("update mbnews set nclick=nclick+1 where nid=".$_GET["id"]);
  $sql="select * from mbnews join mbclass on mbnews.nclass=mbclass.n_id where nid=".$_GET["id"];
  $rs=mysql_query($sql);			  
  $row=mysql_fetch_array($rs,MYSQL_ASSOC);
  $stitle=$row["ntitle"];
   $scon=$row["ncon"];
    $sclick=$row["nclick"];
	 $sdate=$row["ndate"];
	 $sclass=$row["n_class"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$stitle?></title>
<meta name="keywords" content="<?=$gf_keyword?>" />
<meta name="description" content="<?=$gf_contant?>" />
<base href="http://<?php echo $_SERVER['SERVER_NAME'];?>/">
<link href="../../css/css.css" rel="stylesheet" type="text/css" />
<link href="../../css/top.css" rel="stylesheet" type="text/css" />
<link href="../../css/main.css" rel="stylesheet" type="text/css" />
<link href="../../css/bottom.css" rel="stylesheet" type="text/css" />
<SCRIPT src="../../js/Comm.js"></SCRIPT>
<script src="../../js/jquery.js"></script>
<script src="../../js/style.js"></script>
<script src="../../js/zxks.js"></script>
<link href="../../css/main2.css" rel="stylesheet" type="text/css" />
<SCRIPT>regEvent(window,'onload',function() {SwitchPanel('p','on','off',4,false,2000)});</SCRIPT>
<SCRIPT>regEvent(window,'onload',function() {SwitchPanel('pp','on','off',4,false,3000)});</SCRIPT>
</head>
<body>
<div class="wrapper">
  <!-- top -->
  <div class="top">
    <div class="top_box01">
      <div class="top_box01_00"><img src="<?=$z_website?>images/top01_left.jpg" /></div>
      <div class="top_box01_center">
        <div class="top_box01_center_text01"> 您好，<font color="red"><?php echo @$_COOKIE["vipname"];?></font> 欢迎光临<?php echo $z_name;?>！</div>
        <div class="top_box01_center_text02">
          <ul>
            <li><a href="vip_zc.php">注册</a><span>|</span></li>
            <li><a href="vip_login.php">登陆</a><span>|</span></li>
            <li><a href="vip_center.php">我的一休</a><span>|</span></li>
            <li><a href="about.php?cid=10">帮助中心</a><span>|</span></li>
            <li><a href="javascript:void(null);">网站导航</a><span>|</span></li>
            <li><a href="javascript:void(null);"><strong>上海站</strong>-选择城市</a></li>
          </ul>
        </div>
      </div>
      <div class="top_box01_00"><img src="<?=$z_website?>images/top01_right.jpg" /></div>
    </div>
    <?php include('gfb_mune.php');?>
  </div>
  <!-- top End -->
  <!-- main -->
  <div class="main">
    <div class="gfb_index_tu_01"><img src="<?=$z_website?>admin_root/<?php echo $s_banner;?>" /></div>
    <div class="gfb_index_fu_nov">
      <div class="gfb_index_fu_nov_01">
        <div class="gf_index_nov_top"><img src="<?=$z_website?>images/gfb_index_16.jpg" width="178" height="9" /></div>
        <div class="gf_index_nov_contant">
          <div class="gf_index_nov_001">
            <ul>
              <li><a href="<?=$z_website?>Education/gfb/gfb_index.php">学校首页</a></li>
              <li><a href="<?=$z_website?>Education/gfb/gfb_index.php#gsjj">学校简介</a></li>
              <li><a href="<?=$z_website?>Education/gfb/gfb_list.php?nclass=5">学校动态</a></li>
              <li><a href="<?=$z_website?>Education/gfb/gfb_wd.php">在线问答</a></li>
              <li><a href="<?=$z_website?>Education/gfb/gfb_kczx.php">课程中心</a></li>
            </ul>
          </div>
        </div>
        <div class="gf_index_nov_bottom"><img src="<?=$z_website?>images/gfb_index_27.jpg" width="178" height="9" /></div>
      </div>
      <div class="gf_index_gg_001_002_01">
        <div class="gf_index_bt_bj_001" style="width:758px;">
          <div class="gf_index_bt_wz_001_002_003">
            <?=$sclass?>
            -详细内容</div>
        </div>
        <div class="yixiu_xxdt_nr">
          <?=$stitle?>
        </div>
        <div class="yixiu_xxdt_fbsj">浏览次数：
          <?=$sclick?>
          日期：
          <?=$sdate?>
          来源：
          <?=$z_name?>
        </div>
        <div class="yixiu_xxdt_fbnr">
          <?=$scon?>
        </div>
        <div class="yixiu_xxdt_fbnr_001"><a href="javascript:history.go(-1);">[返回上一页]</a></div>
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