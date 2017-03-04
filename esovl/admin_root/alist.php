<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>名校推荐与直达列表</TITLE>
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
  
  if (isset($_POST["aedit"])){
      $sql="update admin set a_user='".$_POST["a_user"]."',a_pass='".md5(md5($_POST["a_pass"]))."',a_class=".$_POST["a_class"].",a_con='".$_POST["a_con"]."' where a_id=".$_POST["a_id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('更新成功');location.href='alist.php';</script>";	  
	  }else{	  
	  exit("修改失败! 错误信息为:".mysql_error());
	  }
  }
  
   if (isset($_GET["adel"])){
      $sq="delete from admin where a_id=".$_GET["id"];
	  $rss=mysql_query($sq,$conn);
	  if ($rss){	 
      echo"<script>alert('删除成功');location.href='alist.php';</script>";	  
	  }else{	  
	  exit("删除失败! 错误信息为:".mysql_error());
	  }
  }

  if (isset($_POST["aadd"])){
      $sql="insert into admin set a_user='".$_POST["a_user"]."',a_pass='".md5(md5($_POST["a_pass"]))."',a_class='".$_POST["a_class"]."',a_con='".$_POST["a_con"]."'";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('添加成功');location.href='alist.php';</script>";	  
	  }else{	  
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }
  
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">管理员：添加，修改</div></th>
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
	<td class="mian_right_box_title_01">用户名</td>

	<td class="mian_right_box_title_01">密码</td>
	<td class="mian_right_box_title_01">等级</td>
	<td width="390" class="mian_right_box_title_01">备注</td>
	<td class="mian_right_box_title_01">操作</td>
  </tr>
	
	<?php
	  $sql="select * from admin";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	 
	     if(mysql_num_rows($rs)>=1){
		 $i=0;
		     while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
			 $i=$i+1;
			 ?>
	
	<form name="aform<?php echo $i?>" method="post" action="">
	  <tr>

	<td width="149" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["a_id"];?></td>
	
	<td width="219" bgcolor="#FFFFFF" class="title"><input name="aedit" value="editok" type="hidden">
      <input name="a_id" value="<?php echo $row["a_id"]?>" type="hidden">
      <input type="text" name="a_user" id="a_user" value="<?php echo $row["a_user"]?>" maxlength="40" style="width:120px;"/></td>

    <td width="261" bgcolor="#FFFFFF" class="title"><input type="text" name="a_pass" id="a_pass" value="<?php echo $row["a_pass"]?>" maxlength="40" style="width:180px;"/></td>
    <td width="107" bgcolor="#FFFFFF" class="title"><input type="text" name="a_class" id="a_class" value="<?php echo $row["a_class"]?>" onKeyUp="value=value.replace(/[^\d]/g,'')" maxlength="2" style="width:50px;"/></td>
    <td bgcolor="#FFFFFF" class="title"><input type="text" name="a_con" id="a_con" value="<?php echo $row["a_con"]?>" maxlength="40" style="width:250px;"/></td>
    <td width="195" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" onClick="if(document.aform<?php echo $i;?>.a_user.value==''){alert('标题为空');document.aform<?php echo $i;?>.a_user.focus();return false;}if(document.aform<?php echo $i;?>.a_pass.value==''){alert('密码为空');document.aform<?php echo $i;?>.a_pass.focus();return false;}if(document.aform<?php echo $i;?>.a_class.value==''){alert('等级为空');document.aform<?php echo $i;?>.a_class.focus();return false;}if(document.aform<?php echo $i;?>.a_con.value==''){alert('备注为空');document.aform<?php echo $i;?>.a_con.focus();return false;}" value="更新">
      <a href="alist.php?adel=ook&id=<?php echo $row["a_id"]?>" onClick="return confirm('是否将此信息删除?')">删除</a></td>
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
<form name="aform" method="post" action="">
  <tr>
    <td colspan="10" class="mian_right_box_title_01">【添加管理员】</td>
	</tr>
	  <tr>
    <td width="76" height="33" align="right" bgcolor="#FFFFFF" class="title">用户名：</td>
	<td width="137" align="left" bgcolor="#FFFFFF" class="title"><input name="aadd" value="aok" type="hidden">
      <input type="text" name="a_user" id="a_user" value="" maxlength="40" style="width:120px;"/></td>
	
	<td width="65" align="left" bgcolor="#FFFFFF" class="title">密码：</td>
	<td width="139" align="left" bgcolor="#FFFFFF" class="title"><input type="text" name="a_pass" id="a_pass" value="" maxlength="40" style="width:120px;"/></td>
	<td width="54" align="left" bgcolor="#FFFFFF" class="title">等级：</td>
	<td width="138" colspan="-2" align="center" bgcolor="#FFFFFF" class="title"><input type="text" name="a_class" id="a_class" onKeyUp="value=value.replace(/[^\d]/g,'')" maxlength="2" style="width:100px;"/></td>
    <td width="37" bgcolor="#FFFFFF" class="title">备注：</td>
    <td width="340" bgcolor="#FFFFFF" class="title"><input type="text" name="a_con" id="a_con" value="" maxlength="40" style="width:250px;"/></td>
    <td width="128" bgcolor="#FFFFFF" class="title">
	<input type="submit" onClick="if(document.aform.a_user.value==''){alert('用户名为空');document.aform.a_user.focus();return false;}if(document.aform.a_pass.value==''){alert('密码为空');document.aform.a_pass.focus();return false;}if(document.aform.a_class.value==''){alert('等级为空');document.aform.a_class.focus();return false;}if(document.aform.a_con.value==''){alert('备注为空');document.aform.a_con.focus();return false;}" name="Submit" value="添加"></td>
	  </tr>
  </form>
</table> 
</div>
</BODY>
</HTML>
