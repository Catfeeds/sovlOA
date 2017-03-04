<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>研修版常见问题添加</TITLE>
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
if (isset($_POST["cj_wenti"])){
      $sql="insert into yx_changj set cj_wenti='".$_POST["cj_wenti"]."',cj_huif='".$_POST["cj_huif"]."',cj_pindao='".$_POST["cj_pindao"]."'";
$rs=mysql_query($sql,$conn);
	  if ($rs){
echo"<script>alert('信息添加成功');location.href='yx_wenti_list.php';</script>";
	  }else{	  
 exit("添加失败! 错误信息为:".mysql_error());
}  }
include('fckeditor/fckeditor.php');
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('cj_huif');
$oFCK->BasePath   = $sBasePath ;
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
<tr>
<th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">研修版常见问题信息：添加，修改介绍常见问题相关的内容</div></th>
</tr>
<tr>
<td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow">&nbsp;</td>
</tr>
</table>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="formnews" method="post" onSubmit="return newsset()" action="">
<tr>
<td colspan="5" class="mian_right_box_title_01">【添加研修版常见问题信息】</td>
</tr> 
<tr>
<td height="40" colspan="4" align="right" bgcolor="#FFFFFF" class="title">选择常见问题分类</td>
<td width="919" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
<select name="cj_pindao">
		  <option value=0>--请选择常见问题频道--</option>
	      <option value="MBA/EMBA">MBA/EMBA</option> 
          <option value="工程硕士">工程硕士</option>
          <option value="在职研究生">在职研究生</option>
          <option value="总裁总监研修">总裁总监研修</option>
</select><span id="p_pxlb">*</span></td>
	  </tr>
<tr>
<td height="38" colspan="4" align="right" bgcolor="#FFFFFF" class="title">问题标题：</td>
<td width="919" bgcolor="#FFFFFF" class="title"><input type="text" name="cj_wenti" id="ntitle" value="" maxlength="40" style="width:300px;"/><span id="ntil">*</span></td>
</tr>

<tr>
<td height="56" colspan="4" align="right" bgcolor="#FFFFFF" class="title">问题回复：<span id="incon"></span></td>
<td bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php $oFCK->Create();?></td>
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