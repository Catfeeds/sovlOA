<?php
header('Content-Type:text/html;charset=utf-8'); 
$uppath=$_GET["uppath"]."/"; //文件上传路径
$formname=$_GET["formname"]; //回传到上页面编辑框所在Form的Name
$editname=$_GET["editname"]; //回传到上页面编辑框的Name

@$style=$_GET["style"];
if (@is_uploaded_file($_FILES['upfile']['tmp_name'])){

$upfile=$_FILES["upfile"];
$name = time();//$upfile["name"];
$type = $upfile["type"];
$size = $upfile["size"];
$tmp_name = $upfile["tmp_name"];
$error = $upfile["error"];

//$type=="application/x-shockwave-flash"

if(isset($style)){
//style后缀指定时
	if($style=="swf"){

	   if($type=="application/x-shockwave-flash"){
		 $name=$name.".swf";
		 $ok=1;
			if ($size>1024*500){
			echo "<script>alert('动画过大,大小请小于500k');location.href='up2.php?formname=".$formname."&editname=".$editname."&uppath=".$uppath."&style=".$style."';</script>";
			}
			
		}else{
			echo "<script>alert('动画格式不正确,请重试');location.href='up2.php?formname=".$formname."&editname=".$editname."&uppath=".$uppath."&style=".$style."';</script>";
			}
		}else{echo"<script>alert('对不起，不支持的文件格式');window.close()";}

}else{
//style后缀未指定时

switch ($type) {//其他文件格式可以在下面增加判断
		case 'image/pjpeg' : 
		$name=$name.".jpg";
		$ok=1;
			break;
		case 'image/jpeg' : 
		$name=$name.".jpg";
		$ok=1;
			break;
		case 'image/gif' :
		$name=$name.".gif";
		 $ok=1;
			break;
		case 'image/png' : 
		$name=$name.".png";
		$ok=1;
			break;
	}
		if (@$ok!=1){
		echo "<script>alert('图片格式不正确,请重试');location.href='up2.php?formname=".$formname."&editname=".$editname."&uppath=".$uppath."&style=".$style."';</script>";
		}
		if ($size>1024*500){
		echo "<script>alert('图片过大,大小请小于500k');location.href='up2.php?formname=".$formname."&editname=".$editname."&uppath=".$uppath."&style=".$style."';</script>";
		}

}
	if($ok && $error=='0'){
 move_uploaded_file($tmp_name,$uppath.$name);
 //echo "上传成功";
 echo "<script>alert('上传成功');window.opener.document.".$formname.".".$editname.".value='".$uppath.$name."';window.close();</script>";
}

}
?>
<style type="text/css">
<!--
body {margin: 0px;}
-->
</style>
<table width="425" height="148" style="font-size:12px">
<form action="" enctype="multipart/form-data" method="post" name="upform">
  <tr>
    <td height="23" bgcolor="#f1f1f1">图片上传</td>
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