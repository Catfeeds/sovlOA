<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>企业信息列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
</HEAD>
<?php include("../conn.php");?>
<script type="text/javascript" src="lgHttp.js"></script>
<BODY>
<?php

if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
  if (isset($_POST["cp_title"])){
      $sql="insert into cpinfo set cp_title='".$_POST["cp_title"]."',cp_info='".$_POST["cp_info"]."',cp_date='".$_POST["cp_date"]."'";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
      echo"<script>alert('添加成功');location.href='z_cpinfo.php';</script>";	  
	  }else{
	  
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }

include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('cp_info') ;
$oFCK->BasePath   = $sBasePath ;
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">企业信息：添加，修改介绍企业相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="z_infoadd.php">添加企业信息</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="z_cpinfo.php" >查看企业信息</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="forminfo" method="post" onSubmit="return infoset()" action="">
  <tr>
    <td colspan="5" class="mian_right_box_title_01">【添加企业信息】</td>
	</tr>
	  <tr>
    <td height="33" colspan="4" align="right" bgcolor="#FFFFFF" class="title">信息标题：</td>
	<td width="919" bgcolor="#FFFFFF" class="title"><input type="text" name="cp_title" id="cp_title" value="" maxlength="40" style="width:300px;"/><span id="intitle">*</span></td>
    </tr>
	  <tr>
	    <td height="56" colspan="4" align="right" bgcolor="#FFFFFF" class="title">信息内容：<span id="incon"></span></td>
        <td bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php $oFCK->Create();?></td>
    </tr>
	  <tr>
	    <td height="38" colspan="4" align="right" bgcolor="#FFFFFF" class="title">提交时间：</td>
        <td bgcolor="#FFFFFF" class="title"><input type="text" name="cp_date" id="cp_date" value="<?php echo date("Y-m-d H:i:s");?>" maxlength="40" style="width:300px;"/></td>
    </tr>
	  <tr>
	    <td height="29" colspan="4" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
        <td bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" value="保存信息"></td>
    </tr>

  </form>
</table>
</div>
</BODY>
</HTML>
