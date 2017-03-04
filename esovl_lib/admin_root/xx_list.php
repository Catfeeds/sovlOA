<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>学校推荐</TITLE>
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
  
  if (isset($_POST["xxedit"])){
      $sql="update xxtj set xx_name='".$_POST["xx_name"]."',xx_logo='".$_POST["xx_logo"]."',xx_http='".$_POST["xx_http"]."',xx_bool=".$_POST["xx_bool"]." where xx_id=".$_POST["xx_id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('更新成功');location.href='xx_list.php';</script>";	  
	  }else{	  
	  exit("修改失败! 错误信息为:".mysql_error());
	  }
  }
  
   if (isset($_GET["xxdel"])){
      $sq="delete from xxtj where xx_id=".$_GET["id"];
	  $rss=mysql_query($sq,$conn);
	  if ($rss){	 
      echo"<script>alert('删除成功');location.href='xx_list.php';</script>";	  
	  }else{	  
	  exit("删除失败! 错误信息为:".mysql_error());
	  }
  }

  if (isset($_POST["xxadd"])){
      $sql="insert into xxtj set xx_name='".$_POST["xx_name"]."',xx_logo='".$_POST["xx_logo"]."',xx_http='".$_POST["xx_http"]."',xx_bool=".$_POST["xx_bool"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('添加成功');location.href='xx_list.php';</script>";	  
	  }else{	  
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }
  
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">名校推荐与直达：添加，修改</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow">&nbsp;</td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
  <tr>
    <td class="mian_right_box_title_01">ID：</td>

	<td class="mian_right_box_title_01">标题：</td>
	<td class="mian_right_box_title_01">logo</td>
	<td class="mian_right_box_title_01">链接地址</td>
	<td class="mian_right_box_title_01">首页推荐</td>
	<td class="mian_right_box_title_01">操作</td>
  </tr>
	
	<?php
	  $sql="select * from xxtj";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	 
	     if(mysql_num_rows($rs)>=1){
		 $i=0;
		     while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
			 $i=$i+1;
			 ?>
	
	<form name="xxform<?php echo $i?>" method="post" action="">
	  <tr>

	<td width="76" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["xx_id"];?></td>

    <td width="232" bgcolor="#FFFFFF" class="title"><input name="xxedit" value="editok" type="hidden">
      <input name="xx_id" value="<?php echo $row["xx_id"]?>" type="hidden">
      <input type="text" name="xx_name" id="mx_name" value="<?php echo $row["xx_name"]?>" maxlength="40" style="width:150px;"/></td>
    <td width="332" bgcolor="#FFFFFF" class="title"><input type="text" name="xx_logo" value="<?php echo $row["xx_logo"]?>" style="width:180px;" readonly/>
      <input name="button" type="button" class="go" onClick="window.open('up2.php?formname=xxform<?php echo $i?>&editname=xx_logo&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传小图" /></td>
    <td width="349" bgcolor="#FFFFFF" class="title"><input type="text" name="xx_http" id="xx_http" value="<?php echo $row["xx_http"]?>" maxlength="40" style="width:220px;"/></td>
    <td width="185" bgcolor="#FFFFFF" class="title"><input type="radio" name="xx_bool" value=1 <?php if ($row["xx_bool"]==1){echo "checked";}?>>
      是
        <input type="radio" name="xx_bool" value=0 <?php if ($row["xx_bool"]==0){echo "checked";}?>>
        否</td>
    <td width="147" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" onClick="if(document.xxform<?php echo $i;?>.xx_name.value==''){alert('标题为空');document.xxform<?php echo $i;?>.xx_name.focus();return false;}if(document.xxform<?php echo $i;?>.xx_logo.value==''){alert('LOGO为空');document.xxform<?php echo $i;?>.xx_logo.focus();return false;}if(document.xxform<?php echo $i;?>.xx_http.value==''){alert('链接为空');document.xxform<?php echo $i;?>.xx_http.focus();return false;}" value="更新">
      <a href="xx_list.php?xxdel=ook&id=<?php echo $row["xx_id"]?>" onClick="return confirm('是否将此信息删除?')">删除</a></td>
	  </tr>
  </form>
  <?php
			 }
		 }
	  }
	?>
</table>
</div>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="xxform" method="post" action="">
  <tr>
    <td colspan="9" class="mian_right_box_title_01">【添加链接地址】</td>
	</tr>
	  <tr>
    <td width="104" height="33" align="right" bgcolor="#FFFFFF" class="title">学校名称：</td>
	<td width="177" align="left" bgcolor="#FFFFFF" class="title"><input name="xxadd" value="xxok" type="hidden">
      <input type="text" name="xx_name" id="xx_name" value="" maxlength="40" style="width:140px;"/>      </td>
	<td width="98" align="right" bgcolor="#FFFFFF" class="title">学校logo：</td>
	<td width="327" align="left" bgcolor="#FFFFFF" class="title"><input type="text" name="xx_logo" style="width:180px;" readonly/>
<input type="button" class="go" onClick="window.open('up2.php?formname=xxform&editname=xx_logo&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传小图" /></td>
	<td width="99" colspan="-2" align="center" bgcolor="#FFFFFF" class="title">链接地址：</td>
    <td width="192" bgcolor="#FFFFFF" class="title"><input type="text" name="xx_http" id="xx_http" value="http://" maxlength="40" style="width:150px;"/></td>
    <td width="95" bgcolor="#FFFFFF" class="title">首页推荐：</td>
    <td width="155" bgcolor="#FFFFFF" class="title">
<input type="radio" name="xx_bool" value=1>是
<input type="radio" name="xx_bool" value=0 checked>否</td>
    <td width="65" bgcolor="#FFFFFF" class="title">
	<input type="submit" onClick="if(document.xxform.xx_name.value==''){alert('标题为空');document.xxform.xx_name.focus();return false;}if(document.xxform.xx_pic.value==''){alert('LOGO为空');document.xxform.xx_pic.focus();return false;}if(document.xxform.xx_http.value==''){alert('链接地址为空');document.xxform.xx_http.focus();return false;}" name="Submit" value="添加"></td>
	  </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
