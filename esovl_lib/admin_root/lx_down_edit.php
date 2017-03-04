<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>下载资料列表</TITLE>
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
  
      $sql="update lxdown set lxd_title='".$_POST["lxd_title"]."',lxd_file='".$_POST["lxd_file"]."' where lxd_id=".$_POST["lxd_id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	
      echo"<script>alert('修改成功');location.href='lx_down_list.ph';</script>";
	  }else{	  
	  exit("更新失败! 错误信息为:".mysql_error());
	  }
  }
  
      $sql="select * from lxdown where lxd_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	  $row=mysql_fetch_assoc($rs);
	  }

?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">下载资料：添加，修改介绍企业相关的内容</div></th>
  </tr> 
</table>
<br>
<div class="s_info">
  <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
    <form name="askform" method="post" onSubmit="if(document.askform.lxd_title.value==''){alert('标题为空');document.askform.lxd_title.focus();return false;}" action="">
      <tr>
        <td colspan="2" class="mian_right_box_title_01">【编辑下载资料】</td>
      </tr>
      <tr>
        <td align="right" bgcolor="#FFFFFF" class="title">信息标题：</td>
        <td width="818" colspan="-2" bgcolor="#FFFFFF" class="title"><input name="lxd_id" value="<?php echo $_GET["id"];?>"type="hidden"><input type="text" name="lxd_title" id="lxd_title" value="<?php echo $row["lxd_title"]?>" maxlength="40" style="width:300px;"/>
        <span id="ntil">*</span></td>
      </tr>
      <tr>
        <td height="28" align="right" bgcolor="#FFFFFF" class="title">信息内容：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title">
          <input name="lxd_file" type="text" value="<?php echo $row["lxd_file"];?>" readonly size="30">
          <input name="Submit22" type="button" class="go" onClick="window.open('up3.php?formname=askform&editname=lxd_file','','status=no,scrollbars=no,top=20,left=110,width=420,height=165')" value="上传资料">
注：资料格式.doc、xls、pdf、rar类资料。<span class="STYLE2">(资料请小于1M)</span></td>
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
