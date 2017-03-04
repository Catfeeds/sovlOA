<?php 
include_once("web_start.php");
$user=Userlogin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册完成-<?php echo $z_name;?></title>
<link href="/css/css.css" rel="stylesheet" type="text/css" />
<link href="/css/top.css" rel="stylesheet" type="text/css" />
<link href="/css/main.css" rel="stylesheet" type="text/css" />
<link href="/css/bottom.css" rel="stylesheet" type="text/css" />
<script src="/js/style.js"></script>
</head>
<body>
<div class="wrapper">
<!-- top -->
<div class="top">
<?php 
include("top/top_1.html");
include("top/hy_top1.html");
?>    
</div>
<!-- top End -->
<!-- main -->
<div class="main">
    <div class="main_vip">
      <div class="main_vip_yhzc">
        	<div class="main_vip_yhzc_top">
                <span style="color:#fe8b18; font-size:20px; margin-left:5px;">
                <img src="/images/xl.jpg" />恭喜您已成为一休教育网会员
                </span>
            </div>
          <div class="main_vip_yhzc_center">
          	<div class="main_vip_yhzc_center_box">
            	<div class="main_vip_zcwc_box01">
                    	<dl>
                    	  <dt>用 户 名:</dt>
                    	  <dd><?php echo $user["v_name"]?></dd></dl>						
                        <dl><dt>电话号码:</dt><dd><?php echo $user["v_tel"]?></dd></dl>
                        <dl><dt>电子邮箱:</dt><dd><?php echo $user["v_email"]?></dd></dl>
                </div>
                <div class="main_vip_zcwc_box02">
                	<div class="main_vip_zcwc_box02_anniu">
                        <a href="/bbs/" target="_blank"><img src="/images/jyyxlt.jpg" /></a>
                        <a href="/Vip/vip_index.php" target="_blank"><img src="/images/jyhyzx.jpg" /></a>
                    </div>
                </div>
            </div>
          </div>
         <div class="main_vip_yhzc_bottom"><img src="/images/vip_bottom00bg.jpg" /></div>
      </div>
    </div>
</div>
<!-- main End -->
<!-- bottom -->
<?php include("bottom/bottom.html");?>
<!-- bottom End -->
</div>
</body>
</html>