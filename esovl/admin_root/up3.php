<?php

/*
 * Programmer : Msn/QQ haowubai@hotmail.com (925939)
 * www.php100.com Develop a project PHP - MySQL - Apache
 * Window 2003 - Preferences - PHPeclipse - PHP - Code Templates
 */
header('Content-Type:text/html;charset=utf-8'); 
if (@is_uploaded_file($_FILES['upfile']['tmp_name'])){

$upfile=$_FILES["upfile"];
$formname=@$_GET["formname"];
$editname=@$_GET["editname"]; 
$name = time();//$upfile["name"];
$type = $upfile["type"];
$size = $upfile["size"];
$tmp_name = $upfile["tmp_name"];
$error = $upfile["error"];

if ($size>1024*1000){
echo "<script>alert('文件过大,大小请小于1M');location.href='up3.php';</script>";
}
//echo $type;
switch ($type) {
	case 'application/msword' : 
	$name=$name.".doc";
	$ok=1;
		break;
	case 'application/vnd.ms-excel' : 
	$name=$name.".xls";
	$ok=1;
		break;
	case 'application/pdf' : 
	$name=$name.".pdf";
	$ok=1;
		break;
	case 'application/octet-stream' : 
	$name=$name.".rar";
	$ok=1;
		break;
}
	if (@$ok!=1){
	echo "<script>alert('文件格式不正确,请重试');location.href='up3.php';</script>";
	}
if($ok && $error=='0'){
 move_uploaded_file($tmp_name,'upload/'.$name);
 //echo "上传成功";
 echo "<script>alert('上传成功');window.opener.document.".$formname.".".$editname.".value='upload/".$name."';window.close();</script>";
}
}


?><style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>


<table width="425" height="148" style="font-size:12px">
<form action="" enctype="multipart/form-data" method="post" name="upform">
  <tr>
    <td height="23" bgcolor="#f1f1f1">文件上传</td>
  </tr>
  <tr>
    <td height="89" align="center">上传文件:
      <input name="upfile" type="file" /></td>
  </tr>
  <tr>
    <td height="26" align="center" bgcolor="#f1f1f1"><input name="submit" type="submit" value="开始上传" /></td>
  </tr>
  </form>
</table>