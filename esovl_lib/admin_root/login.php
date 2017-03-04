<?php ob_start();?>
<?php include_once("../conn.php")?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎登陆一休网站后台</title>
<script language='javascript'>
if (top != self)top.location.href = "login.php"; 
</script>
<SCRIPT language="javascript" src="lgHttp.js"></SCRIPT>
<link href="images/login.css" rel="stylesheet" type="text/css" />
</head>
<?php
if (isset($_COOKIE["admin_root"])){
	if ($_COOKIE["admin_root"]!=""){
	Header("Location:admin_main.php");
}}
?>
<body>
<div class="warpper">
  <table width="529" height="311" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bg.gif">
    <tr>
      <td width="393" colspan="2" valign="top">
	    <div id="stb">
	    <table width="229" height="104" border="0" cellpadding="0" cellspacing="0">
		<form id="form1" name="form1" method="post" onsubmit="return loginXMLHttp()" action="login.php">
          <tr>
            <td height="21" colspan="2"><input name="a_user" maxlength="10" onkeydown="if(event.keyCode==32) return false;" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')"></td>
            </tr>
          <tr>
      <td height="21" colspan="2"><input type="password" name="a_pass" maxlength="20" onkeydown="if(event.keyCode==32) return false;" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')"/></td>
            </tr>
          <tr>
            <td width="68" height="20"><input type="text" name="code" maxlength="4" onkeyup="value=this.value.replace(/\D+/g,'')" style="width:60px"/></td>
            <td width="161" height="21"><img src="code.php" class="ckon"/></td>
          </tr>
          <tr>
            <td height="44" colspan="2">
			<input id="load" name="load" src="images/dl.jpg" type="image"  onfocus="this.blur()"/>
			<img src="images/qx.jpg" width="52" height="21" class="rkon" onclick="document.form1.reset()"/></td>
            </tr></form>
        </table><div id="lgcon"></div>
	  </div></td>
    </tr>
  </table>
</div>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
		 if(@$_POST["code"]!=@$_SESSION["code"]){
?>
	    <script language="javascript">
		document.getElementById("lgcon").style.margin='44px 0px';
		document.getElementById("lgcon").innerHTML="<font color=red>&times;</font><font color=#d9ffa0>验证码有误码!</font>";
		document.form1.code.focus();		
	    </script>
<?php 
		 }else{
		// echo $_POST["a_pass"]."--".md5($_POST["a_pass"])."--".md5(md5($_POST["a_pass"]));

        $sql="select * from admin where a_user='".$_POST["a_user"]."' and a_pass='".md5(md5($_POST["a_pass"]))."'";
        $rs=mysql_query($sql);
        $row=mysql_fetch_assoc($rs);
		if($rs){
		    if (mysql_num_rows($rs)>=1){			 
			 setcookie("admin_root",$_POST["a_user"],time()+3600,"/");
			 setcookie("a_class",$row["a_class"],time()+3600,"/");
			 setcookie("a_con",$row["a_con"],time()+3600,"/");
			// header("Location:admin_main.php");
			 echo"<script>window.location.href='admin_main.php';</script>";
		}else{?>
		<script language="javascript">
		document.getElementById("lgcon").style.margin='4px 0px';
		document.getElementById("lgcon").innerHTML="<font color=red>&times;</font><font color=#d9ffa0>用户名或密码有误!</font>";
		document.form1.a_user.focus();
	    </script>
<?php
}}}}
?>
</body>
</html>
<?php ob_end_flush();?>