<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>培训学校名称列表</TITLE>
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
  
  if (isset($_POST["pxs_name"])){
      $sql="insert into pxschool set pxs_name='".$_POST["pxs_name"]."'";
	  $rs=mysql_query($sql,$conn);
	  	  if ($rs){	 
      echo"<script>alert('添加成功');location.href='px_list_school.php';</script>";
	  }else{	  
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  } 

?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">培训学校名称：添加，修改</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="px_school.php" >添加培训学校信息</a><font color="#0000FF"> | </font><a href="px_list_school.php" >查看培训学校类别列表</a></td>
  </tr>
</table>

<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="formpx" method="post" onSubmit="return pxschool()" action="">
  <tr>
    <td colspan="2" class="mian_right_box_title_01">【添加培训学校分类】</td>
	</tr>
	  <tr>
    <td width="319" height="-2" align="right" bgcolor="#FFFFFF" class="title">培训学校名称：</td>
	<td width="998" bgcolor="#FFFFFF" class="title"><input type="text" name="pxs_name" id="pxs_name" value="" maxlength="40" style="width:300px;"/></td>
    </tr>
	  <tr>
	    <td width="319" height="16" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
	    <td bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit2" value="添加学院信息">　
	      <input type="reset" name="reset" value="重写"></td>
      </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
