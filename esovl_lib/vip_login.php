<?php
include_once("web_start.php");
if($user=Userlogin()){
	echo "<script>location.href='/Vip/vip_index.php';</script>";
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php ob_start();//开启缓冲,使用COOKIE前不能有输出内容?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员登陆-<?php echo $z_name;?></title>
<link href="/css/css.css" rel="stylesheet" type="text/css" />
<link href="/css/top.css" rel="stylesheet" type="text/css" />
<link href="/css/main.css" rel="stylesheet" type="text/css" />
<link href="/css/bottom.css" rel="stylesheet" type="text/css" />
<script src="/js/hyHttp.js"></script> 
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
    	<div class="main_vip_left">
        	<div class="main_vip_left_box">
            	<div class="main_vip_left_box_top"><img src="images/vip_topbg.jpg" /></div>
                <div class="main_vip_left_box_list">
               	  <div class="main_vip_left_box_list_box">
                    	<div class="main_vip_left_box_list_box01"><span>会员登录</span></div>
						<form name="logform" method="post" id="logform" onsubmit="return loXMLHttp()" action="">
                        <div class="main_vip_left_box_list_box02">
                          <dl>
                            <dt>用户名：</dt>
                            <dd style="background-image:url(images/name00.jpg);">
                            <input name="user" type="text" />
                            </dd><dt style="width:110px; text-indent:8px;text-align:left;"><span id="luser"></span></dt>
                          </dl>
                          <dl>
                            <dt>密码：</dt>
                            <dd style="background-image:url(images/password.jpg);">
                              <input name="pass" type="password" />
                            </dd><dt style="width:110px; text-indent:8px; text-align:left;"><span id="lpass"></span></dt>
                          </dl>
                          <div class="main_vip_left_box_list_box02_dlzt">
                            <input name="Input2" type="checkbox" value="" />
                            <label>记住登陆状态？</label>
                          </div>
                          <div class="main_vip_left_box_list_box02_anniu"> <input type="image" src="images/vip_dl.jpg" /> <a href="#" onclick="alert('暂未开通此功能..')">忘记密码？</a> </div>
                        </div>
						</form>
               	  </div>
                </div>
                <div class="main_vip_left_box_bottom"><img src="images/vip_bottombg.jpg" /></div>
            </div>
        </div>
        <div class="main_vip_right">
            <div class="main_vip_left_box">
            	<div class="main_vip_left_box_top"><img src="images/vip_topbg.jpg" /></div>
                <div class="main_vip_left_box_list">
                	<div class="main_vip_left_box_list_box">
                    	<div class="main_vip_left_box_list_box01"><span>新会员注册</span></div>
                        <div class="main_vip_left_box_list_right02">
                        	<div class="main_vip_left_box_list_right02_list">
                            	<h1>注册一休网，成为会员特权更多：</h1>
                                <ul>
                                <li>1.轻松三步搞定注册</li>
                          		<li>2.享受更多贴心专享服务</li>
                                <li>3.更多的学习资料下载</li>
                                </ul>
                                <div class="main_vip_left_box_list_right02_list_anniu"><a href="vip_zc.php"><img src="images/vip_zcxyh.jpg" /></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main_vip_left_box_bottom"><img src="images/vip_bottombg.jpg" /></div>
            </div>  
        </div>
    </div>
</div>
<!-- main End -->
<?php 
if (isset($_POST["user"])){
		echo $num=$dblink->countByStr("vip",array(),"v_name='{$_POST["user"]}' and v_pass='".md5($_POST["pass"])."'");
		if ($num==1){ 
				include './config.inc.php';
				include './uc_client/client.php';
				$newpm = uc_user_login($_POST["user"],$_POST["pass"]);
				echo uc_user_synlogin($newpm['0']);
				echo "<script>location.href='Vip/vip_index.php';</script>";
			}else{
?>
<script language="javascript">
document.getElementById("luser").innerHTML="<font color=red>&times;帐号或密码有误!</font>";
document.logform.user.focus();		
</script>
<?php
}}
ob_end_flush();//输出缓冲内容
?>
<!-- bottom -->
<?php include("bottom/bottom.html");?>
<!-- bottom End -->
</div>
</body>
</html>