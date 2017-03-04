<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>下载留学资料列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.STYLE2 {color: #FF0000}
-->
</style>
</HEAD>
<?php include("../conn.php");?>
<script type="text/javascript" src="lgHttp.js"></script>
<BODY>
<?php

if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
  if (isset($_POST["lxd_title"])){
      $sql="insert into lxdown set lxd_title='".$_POST["lxd_title"]."',lxd_file='".$_POST["lxd_file"]."',lxd_date=now()";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
      echo"<script>alert('信息添加成功');location.href='lx_down_list.php';</script>";	
	  }else{	  
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }

?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">下载留学资料：添加，修改介绍新闻相关的内容</div></th>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="askform" method="post" onSubmit="if(document.askform.lxd_title.value==''){alert('标题为空');document.askform.lxd_title.focus();return false;}if(document.askform.lxd_file.value==''){alert('请上传留学资料');document.askform.lxd_file.focus();return false;}" action="">
  <tr>
    <td colspan="2" class="mian_right_box_title_01">【添加下载留学资料】</td>
	</tr>
	  <tr>
    <td align="right" bgcolor="#FFFFFF" class="title">信息标题：</td>
	<td width="766" colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="lxd_title" value="" maxlength="40" style="width:200px;"/><span id="ntil">*</span></td>
    </tr>
	  <tr>
	    <td height="27" align="right" bgcolor="#FFFFFF" class="title">信息内容：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title"><input name="lxd_file" type="text" value="" readonly size="30"> 
        <input name="Submit22" type="button" class="go" onClick="window.open('up3.php?formname=askform&editname=lxd_file','','status=no,scrollbars=no,top=20,left=110,width=420,height=165')" value="上传留学资料">

注：留学资料格式.doc、xls、pdf、rar类留学资料。<span class="STYLE2">(留学资料请小于1M)</span></td>
    </tr>
	  
	  <tr>
	    <td height="29" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" value="保存信息"></td>
    </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
