<?php 
include_once("../conn.php");
include_once("../webstep.php");
?>
<?php 
if($_SESSION["yes"]!=571){
	echo "<script>alert('您没有登录');location.href='../vip_login.php';</script>";
	}
?>
<?php
  if (isset($_POST["v_pass"])){ 
      $sql="update vip set v_pass='".md5($_POST["v_pass"])."' where v_id=".$_SESSION["v_id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
	
      echo"<script>alert('修改成功');location.href='out.php';</script>";
	  }else{
	  exit("更新失败! 错误信息为:".mysql_error());
	  }}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一休网--修改密码</title>
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<link href="../css/top.css" rel="stylesheet" type="text/css" />
<link href="../css/main.css" rel="stylesheet" type="text/css" />
<link href="../css/bottom.css" rel="stylesheet" type="text/css" />
<link href="../css/vip.css" rel="stylesheet" type="text/css" />
<script src="../js/style.js"></script>
<script src="../js/vip.js"></script>
</head>
<body>
<div class="wrapper">
<!-- top -->
<?php 
include("../top/top_1.html");
include("../top/index_top1.html");
?>
<!-- top End -->
<!-- main -->
<div class="main">
	<div class="vip">
    	<div class="vip_title"><em>修改密码</em></div>
        <div class="vip_box">
<?
include("vip_left.php");
?>
        </div>
            <div class="vip_box_right">
            	<div class="vip_box_right_b00">
                	<div class="vip_box_right_b">
                        <div class="vip_box_right_b_list01_d">
                        	<div class="vip_box_right_b_list01_title_d">
                            	<dl><dt>修改密码</dt><dd>&nbsp;</dd></dl>
                            </div>
                            <div class="vip_box_right_b_list01_text_d">                            
<div class="vip_index_right_box_biaoge">
<form name="creator" method="post" id="creator" onsubmit="return zcXMLHttp()" action="">
              	<!--<dl>
                    <dt>原密码：</dt>
                    <dd><input type="text" name="v_ps" style="ime-mode:disabled" onkeydown="if(event.keyCode==32) return false" maxlength="20" onblur="userXMLHttp(this.value)"/>
            	      <span id="vps">用户名应该输入4-20个英文字母或数字</span></dd>
                    </dl>-->
                    <dl>
                    <dt>新密码：</dt>
                    <dd><input name="v_pass" type="password" onkeydown="if(event.keyCode==32) return false" style="ime-mode:disabled" maxlength="20"/><span id="vpass"></span></dd>
                    </dl>
                    <dl>
                    <dt>确认密码：</dt> 
                    <dd><input name="v_dpass" type="password" /><span id="vdpass"></span></dd>
                    </dl>
                    <div class="vip_index_right_box_biaoge_anniu">
                    <input type="image" src="../images/xgmm.jpg" onclick="userXMLHttp(this.value)"/>
                    </div>
</form>
                </div>
                            </div>
                        </div>
                    </div>    
              </div>
            </div>
        </div>
    </div>
</div><!-- main End -->
<!-- bottom -->
<?php include("../bottom/bottom.html");?>
<!-- bottom End -->
</div>
</body>
</html>